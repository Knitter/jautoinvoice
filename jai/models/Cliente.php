<?php

/*
 * .php
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
 * This is the model class for table "jautoinvoice.Cliente".
 *
 * The followings are the available columns in table 'jautoinvoice.Cliente':
 * @property string $idCliente
 * @property string $contribuinte
 *
 * The followings are the available model relations:
 * @property Utilizador $idCliente0
 * @property Veiculo[] $veiculos
 * @property Veiculo[] $veiculos1
 */
class Cliente extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Cliente the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'jautoinvoice.Cliente';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idCliente, contribuinte', 'required'),
            array('idCliente', 'length', 'max' => 10),
            array('contribuinte', 'length', 'max' => 9),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('idCliente, contribuinte', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idCliente0' => array(self::BELONGS_TO, 'Utilizador', 'idCliente'),
            'veiculos' => array(self::MANY_MANY, 'Veiculo', 'ClienteVeiculo(idCliente, idVeiculo)'),
            'veiculos1' => array(self::HAS_MANY, 'Veiculo', 'idCliente'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCliente' => 'Id Cliente',
            'contribuinte' => 'Contribuinte',
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

        $criteria->compare('idCliente', $this->idCliente, true);
        $criteria->compare('contribuinte', $this->contribuinte, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}