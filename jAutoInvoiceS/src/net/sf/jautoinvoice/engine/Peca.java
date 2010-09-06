/*
 * Peca.java
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

public class Peca {

    private String nome;
    private String referencia;
    private String descricao;
    private double preco;
    private Iva iva;
    private List<Modelo> modelos;
    private boolean activo;

    public Peca(String nome, String referencia, String descricao, double preco, 
            Iva iva, List<Modelo> modelos) {
        
        this.nome = nome;
        this.referencia = referencia;
        this.descricao = descricao;
        this.preco = preco;
        this.iva = iva;
        this.modelos = new ArrayList<Modelo>(modelos);

        activo = true;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public Iva getIva() {
        return iva;
    }

    public void setIva(Iva iva) {
        this.iva = iva;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public double getPreco() {
        return preco;
    }

    public void setPreco(double preco) {
        this.preco = preco;
    }

    public String getReferencia() {
        return referencia;
    }

    public void setReferencia(String referencia) {
        this.referencia = referencia;
    }

    public void adicionarModelo(Modelo modelo) {
        if (modelos == null) {
            modelos = new ArrayList<Modelo>();
        }

        modelos.add(modelo);
    }

    public void removerModelo(Modelo modelo) {
        if (modelos != null) {
            modelos.remove(modelo);
        }
    }

    public List<Modelo> getModelos() {
        return new ArrayList<Modelo>(modelos);
    }

    public boolean isActivo() {
        return activo;
    }

    public void setActivo(boolean activo) {
        this.activo = activo;
    }

    @Override
    public String toString() {
        return referencia + " - " + nome;
    }
}
