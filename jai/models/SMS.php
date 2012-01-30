<?php

/* SMS.php
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
 * @property int $idSMS
 * @property int $idFuncionario
 * @property int $idCliente
 * @property string $numero
 * @property string $mensagem
 * @property string $codigoErro
 * @property string $data
 * 
 * @property Funcionario $funcionario
 * @property Cliente $cliente
 */
class SMS extends CActiveRecord {

    /**
     * @return SMS
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'SMS';
    }

    public function rules() {
        return array(
            // search
            array('codigoErro, numero, idCliente, idFuncionario, data', 'safe', 'on' => 'search'),
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
            'idSMS' => 'ID',
            'idFuncionario' => 'Funcionario',
            'idCliente' => 'Cliente',
            'numero' => 'Número',
            'mensagem' => 'Mensagem',
            'codigoErro' => 'Código',
            'data' => 'Data de Envio'
        );
    }

    /**
     * @return CActiveDataProvider 
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->compare('codigErro', $this->codigoErro, true);
        $criteria->compare('numero', $this->numero, true);
        $criteria->compare('idCliente', $this->idCliente);
        $criteria->compare('idFuncionario', $this->idFuncionario);
        $criteria->compare('data', $this->data);

        return new CActiveDataProvider('SMS', array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'data DESC',
                        )));
    }

}