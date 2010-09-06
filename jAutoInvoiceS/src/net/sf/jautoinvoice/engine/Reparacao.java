/*
 * Reparacao.java
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
import java.util.Date;
import java.util.List;

public class Reparacao {

    private Date data;
    private String descricaoAvaria;
    private int quilometros;
    private String descricaoReparacao;
    private boolean activo;
    private ArrayList<LinhaReparacao> linhas;
    private Veiculo veiculo;

    public Reparacao(Date data, String descricaoAvaria, int quilometros, String descricaoReparacao,
            Veiculo veiculo) {

        this.data = data;
        this.descricaoAvaria = descricaoAvaria;
        this.quilometros = quilometros;
        this.descricaoReparacao = descricaoReparacao;
        this.veiculo = veiculo;

        activo = true;
        linhas = new ArrayList<LinhaReparacao>();
    }

    public Date getData() {
        return data;
    }

    public void setData(Date data) {
        this.data = data;
    }

    public String getDescricaoAvaria() {
        return descricaoAvaria;
    }

    public void setDescricaoAvaria(String descricaoAvaria) {
        this.descricaoAvaria = descricaoAvaria;
    }

    public String getDescricaoReparacao() {
        return descricaoReparacao;
    }

    public void setDescricaoReparacao(String descricaoReparacao) {
        this.descricaoReparacao = descricaoReparacao;
    }

    public int getQuilometros() {
        return quilometros;
    }

    public void setQuilometros(int quilometros) {
        this.quilometros = quilometros;
    }

    public boolean isActivo() {
        return activo;
    }

    public void setActivo(boolean activo) {
        this.activo = activo;
    }

    public void adicionarLinhaReparacao(LinhaReparacao linha) {
        if (linhas == null) {
            linhas = new ArrayList<LinhaReparacao>();
        }

        linhas.add(linha);
    }

    public void removerLinhaReparacao(LinhaReparacao linha) {
        if (linhas != null) {
            linhas.remove(linha);
        }
    }

    public void adicionarLinhasReparacao(List<LinhaReparacao> linhas) {
        if (linhas != null) {
            this.linhas = new ArrayList<LinhaReparacao>(linhas);
        }
    }

    public List<LinhaReparacao> getLinhasReparacao() {
        return new ArrayList<LinhaReparacao>(linhas);
    }

    public Veiculo getVeiculo() {
        return veiculo;
    }

    public void setVeiculo(Veiculo veiculo) {
        this.veiculo = veiculo;
    }
}
