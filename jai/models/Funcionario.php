<?php

/* Funcionario.php
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
 * @property int $idFuncionario
 * @property string $nome
 * @property string $contribuinte
 * @property string $telefone
 * @property string $telemovel
 * @property string $username
 * @property string $password
 * @property string $valorHora
 * @property int $activo
 * 
 * @property FolhaObra[] $folhaObras
 * @property Utilizador $idFuncionario0
 * @property Inspeccao[] $inspeccaos
 * @property LinhaServico[] $linhaServicos
 */
class Funcionario extends CActiveRecord {

    public $password2;

    /**
     * @return Funcionario
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'Funcionario';
    }

    public function rules() {
        return array(
            array('nome, username, contribuinte', 'required'),
            array('password, password2', 'required', 'on' => 'insert'),
            array('password', 'compare', 'compareAttribute' => 'password2', 'on' => 'update'),
            array('username', 'length', 'max' => 100),
            array('nome', 'length', 'max' => 255),
            array('contribuinte', 'length', 'max' => 9),
            array('telefone, telemovel', 'length', 'max' => 13),
            // search
            array('nome, username, contribuinte', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'folhaObras' => array(self::HAS_MANY, 'FolhaObra', 'idFuncionario'),
//            'inspeccaos' => array(self::HAS_MANY, 'Inspeccao', 'idFuncionario'),
//            'linhaServicos' => array(self::HAS_MANY, 'LinhaServico', 'idFuncionario'),
        );
    }

    public function attributeLabels() {
        return array(
            'idFuncionario' => 'ID',
            'nome' => 'Nome',
            'contribuinte' => 'Contribuinte',
            'username' => 'Username',
            'password' => 'Password',
            'password2' => 'Repetir Password',
            'valorHora' => 'Valor/Hora',
            'telefone' => 'Telefone',
            'telemovel' => 'Telemóvel'
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->compare('nome', $this->nome, true);
        $criteria->compare('contribuinte', $this->contribuinte, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('telefone', $this->telefone, true);
        $criteria->compare('telemovel', $this->telemovel, true);
        $criteria->compare('activo', 1);

        return new CActiveDataProvider('Funcionario', array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'nome ASC',
                    )));
    }

    public static function hash($password) {
        return sha1(Yii::app()->params['hash'] . $password);
    }

}