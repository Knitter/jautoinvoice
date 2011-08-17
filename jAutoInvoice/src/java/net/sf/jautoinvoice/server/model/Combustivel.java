package net.sf.jautoinvoice.server.model;

public class Combustivel {

    private String id;
    private String nome;
    private boolean activo;

    public Combustivel() {
        activo = true;
    }

    public Combustivel(String id, String nome, boolean activo) {
        this.id = id;
        this.nome = nome;
        this.activo = activo;
    }

    public boolean isActivo() {
        return activo;
    }

    public void setActivo(boolean activo) {
        this.activo = activo;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Combustivel other = (Combustivel) obj;
        if (this.id != null && this.id.equals(other.id)) {
            return true;
        }

        if ((this.nome == null) ? (other.nome != null) : !this.nome.equals(other.nome)) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 43 * hash + (this.id != null ? this.id.hashCode() : 0);
        hash = 43 * hash + (this.nome != null ? this.nome.hashCode() : 0);
        return hash;
    }
}
