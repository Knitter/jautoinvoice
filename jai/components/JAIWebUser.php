<?php

/* JAIWebUser.php
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

class JAIWebUser extends CWebUser {

    public function beforeLogin($id, $states, $fromCookie) {

        if (!$fromCookie) {
            return true;
        }

        $sessao = DadosSessao::model()->findByPk($id);
        if ($sessao === null || $sessao->token !== $states['token'] || strtotime($sessao->dataExpiracao) < time()) {
            return false;
        }

        return false;
    }

}
