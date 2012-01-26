<?php

/* Servico.php
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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * http://sourceforge.net/projects/jautoinvoice
 */

/**
 * @property int $idServico
 * @property string $nome
 * @property string $descricao
 * @property string $preco
 * @property int $idIVA
 * @property int $activo
 *
 * @property LinhaServico[] $linhasServico
 * @property IVA $iva
 */
class Servico extends CActiveRecord {

    /**
     * @return Servico
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'Servico';
    }

    public function rules() {
        return array(
            array('nome', 'required'),
            array('nome', 'length', 'max' => 255),
            array('idIVA', 'numerical', 'integerOnly' => true),
            array('descricao', 'safe'),
            //TODO: regra para preço
            // search
            array('nome, descricao', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'linhasServico' => array(self::HAS_MANY, 'LinhaServico', 'idServico'),
            'iva' => array(self::BELONGS_TO, 'IVA', 'idIVA')
        );
    }

    public function attributeLabels() {
        return array(
            'idServico' => 'ID',
            'nome' => 'Nome',
            'descricao' => 'Descrição',
            'preco' => 'Preco',
            'idIVA' => 'IVA'
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();
        
        $criteria->order = 'nome';

        $criteria->compare('nome', $this->nome, true);
        $criteria->compare('descricao', $this->descricao, true);
        $criteria->compare('activo', 1);

        return new CActiveDataProvider('Servico', array('criteria' => $criteria));
    }

}