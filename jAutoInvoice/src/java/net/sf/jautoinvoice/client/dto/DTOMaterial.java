/*
 * DTOMaterial.java
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

/**
 * Representa materia de uso na oficina e aplicado nos veículos. Pode ser uma 
 * peça ou um consumível usado com óleo.
 * 
 * @since 1.0
 */
public final class DTOMaterial implements Serializable {

    //TODO: Nr. da factura e data da compra para controlar os stocks.
    private String id;
    private DTOFornecedor fornecedor;
    private double precoUnitario;
    private DTOIVA iva;
    private String referencia;
    private String descricao;
    private boolean activo;

    public DTOMaterial() {
        activo = true;
    }

    public DTOMaterial(String id, DTOFornecedor fornecedor, double precoUnitario, DTOIVA iva,
            String referencia, String descricao, boolean activo) {
        this.id = id;
        this.fornecedor = fornecedor;
        this.precoUnitario = precoUnitario;
        this.iva = iva;
        this.referencia = referencia;
        this.descricao = descricao;
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

    public DTOFornecedor getFornecedor() {
        return fornecedor;
    }

    public void setFornecedor(DTOFornecedor fornecedor) {
        this.fornecedor = fornecedor;
    }

    public DTOIVA getIva() {
        return iva;
    }

    public void setIva(DTOIVA iva) {
        this.iva = iva;
    }

    public double getPrecoUnitario() {
        return precoUnitario;
    }

    public void setPrecoUnitario(double precoUnitario) {
        this.precoUnitario = precoUnitario;
    }

    public String getReferencia() {
        return referencia;
    }

    public void setReferencia(String referencia) {
        this.referencia = referencia;
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
        final DTOMaterial other = (DTOMaterial) obj;

        if (this.id != null && this.id.equals(other.id)) {
            return true;
        }

        if (this.fornecedor != other.fornecedor && (this.fornecedor == null || !this.fornecedor.equals(other.fornecedor))) {
            return false;
        }
        if (this.precoUnitario != other.precoUnitario) {
            return false;
        }
        if (this.iva != other.iva && (this.iva == null || !this.iva.equals(other.iva))) {
            return false;
        }
        if ((this.referencia == null) ? (other.referencia != null) : !this.referencia.equals(other.referencia)) {
            return false;
        }
        if ((this.descricao == null) ? (other.descricao != null) : !this.descricao.equals(other.descricao)) {
            return false;
        }
        if (this.activo != other.activo) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 3;
        hash = 97 * hash + (this.id != null ? this.id.hashCode() : 0);
        hash = 97 * hash + (this.fornecedor != null ? this.fornecedor.hashCode() : 0);
        hash = 97 * hash + (int) this.precoUnitario;
        hash = 97 * hash + (this.iva != null ? this.iva.hashCode() : 0);
        hash = 97 * hash + (this.referencia != null ? this.referencia.hashCode() : 0);
        hash = 97 * hash + (this.descricao != null ? this.descricao.hashCode() : 0);
        hash = 97 * hash + (this.activo ? 1 : 0);
        return hash;
    }
}
