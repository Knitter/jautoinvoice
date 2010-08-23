package org.sergiolopes.jautoinvoice.engine;

/**
 *
 * @author sergiolopes
 */
public class Empregado {

    private String nome;
    private double valorHora;

    public Empregado(String nome, double valorHora) {
        this.nome = nome;
        this.valorHora = valorHora;
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
}
