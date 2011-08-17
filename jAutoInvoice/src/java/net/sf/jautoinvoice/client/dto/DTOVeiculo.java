/*
 * DTOVeiculo.java
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

public final class DTOVeiculo implements Serializable {

    private String id;
    private DTOMarca marca;
    private DTOModelo modelo;
    private String dataRegisto;
    private String matricula;
    private String nrChassis;
    private String cilindrada;
    private String nrMotor;
    private DTOCliente dono;
    private ArrayList<DTOCliente> antigosDonos;
    private ArrayList<DTOInspeccao> inspeccoes;
    private DTOCategoria categoria;
    private DTOCombustivel combustivel;
    private String notas;
    private ArrayList<DTOFolhaObra> folhasObra;
    private boolean activo;

    public DTOVeiculo() {
        activo = true;
        antigosDonos = new ArrayList<DTOCliente>();
        inspeccoes = new ArrayList<DTOInspeccao>();
        folhasObra = new ArrayList<DTOFolhaObra>();
    }

    public DTOVeiculo(String id, DTOMarca marca, DTOModelo modelo, String dataRegisto, String matricula,
            String nrChassis, String cilindrada, String nrMotor, DTOCliente dono,
            ArrayList<DTOCliente> antigosDonos, ArrayList<DTOInspeccao> inspeccoes,
            DTOCategoria categoria, DTOCombustivel combustivel, String notas,
            ArrayList<DTOFolhaObra> folhasObra, boolean activo) {

        this.id = id;
        this.marca = marca;
        this.modelo = modelo;
        this.dataRegisto = dataRegisto;
        this.matricula = matricula;
        this.nrChassis = nrChassis;
        this.cilindrada = cilindrada;
        this.nrMotor = nrMotor;
        this.dono = dono;
        this.categoria = categoria;
        this.combustivel = combustivel;
        this.notas = notas;

        this.antigosDonos = new ArrayList<DTOCliente>();
        if (antigosDonos != null) {
            for (DTOCliente c : antigosDonos) {
                this.antigosDonos.add(c);
            }
        }

        this.inspeccoes = new ArrayList<DTOInspeccao>();
        if (inspeccoes != null) {
            for (DTOInspeccao i : inspeccoes) {
                this.inspeccoes.add(i);
            }
        }

        this.folhasObra = new ArrayList<DTOFolhaObra>();
        if (folhasObra != null) {
            for (DTOFolhaObra f : folhasObra) {
                this.folhasObra.add(f);
            }
        }

        this.activo = activo;
    }

    public void adicionarAntigoDono(DTOCliente dono) {
        //TODO: validar se estamos a adicionar um antigo que é dono actual
        if (antigosDonos == null) {
            antigosDonos = new ArrayList<DTOCliente>();
        }

        antigosDonos.add(dono);
    }

    public void removerAntigoDono(DTOCliente dono) {
        if (antigosDonos != null) {
            antigosDonos.remove(dono);
        }
    }

    public void adicionarInspeccao(DTOInspeccao inspeccao) {
        if (inspeccoes == null) {
            inspeccoes = new ArrayList<DTOInspeccao>();
        }

        inspeccoes.add(inspeccao);
    }

    public void removerInspeccao(DTOInspeccao inspeccao) {
        if (inspeccoes != null) {
            inspeccoes.remove(inspeccao);
        }
    }

    public void adicionarFolhaObra(DTOFolhaObra folha) {
        if (folhasObra == null) {
            folhasObra = new ArrayList<DTOFolhaObra>();
        }

        folhasObra.add(folha);
    }

    public void removeFolharObra(DTOFolhaObra folha) {
        if (folhasObra == null) {
            folhasObra.remove(folha);
        }
    }

    public ArrayList<DTOCliente> getAntigosDonos() {
        if (antigosDonos != null) {
            return new ArrayList(antigosDonos);
        }
        return null;
    }

    public void setAntigosDonos(ArrayList<DTOCliente> antigosDonos) {
        this.antigosDonos.clear();
        for (DTOCliente c : antigosDonos) {
            this.antigosDonos.add(c);
        }
    }

    public DTOCategoria getCategoria() {
        return categoria;
    }

    public void setCategoria(DTOCategoria categoria) {
        this.categoria = categoria;
    }

    public String getCilindrada() {
        return cilindrada;
    }

    public void setCilindrada(String cilindrada) {
        this.cilindrada = cilindrada;
    }

    public DTOCombustivel getCombustivel() {
        return combustivel;
    }

    public void setCombustivel(DTOCombustivel combustivel) {
        this.combustivel = combustivel;
    }

    public String getDataRegisto() {
        return dataRegisto;
    }

    public void setDataRegisto(String dataRegisto) {
        this.dataRegisto = dataRegisto;
    }

    public DTOCliente getDono() {
        return dono;
    }

    public void setDono(DTOCliente dono) {
        this.dono = dono;
    }

    public ArrayList<DTOInspeccao> getInspeccoes() {
        if (inspeccoes != null) {
            return new ArrayList(inspeccoes);
        }

        return null;
    }

    public void setInspeccoes(ArrayList<DTOInspeccao> inspeccoes) {
        this.inspeccoes.clear();
        for (DTOInspeccao i : inspeccoes) {
            this.inspeccoes.add(i);
        }
    }

    public ArrayList<DTOFolhaObra> getFolhasObra() {
        if (folhasObra != null) {
            return new ArrayList<DTOFolhaObra>(folhasObra);
        }
        return null;
    }

    public void setFolhasObra(ArrayList<DTOFolhaObra> folhasObra) {
        this.folhasObra.clear();
        for (DTOFolhaObra f : folhasObra) {
            this.folhasObra.add(f);
        }
    }

    public DTOMarca getMarca() {
        return marca;
    }

    public void setMarca(DTOMarca marca) {
        this.marca = marca;
    }

    public String getMatricula() {
        return matricula;
    }

    public void setMatricula(String matricula) {
        this.matricula = matricula;
    }

    public DTOModelo getModelo() {
        return modelo;
    }

    public void setModelo(DTOModelo modelo) {
        this.modelo = modelo;
    }

    public String getNotas() {
        return notas;
    }

    public void setNotas(String notas) {
        this.notas = notas;
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

        final DTOVeiculo other = (DTOVeiculo) obj;

        if (this.id != null && this.id.equals(other.id)) {
            return true;
        }

        if ((this.matricula == null) ? (other.matricula != null) : !this.matricula.equals(other.matricula)) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 3;
        hash = 73 * hash + (this.id != null ? this.id.hashCode() : 0);
        hash = 73 * hash + (this.matricula != null ? this.matricula.hashCode() : 0);
        return hash;
    }
}
