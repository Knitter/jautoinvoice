<?php

/* This file is part of jAutoInvoice, a car workshop management software.
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
 * @property int $idVeiculo
 * @property string $dataRegisto
 * @property string $matricula
 * @property string $nrChassis
 * @property string $cilindrada
 * @property string $nrMotor
 * @property string $notas
 * @property int $activo
 * 
 * @property int $idCliente
 * @property int $idCategoria
 * @property int $idCombustivel
 * @property int $idModelo
 *
 * @property Cliente $dono
 * @property Categoria $categoria
 * @property Combustivel $combustivel
 * @property Modelo $modelo
 * @property FolhaObra[] $folhasObra
 * @property Cliente[] $antigosDonos
 */
class Veiculo extends CActiveRecord {

    /**
     * @return Veiculo
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{Veiculo}}';
    }

    public function rules() {
        return array(
            array('matricula, idCategoria, idCombustivel, idModelo', 'required'),
            array('idCliente, idCategoria, idCombustivel, idModelo', 'numerical', 'integerOnly' => true),
            array('matricula', 'length', 'max' => 12),
            array('nrChassis, cilindrada, nrMotor', 'length', 'max' => 25),
            array('dataRegisto, notas', 'safe'),
            // search
            array('dataRegisto, matricula, nrChassis, cilindrada, nrMotor, idCliente, idCategoria, idCombustivel, idModelo', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'antigosDonos' => array(self::MANY_MANY, 'Cliente', 'ClienteVeiculo(idVeiculo, idCliente)'),
            'folhasObra' => array(self::MANY_MANY, 'FolhaObra', 'idVeiculo'),
            'marcacoes' => array(self::MANY_MANY, 'Marcacao', 'idVeiculo'),
            'dono' => array(self::BELONGS_TO, 'Cliente', 'idCliente'),
            'categoria' => array(self::BELONGS_TO, 'Categoria', 'idCategoria'),
            'combustivel' => array(self::BELONGS_TO, 'Combustivel', 'idCombustivel'),
            'modelo' => array(self::BELONGS_TO, 'Modelo', 'idModelo'),
        );
    }

    public function attributeLabels() {
        return array(
            'idVeiculo' => 'ID',
            'dataRegisto' => 'Data Registo',
            'matricula' => 'Matricula',
            'nrChassis' => 'Nr Chassis',
            'cilindrada' => 'Cilindrada',
            'nrMotor' => 'Nr Motor',
            'notas' => 'Notas',
            'idCliente' => 'Cliente',
            'idCategoria' => 'Categoria',
            'idCombustivel' => 'Combustível',
            'idModelo' => 'Modelo'
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->compare('dataRegisto', $this->dataRegisto, true);
        $criteria->compare('matricula', $this->matricula, true);
        $criteria->compare('nrChassis', $this->nrChassis, true);
        $criteria->compare('cilindrada', $this->cilindrada, true);
        $criteria->compare('nrMotor', $this->nrMotor, true);
        $criteria->compare('notas', $this->notas, true);

        $criteria->compare('idCliente', $this->idCliente);
        $criteria->compare('idCategoria', $this->idCategoria);
        $criteria->compare('idCombustivel', $this->idCombustivel);
        $criteria->compare('idModelo', $this->idModelo);

        $criteria->compare('activo', 1);

        return new CActiveDataProvider('Veiculo', array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'matricula ASC',
                        )));
    }

}