<?php

/* Fornecedor.php
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
 *  http://sourceforge.net/projects/jautoinvoice
 */

/**
 * @property int $idFornecedor
 * @property string $nome
 * @property string $email
 * @property string $notas
 * @property string $telemovel
 * @property string $telefone
 * @property string $website
 * @property string $morada
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property Contacto[] $contactos
 * @property Material[] $materials
 */
class Fornecedor extends CActiveRecord {

    /**
     * @return Fornecedor
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'Fornecedor';
    }

    public function rules() {
        return array(
            array('nome', 'required'),
            array('nome, email, morada, website', 'length', 'max' => 255),
            array('telefone, telemovel', 'length', 'max' => 13),
            array('notas', 'safe'),
            // search
            array('nome, email', 'safe', 'on' => 'search'),
        );
    }

//    public function relations() {
//        // NOTE: you may need to adjust the relation name and the related
//        // class name for the relations automatically generated below.
//        return array(
//            'contactos' => array(self::MANY_MANY, 'Contacto', 'ContactoFornecedor(idFornecedor, idContacto)'),
//            'materials' => array(self::HAS_MANY, 'Material', 'idFornecedor'),
//        );
//    }

    public function attributeLabels() {
        return array(
            'idFornecedor' => 'ID',
            'nome' => 'Nome',
            'email' => 'E-mail',
            'notas' => 'Notas',
            'telefone' => 'Telefone',
            'telemovel' => 'Telemóvel',
            'website' => 'Endereço WEB',
            'morada' => 'Morada'
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();
        
        $criteria->order = 'nome';

        $criteria->compare('nome', $this->nome, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('activo', 1);

        return new CActiveDataProvider('Fornecedor', array('criteria' => $criteria));
    }

}