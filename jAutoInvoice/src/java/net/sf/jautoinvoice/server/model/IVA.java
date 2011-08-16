/*
 * IVA.java
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
package net.sf.jautoinvoice.server.model;

import java.io.Serializable;

/**
 * 
 * @since 1.0
 */
public final class IVA implements Serializable {

    private String id;
    private String descricao;
    private double percentagem;
    private boolean activo;

    public IVA() {
        activo = true;
    }

    public IVA(String descricao, double percentagem, boolean activo) {
        this.descricao = descricao;
        this.percentagem = percentagem;
        this.activo = activo;
    }

    public boolean isActivo() {
        return activo;
    }

    public void setActivo(boolean activo) {
        this.activo = activo;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public double getPercentagem() {
        return percentagem;
    }

    public void setPercentagem(double percentagem) {
        this.percentagem = percentagem;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final IVA other = (IVA) obj;

        if (this.id != null && this.id.equals(other.id)) {
            return true;
        }

        if ((this.descricao == null) ? (other.descricao != null) : !this.descricao.equals(other.descricao)) {
            return false;
        }
        if (this.percentagem != other.percentagem) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 3;
        hash = 61 * hash + (this.id != null ? this.id.hashCode() : 0);
        hash = 61 * hash + (this.descricao != null ? this.descricao.hashCode() : 0);
        hash = 61 * hash + (int) this.percentagem;
        return hash;
    }
}
