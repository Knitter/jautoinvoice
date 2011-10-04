<?php

/*
 * Material.php
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
 * This is the model class for table "jautoinvoice.Material".
 *
 * The followings are the available columns in table 'jautoinvoice.Material':
 * @property string $idMaterial
 * @property string $precoUnitario
 * @property string $referencia
 * @property string $descricao
 * @property integer $activo
 * @property string $idFornecedor
 * @property string $idIVA
 *
 * The followings are the available model relations:
 * @property LinhaGasto[] $linhaGastos
 * @property Fornecedor $idFornecedor0
 * @property IVA $idIVA0
 */
class Material extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Material the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'jautoinvoice.Material';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('precoUnitario, referencia, idFornecedor, idIVA', 'required'),
            array('activo', 'numerical', 'integerOnly' => true),
            array('precoUnitario, idFornecedor, idIVA', 'length', 'max' => 10),
            array('referencia', 'length', 'max' => 25),
            array('descricao', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('idMaterial, precoUnitario, referencia, descricao, activo, idFornecedor, idIVA', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'linhaGastos' => array(self::HAS_MANY, 'LinhaGasto', 'idMaterial'),
            'idFornecedor0' => array(self::BELONGS_TO, 'Fornecedor', 'idFornecedor'),
            'idIVA0' => array(self::BELONGS_TO, 'IVA', 'idIVA'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idMaterial' => 'Id Material',
            'precoUnitario' => 'Preco Unitario',
            'referencia' => 'Referencia',
            'descricao' => 'Descricao',
            'activo' => 'Activo',
            'idFornecedor' => 'Id Fornecedor',
            'idIVA' => 'Id Iva',
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

        $criteria->compare('idMaterial', $this->idMaterial, true);
        $criteria->compare('precoUnitario', $this->precoUnitario, true);
        $criteria->compare('referencia', $this->referencia, true);
        $criteria->compare('descricao', $this->descricao, true);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('idFornecedor', $this->idFornecedor, true);
        $criteria->compare('idIVA', $this->idIVA, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}