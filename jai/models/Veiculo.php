<?php

/*
 * Veiculo.php
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
 * This is the model class for table "jautoinvoice.Veiculo".
 *
 * The followings are the available columns in table 'jautoinvoice.Veiculo':
 * @property string $idVeiculo
 * @property string $dataRegisto
 * @property string $matricula
 * @property string $nrChassis
 * @property string $cilindrada
 * @property string $nrMotor
 * @property string $notas
 * @property integer $activo
 * @property string $idCliente
 * @property string $idCategoria
 * @property string $idCombustivel
 * @property string $idModelo
 *
 * The followings are the available model relations:
 * @property Cliente[] $clientes
 * @property FolhaObra[] $folhaObras
 * @property Inspeccao[] $inspeccaos
 * @property Cliente $idCliente0
 * @property Categoria $idCategoria0
 * @property Combustivel $idCombustivel0
 * @property Modelo $idModelo0
 */
class Veiculo extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Veiculo the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'jautoinvoice.Veiculo';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('matricula, idCliente, idCategoria, idCombustivel, idModelo', 'required'),
            array('activo', 'numerical', 'integerOnly' => true),
            array('matricula', 'length', 'max' => 12),
            array('nrChassis, cilindrada, nrMotor', 'length', 'max' => 25),
            array('idCliente, idCategoria, idCombustivel, idModelo', 'length', 'max' => 10),
            array('dataRegisto, notas', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('idVeiculo, dataRegisto, matricula, nrChassis, cilindrada, nrMotor, notas, activo, idCliente, idCategoria, idCombustivel, idModelo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'clientes' => array(self::MANY_MANY, 'Cliente', 'ClienteVeiculo(idVeiculo, idCliente)'),
            'folhaObras' => array(self::MANY_MANY, 'FolhaObra', 'VeiculoFolhaObra(idVeiculo, idFolhaObra)'),
            'inspeccaos' => array(self::MANY_MANY, 'Inspeccao', 'VeiculoInspeccao(idVeiculo, idInspeccao)'),
            'idCliente0' => array(self::BELONGS_TO, 'Cliente', 'idCliente'),
            'idCategoria0' => array(self::BELONGS_TO, 'Categoria', 'idCategoria'),
            'idCombustivel0' => array(self::BELONGS_TO, 'Combustivel', 'idCombustivel'),
            'idModelo0' => array(self::BELONGS_TO, 'Modelo', 'idModelo'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idVeiculo' => 'Id Veiculo',
            'dataRegisto' => 'Data Registo',
            'matricula' => 'Matricula',
            'nrChassis' => 'Nr Chassis',
            'cilindrada' => 'Cilindrada',
            'nrMotor' => 'Nr Motor',
            'notas' => 'Notas',
            'activo' => 'Activo',
            'idCliente' => 'Id Cliente',
            'idCategoria' => 'Id Categoria',
            'idCombustivel' => 'Id Combustivel',
            'idModelo' => 'Id Modelo',
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

        $criteria->compare('idVeiculo', $this->idVeiculo, true);
        $criteria->compare('dataRegisto', $this->dataRegisto, true);
        $criteria->compare('matricula', $this->matricula, true);
        $criteria->compare('nrChassis', $this->nrChassis, true);
        $criteria->compare('cilindrada', $this->cilindrada, true);
        $criteria->compare('nrMotor', $this->nrMotor, true);
        $criteria->compare('notas', $this->notas, true);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('idCliente', $this->idCliente, true);
        $criteria->compare('idCategoria', $this->idCategoria, true);
        $criteria->compare('idCombustivel', $this->idCombustivel, true);
        $criteria->compare('idModelo', $this->idModelo, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}