package net.sf.jautoinvoice.server.modelo;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;

public class Marca implements Serializable {

    private String nome;
    private List<Modelo> modelos;

    public Marca() {
        modelos = new ArrayList<Modelo>();
    }

    public Marca(String nome, List<Modelo> modelos) {
        this.nome = nome;

        this.modelos = new ArrayList<Modelo>(modelos.size());
        for (Modelo m : modelos) {
            this.modelos.add(m);
        }
    }

    public void adicionarModelo(Modelo modelo) {
        if (modelos == null) {
            modelos = new ArrayList<Modelo>();
        }

        modelos.add(modelo);
    }

    public void removerModelo(Modelo modelo) {
        if (modelos != null) {
            modelos.remove(modelo);
        }
    }

    public List<Modelo> getModelos() {
        if (modelos != null) {
            return new ArrayList(modelos);
        }

        return null;
    }

    public void setModelos(List<Modelo> modelos) {
        this.modelos.clear();
        for (Modelo m : modelos) {
            this.modelos.add(m);
        }
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
        final Marca other = (Marca) obj;
        if ((this.nome == null) ? (other.nome != null) : !this.nome.equals(other.nome)) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 89 * hash + (this.nome != null ? this.nome.hashCode() : 0);
        return hash;
    }
}
