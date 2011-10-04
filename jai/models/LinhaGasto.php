<?php

/*
 * LinhaGasto.php
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
 * This is the model class for table "jautoinvoice.LinhaGasto".
 *
 * The followings are the available columns in table 'jautoinvoice.LinhaGasto':
 * @property string $idLinhaGasto
 * @property integer $quantidade
 * @property string $precoUnitario
 * @property integer $activo
 * @property string $idMaterial
 * @property string $idLInhaServico
 *
 * The followings are the available model relations:
 * @property Material $idMaterial0
 * @property LinhaServico $idLInhaServico0
 */
class LinhaGasto extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return LinhaGasto the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'jautoinvoice.LinhaGasto';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('quantidade, precoUnitario, idMaterial, idLInhaServico', 'required'),
            array('quantidade, activo', 'numerical', 'integerOnly' => true),
            array('precoUnitario, idMaterial, idLInhaServico', 'length', 'max' => 10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('idLinhaGasto, quantidade, precoUnitario, activo, idMaterial, idLInhaServico', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idMaterial0' => array(self::BELONGS_TO, 'Material', 'idMaterial'),
            'idLInhaServico0' => array(self::BELONGS_TO, 'LinhaServico', 'idLInhaServico'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idLinhaGasto' => 'Id Linha Gasto',
            'quantidade' => 'Quantidade',
            'precoUnitario' => 'Preco Unitario',
            'activo' => 'Activo',
            'idMaterial' => 'Id Material',
            'idLInhaServico' => 'Id Linha Servico',
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

        $criteria->compare('idLinhaGasto', $this->idLinhaGasto, true);
        $criteria->compare('quantidade', $this->quantidade);
        $criteria->compare('precoUnitario', $this->precoUnitario, true);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('idMaterial', $this->idMaterial, true);
        $criteria->compare('idLInhaServico', $this->idLInhaServico, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}