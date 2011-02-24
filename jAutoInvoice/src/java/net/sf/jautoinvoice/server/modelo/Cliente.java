package net.sf.jautoinvoice.server.modelo;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;

public class Cliente implements Serializable {

    private String codigo;
    private String nome;
    private String email;
    private List<String> contactos;
    private String endereco;
    private List<Veiculo> veiculos;

    public Cliente() {
        this.contactos = new ArrayList<String>();
        this.veiculos = new ArrayList<Veiculo>();
    }

    public Cliente(String codigo, String nome, String email, List<String> contactos,
            String endereco, List<Veiculo> veiculos) {
        this.codigo = codigo;
        this.nome = nome;
        this.email = email;
        this.endereco = endereco;

        this.contactos = new ArrayList<String>(contactos.size());
        for (String c : contactos) {
            this.contactos.add(c);
        }

        this.veiculos = new ArrayList<Veiculo>(veiculos.size());
        for (Veiculo v : veiculos) {
            this.veiculos.add(v);
        }
    }

    public void adicionarContacto(String contacto) {
        if (contactos == null) {
            contactos = new ArrayList<String>();
        }

        contactos.add(contacto);
    }

    public void removerContacto(String contacto) {
        if (contactos != null) {
            contactos.remove(contacto);
        }
    }

    public void adicionarVeiculo(Veiculo veiculo) {
        if (veiculos == null) {
            veiculos = new ArrayList<Veiculo>();
        }

        veiculos.add(veiculo);
    }

    public void removerVeiculo(Veiculo veiculo) {
        if (veiculos != null) {
            veiculos.remove(veiculo);
        }
    }

    public String getCodigo() {
        return codigo;
    }

    public void setCodigo(String codigo) {
        this.codigo = codigo;
    }

    public List<String> getContactos() {
        if (contactos != null) {
            return new ArrayList<String>(contactos);
        }
        return null;
    }

    public void setContactos(List<String> contactos) {
        this.contactos.clear();
        for (String c : contactos) {
            this.contactos.add(c);
        }
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getEndereco() {
        return endereco;
    }

    public void setEndereco(String endereco) {
        this.endereco = endereco;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public List<Veiculo> getVeiculos() {
        if (veiculos != null) {
            return new ArrayList<Veiculo>(veiculos);
        }
        return null;
    }

    public void setVeiculos(List<Veiculo> veiculos) {
        this.veiculos.clear();
        for (Veiculo v : veiculos) {
            this.veiculos.add(v);
        }
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Cliente other = (Cliente) obj;
        if ((this.codigo == null) ? (other.codigo != null) : !this.codigo.equals(other.codigo)) {
            return false;
        }
        if ((this.nome == null) ? (other.nome != null) : !this.nome.equals(other.nome)) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 97 * hash + (this.codigo != null ? this.codigo.hashCode() : 0);
        hash = 97 * hash + (this.nome != null ? this.nome.hashCode() : 0);
        return hash;
    }
}
