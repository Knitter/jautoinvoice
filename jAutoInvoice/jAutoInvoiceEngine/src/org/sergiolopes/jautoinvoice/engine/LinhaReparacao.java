package org.sergiolopes.jautoinvoice.engine;

/**
 *
 * @author sergiolopes
 */
public class LinhaReparacao {

    private Empregado empregados;
    private double valorHora;
    private double horas;

    public LinhaReparacao(Empregado empregados, double valorHora, double horas) {
        this.empregados = empregados;
        this.valorHora = valorHora;
        this.horas = horas;
    }

    public Empregado getEmpregados() {
        return empregados;
    }

    public void setEmpregados(Empregado empregados) {
        this.empregados = empregados;
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
}
