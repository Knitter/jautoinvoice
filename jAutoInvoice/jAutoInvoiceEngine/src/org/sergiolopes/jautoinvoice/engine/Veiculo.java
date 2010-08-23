package org.sergiolopes.jautoinvoice.engine;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

/**
 *
 * @author sergiolopes
 */
public class Veiculo {

    private Marca marca;
    private Modelo modelo;
    private Date registo;
    private String matricula;
    private String nrChassis;
    private String cilindrada;
    private String nrMotor;
    private List<Cliente> antigosDonos;
    private Cliente dono;

    public Veiculo(Marca marca, Modelo modelo, Date registo, String matricula,
            String nrChassis, String cilindrada, String nrMotor, Cliente dono) {
        this.marca = marca;
        this.modelo = modelo;
        this.registo = registo;
        this.matricula = matricula;
        this.nrChassis = nrChassis;
        this.cilindrada = cilindrada;
        this.nrMotor = nrMotor;
        this.dono = dono;

        antigosDonos = new ArrayList<Cliente>();
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

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Veiculo other = (Veiculo) obj;
        if (this.marca != other.marca && (this.marca == null || !this.marca.equals(other.marca))) {
            return false;
        }
        if (this.modelo != other.modelo && (this.modelo == null || !this.modelo.equals(other.modelo))) {
            return false;
        }
        if (this.registo != other.registo && (this.registo == null || !this.registo.equals(other.registo))) {
            return false;
        }
        if ((this.matricula == null) ? (other.matricula != null) : !this.matricula.equals(other.matricula)) {
            return false;
        }
        if ((this.nrChassis == null) ? (other.nrChassis != null) : !this.nrChassis.equals(other.nrChassis)) {
            return false;
        }
        if ((this.cilindrada == null) ? (other.cilindrada != null) : !this.cilindrada.equals(other.cilindrada)) {
            return false;
        }
        if ((this.nrMotor == null) ? (other.nrMotor != null) : !this.nrMotor.equals(other.nrMotor)) {
            return false;
        }
        if (this.antigosDonos != other.antigosDonos && (this.antigosDonos == null || !this.antigosDonos.equals(other.antigosDonos))) {
            return false;
        }
        if (this.dono != other.dono && (this.dono == null || !this.dono.equals(other.dono))) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 3;
        hash = 11 * hash + (this.marca != null ? this.marca.hashCode() : 0);
        hash = 11 * hash + (this.modelo != null ? this.modelo.hashCode() : 0);
        hash = 11 * hash + (this.registo != null ? this.registo.hashCode() : 0);
        hash = 11 * hash + (this.matricula != null ? this.matricula.hashCode() : 0);
        hash = 11 * hash + (this.nrChassis != null ? this.nrChassis.hashCode() : 0);
        hash = 11 * hash + (this.cilindrada != null ? this.cilindrada.hashCode() : 0);
        hash = 11 * hash + (this.nrMotor != null ? this.nrMotor.hashCode() : 0);
        hash = 11 * hash + (this.antigosDonos != null ? this.antigosDonos.hashCode() : 0);
        hash = 11 * hash + (this.dono != null ? this.dono.hashCode() : 0);
        return hash;
    }
}
