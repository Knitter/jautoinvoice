package net.sf.jautoinvoice.client.dto;

import java.io.Serializable;

public class DTOUtilizador implements Serializable {

    private String id;
    private String nome;
    private String password;

    public DTOUtilizador() {
        //DO NOTHING;
    }

    public DTOUtilizador(String id, String nome, String password) {
        this.id = id;
        this.nome = nome;
        this.password = password;
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

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }

        final DTOUtilizador other = (DTOUtilizador) obj;
        if (this.id != null && this.id.equals(other.id)) {
            return true;
        }

        if ((this.nome == null) ? (other.nome != null) : !this.nome.equals(other.nome)) {
            return false;
        }
        if ((this.password == null) ? (other.password != null) : !this.password.equals(other.password)) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 3;
        hash = 97 * hash + (this.id != null ? this.id.hashCode() : 0);
        hash = 97 * hash + (this.nome != null ? this.nome.hashCode() : 0);
        hash = 97 * hash + (this.password != null ? this.password.hashCode() : 0);
        return hash;
    }
}
