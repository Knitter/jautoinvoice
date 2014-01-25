<?php

/* This file is part of jAutoInvoice, a car workshop management software.
 * 
 * Copyright (c) 2012 - 2014, Sérgio Lopes.
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * @property int $idLinhaGasto
 * @property int $quantidade
 * @property float $precoUnitario
 * @property int $activo
 * 
 * @property int $idMaterial
 * @property int $idIVA
 * @property int $idLinhaServico
 *
 * @property Material $material
 * @property IVA $iva
 * @property LinhaServico $linhaServico
 */
class LinhaGasto extends CActiveRecord {

    /**
     * @return LinhaGasto
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{LinhaGasto}}';
    }

    public function rules() {
        return array(
            array('quantidade, precoUnitario, idMaterial, idIVA, idLinhaServico', 'required'),
            array('quantidade, idLinhaServico, idIVA, idMaterial', 'numerical', 'integerOnly' => true),
            array('precoUnitario', 'numerical'),
            // search
            array('quantidade, idMaterial, idIVA, idLinhaServico', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'linhaSercivo' => array(self::BELONGS_TO, 'LinhaServico', 'idLinhaServico'),
            'material' => array(self::BELONGS_TO, 'Material', 'idMaterial'),
            'iva' => array(self::BELONGS_TO, 'IVA', 'idIVA'),
        );
    }

    public function attributeLabels() {
        return array(
            'idLinhaGasto' => 'ID',
            'quantidade' => 'Quantidade',
            'precoUnitario' => 'Preço Uni.',
            'idMaterial' => 'Material',
            'idIVA' => 'IVA',
            'idLinhaServico' => 'Serviço',
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->compare('quantidade', $this->quantidade);
        $criteria->compare('precoUnitario', $this->precoUnitario);

        $criteria->compare('idMaterial', $this->idMaterial);
        $criteria->compare('idIVA', $this->idIVA);
        $criteria->compare('idLinhaServico', $this->idLinhaServico);

        $criteria->compare('activo', 1);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'idLinhaGasto'
        )));
    }

}
