<?php

/*
 * Fornecedor.php
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
 * This is the model class for table "jautoinvoice.Fornecedor".
 *
 * The followings are the available columns in table 'jautoinvoice.Fornecedor':
 * @property string $idFornecedor
 * @property string $nome
 * @property string $email
 * @property string $notas
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property Contacto[] $contactos
 * @property Material[] $materials
 */
class Fornecedor extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Fornecedor the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'jautoinvoice.Fornecedor';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nome', 'required'),
            array('activo', 'numerical', 'integerOnly' => true),
            array('nome, email', 'length', 'max' => 255),
            array('notas', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('idFornecedor, nome, email, notas, activo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'contactos' => array(self::MANY_MANY, 'Contacto', 'ContactoFornecedor(idFornecedor, idContacto)'),
            'materials' => array(self::HAS_MANY, 'Material', 'idFornecedor'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idFornecedor' => 'Id Fornecedor',
            'nome' => 'Nome',
            'email' => 'Email',
            'notas' => 'Notas',
            'activo' => 'Activo',
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

        $criteria->compare('idFornecedor', $this->idFornecedor, true);
        $criteria->compare('nome', $this->nome, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('notas', $this->notas, true);
        $criteria->compare('activo', $this->activo);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}