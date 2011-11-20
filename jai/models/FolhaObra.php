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
 * @property integer $activo
 * @property string $idVeiculo
 * @property string $idFuncionario
 *
 * @property Veiculo $idVeiculo0
 * @property Funcionario $idFuncionario0
 * @property LinhaServico[] $linhaServicos
 * @property Veiculo[] $veiculos
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
            array('kms, activo', 'numerical', 'integerOnly' => true),
            array('idVeiculo, idFuncionario', 'length', 'max' => 10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('idFolhaObra, data, descricaoAvaria, kms, activo, idVeiculo, idFuncionario', 'safe', 'on' => 'search'),
        );
    }

//    public function relations() {
//        // NOTE: you may need to adjust the relation name and the related
//        // class name for the relations automatically generated below.
//        return array(
//            'idVeiculo0' => array(self::BELONGS_TO, 'Veiculo', 'idVeiculo'),
//            'idFuncionario0' => array(self::BELONGS_TO, 'Funcionario', 'idFuncionario'),
//            'linhaServicos' => array(self::HAS_MANY, 'LinhaServico', 'idFolhaObra'),
//            'veiculos' => array(self::MANY_MANY, 'Veiculo', 'VeiculoFolhaObra(idFolhaObra, idVeiculo)'),
//        );
//    }

    public function attributeLabels() {
        return array(
            'idFolhaObra' => 'Id Folha Obra',
            'data' => 'Data',
            'descricaoAvaria' => 'Descricao Avaria',
            'kms' => 'Kms',
            'activo' => 'Activo',
            'idVeiculo' => 'Id Veiculo',
            'idFuncionario' => 'Id Funcionario',
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
        $criteria->compare('activo', $this->activo);
        $criteria->compare('idVeiculo', $this->idVeiculo, true);
        $criteria->compare('idFuncionario', $this->idFuncionario, true);
        $criteria->comprare('active', 1);

        return new CActiveDataProvider('FolhaObra', array('criteria' => $criteria));
    }

}