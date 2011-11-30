<?php

/* Marcacao.php
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
 * @property int $idMarcacao
 * @property string $dataMarcacao
 * @property string $criado
 * @property int $activo
 * 
 * @property int $idFolhaObra
 * @property int $idVeiculo
 *
 * @property FolhaObra $folhaObra
 * @property Veiculo $veiculo
 * 
 */
class Modelo extends CActiveRecord {

    /**
     * @return Marcacao
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'Marcacao';
    }

    public function rules() {
        return array(
            array('dataMarcacao, idVeiculo', 'required'),
            // search
            array('dataMarcacao, nome', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'marca' => array(self::BELONGS_TO, 'FolhaObra', 'idFolhaObra'),
            'veiculo' => array(self::BELONGS_TO, 'Veiculo', 'idVeiculo'),
        );
    }

    public function attributeLabels() {
        return array(
            'idMarcacao' => 'ID',
            'dataMarcacao' => 'Data',
            'criado' => 'Registado',
            'idVeiculo' => 'Veículo',
            'idFolhaObra' => 'Folha de Obra'
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->compare('dataMarcacao', $this->dataMarcacao);
        $criteria->compare('criado', $this->criado);
        $criteria->compare('activo', 1);

        return new CActiveDataProvider('Marcacao', array('criteria' => $criteria));
    }

}