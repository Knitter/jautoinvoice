/*
 * Veiculo.java
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

public class Veiculo {

    private Marca marca;
    private Modelo modelo;
    private Date registo;
    private String matricula;
    private String nrChassis;
    private String cilindrada;
    private String nrMotor;
    private String observacoes;
    private List<Cliente> antigosDonos;
    private Cliente dono;
    private Date dataAdicao;

    public Veiculo(Marca marca, Modelo modelo, Date registo, String matricula,
            String nrChassis, String cilindrada, String nrMotor, Cliente dono,
            String observacoes) {

        this.marca = marca;
        this.modelo = modelo;
        this.registo = registo;
        this.matricula = matricula;
        this.nrChassis = nrChassis;
        this.cilindrada = cilindrada;
        this.nrMotor = nrMotor;
        this.dono = dono;
        this.observacoes = observacoes;

        antigosDonos = new ArrayList<Cliente>();
        dataAdicao = new Date();
    }

    public String getCilindrada() {
        return cilindrada;
    }

    public void setCilindrada(String cilindrada) {
        this.cilindrada = cilindrada;
    }

    public Marca getMarca() {
        return marca;
    }

    public void setMarca(Marca marca) {
        this.marca = marca;
    }

    public String getMatricula() {
        return matricula;
    }

    public void setMatricula(String matricula) {
        this.matricula = matricula;
    }

    public Modelo getModelo() {
        return modelo;
    }

    public void setModelo(Modelo modelo) {
        this.modelo = modelo;
    }

    public String getNrChassis() {
        return nrChassis;
    }

    public void setNrChassis(String nrChassis) {
        this.nrChassis = nrChassis;
    }

    public String getNrMotor() {
        return nrMotor;
    }

    public void setNrMotor(String nrMotor) {
        this.nrMotor = nrMotor;
    }

    public Date getRegisto() {
        return registo;
    }

    public void setRegisto(Date registo) {
        this.registo = registo;
    }

    public Cliente getDono() {
        return dono;
    }

    public void setDono(Cliente dono) {
        this.dono = dono;
    }

    public void adicionarAntigoDono(Cliente cliente) {
        if (antigosDonos == null) {
            antigosDonos = new ArrayList<Cliente>();
        }

        antigosDonos.add(dono);
    }

    public void removerAntigoDono(Cliente cliente) {
        if (antigosDonos != null) {
            antigosDonos.remove(dono);
        }
    }

    public List<Cliente> getAntigosDonos() {
        return new ArrayList<Cliente>(antigosDonos);
    }

    public String getObservacoes() {
        return observacoes;
    }

    public void setObservacoes(String observacoes) {
        this.observacoes = observacoes;
    }

    public Date getDataAdicao() {
        return dataAdicao;
    }

    public void setDataAdicao(Date dataAdicao) {
        this.dataAdicao = dataAdicao;
    }
}
