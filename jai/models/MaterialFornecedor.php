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
 * @property int $idMaterial
 * @property int $idFornecedor
 * 
 * @property Material $material
 * @property Fornecedor $fornecedor
 */
class MaterialFornecedor extends CActiveRecord {

    /**
     * @return MaterialFornecedor
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{MaterialFornecedor}}';
    }

    public function relations() {
        return array(
            'fornecedor' => array(self::BELONGS_TO, 'Fornecedor', 'idFornecedor'),
            'material' => array(self::BELONGS_TO, 'Material', 'idMaterial'),
        );
    }

}
