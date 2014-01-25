<?php

/* This file is part of jAutoInvoice, a car workshop management software.
 * 
 * Copyright (c) 2012 - 2014, Sérgio Lopes.
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
 */

/**
 * @property int $idMarcacao
 * @property string $dataMarcacao
 * @property string $criado
 * @property int $activo
 * @property string $descricao
 * @property string $notas
 * @property string $dataFecho
 * 
 * @property int $idFolhaObra
 * @property int $idVeiculo
 *
 * @property FolhaObra $folhaObra
 * @property Veiculo $veiculo
 * 
 */
class Marcacao extends CActiveRecord {

    /**
     * @return Marcacao
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{Marcacao}}';
    }

    public function rules() {
        return array(
            array('dataMarcacao', 'required'),
            array('descricao', 'length', 'max' => 150),
            array('notas', 'safe'),
            // search
            array('dataMarcacao, descricao, criado, notas, dataFecho', 'safe', 'on' => 'search'),
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
            'idFolhaObra' => 'Folha de Obra',
            'descricacao' => 'Descrição',
            'notas' => 'Notas',
            'dataFecho' => 'Data de Fecho'
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->compare('dataMarcacao', $this->dataMarcacao, true);
        $criteria->compare('criado', $this->criado, true);
        $criteria->compare('descricao', $this->descricao, true);
        $criteria->compare('notas', $this->notas, true);
        $criteria->compare('dataFecho', $this->dataFecho, true);
        $criteria->compare('activo', 1);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'dataMarcacao DESC',
                        )));
    }

}