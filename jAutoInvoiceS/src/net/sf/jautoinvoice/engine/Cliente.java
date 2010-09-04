/*
 * Cliente.java
 *
 * This file is part of jAutoInvoice, http://sourceforge.net/p/jautoinvoice
 *
 * Copyright (C) 2010  Sérgio Lopes
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
package net.sf.jautoinvoice.engine;

import java.util.ArrayList;
import java.util.List;

public class Cliente {

    private String nome;
    private String endereco;
    private String codigoPostal;
    private String localidade;
    private String telefone1;
    private String telefone2;
    private String email;
    private List<Veiculo> veiculosActuais;
    private List<Veiculo> veiculosAnteriores;

    public Cliente(String nome, String endereco, String codigoPostal, String localidade,
            String telefone1, String telefone2, String email, List<Veiculo> actuais) {

        this.nome = nome;
        this.endereco = endereco;
        this.codigoPostal = codigoPostal;
        this.localidade = localidade;
        this.telefone1 = telefone1;
        this.telefone2 = telefone2;
        this.email = email;

        veiculosActuais = new ArrayList<Veiculo>(actuais);
        veiculosAnteriores = new ArrayList<Veiculo>();
    }

    public String getCodigoPostal() {
        return codigoPostal;
    }

    public void setCodigoPostal(String codigoPostal) {
        this.codigoPostal = codigoPostal;
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

    public String getLocalidade() {
        return localidade;
    }

    public void setLocalidade(String localidade) {
        this.localidade = localidade;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getTelefone1() {
        return telefone1;
    }

    public void setTelefone1(String telefone1) {
        this.telefone1 = telefone1;
    }

    public String getTelefone2() {
        return telefone2;
    }

    public void setTelefone2(String telefone2) {
        this.telefone2 = telefone2;
    }

    public List<Veiculo> getVeiculosActuais() {
        return new ArrayList<Veiculo>(veiculosActuais);
    }

    public void adicionarVeiculoActual(Veiculo veiculo) {
        if (veiculosActuais == null) {
            veiculosActuais = new ArrayList<Veiculo>();
        }

        veiculosActuais.add(veiculo);
    }

    public void removerVeiculoActual(Veiculo veiculo) {
        if (veiculosActuais != null) {
            veiculosActuais.remove(veiculo);
        }
    }

    public List<Veiculo> getVeiculosAnteriores() {
        return new ArrayList<Veiculo>(veiculosAnteriores);
    }

    public void adicionarVeiculoAnterior(Veiculo veiculo) {
        if (veiculosAnteriores == null) {
            veiculosAnteriores = new ArrayList<Veiculo>();
        }

        veiculosAnteriores.add(veiculo);
    }

    public void removerVeiculoAnterior(Veiculo veiculo) {
        if (veiculosAnteriores != null) {
            veiculosAnteriores.remove(veiculo);
        }
    }
}
