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

/**
 * @property int $idFolhaObra
 * @property string $data
 * @property string $descricaoAvaria
 * @property integer $kms
 * @property int $activo
 * @property int $idVeiculo
 * @property int $idFuncionario
 * @property string $matricula
 *
 * @property Veiculo $veiculo
 * @property Funcionario $funcionario
 * @property Marcacao $marcacao
 */
class FolhaObra extends CActiveRecord {

    /**
     * @return FolhaObra
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{FolhaObra}}';
    }

    public function rules() {
        return array(
            array('data, kms, idFuncionario, matricula', 'required'),
            array('kms', 'numerical', 'integerOnly' => true),
            array('descricaoAvaria', 'safe'),
            // search
            array('data, descricaoAvaria, idFuncionario, matricula', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'veiculo' => array(self::BELONGS_TO, 'Veiculo', 'idVeiculo'),
            'marcacao' => array(self::HAS_ONE, 'Marcacao', 'idMarcacao'),
            'funcionario' => array(self::BELONGS_TO, 'Funcionario', 'idFuncionario'),
            'linhaServicos' => array(self::HAS_MANY, 'LinhaServico', 'idFolhaObra'),
        );
    }

    public function attributeLabels() {
        return array(
            'idFolhaObra' => 'ID',
            'data' => 'Data',
            'descricaoAvaria' => 'Descrição da Avaria',
            'kms' => 'Kms',
            'idVeiculo' => 'Veículo',
            'idFuncionario' => 'Funcionário',
            'matricula' => 'Matrícula'
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->compare('data', $this->data, true);
        $criteria->compare('descricaoAvaria', $this->descricaoAvaria, true);
        $criteria->compare('kms', $this->kms);
        $criteria->compare('matricula', $this->matricula);
        $criteria->compare('idFuncionario', $this->idFuncionario);
        $criteria->compare('activo', 1);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'data DESC',
                        )));
    }

}