<?php

/* Material.php
 * 
 * This file is part of jAutoInvoice, a car workshop management software.
 * 
 * Copyright (c) 2012, Sérgio Lopes.
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
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 * 
 * http://sourceforge.net/projects/jautoinvoice
 */

/**
 * @property int $idMaterial
 * @property string $precoUnitario
 * @property string $referencia
 * @property string $descricao
 * @property int $activo
 * 
 * @property int $idFornecedor
 * @property int $idIVA
 *
 * @property Fornecedor $fornecedor
 * @property IVA $iva
 */
class Material extends CActiveRecord {

    /**
     * @return Material
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'Material';
    }

    public function rules() {
        return array(
            array('precoUnitario, referencia, idFornecedor, idIVA', 'required'),
            array('precoUnitario', 'numerical'),
            array('referencia', 'length', 'max' => 25),
            array('descricao', 'safe'),
            // serach
            array('precoUnitario, referencia, descricao, idFornecedor, idIVA', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            //'linhaGastos' => array(self::HAS_MANY, 'LinhaGasto', 'idMaterial'),
            'fornecedor' => array(self::BELONGS_TO, 'Fornecedor', 'idFornecedor'),
            'iva' => array(self::BELONGS_TO, 'IVA', 'idIVA'),
        );
    }

    public function attributeLabels() {
        return array(
            'idMaterial' => 'ID',
            'precoUnitario' => 'Preço Unitário',
            'referencia' => 'Referência',
            'descricao' => 'Descrição',
            'idFornecedor' => 'Fornecedor',
            'idIVA' => 'IVA',
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->compare('precoUnitario', $this->precoUnitario);
        $criteria->compare('referencia', $this->referencia, true);
        $criteria->compare('descricao', $this->descricao, true);

        $criteria->compare('idFornecedor', $this->idFornecedor);
        $criteria->compare('idIVA', $this->idIVA);

        $criteria->compare('activo', 1);

        return new CActiveDataProvider('Material', array('criteria' => $criteria));
    }

}