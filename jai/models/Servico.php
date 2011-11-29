<?php

/* Servico.php
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
 * @property int $idServico
 * @property string $nome
 * @property string $descricao
 * @property int $activo
 *
 * @property LinhaServico[] $linhasServico
 */
class Servico extends CActiveRecord {

    /**
     * @return Servico
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'Servico';
    }

    public function rules() {
        return array(
            array('nome', 'required'),
            array('nome', 'length', 'max' => 255),
            array('descricao', 'safe'),
            // search
            array('nome, descricao', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'linhasServico' => array(self::HAS_MANY, 'LinhaServico', 'idServico'),
        );
    }

    public function attributeLabels() {
        return array(
            'idServico' => 'ID',
            'nome' => 'Nome',
            'descricao' => 'Descrição'
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->compare('nome', $this->nome, true);
        $criteria->compare('descricao', $this->descricao, true);
        $criteria->compare('activo', 1);

        return new CActiveDataProvider('Servico', array('criteria' => $criteria));
    }

}