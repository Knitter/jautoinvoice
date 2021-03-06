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
 * @property integer $idCategoria
 * @property string $nome
 * @property integer $activo
 *
 * @property Veiculo[] $veiculos
 */
class Categoria extends CActiveRecord {

    /**
     * @return Categoria
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{Categoria}}';
    }

    public function rules() {
        return array(
            array('nome', 'required'),
            array('nome', 'length', 'max' => 100),
            array('nome', 'safe', 'on' => 'search')
        );
    }

    public function relations() {
        return array(
            'veiculos' => array(self::HAS_MANY, 'Veiculo', 'idCategoria')
        );
    }

    public function attributeLabels() {
        return array(
            'idCategoria' => 'ID',
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
                'defaultOrder' => 'nome ASC'
        )));
    }

}
