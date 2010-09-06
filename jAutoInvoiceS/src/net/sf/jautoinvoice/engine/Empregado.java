/*
 * Empregado.java
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

public class Empregado extends Utilizador {

    private String nome;
    private double valorHora;
    private List<LinhaReparacao> linhasReparacao;

    public Empregado(String username, String password, String nome, double valorHora,
            boolean administrador) {
        
        super(username, password, administrador);

        this.nome = nome;
        this.valorHora = valorHora;
        linhasReparacao = new ArrayList<LinhaReparacao>();
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public double getValorHora() {
        return valorHora;
    }

    public void setValorHora(double valorHora) {
        this.valorHora = valorHora;
    }

    public List<LinhaReparacao> getLinhasReparacao() {
        return new ArrayList<LinhaReparacao>(linhasReparacao);
    }

    public void adicionarLinhaReparacao(LinhaReparacao linha) {
        if (linhasReparacao == null) {
            linhasReparacao = new ArrayList<LinhaReparacao>();
        }

        linhasReparacao.add(linha);
    }

    public void removerLinhaReparacao(LinhaReparacao linha) {
        if (linhasReparacao != null) {
            linhasReparacao.remove(linha);
        }
    }

    @Override
    public String toString() {
        return nome;
    }
}
