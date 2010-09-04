/*
 * Log.java
 *
 * This file is part of jAutoInvoice, http://sourceforge.net/p/jautoinvoice
 *
 * Copyright (C) 2010  Sérgio Lopes
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
package net.sf.jautoinvoice.engine;

import java.util.Date;

public class Log {

    private String descricao;
    private Date data;
    private Utilizador utilizador;

    public Log(String descricao, Date data, Utilizador utilizador) {
        this.descricao = descricao;
        this.data = data;
        this.utilizador = utilizador;
    }

    public Date getData() {
        return data;
    }

    public String getDescricao() {
        return descricao;
    }

    public Utilizador getUtilizador() {
        return utilizador;
    }

    public String getFormatado() {
        throw new UnsupportedOperationException("Not implemented yet.");
    }
}
