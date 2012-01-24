<?php

/* Combustivel.php
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
 * @property int $idCombustivel
 * @property string $nome
 * @property int $activo
 *
 * @property Veiculo[] $veiculos
 */
class Combustivel extends CActiveRecord {

    /**
     * @return Combustivel
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'Combustivel';
    }

    public function rules() {
        return array(
            array('nome', 'required'),
            array('nome', 'length', 'max' => 100),
            // search
            array('nome', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'veiculos' => array(self::HAS_MANY, 'Veiculo', 'idCombustivel'),
        );
    }

    public function attributeLabels() {
        return array(
            'idCombustivel' => 'ID',
            'nome' => 'Nome'
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->order = 'nome';

        $criteria->compare('nome', $this->nome, true);
        $criteria->compare('activo', 1);

        return new CActiveDataProvider('Combustivel', array('criteria' => $criteria));
    }

}