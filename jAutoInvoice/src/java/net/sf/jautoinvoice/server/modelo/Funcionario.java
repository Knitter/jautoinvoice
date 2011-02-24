package net.sf.jautoinvoice.server.modelo;

import java.math.BigDecimal;

public class Funcionario {

    private String nome;
    private String contribuinte;
    private BigDecimal valorHora;

    public Funcionario(String nome, String contribuinte, BigDecimal valorHora) {
        this.nome = nome;
        this.contribuinte = contribuinte;
        this.valorHora = valorHora;
    }

    public String getContribuinte() {
        return contribuinte;
    }

    public void setContribuinte(String contribuinte) {
        this.contribuinte = contribuinte;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public BigDecimal getValorHora() {
        return valorHora;
    }

    public void setValorHora(BigDecimal valorHora) {
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
        final Funcionario other = (Funcionario) obj;
        if ((this.nome == null) ? (other.nome != null) : !this.nome.equals(other.nome)) {
            return false;
        }
        if ((this.contribuinte == null) ? (other.contribuinte != null) : !this.contribuinte.equals(other.contribuinte)) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 47 * hash + (this.nome != null ? this.nome.hashCode() : 0);
        hash = 47 * hash + (this.contribuinte != null ? this.contribuinte.hashCode() : 0);
        return hash;
    }
}
