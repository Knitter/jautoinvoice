<?php

/* IVA.php
 * 
 * This file is part of jAutoInvoice, a car workshop management software.
 * Copyright (c) 2011, Sérgio Lopes.
 * http://sourceforge.net/projects/jautoinvoice
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
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * @property int $idIVA
 * @property string $descricao
 * @property double $percentagem
 * @property int $activo
 *
 * @property Material[] $materials
 */
class IVA extends CActiveRecord {

    /**
     * @return IVA
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'IVA';
    }

    public function rules() {
        return array(
            array('descricao, percentagem', 'required'),
            array('percentagem', 'numerical'),
            array('descricao', 'length', 'max' => 255),
            // search
            array('descricao, percentagem', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'materials' => array(self::HAS_MANY, 'Material', 'idIVA'),
        );
    }

    public function attributeLabels() {
        return array(
            'idIVA' => 'ID',
            'descricao' => 'Descrição',
            'percentagem' => 'Percentagem'
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->order = 'descricao';

        $criteria->compare('descricao', $this->descricao, true);
        $criteria->compare('percentagem', $this->percentagem);
        $criteria->compare('activo', 1);

        return new CActiveDataProvider('IVA', array('criteria' => $criteria));
    }

}