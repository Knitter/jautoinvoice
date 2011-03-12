/*
 * Cliente.java
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
import java.util.ArrayList;

/**
 * 
 * @since 1.0
 */
public final class Cliente implements Serializable {

    private String codigo;
    private String nome;
    private String email;
    private ArrayList<String> contactos;
    private String endereco;
    private ArrayList<Veiculo> veiculos;
    private boolean activo;
    private Utilizador utilizador;

    public Cliente() {
        this.contactos = new ArrayList<String>();
        this.veiculos = new ArrayList<Veiculo>();
        activo = true;
    }

    public Cliente(String codigo, String nome, String email, ArrayList<String> contactos,
            String endereco, ArrayList<Veiculo> veiculos, boolean activo, Utilizador utilizador) {
        this.codigo = codigo;
        this.nome = nome;
        this.email = email;
        this.endereco = endereco;
        this.activo = activo;
        this.utilizador = utilizador;

        this.contactos = new ArrayList<String>();
        if (contactos != null) {
            for (String c : contactos) {
                this.contactos.add(c);
            }
        }

        this.veiculos = new ArrayList<Veiculo>();
        if (veiculos != null) {
            for (Veiculo v : veiculos) {
                this.veiculos.add(v);
            }
        }

    }

    public void adicionarContacto(String contacto) {
        if (contactos == null) {
            contactos = new ArrayList<String>();
        }

        contactos.add(contacto);
    }

    public void removerContacto(String contacto) {
        if (contactos != null) {
            contactos.remove(contacto);
        }
    }

    public void adicionarVeiculo(Veiculo veiculo) {
        if (veiculos == null) {
            veiculos = new ArrayList<Veiculo>();
        }

        veiculos.add(veiculo);
    }

    public void removerVeiculo(Veiculo veiculo) {
        if (veiculos != null) {
            veiculos.remove(veiculo);
        }
    }

    public boolean isActivo() {
        return activo;
    }

    public void setActivo(boolean activo) {
        this.activo = activo;
    }

    public String getCodigo() {
        return codigo;
    }

    public void setCodigo(String codigo) {
        this.codigo = codigo;
    }

    public ArrayList<String> getContactos() {
        if (contactos != null) {
            return new ArrayList<String>(contactos);
        }
        return null;
    }

    public void setContactos(ArrayList<String> contactos) {
        this.contactos.clear();
        for (String c : contactos) {
            this.contactos.add(c);
        }
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getEndereco() {
        return endereco;
    }

    public void setEndereco(String endereco) {
        this.endereco = endereco;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public ArrayList<Veiculo> getVeiculos() {
        if (veiculos != null) {
            return new ArrayList<Veiculo>(veiculos);
        }
        return null;
    }

    public void setVeiculos(ArrayList<Veiculo> veiculos) {
        this.veiculos.clear();
        for (Veiculo v : veiculos) {
            this.veiculos.add(v);
        }
    }

    public Utilizador getUtilizador() {
        return utilizador;
    }

    public void setUtilizador(Utilizador utilizador) {
        this.utilizador = utilizador;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Cliente other = (Cliente) obj;
        if (this.activo != other.activo) {
            return false;
        }
        if ((this.codigo == null) ? (other.codigo != null) : !this.codigo.equals(other.codigo)) {
            return false;
        }
        if ((this.nome == null) ? (other.nome != null) : !this.nome.equals(other.nome)) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 97 * hash + (this.codigo != null ? this.codigo.hashCode() : 0);
        hash = 97 * hash + (this.nome != null ? this.nome.hashCode() : 0);
        hash = 97 * hash + (this.activo ? 1 : 0);
        return hash;
    }
}
