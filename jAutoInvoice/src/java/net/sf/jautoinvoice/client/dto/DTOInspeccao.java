/*
 * DTOInspeccao.java
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

public final class DTOInspeccao implements Serializable {

    private DTOVeiculo veiculo;
    private String data;
    private EInspeccao estado;
    private String notas;
    private DTOFuncionario funcionario;

    public DTOInspeccao() {
        //DO NOTHING
    }

    public DTOInspeccao(DTOVeiculo veiculo, String data, EInspeccao estado, String notas,
            DTOFuncionario funcionario) {
        this.veiculo = veiculo;
        this.data = data;
        this.estado = estado;
        this.notas = notas;
        this.funcionario = funcionario;
    }

    public String getData() {
        return data;
    }

    public void setData(String data) {
        this.data = data;
    }

    public EInspeccao getEstado() {
        return estado;
    }

    public void setEstado(EInspeccao estado) {
        this.estado = estado;
    }

    public DTOFuncionario getFuncionario() {
        return funcionario;
    }

    public void setFuncionario(DTOFuncionario funcionario) {
        this.funcionario = funcionario;
    }

    public String getNotas() {
        return notas;
    }

    public void setNotas(String notas) {
        this.notas = notas;
    }

    public DTOVeiculo getVeiculo() {
        return veiculo;
    }

    public void setVeiculo(DTOVeiculo veiculo) {
        this.veiculo = veiculo;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final DTOInspeccao other = (DTOInspeccao) obj;
        if (this.veiculo != other.veiculo && (this.veiculo == null || !this.veiculo.equals(other.veiculo))) {
            return false;
        }
        if ((this.data == null) ? (other.data != null) : !this.data.equals(other.data)) {
            return false;
        }
        if (this.estado != other.estado) {
            return false;
        }
        if ((this.notas == null) ? (other.notas != null) : !this.notas.equals(other.notas)) {
            return false;
        }
        if (this.funcionario != other.funcionario && (this.funcionario == null || !this.funcionario.equals(other.funcionario))) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 29 * hash + (this.veiculo != null ? this.veiculo.hashCode() : 0);
        hash = 29 * hash + (this.data != null ? this.data.hashCode() : 0);
        hash = 29 * hash + (this.estado != null ? this.estado.hashCode() : 0);
        hash = 29 * hash + (this.notas != null ? this.notas.hashCode() : 0);
        hash = 29 * hash + (this.funcionario != null ? this.funcionario.hashCode() : 0);
        return hash;
    }
}
