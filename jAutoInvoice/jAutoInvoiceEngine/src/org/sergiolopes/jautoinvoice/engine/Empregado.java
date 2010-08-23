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

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Empregado other = (Empregado) obj;
        if ((this.nome == null) ? (other.nome != null) : !this.nome.equals(other.nome)) {
            return false;
        }
        if (Double.doubleToLongBits(this.valorHora) != Double.doubleToLongBits(other.valorHora)) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 59 * hash + (this.nome != null ? this.nome.hashCode() : 0);
        hash = 59 * hash + (int) (Double.doubleToLongBits(this.valorHora) ^ (Double.doubleToLongBits(this.valorHora) >>> 32));
        return hash;
    }
}
