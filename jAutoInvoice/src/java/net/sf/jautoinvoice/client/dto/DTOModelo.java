/*
 * DTOModelo.java
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
 * Representa um modelo de veículo. Os modelos pertencem sempre a uma marca.
 * 
 * @since 1.0
 */
public final class DTOModelo implements Serializable {

    private DTOMarca marca;
    private String nome;
    
    public DTOModelo() {
        //DO NOTHING
    }

    public DTOModelo(DTOMarca marca, String nome) {
        this.marca = marca;
        this.nome = nome;
    }

    public DTOMarca getMarca() {
        return marca;
    }

    public void setMarca(DTOMarca marca) {
        this.marca = marca;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final DTOModelo other = (DTOModelo) obj;
        if (this.marca != other.marca && (this.marca == null || !this.marca.equals(other.marca))) {
            return false;
        }
        if ((this.nome == null) ? (other.nome != null) : !this.nome.equals(other.nome)) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 3;
        hash = 71 * hash + (this.marca != null ? this.marca.hashCode() : 0);
        hash = 71 * hash + (this.nome != null ? this.nome.hashCode() : 0);
        return hash;
    }
}
