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
 * @property int $idMarca
 * @property string $nome
 * @property int $activo
 *
 * Relações:
 * @property Modelo[] $modelos
 */
class Marca extends CActiveRecord {

    /**
     * @return Marca
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{Marca}}';
    }

    public function rules() {
        return array(
            array('nome', 'required'),
            array('nome', 'length', 'max' => 100),
            // search
            array(' nome', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'modelos' => array(self::HAS_MANY, 'Modelo', 'idMarca'),
        );
    }

    public function attributeLabels() {
        return array(
            'idMarca' => 'ID',
            'nome' => 'Nome'
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->compare('nome', $this->nome, true);
        $criteria->compare('activo', 1);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'nome ASC',
                        )));
    }

}