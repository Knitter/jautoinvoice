/*
 * Reparacao.java
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

public class Reparacao {

    private Date data;
    private String descricaoAvaria;
    private int quilometros;
    private String descricaoReparacao;
    private boolean activo;

    public Reparacao(Date data, String descricaoAvaria, int quilometros, String descricaoReparacao) {
        this.data = data;
        this.descricaoAvaria = descricaoAvaria;
        this.quilometros = quilometros;
        this.descricaoReparacao = descricaoReparacao;

        activo = true;
    }

    public Date getData() {
        return data;
    }

    public void setData(Date data) {
        this.data = data;
    }

    public String getDescricaoAvaria() {
        return descricaoAvaria;
    }

    public void setDescricaoAvaria(String descricaoAvaria) {
        this.descricaoAvaria = descricaoAvaria;
    }

    public String getDescricaoReparacao() {
        return descricaoReparacao;
    }

    public void setDescricaoReparacao(String descricaoReparacao) {
        this.descricaoReparacao = descricaoReparacao;
    }

    public int getQuilometros() {
        return quilometros;
    }

    public void setQuilometros(int quilometros) {
        this.quilometros = quilometros;
    }

    public boolean isActivo() {
        return activo;
    }

    public void setActivo(boolean activo) {
        this.activo = activo;
    }
}
