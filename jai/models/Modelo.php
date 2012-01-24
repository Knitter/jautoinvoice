<?php

/* Modelo.php
 * 
 * This file is part of jAutoInvoice, a car workshop management software.
 * 
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
 * @property int $idModelo
 * @property string $nome
 * @property int $activo
 * @property int $idMarca
 *
 * Relações
 * @property Marca $marca
 * @property Veiculo[] $veiculos
 */
class Modelo extends CActiveRecord {

    /**
     * @return Modelo
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'Modelo';
    }

    public function rules() {
        return array(
            array('nome, idMarca', 'required'),
            array('nome', 'length', 'max' => 100),
            // search
            array('idMarca, nome', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'marca' => array(self::BELONGS_TO, 'Marca', 'idMarca'),
            'veiculos' => array(self::HAS_MANY, 'Veiculo', 'idModelo'),
        );
    }

    public function attributeLabels() {
        return array(
            'idModelo' => 'ID',
            'nome' => 'Nome',
            'idMarca' => 'Marca'
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();
        
        $criteria->order = 'nome';

        $criteria->compare('nome', $this->nome, true);
        $criteria->compare('idMarca', $this->idMarca);
        $criteria->compare('activo', 1);

        return new CActiveDataProvider('Modelo', array('criteria' => $criteria));
    }

}