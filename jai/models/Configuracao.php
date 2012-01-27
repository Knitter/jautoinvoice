<?php

/* Configuracacao.php
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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 * 
 * http://sourceforge.net/projects/jautoinvoice
 */

/**
 * @property string $chave
 * @property string $valor
 */
class Configuracao extends CActiveRecord {

    /**
     * @return Categoria
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'Configuracao';
    }

    public function rules() {
        return array(
            array('chave', 'required'),
            array('chave', 'length', 'max' => 150),
            array('valor', 'length', 'max' => 255),
            // search
            array('chave, valor', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'chave' => 'Chave',
            'valor' => 'Valor',
            'grupo' => 'Grupo'
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->order = 'chave';

        $criteria->compare('chave', $this->chave, true);
        $criteria->compare('valor', $this->valor, true);

        return new CActiveDataProvider('Configuracao', array('criteria' => $criteria));
    }

}