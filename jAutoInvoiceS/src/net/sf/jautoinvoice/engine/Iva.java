package net.sf.jautoinvoice.engine;

public class Iva {

    private String descricao;
    private double valor;
    private boolean activo;

    public Iva(String descricao, double valor, boolean activo) {
        this.descricao = descricao;
        this.valor = valor;
        this.activo = activo;
    }

    public boolean isActivo() {
        return activo;
    }

    public void setActivo(boolean activo) {
        this.activo = activo;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public double getValor() {
        return valor;
    }

    public void setValor(double valor) {
        this.valor = valor;
    }
}
