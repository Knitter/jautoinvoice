<?php

/* Cliente.php
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
 * @property int $idCliente
 * @property string $email
 * @property string $password
 * @property string $nome
 * @property string $contribuinte
 * @property string $telefone
 * @property string $telemovel
 * @property string $morada
 * @property int $activo
 * 
 * @property Veiculo[] veiculosActuais
 * @property Veiculo[] veiculosAntigos
 */
class Cliente extends CActiveRecord {

    /**
     * @return Cliente
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'Cliente';
    }

    public function rules() {
        return array(
            array('contribuinte, nome', 'required'),
            array('email, nome, morada', 'length', 'max' => 255),
            array('telefone, telemovel, contribuinte', 'length', 'max' => 9),
            // search
            array('nome, contribuinte, telefone, telemovel', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'veiculosActuais' => array(self::HAS_MANY, 'Veiculo', 'idCliente'),
            'veiculosAntigos' => array(self::MANY_MANY, 'Veiculo', 'ClienteVeiculo(idCliente, idVeiculo)'),
        );
    }

    public function attributeLabels() {
        return array(
            'idCliente' => 'ID',
            'nome' => 'Nome',
            'password' => 'Password',
            'email' => 'E-mail',
            'contribuinte' => 'Contribuinte',
            'telefone' => 'Telefone',
            'telemovel' => 'Telemóvel',
            'morada' => 'Morada'
        );
    }

    /**
     * @return CActiveDataProvider 
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->compare('nome', $this->nome, true);
        $criteria->compare('contribuinte', $this->contribuinte, true);
        $criteria->compare('telefone', $this->telefone, true);
        $criteria->compare('telemovel', $this->telemovel, true);
        $criteria->compare('activo', 1);

        return new CActiveDataProvider('Cliente', array('criteria' => $criteria));
    }

}