<?php

/* FolhaObra.php
 * 
 * This file is part of jAutoInvoice, a car workshop management software.
 * 
 * Copyright (c) 2011, Sérgio Lopes.
 * http://sourceforge.net/projects/jautoinvoice
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * @property int $idFolhaObra
 * @property string $data
 * @property string $descricaoAvaria
 * @property integer $kms
 * @property int $activo
 * 
 * @property int $idVeiculo
 * @property int $idFuncionario
 *
 * @property Veiculo $veiculo
 * @property Funcionario $funcionario
 */
class FolhaObra extends CActiveRecord {

    /**
     * @return FolhaObra
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'FolhaObra';
    }

    public function rules() {
        return array(
            array('data, descricaoAvaria, kms, idVeiculo, idFuncionario', 'required'),
            array('kms, idVeiculo, idFuncionario', 'numerical', 'integerOnly' => true),
            // search
            array('data, descricaoAvaria, idVeiculo, idFuncionario', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'veiculo' => array(self::BELONGS_TO, 'Veiculo', 'idVeiculo'),
            'funcionario' => array(self::BELONGS_TO, 'Funcionario', 'idFuncionario'),
//            'linhaServicos' => array(self::HAS_MANY, 'LinhaServico', 'idFolhaObra'),
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

        $criteria->compare('idVeiculo', $this->idVeiculo);
        $criteria->compare('idFuncionario', $this->idFuncionario);
        $criteria->compare('activo', 1);

        return new CActiveDataProvider('FolhaObra', array('criteria' => $criteria));
    }

}