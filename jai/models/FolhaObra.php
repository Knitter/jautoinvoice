<?php

/*
 * FolhaObra.php
 *
 * This file is part of jAutoInvoice, http://sourceforge.net/p/jautoinvoice
 *
 * Copyright (C) 2011 jAutoInvoice
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * This is the model class for table "jautoinvoice.FolhaObra".
 *
 * The followings are the available columns in table 'jautoinvoice.FolhaObra':
 * @property string $idFolhaObra
 * @property string $data
 * @property string $descricaoAvaria
 * @property integer $kms
 * @property integer $activo
 * @property string $idVeiculo
 * @property string $idFuncionario
 *
 * The followings are the available model relations:
 * @property Veiculo $idVeiculo0
 * @property Funcionario $idFuncionario0
 * @property LinhaServico[] $linhaServicos
 * @property Veiculo[] $veiculos
 */
class FolhaObra extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return FolhaObra the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'jautoinvoice.FolhaObra';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('data, descricaoAvaria, kms, idVeiculo, idFuncionario', 'required'),
            array('kms, activo', 'numerical', 'integerOnly' => true),
            array('idVeiculo, idFuncionario', 'length', 'max' => 10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('idFolhaObra, data, descricaoAvaria, kms, activo, idVeiculo, idFuncionario', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idVeiculo0' => array(self::BELONGS_TO, 'Veiculo', 'idVeiculo'),
            'idFuncionario0' => array(self::BELONGS_TO, 'Funcionario', 'idFuncionario'),
            'linhaServicos' => array(self::HAS_MANY, 'LinhaServico', 'idFolhaObra'),
            'veiculos' => array(self::MANY_MANY, 'Veiculo', 'VeiculoFolhaObra(idFolhaObra, idVeiculo)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
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
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('idFolhaObra', $this->idFolhaObra, true);
        $criteria->compare('data', $this->data, true);
        $criteria->compare('descricaoAvaria', $this->descricaoAvaria, true);
        $criteria->compare('kms', $this->kms);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('idVeiculo', $this->idVeiculo, true);
        $criteria->compare('idFuncionario', $this->idFuncionario, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}