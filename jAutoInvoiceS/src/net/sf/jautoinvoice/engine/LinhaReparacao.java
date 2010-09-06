/*
 * LinhaReparacao.java
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

public class LinhaReparacao {

    private Empregado empregado;
    private double valorHora;
    private double horas;
    private Reparacao reparacao;

    public LinhaReparacao(Empregado empregado, double valorHora, double horas, 
            Reparacao reparacao) {
        
        this.empregado = empregado;
        this.valorHora = valorHora;
        this.horas = horas;
        this.reparacao = reparacao;
    }

    public Empregado getEmpregado() {
        return empregado;
    }

    public void setEmpregados(Empregado empregado) {
        this.empregado = empregado;
    }

    public double getHoras() {
        return horas;
    }

    public void setHoras(double horas) {
        this.horas = horas;
    }

    public double getValorHora() {
        return valorHora;
    }

    public void setValorHora(double valorHora) {
        this.valorHora = valorHora;
    }

    public Reparacao getReparacao() {
        return reparacao;
    }

    public void setReparacao(Reparacao reparacao) {
        this.reparacao = reparacao;
    }
}
