/*
 * FolhaObra.java
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
import java.util.ArrayList;

/**
 * 
 * @since 1.0
 */
public final class FolhaObra implements Serializable {

    private String id;
    private Veiculo veiculo;
    private String data;
    private String descricaoAvaria;
    private int kms;
    private Factura factura;
    private ArrayList<LinhaServico> linhas;

    public FolhaObra() {
        linhas = new ArrayList<LinhaServico>();
    }

    public FolhaObra(String id, Veiculo veiculo, String data, String descricaoAvaria, int kms,
            Factura factura, ArrayList<LinhaServico> linhas) {
        this.id = id;
        this.veiculo = veiculo;
        this.data = data;
        this.descricaoAvaria = descricaoAvaria;
        this.kms = kms;
        this.factura = factura;

        this.linhas = new ArrayList<LinhaServico>();
        if (linhas != null) {
            for (LinhaServico l : linhas) {
                linhas.add(l);
            }
        }
    }

    public void adicionarLinhaServico(LinhaServico linha) {
        if (linhas == null) {
            linhas = new ArrayList<LinhaServico>();
        }

        linhas.add(linha);
    }

    public void removerLinhaServico(LinhaServico linha) {
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

    public Factura getFactura() {
        return factura;
    }

    public void setFactura(Factura factura) {
        this.factura = factura;
    }

    public int getKms() {
        return kms;
    }

    public void setKms(int kms) {
        this.kms = kms;
    }

    public ArrayList<LinhaServico> getLinhas() {
        if (linhas != null) {
            return new ArrayList<LinhaServico>(linhas);
        }

        return null;
    }

    public void setLinhas(ArrayList<LinhaServico> linhas) {
        this.linhas.clear();
        for (LinhaServico l : linhas) {
            linhas.add(l);
        }
    }

    public Veiculo getVeiculo() {
        return veiculo;
    }

    public void setVeiculo(Veiculo veiculo) {
        this.veiculo = veiculo;
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
        final FolhaObra other = (FolhaObra) obj;

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
