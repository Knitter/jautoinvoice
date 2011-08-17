/*
 * DTOMarca.java
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
 * Representa a marca de um veículo.
 * 
 * @since 1.0
 */
public final class DTOMarca implements Serializable {

    private String id;
    private String nome;
    private ArrayList<DTOModelo> modelos;
    private boolean activo;

    public DTOMarca() {
        activo = true;
        modelos = new ArrayList<DTOModelo>();
    }

    public DTOMarca(String id, String nome, ArrayList<DTOModelo> modelos, boolean activo) {
        this.id = id;
        this.nome = nome;

        this.modelos = new ArrayList<DTOModelo>();
        if (modelos != null) {
            for (DTOModelo m : modelos) {
                this.modelos.add(m);
            }
        }

        this.activo = activo;
    }

    /**
     * Permite adicionar um modelo que passa a pertencer a esta marca.
     * 
     * @param modelo DTOModelo a adicionar.
     * @since 1.0
     */
    public void adicionarModelo(DTOModelo modelo) {
        if (modelos == null) {
            modelos = new ArrayList<DTOModelo>();
        }

        modelos.add(modelo);
    }

    /**
     * Remove um modelo da lista de modelos desta marca.
     * 
     * @param modelo DTOModelo a remover.
     * @since 1.0
     */
    public void removerModelo(DTOModelo modelo) {
        if (modelos != null) {
            modelos.remove(modelo);
        }
    }

    public ArrayList<DTOModelo> getModelos() {
        if (modelos != null) {
            return new ArrayList(modelos);
        }

        return null;
    }

    public void setModelos(ArrayList<DTOModelo> modelos) {
        this.modelos.clear();
        for (DTOModelo m : modelos) {
            this.modelos.add(m);
        }
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
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
        final DTOMarca other = (DTOMarca) obj;

        if (this.id != null && this.id.equals(other.id)) {
            return true;
        }

        if ((this.nome == null) ? (other.nome != null) : !this.nome.equals(other.nome)) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 89 * hash + (this.id != null ? this.id.hashCode() : 0);
        hash = 89 * hash + (this.nome != null ? this.nome.hashCode() : 0);
        return hash;
    }
}
