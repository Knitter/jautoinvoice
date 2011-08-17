/*
 * DTOLinhaServico.java
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
 * Relaciona um serviço com uma folha de obra e agrupa os dados referentes ao 
 * funcionário, ao valor hora, duração, etc.
 * 
 * Permite também associar linhas de gastos onde se registam os materiais que 
 * foram usados.
 * 
 * @since 1.0
 */
public final class DTOLinhaServico implements Serializable {

    private String id;
    private DTOFolhaObra folha;
    private double duracao;
    private DTOFuncionario funcionario;
    private double valorHora;
    private DTOServico servico;
    private String notas;
    private ArrayList<DTOLinhaGasto> gastos;
    private boolean activo;

    public DTOLinhaServico() {
        activo = true;
        gastos = new ArrayList<DTOLinhaGasto>();
    }

    public DTOLinhaServico(String id, DTOFolhaObra folha, double duracao, DTOFuncionario funcionario,
            double valorHora, DTOServico servico, String notas, ArrayList<DTOLinhaGasto> gastos,
            boolean activo) {
        this.id = id;
        this.folha = folha;
        this.duracao = duracao;
        this.funcionario = funcionario;
        this.valorHora = valorHora;
        this.servico = servico;
        this.notas = notas;

        this.gastos = new ArrayList<DTOLinhaGasto>();
        if (gastos != null) {
            for (DTOLinhaGasto l : gastos) {
                this.gastos.add(l);
            }
        }

        this.activo = activo;
    }

    public void adicionarLinhaGasto(DTOLinhaGasto gasto) {
        if (gastos == null) {
            gastos = new ArrayList<DTOLinhaGasto>();
        }

        gastos.add(gasto);
    }

    public void removerLinhaGasto(DTOLinhaGasto gasto) {
        if (gastos != null) {
            gastos.remove(gasto);
        }
    }
    
    public int getNumeroLinhasGasto() {
        if(gastos != null) {
            return gastos.size();
        }
        
        return 0;
    }

    public double getDuracao() {
        return duracao;
    }

    public void setDuracao(double duracao) {
        this.duracao = duracao;
    }

    public DTOFolhaObra getFolha() {
        return folha;
    }

    public void setFolha(DTOFolhaObra folha) {
        this.folha = folha;
    }

    public DTOFuncionario getFuncionario() {
        return funcionario;
    }

    public void setFuncionario(DTOFuncionario funcionario) {
        this.funcionario = funcionario;
    }

    public ArrayList<DTOLinhaGasto> getGastos() {
        if (gastos != null) {
            return new ArrayList<DTOLinhaGasto>(gastos);
        }

        return null;
    }

    public void setGastos(ArrayList<DTOLinhaGasto> gastos) {
        this.gastos.clear();
        for (DTOLinhaGasto l : gastos) {
            this.gastos.add(l);
        }
    }

    public String getNotas() {
        return notas;
    }

    public void setNotas(String notas) {
        this.notas = notas;
    }

    public DTOServico getServico() {
        return servico;
    }

    public void setServico(DTOServico servico) {
        this.servico = servico;
    }

    public double getValorHora() {
        return valorHora;
    }

    public void setValorHora(double valorHora) {
        this.valorHora = valorHora;
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
        final DTOLinhaServico other = (DTOLinhaServico) obj;

        if (this.id != null && this.id.equals(other.id)) {
            return true;
        }

        if (this.folha != other.folha && (this.folha == null || !this.folha.equals(other.folha))) {
            return false;
        }
        if (this.duracao != other.duracao) {
            return false;
        }
        if (this.funcionario != other.funcionario && (this.funcionario == null || !this.funcionario.equals(other.funcionario))) {
            return false;
        }
        if (this.valorHora != other.valorHora) {
            return false;
        }
        if (this.servico != other.servico && (this.servico == null || !this.servico.equals(other.servico))) {
            return false;
        }
        if ((this.notas == null) ? (other.notas != null) : !this.notas.equals(other.notas)) {
            return false;
        }
        if (this.gastos != other.gastos && (this.gastos == null || !this.gastos.equals(other.gastos))) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 5;
        hash = 97 * hash + (this.id != null ? this.id.hashCode() : 0);
        hash = 97 * hash + (this.folha != null ? this.folha.hashCode() : 0);
        hash = 97 * hash + (int) this.duracao;
        hash = 97 * hash + (this.funcionario != null ? this.funcionario.hashCode() : 0);
        hash = 97 * hash + (int) this.valorHora;
        hash = 97 * hash + (this.servico != null ? this.servico.hashCode() : 0);
        hash = 97 * hash + (this.notas != null ? this.notas.hashCode() : 0);
        hash = 97 * hash + (this.gastos != null ? this.gastos.hashCode() : 0);
        return hash;
    }
}
