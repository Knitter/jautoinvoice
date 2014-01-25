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
Yii::import('zii.widgets.CMenu');

/**
 * 
 */
class JMenu extends CMenu {

    public function __construct($owner = null) {
        parent::__construct($owner);
    }

    public function renderMenuItem($item) {
        if (isset($item['url'])) {
            $label = $item['icon'] ? '<img src="' . $item['icon'] . '" alt="' . $item['label'] . '"/><br />' . $item['label'] : $item['label'];

            $label = $this->linkLabelWrapper === null ? $label : '<' . $this->linkLabelWrapper . '>' . $label . '</' . $this->linkLabelWrapper . '>';
            return CHtml::link($label, $item['url'], isset($item['linkOptions']) ? $item['linkOptions'] : array());
        } else {
            return CHtml::tag('span', isset($item['linkOptions']) ? $item['linkOptions'] : array(), $item['label']);
        }
    }

}
