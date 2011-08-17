/*
 * DTOFolhaObra.java
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
import java.util.ArrayList;

/**
 * 
 * @since 1.0
 */
public final class DTOFolhaObra implements Serializable {

    private String id;
    private DTOVeiculo veiculo;
    private String data;
    private String descricaoAvaria;
    private int kms;
    private DTOFactura factura;
    private ArrayList<DTOLinhaServico> linhas;
    private boolean activo;

    public DTOFolhaObra() {
        activo = true;
        linhas = new ArrayList<DTOLinhaServico>();
    }

    public DTOFolhaObra(String id, DTOVeiculo veiculo, String data, String descricaoAvaria, int kms,
            DTOFactura factura, ArrayList<DTOLinhaServico> linhas, boolean activo) {
        this.id = id;
        this.veiculo = veiculo;
        this.data = data;
        this.descricaoAvaria = descricaoAvaria;
        this.kms = kms;
        this.factura = factura;

        this.linhas = new ArrayList<DTOLinhaServico>();
        if (linhas != null) {
            for (DTOLinhaServico l : linhas) {
                linhas.add(l);
            }
        }
        
        this.activo = activo;
    }

    public void adicionarLinhaServico(DTOLinhaServico linha) {
        if (linhas == null) {
            linhas = new ArrayList<DTOLinhaServico>();
        }

        linhas.add(linha);
    }

    public void removerLinhaServico(DTOLinhaServico linha) {
        if (linhas != null) {
            linhas.remove(linha);
        }
    }

    public int getNumeroLinhasServico() {
        if(linhas != null) {
            return linhas.size();
        }
        
        return 0;
    }
    
    public String getData() {
        return data;
    }

    public void setData(String data) {
        this.data = data;
    }

    public String getDescricaoAvaria() {
        return descricaoAvaria;
    }

    public void setDescricaoAvaria(String descricaoAvaria) {
        this.descricaoAvaria = descricaoAvaria;
    }

    public DTOFactura getFactura() {
        return factura;
    }

    public void setFactura(DTOFactura factura) {
        this.factura = factura;
    }

    public int getKms() {
        return kms;
    }

    public void setKms(int kms) {
        this.kms = kms;
    }

    public ArrayList<DTOLinhaServico> getLinhas() {
        if (linhas != null) {
            return new ArrayList<DTOLinhaServico>(linhas);
        }

        return null;
    }

    public void setLinhas(ArrayList<DTOLinhaServico> linhas) {
        this.linhas.clear();
        for (DTOLinhaServico l : linhas) {
            linhas.add(l);
        }
    }

    public DTOVeiculo getVeiculo() {
        return veiculo;
    }

    public void setVeiculo(DTOVeiculo veiculo) {
        this.veiculo = veiculo;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public boolean isActivo() {
        return activo;
    }

    public void setActivo(boolean activo) {
        this.activo = activo;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final DTOFolhaObra other = (DTOFolhaObra) obj;

        if (this.id != null && this.id.equals(other.id)) {
            return true;
        }

        if (this.veiculo != other.veiculo && (this.veiculo == null || !this.veiculo.equals(other.veiculo))) {
            return false;
        }
        if ((this.data == null) ? (other.data != null) : !this.data.equals(other.data)) {
            return false;
        }
        if (this.kms != other.kms) {
            return false;
        }
        if (this.factura != other.factura && (this.factura == null || !this.factura.equals(other.factura))) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 3;
        hash = 17 * hash + (this.id != null ? this.id.hashCode() : 0);
        hash = 17 * hash + (this.veiculo != null ? this.veiculo.hashCode() : 0);
        hash = 17 * hash + (this.data != null ? this.data.hashCode() : 0);
        hash = 17 * hash + this.kms;
        hash = 17 * hash + (this.factura != null ? this.factura.hashCode() : 0);
        return hash;
    }
}
