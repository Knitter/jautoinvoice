/*
 * DTOLinhaGasto.java
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
package net.sf.jautoinvoice.client.dto;

import java.io.Serializable;

public final class DTOLinhaGasto implements Serializable {

    private DTOMaterial material;
    private double quantidade;
    private double precoUnitario;
    private DTOLinhaServico linhaServico;

    public DTOLinhaGasto() {
        //DO NOTHING
    }

    public DTOLinhaGasto(DTOMaterial material, double quantidade, double precoUnitario,
            DTOLinhaServico linhaServico) {
        this.material = material;
        this.quantidade = quantidade;
        this.precoUnitario = precoUnitario;
        this.linhaServico = linhaServico;
    }

    public DTOLinhaServico getLinhaServico() {
        return linhaServico;
    }

    public void setLinhaServico(DTOLinhaServico linhaServico) {
        this.linhaServico = linhaServico;
    }

    public DTOMaterial getMaterial() {
        return material;
    }

    public void setMaterial(DTOMaterial material) {
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

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final DTOLinhaGasto other = (DTOLinhaGasto) obj;
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
        hash = 37 * hash + (this.material != null ? this.material.hashCode() : 0);
        hash = 37 * hash + (int) this.quantidade;
        hash = 37 * hash + (int) this.precoUnitario;
        hash = 37 * hash + (this.linhaServico != null ? this.linhaServico.hashCode() : 0);
        return hash;
    }
}
