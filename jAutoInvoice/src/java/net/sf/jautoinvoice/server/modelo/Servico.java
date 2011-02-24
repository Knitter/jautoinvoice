package net.sf.jautoinvoice.server.modelo;

public class Servico {

    private String descricao;
    private boolean activo;

    public Servico() {
        activo = true;
    }

    public Servico(String descricao, boolean activo) {
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

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Servico other = (Servico) obj;
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
        hash = 13 * hash + (this.descricao != null ? this.descricao.hashCode() : 0);
        hash = 13 * hash + (this.activo ? 1 : 0);
        return hash;
    }
}
