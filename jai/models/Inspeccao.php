<?php

/*
 * Inspeccao.php
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
 * This is the model class for table "jautoinvoice.Inspeccao".
 *
 * The followings are the available columns in table 'jautoinvoice.Inspeccao':
 * @property string $idInspeccao
 * @property string $data
 * @property string $notas
 * @property integer $activo
 * @property string $idEstadoInspeccao
 * @property string $idFuncionario
 * @property string $idVeiculo
 *
 * The followings are the available model relations:
 * @property EstadoInspeccao $idEstadoInspeccao0
 * @property Funcionario $idFuncionario0
 * @property Veiculo $idVeiculo0
 * @property Veiculo[] $veiculos
 */
class Inspeccao extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Inspeccao the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'jautoinvoice.Inspeccao';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('data, idEstadoInspeccao, idFuncionario, idVeiculo', 'required'),
            array('activo', 'numerical', 'integerOnly' => true),
            array('idEstadoInspeccao, idFuncionario, idVeiculo', 'length', 'max' => 10),
            array('notas', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('idInspeccao, data, notas, activo, idEstadoInspeccao, idFuncionario, idVeiculo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idEstadoInspeccao0' => array(self::BELONGS_TO, 'EstadoInspeccao', 'idEstadoInspeccao'),
            'idFuncionario0' => array(self::BELONGS_TO, 'Funcionario', 'idFuncionario'),
            'idVeiculo0' => array(self::BELONGS_TO, 'Veiculo', 'idVeiculo'),
            'veiculos' => array(self::MANY_MANY, 'Veiculo', 'VeiculoInspeccao(idInspeccao, idVeiculo)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idInspeccao' => 'Id Inspeccao',
            'data' => 'Data',
            'notas' => 'Notas',
            'activo' => 'Activo',
            'idEstadoInspeccao' => 'Id Estado Inspeccao',
            'idFuncionario' => 'Id Funcionario',
            'idVeiculo' => 'Id Veiculo',
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

        $criteria->compare('idInspeccao', $this->idInspeccao, true);
        $criteria->compare('data', $this->data, true);
        $criteria->compare('notas', $this->notas, true);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('idEstadoInspeccao', $this->idEstadoInspeccao, true);
        $criteria->compare('idFuncionario', $this->idFuncionario, true);
        $criteria->compare('idVeiculo', $this->idVeiculo, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}