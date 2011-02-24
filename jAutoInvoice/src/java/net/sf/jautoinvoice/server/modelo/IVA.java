package net.sf.jautoinvoice.server.modelo;

public class IVA {

    private String descricao;
    private double percentagem;

    public IVA() {
    }

    public IVA(String descricao, double percentagem) {
        this.descricao = descricao;
        this.percentagem = percentagem;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public double getPercentagem() {
        return percentagem;
    }

    public void setPercentagem(double percentagem) {
        this.percentagem = percentagem;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final IVA other = (IVA) obj;
        if ((this.descricao == null) ? (other.descricao != null) : !this.descricao.equals(other.descricao)) {
            return false;
        }
        if (Double.doubleToLongBits(this.percentagem) != Double.doubleToLongBits(other.percentagem)) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 3;
        hash = 61 * hash + (this.descricao != null ? this.descricao.hashCode() : 0);
        hash = 61 * hash + (int) (Double.doubleToLongBits(this.percentagem) ^ (Double.doubleToLongBits(this.percentagem) >>> 32));
        return hash;
    }
}
