<?php

/*
 * ContractoUtilizador.php
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
 * This is the model class for table "jautoinvoice.ContactoUtilizador".
 *
 * The followings are the available columns in table 'jautoinvoice.ContactoUtilizador':
 * @property string $idContacto
 * @property string $idUtilizador
 */
class ContactoUtilizador extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return ContactoUtilizador the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'jautoinvoice.ContactoUtilizador';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idContacto, idUtilizador', 'required'),
            array('idContacto, idUtilizador', 'length', 'max' => 10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('idContacto, idUtilizador', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idContacto' => 'Id Contacto',
            'idUtilizador' => 'Id Utilizador',
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

        $criteria->compare('idContacto', $this->idContacto, true);
        $criteria->compare('idUtilizador', $this->idUtilizador, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}