package net.sf.jautoinvoice.server.modelo;

import java.math.BigDecimal;

public class LinhaGasto {

    private Material material;
    private double quantidade;
    private BigDecimal precoUnitario;
    private LinhaServico linhaServico;

    public LinhaGasto() {
    }

    public LinhaGasto(Material material, double quantidade, BigDecimal precoUnitario,
            LinhaServico linhaServico) {
        this.material = material;
        this.quantidade = quantidade;
        this.precoUnitario = precoUnitario;
        this.linhaServico = linhaServico;
    }

    public LinhaServico getLinhaServico() {
        return linhaServico;
    }

    public void setLinhaServico(LinhaServico linhaServico) {
        this.linhaServico = linhaServico;
    }

    public Material getMaterial() {
        return material;
    }

    public void setMaterial(Material material) {
        this.material = material;
    }

    public BigDecimal getPrecoUnitario() {
        return precoUnitario;
    }

    public void setPrecoUnitario(BigDecimal precoUnitario) {
        this.precoUnitario = precoUnitario;
    }

    public double getQuantidade() {
        return quantidade;
    }

    public void setQuantidade(double quantidade) {
        this.quantidade = quantidade;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final LinhaGasto other = (LinhaGasto) obj;
        if (this.material != other.material && (this.material == null || !this.material.equals(other.material))) {
            return false;
        }
        if (Double.doubleToLongBits(this.quantidade) != Double.doubleToLongBits(other.quantidade)) {
            return false;
        }
        if (this.precoUnitario != other.precoUnitario && (this.precoUnitario == null || !this.precoUnitario.equals(other.precoUnitario))) {
            return false;
        }
        if (this.linhaServico != other.linhaServico && (this.linhaServico == null || !this.linhaServico.equals(other.linhaServico))) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 37 * hash + (this.material != null ? this.material.hashCode() : 0);
        hash = 37 * hash + (int) (Double.doubleToLongBits(this.quantidade) ^ (Double.doubleToLongBits(this.quantidade) >>> 32));
        hash = 37 * hash + (this.precoUnitario != null ? this.precoUnitario.hashCode() : 0);
        hash = 37 * hash + (this.linhaServico != null ? this.linhaServico.hashCode() : 0);
        return hash;
    }
}
