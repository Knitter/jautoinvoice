package org.sergiolopes.jautoinvoice.engine;

import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author sergiolopes
 */
public class Cliente {

    private String nome;
    private String endereco;
    private String codigoPostal;
    private String localidade;
    private String telefone1;
    private String telefone2;
    private String email;
    private List<Veiculo> veiculos;

    public Cliente(String nome, String endereco, String codigoPostal, String localidade,
            String telefone1, String telefone2, String email, List<Veiculo> veiculos) {
        this.nome = nome;
        this.endereco = endereco;
        this.codigoPostal = codigoPostal;
        this.localidade = localidade;
        this.telefone1 = telefone1;
        this.telefone2 = telefone2;
        this.email = email;
        this.veiculos = new ArrayList<Veiculo>(veiculos);
    }

    public String getCodigoPostal() {
        return codigoPostal;
    }

    public void setCodigoPostal(String codigoPostal) {
        this.codigoPostal = codigoPostal;
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

    public String getLocalidade() {
        return localidade;
    }

    public void setLocalidade(String localidade) {
        this.localidade = localidade;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getTelefone1() {
        return telefone1;
    }

    public void setTelefone1(String telefone1) {
        this.telefone1 = telefone1;
    }

    public String getTelefone2() {
        return telefone2;
    }

    public void setTelefone2(String telefone2) {
        this.telefone2 = telefone2;
    }

    public List<Veiculo> getVeiculos() {
        return new ArrayList<Veiculo>(veiculos);
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

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Cliente other = (Cliente) obj;
        if ((this.nome == null) ? (other.nome != null) : !this.nome.equals(other.nome)) {
            return false;
        }
        if ((this.endereco == null) ? (other.endereco != null) : !this.endereco.equals(other.endereco)) {
            return false;
        }
        if ((this.codigoPostal == null) ? (other.codigoPostal != null) : !this.codigoPostal.equals(other.codigoPostal)) {
            return false;
        }
        if ((this.localidade == null) ? (other.localidade != null) : !this.localidade.equals(other.localidade)) {
            return false;
        }
        if ((this.telefone1 == null) ? (other.telefone1 != null) : !this.telefone1.equals(other.telefone1)) {
            return false;
        }
        if ((this.telefone2 == null) ? (other.telefone2 != null) : !this.telefone2.equals(other.telefone2)) {
            return false;
        }
        if ((this.email == null) ? (other.email != null) : !this.email.equals(other.email)) {
            return false;
        }
        if (this.veiculos != other.veiculos && (this.veiculos == null || !this.veiculos.equals(other.veiculos))) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 29 * hash + (this.nome != null ? this.nome.hashCode() : 0);
        hash = 29 * hash + (this.endereco != null ? this.endereco.hashCode() : 0);
        hash = 29 * hash + (this.codigoPostal != null ? this.codigoPostal.hashCode() : 0);
        hash = 29 * hash + (this.localidade != null ? this.localidade.hashCode() : 0);
        hash = 29 * hash + (this.telefone1 != null ? this.telefone1.hashCode() : 0);
        hash = 29 * hash + (this.telefone2 != null ? this.telefone2.hashCode() : 0);
        hash = 29 * hash + (this.email != null ? this.email.hashCode() : 0);
        hash = 29 * hash + (this.veiculos != null ? this.veiculos.hashCode() : 0);
        return hash;
    }
}
