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
}
