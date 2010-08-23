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
}
