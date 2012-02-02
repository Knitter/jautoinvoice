<?php

/* LinhaServico.php
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
 * @property int $idLinhaServico
 * @property double $duracao
 * @property string $valorHora
 * @property string $notas
 * @property int $activo
 * @property string $custoServico
 * 
 * @property int $idFuncionario
 * @property int $idServico
 * @property int $idFolhaObra
 *
 * @property Funcionario $funcionario
 * @property FolhaObra $folhaObra
 * @property Servico $servico
 */
class LinhaServico extends CActiveRecord {

    /**
     * @return LinhaServico
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'LinhaServico';
    }

    public function rules() {
        return array(
            array('duracao, valorHora, idFuncionario, idServico, idFolhaObra', 'required'),
            array('idFuncionario, idServico, idFolhaObra', 'numerical', 'integerOnly' => true),
            array('custoServico', 'numerical'),
            array('duracao, valorHora', 'numerical'),
            array('notas', 'length', 'max' => 255),
            // search
            array('duracao, notas, idFuncionario, idServico', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'funcionario' => array(self::BELONGS_TO, 'Funcionario', 'idFuncionario'),
            'folhaObra' => array(self::BELONGS_TO, 'FolhaObra', 'idFolhaObra'),
            'servico' => array(self::BELONGS_TO, 'Servico', 'idServico'),
        );
    }

    public function attributeLabels() {
        return array(
            'idLinhaServico' => 'ID',
            'duracao' => 'Duração',
            'valorHora' => 'Valor/Hora',
            'notas' => 'Notas',
            'idFuncionario' => 'Funcionário',
            'idServico' => 'Serviço',
            'idFolhaObra' => 'Folha de Obra',
            'custoServico' => 'Custo de Serviço'
        );
    }

    /**
     * @return CActiveDataProvider
     */
    public function search() {
        $criteria = new CDbCriteria();

        $criteria->compare('duracao', $this->duracao);
        $criteria->compare('notas', $this->notas, true);

        $criteria->compare('idFuncionario', $this->idFuncionario);
        $criteria->compare('idServico', $this->idServico);
        $criteria->compare('idFolhaObra', $this->idFolhaObra);

        $criteria->compare('activo', 1);

        return new CActiveDataProvider('LinhaServico', array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'idLinhaServico'
                        )));
    }

}