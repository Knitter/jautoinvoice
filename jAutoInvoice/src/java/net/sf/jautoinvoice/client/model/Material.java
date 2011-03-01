/*
 * Material.java
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
package net.sf.jautoinvoice.client.model;

import java.io.Serializable;

/**
 * Representa materia de uso na oficina e aplicado nos veículos. Pode ser uma 
 * peça ou um consumível usado com óleo.
 * 
 * @since 1.0
 */
public final class Material implements Serializable {

    //TODO: Nr. da factura e data da compra para controlar os stocks.
    private Fornecedor fornecedor;
    private double precoUnitario;
    private IVA iva;
    private String referencia;
    private String descricao;
    private boolean activo;

    public Material() {
        activo = true;
    }

    public Material(Fornecedor fornecedor, double precoUnitario, IVA iva,
            String referencia, String descricao, boolean activo) {
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

    public Fornecedor getFornecedor() {
        return fornecedor;
    }

    public void setFornecedor(Fornecedor fornecedor) {
        this.fornecedor = fornecedor;
    }

    public IVA getIva() {
        return iva;
    }

    public void setIva(IVA iva) {
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

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Material other = (Material) obj;
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
        hash = 97 * hash + (this.fornecedor != null ? this.fornecedor.hashCode() : 0);
        hash = 97 * hash + (int) this.precoUnitario;
        hash = 97 * hash + (this.iva != null ? this.iva.hashCode() : 0);
        hash = 97 * hash + (this.referencia != null ? this.referencia.hashCode() : 0);
        hash = 97 * hash + (this.descricao != null ? this.descricao.hashCode() : 0);
        hash = 97 * hash + (this.activo ? 1 : 0);
        return hash;
    }
}
