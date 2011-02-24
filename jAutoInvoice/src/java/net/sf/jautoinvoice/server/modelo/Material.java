package net.sf.jautoinvoice.server.modelo;

import java.math.BigDecimal;

public class Material {

    //nº da factura e data da compra para controlar os stocks.
    //
    private Fornecedor fornecedor;
    private BigDecimal precoUnitario;
    private IVA iva;
    private String referencia;
    private String descricao;
    private boolean activo;

    public Material() {
        activo = true;
    }

    public Material(Fornecedor fornecedor, BigDecimal precoUnitario, IVA iva,
            String referencia, String descricao, boolean activo) {
        this.fornecedor = fornecedor;
        this.precoUnitario = precoUnitario;
        this.iva = iva;
        this.referencia = referencia;
        this.descricao = descricao;
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

    public Fornecedor getFornecedor() {
        return fornecedor;
    }

    public void setFornecedor(Fornecedor fornecedor) {
        this.fornecedor = fornecedor;
    }

    public IVA getIva() {
        return iva;
    }

    public void setIva(IVA iva) {
        this.iva = iva;
    }

    public BigDecimal getPrecoUnitario() {
        return precoUnitario;
    }

    public void setPrecoUnitario(BigDecimal precoUnitario) {
        this.precoUnitario = precoUnitario;
    }

    public String getReferencia() {
        return referencia;
    }

    public void setReferencia(String referencia) {
        this.referencia = referencia;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Material other = (Material) obj;
        if (this.fornecedor != other.fornecedor && (this.fornecedor == null || !this.fornecedor.equals(other.fornecedor))) {
            return false;
        }
        if (this.precoUnitario != other.precoUnitario && (this.precoUnitario == null || !this.precoUnitario.equals(other.precoUnitario))) {
            return false;
        }
        if (this.iva != other.iva && (this.iva == null || !this.iva.equals(other.iva))) {
            return false;
        }
        if ((this.referencia == null) ? (other.referencia != null) : !this.referencia.equals(other.referencia)) {
            return false;
        }
        if ((this.descricao == null) ? (other.descricao != null) : !this.descricao.equals(other.descricao)) {
            return false;
        }
        if (this.activo != other.activo) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 5;
        hash = 67 * hash + (this.fornecedor != null ? this.fornecedor.hashCode() : 0);
        hash = 67 * hash + (this.precoUnitario != null ? this.precoUnitario.hashCode() : 0);
        hash = 67 * hash + (this.iva != null ? this.iva.hashCode() : 0);
        hash = 67 * hash + (this.referencia != null ? this.referencia.hashCode() : 0);
        hash = 67 * hash + (this.descricao != null ? this.descricao.hashCode() : 0);
        hash = 67 * hash + (this.activo ? 1 : 0);
        return hash;
    }
}
