<?php

/* ClienteVeiculo.php
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
 * @property int $idVeiculo
 * @property int $idCliente
 * 
 * @property Cliente $cliente
 * @property Veiculo $veiculo
 */
class ClienteVeiculo extends CActiveRecord {

    /**
     * @return ClienteVeiculo
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'ClienteVeiculo';
    }

    public function relations() {
        return array(
            'veiculo' => array(self::BELONGS_TO, 'Veiculo', 'idVeiculo'),
            'cliente' => array(self::BELONGS_TO, 'Cliente', 'idCliente')
        );
    }

    public function attributeLabels() {
        return array(
            'idVeiculo' => 'Veículo',
            'idCliente' => 'Cliente'
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->compare('idVeiculo', $this->idVeiculo);
        $criteria->compare('idCliente', $this->idCliente);

        return new CActiveDataProvider('ClienteVeiculo', array('criteria' => $criteria));
    }

}