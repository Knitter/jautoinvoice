/*
 * LinhaGasto.java
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
public final class LinhaGasto implements Serializable {

    private String id;
    private Material material;
    private double quantidade;
    private double precoUnitario;
    private LinhaServico linhaServico;

    public LinhaGasto() {
        //DO NOTHING
    }

    public LinhaGasto(Material material, double quantidade, double precoUnitario,
            LinhaServico linhaServico) {
        this.material = material;
        this.quantidade = quantidade;
        this.precoUnitario = precoUnitario;
        this.linhaServico = linhaServico;
    }

    public LinhaServico getLinhaServico() {
        return linhaServico;
    }

    public void setLinhaServico(LinhaServico linhaServico) {
        this.linhaServico = linhaServico;
    }

    public Material getMaterial() {
        return material;
    }

    public void setMaterial(Material material) {
        this.material = material;
    }

    public double getPrecoUnitario() {
        return precoUnitario;
    }

    public void setPrecoUnitario(double precoUnitario) {
        this.precoUnitario = precoUnitario;
    }

    public double getQuantidade() {
        return quantidade;
    }

    public void setQuantidade(double quantidade) {
        this.quantidade = quantidade;
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
        final LinhaGasto other = (LinhaGasto) obj;

        if (this.id != null && this.id.equals(other.id)) {
            return true;
        }

        if (this.material != other.material && (this.material == null || !this.material.equals(other.material))) {
            return false;
        }
        if (this.quantidade != other.quantidade) {
            return false;
        }
        if (this.precoUnitario != other.precoUnitario) {
            return false;
        }
        if (this.linhaServico != other.linhaServico && (this.linhaServico == null || !this.linhaServico.equals(other.linhaServico))) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 37 * hash + (this.id != null ? this.id.hashCode() : 0);
        hash = 37 * hash + (this.material != null ? this.material.hashCode() : 0);
        hash = 37 * hash + (int) this.quantidade;
        hash = 37 * hash + (int) this.precoUnitario;
        hash = 37 * hash + (this.linhaServico != null ? this.linhaServico.hashCode() : 0);
        return hash;
    }
}
