<?php

/*
 * LinhaServico.php
 *
 * This file is part of jAutoInvoice, http://sourceforge.net/p/jautoinvoice
 *
 * Copyright (C) 2011 jAutoInvoice
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * This is the model class for table "jautoinvoice.LinhaServico".
 *
 * The followings are the available columns in table 'jautoinvoice.LinhaServico':
 * @property string $idLinhaServico
 * @property double $duracao
 * @property string $valorHora
 * @property string $notas
 * @property integer $activo
 * @property string $idFuncionario
 * @property string $idServico
 * @property string $idFolhaObra
 *
 * The followings are the available model relations:
 * @property LinhaGasto[] $linhaGastos
 * @property Funcionario $idFuncionario0
 * @property FolhaObra $idFolhaObra0
 * @property Servico $idServico0
 */
class LinhaServico extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return LinhaServico the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'jautoinvoice.LinhaServico';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('duracao, valorHora, idFuncionario, idServico, idFolhaObra', 'required'),
            array('activo', 'numerical', 'integerOnly' => true),
            array('duracao', 'numerical'),
            array('valorHora, idFuncionario, idServico, idFolhaObra', 'length', 'max' => 10),
            array('notas', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('idLinhaServico, duracao, valorHora, notas, activo, idFuncionario, idServico, idFolhaObra', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'linhaGastos' => array(self::HAS_MANY, 'LinhaGasto', 'idLInhaServico'),
            'idFuncionario0' => array(self::BELONGS_TO, 'Funcionario', 'idFuncionario'),
            'idFolhaObra0' => array(self::BELONGS_TO, 'FolhaObra', 'idFolhaObra'),
            'idServico0' => array(self::BELONGS_TO, 'Servico', 'idServico'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idLinhaServico' => 'Id Linha Servico',
            'duracao' => 'Duracao',
            'valorHora' => 'Valor Hora',
            'notas' => 'Notas',
            'activo' => 'Activo',
            'idFuncionario' => 'Id Funcionario',
            'idServico' => 'Id Servico',
            'idFolhaObra' => 'Id Folha Obra',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('idLinhaServico', $this->idLinhaServico, true);
        $criteria->compare('duracao', $this->duracao);
        $criteria->compare('valorHora', $this->valorHora, true);
        $criteria->compare('notas', $this->notas, true);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('idFuncionario', $this->idFuncionario, true);
        $criteria->compare('idServico', $this->idServico, true);
        $criteria->compare('idFolhaObra', $this->idFolhaObra, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}