<?php

/* This file is part of jAutoInvoice, a car workshop management software.
 * 
 * Copyright (c) 2012 - 2014, Sérgio Lopes.
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
 */

class IvaController extends AdministracaoController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    /**
     * Listagem de todos os registos existentes e possibilidade de pesquisa simples.
     */
    public function actionIndex() {
        $filtro = new Iva('search');
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Iva'])) {
            $filtro->attributes = $_REQUEST['Iva'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    /**
     * Adiciona um novo registo de IVA.
     */
    public function actionAdicionar() {
        $iva = new Iva();

        $this->validacaoAJAX('iva-form', $iva);

        if (isset($_POST['Iva'])) {
            $iva->attributes = $_POST['Iva'];
            if ($iva->save()) {
                $this->redirect(array('editar', 'id' => $iva->idIva));
            }
        }

        $this->render('editar', array('iva' => $iva));
    }

    /**
     * Permite a edição de um registo de IVA existente.
     * 
     * @param integer $id 
     */
    public function actionEditar($id) {
        $iva = $this->carregarModeloIva($id);

        $this->validacaoAJAX('iva-form', $iva);

        if (isset($_POST['Iva'])) {
            $iva->attributes = $_POST['Iva'];

            if ($iva->save()) {
                $this->redirect(array('editar', 'id' => $iva->idIva));
            }
        }

        $this->render('editar', array('iva' => $iva));
    }

    /**
     * Permite a remoção de um registo de IVA.
     * 
     * @param integer $id ID do registo a remover.
     * @throws CHttpException 
     */
    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($iva = $this->carregarModeloIVA($id)) !== null) {

            $iva->activo = 0;
            $iva->save();

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Pedido inválido. Se tem a certeza que o pedido está correcto contacte o suporte ou confirme o registo de erros.');
        }
    }

    /**
     * Regras de acesso às acções do controlador.
     * 
     * @return array Lista de regras de acesso
     */
    public function accessRules() {
        return array_merge(array(
            array(
                'deny',
                'users' => array('?')
            ),
            array(
                'allow',
                'actions' => array('index', 'adicionar', 'editar', 'apagar'),
                'expression' => '$user->tipo > 1'
            )), parent::accessRules());
    }

    /**
     *
     * @param integer $id 
     * 
     * @return Iva
     * @throws CHttpException 
     */
    private function carregarModeloIva($id) {
        if (($iva = Iva::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'A página pedida não existe.');
        }

        return $iva;
    }

}
