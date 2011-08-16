/*
 * Veiculo.java
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
package net.sf.jautoinvoice.server.model;

import net.sf.jautoinvoice.server.model.FolhaObra;
import net.sf.jautoinvoice.server.model.ECategoria;
import net.sf.jautoinvoice.server.model.ECombustivel;
import net.sf.jautoinvoice.server.model.Cliente;
import java.io.Serializable;
import java.util.ArrayList;

/**
 * Representa um veículo, registando os dados necessários e as relações 
 * existentes com outros elementos.
 * 
 * @since 1.0
 */
public final class Veiculo implements Serializable {

    private String id;
    private Marca marca;
    private Modelo modelo;
    private String dataRegisto;
    private String matricula;
    private String nrChassis;
    private String cilindrada;
    private String nrMotor;
    private Cliente dono;
    private ArrayList<Cliente> antigosDonos;
    private ArrayList<Inspeccao> inspeccoes;
    private ECategoria categoria;
    private ECombustivel combustivel;
    private String notas;
    private ArrayList<FolhaObra> folhasObra;

    public Veiculo() {
        antigosDonos = new ArrayList<Cliente>();
        inspeccoes = new ArrayList<Inspeccao>();
        folhasObra = new ArrayList<FolhaObra>();
    }

    public Veiculo(Marca marca, Modelo modelo, String dataRegisto, String matricula,
            String nrChassis, String cilindrada, String nrMotor, Cliente dono,
            ArrayList<Cliente> antigosDonos, ArrayList<Inspeccao> inspeccoes,
            ECategoria categoria, ECombustivel combustivel, String notas,
            ArrayList<FolhaObra> folhasObra) {

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

        this.antigosDonos = new ArrayList<Cliente>();
        if (antigosDonos != null) {
            for (Cliente c : antigosDonos) {
                this.antigosDonos.add(c);
            }
        }

        this.inspeccoes = new ArrayList<Inspeccao>();
        if (inspeccoes != null) {
            for (Inspeccao i : inspeccoes) {
                this.inspeccoes.add(i);
            }
        }

        this.folhasObra = new ArrayList<FolhaObra>();
        if (folhasObra != null) {
            for (FolhaObra f : folhasObra) {
                this.folhasObra.add(f);
            }
        }
    }

    /**
     * Permite adicionar um cliente como tendo sido dono do veículo.
     * 
     * @param dono O cliente a adicionar
     * @since 1.0
     */
    public void adicionarAntigoDono(Cliente dono) {
        //TODO: validar se estamos a adicionar um antigo que é dono actual
        if (antigosDonos == null) {
            antigosDonos = new ArrayList<Cliente>();
        }

        antigosDonos.add(dono);
    }

    /**
     * Remove um cliente como tendo sido dono deste veículo.
     * 
     * @param dono O cliente a remover
     * @since 1.0
     */
    public void removerAntigoDono(Cliente dono) {
        if (antigosDonos != null) {
            antigosDonos.remove(dono);
        }
    }

    /**
     * 
     * @param inspeccao 
     * @since 1.0
     */
    public void adicionarInspeccao(Inspeccao inspeccao) {
        if (inspeccoes == null) {
            inspeccoes = new ArrayList<Inspeccao>();
        }

        inspeccoes.add(inspeccao);
    }

    /**
     * 
     * @param inspeccao 
     * @since 1.0
     */
    public void removerInspeccao(Inspeccao inspeccao) {
        if (inspeccoes != null) {
            inspeccoes.remove(inspeccao);
        }
    }

    /**
     * 
     * @param folha 
     * @since 1.0
     */
    public void adicionarFolhaObra(FolhaObra folha) {
        if (folhasObra == null) {
            folhasObra = new ArrayList<FolhaObra>();
        }

        folhasObra.add(folha);
    }

    /**
     * 
     * @param folha 
     * @since 1.0
     */
    public void removeFolharObra(FolhaObra folha) {
        if (folhasObra == null) {
            folhasObra.remove(folha);
        }
    }

    public ArrayList<Cliente> getAntigosDonos() {
        if (antigosDonos != null) {
            return new ArrayList(antigosDonos);
        }
        return null;
    }

    public void setAntigosDonos(ArrayList<Cliente> antigosDonos) {
        this.antigosDonos.clear();
        for (Cliente c : antigosDonos) {
            this.antigosDonos.add(c);
        }
    }

    public ECategoria getCategoria() {
        return categoria;
    }

    public void setCategoria(ECategoria categoria) {
        this.categoria = categoria;
    }

    public String getCilindrada() {
        return cilindrada;
    }

    public void setCilindrada(String cilindrada) {
        this.cilindrada = cilindrada;
    }

    public ECombustivel getCombustivel() {
        return combustivel;
    }

    public void setCombustivel(ECombustivel combustivel) {
        this.combustivel = combustivel;
    }

    public String getDataRegisto() {
        return dataRegisto;
    }

    public void setDataRegisto(String dataRegisto) {
        this.dataRegisto = dataRegisto;
    }

    public Cliente getDono() {
        return dono;
    }

    public void setDono(Cliente dono) {
        this.dono = dono;
    }

    public ArrayList<Inspeccao> getInspeccoes() {
        if (inspeccoes != null) {
            return new ArrayList(inspeccoes);
        }

        return null;
    }

    public void setInspeccoes(ArrayList<Inspeccao> inspeccoes) {
        this.inspeccoes.clear();
        for (Inspeccao i : inspeccoes) {
            this.inspeccoes.add(i);
        }
    }

    public ArrayList<FolhaObra> getFolhasObra() {
        if (folhasObra != null) {
            return new ArrayList<FolhaObra>(folhasObra);
        }
        return null;
    }

    public void setFolhasObra(ArrayList<FolhaObra> folhasObra) {
        this.folhasObra.clear();
        for (FolhaObra f : folhasObra) {
            this.folhasObra.add(f);
        }
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

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }

        final Veiculo other = (Veiculo) obj;

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
