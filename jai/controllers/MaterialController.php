<?php

/* This file is part of jAutoInvoice, a car workshop management software.
 * 
 * Copyright (c) 2012, Sérgio Lopes.
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 * 
 * http://sourceforge.net/projects/jautoinvoice
 */

class MaterialController extends AdministracaoController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    /**
     * Lista de todas as peças activas, com pesquisa.
     */
    public function actionIndex() {
        $filtro = new Material('search');
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Material'])) {
            $filtro->attributes = $_REQUEST['Material'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    /**
     * Permite adicionar uma nova peça.
     */
    public function actionAdicionar() {
        $material = new Material();

        $this->validacaoAJAX('material-form', $material);

        if (isset($_POST['Material'])) {
            $material->attributes = $_POST['Material'];
            if ($material->save()) {
                if (isset($_POST['Material']['fornecedores']) && count($_POST['Material']['fornecedores'])) {
                    foreach ($_POST['Material']['fornecedores'] as $fornecedor) {
                        $mf = new MaterialFornecedor();
                        $mf->idMaterial = $material->idMaterial;
                        $mf->idFornecedor = (int) $fornecedor;

                        $mf->save();
                    }
                }

                $this->redirect(array('editar', 'id' => $material->idMaterial));
            }
        }

        $criteria = new CDbCriteria(array('order' => 'descricao'));
        $criteria->compare('activo', 1);

        $ivas = IVA::model()->findAll($criteria);

        $criteria->order = 'nome';
        $fornecedores = Fornecedor::model()->findAll($criteria);

        $this->render('editar', array(
            'material' => $material,
            'ivas' => $ivas,
            'fornecedores' => $fornecedores
        ));
    }

    /**
     * Permite a edição de peças existentes.
     * 
     * @param integer $id ID do registo a editar.
     */
    public function actionEditar($id) {
        $material = $this->carregarModeloMaterial($id);

        $this->validacaoAJAX('material-form', $material);

        if (isset($_POST['Material'])) {
            $material->attributes = $_POST['Material'];
            if ($material->save()) {
                MaterialFornecedor::model()->deleteAll('idMaterial = :id', array(':id' => $material->idMaterial));

                if (isset($_POST['Material']['fornecedores']) && count($_POST['Material']['fornecedores'])) {
                    foreach ($_POST['Material']['fornecedores'] as $fornecedor) {
                        if ($fornecedor) {
                            $mf = new MaterialFornecedor();
                            $mf->idMaterial = $material->idMaterial;
                            $mf->idFornecedor = (int) $fornecedor;

                            $mf->save();
                        }
                    }
                }
                $this->redirect(array('editar', 'id' => $material->idMaterial));
            }
        }

        $criteria = new CDbCriteria(array('order' => 'descricao'));
        $criteria->compare('activo', 1);

        $ivas = IVA::model()->findAll($criteria);

        $criteria->order = 'nome';
        $fornecedores = Fornecedor::model()->findAll($criteria);

        $this->render('editar', array(
            'material' => $material,
            'ivas' => $ivas,
            'fornecedores' => $fornecedores
        ));
    }

    /**
     * Remove um registo.
     * 
     * @param integer $id ID do registo a remover
     * @throws CHttpException 
     */
    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($material = $this->carregarModeloMaterial($id)) !== null) {

            $material->activo = 0;
            $material->save();

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Pedido inválido. Se tem a certeza que o pedido está correcto contacte o suporte ou confirme o registo de erros.');
        }
    }

    /**
     * Devolve os dados de um registo em formato JSON.
     */
    public function actionDadosJSON() {
        $resultado = (object) array('sucesso' => 0);
        if (isset($_POST['id']) && ($material = $this->carregarModeloMaterial($_POST['id'])) !== null) {
            $resultado->sucesso = 1;
            $resultado->material = (object) array(
                        'idMaterial' => $material->idMaterial,
                        'nome' => $material->nome,
                        'precoUnitario' => $material->precoUnitario,
                        'iva' => (object) array(
                            'idIVA' => $material->idIVA,
                            'descricao' => $material->iva->descricao,
                            'percentagem' => $material->iva->percentagem
                        )
            );
        }

        echo json_encode($resultado);
        Yii::app()->end();
    }

    /**
     * Regras de acesso às acções do controlador.
     * 
     * @return array Lista de regras de acesso.
     */
    public function accessRules() {
        return array_merge(array(
                    array(
                        'deny',
                        'users' => array('?')
                    ),
                    array(
                        'allow',
                        'actions' => array(
                            'index', 'adicionar', 'editar', 'apagar', 'dadosJSON'
                        ),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

    /**
     * Carrega um registo de material a partir da base de dados.
     * 
     * @param integer $id ID do registo a carregar.
     * 
     * @return Material Registo de material encontrado.
     * @throws CHttpException 
     */
    private function carregarModeloMaterial($id) {
        if (($material = Material::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'A página pedida não existe.');
        }

        return $material;
    }

}