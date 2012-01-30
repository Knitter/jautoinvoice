<?php

/* Email.php
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
 * @property int $idEmail
 * @property int $idFuncionario
 * @property int $idCliente
 * @property string $endereco
 * @property string $mensagem
 * @property string $data
 * @property int $estado
 * @property string $debug
 * @property string $assunto
 * 
 * @property Funcionario $funcionario
 * @property Cliente[] $cliente
 */
class Email extends CActiveRecord {

    /**
     * @return Email
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'Email';
    }

    public function rules() {
        return array(
            // search
            array('endereco, mensagem, data, idFuncionario, idCliente, assunto, estado', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'funcionario' => array(self::BELONGS_TO, 'Funcionario', 'idFuncionario'),
            'cliente' => array(self::BELONGS_TO, 'Cliente', 'idCliente'),
        );
    }

    public function attributeLabels() {
        return array(
            'idEmail' => 'ID',
            'idFuncionario' => 'Funcionário',
            'idCliente' => 'Cliente',
            'endereco' => 'Endereço',
            'mensagem' => 'Mensagem',
            'data' => 'Data de Envio',
            'estado' => 'Estado',
            'debug' => 'Debug',
            'assunto' => 'Assunto'
        );
    }

    /**
     * @return CActiveDataProvider 
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->compare('endereco', $this->endereco, true);
        $criteria->compare('mensagem', $this->mensagem, true);
        $criteria->compare('assunto', $this->assunto, true);
        $criteria->compare('data', $this->data);
        $criteria->compare('idFuncionario', $this->idFuncionario);
        $criteria->compare('idCliente', $this->idCliente);
        $criteria->compare('estado', $this->estado);

        return new CActiveDataProvider('Email', array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'data DESC',
                        )));
    }

}