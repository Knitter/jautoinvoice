package net.sf.jautoinvoice.server.modelo;

import java.io.Serializable;

public class Inspeccao implements Serializable {

    private Veiculo veiculo;
    private String data;
    private EInspeccao estado;
    private String notas;
    private Funcionario funcionario;

    public Inspeccao() {
    }

    public Inspeccao(Veiculo veiculo, String data, EInspeccao estado, String notas,
            Funcionario funcionario) {
        this.veiculo = veiculo;
        this.data = data;
        this.estado = estado;
        this.notas = notas;
        this.funcionario = funcionario;
    }

    public String getData() {
        return data;
    }

    public void setData(String data) {
        this.data = data;
    }

    public EInspeccao getEstado() {
        return estado;
    }

    public void setEstado(EInspeccao estado) {
        this.estado = estado;
    }

    public Funcionario getFuncionario() {
        return funcionario;
    }

    public void setFuncionario(Funcionario funcionario) {
        this.funcionario = funcionario;
    }

    public String getNotas() {
        return notas;
    }

    public void setNotas(String notas) {
        this.notas = notas;
    }

    public Veiculo getVeiculo() {
        return veiculo;
    }

    public void setVeiculo(Veiculo veiculo) {
        this.veiculo = veiculo;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Inspeccao other = (Inspeccao) obj;
        if (this.veiculo != other.veiculo && (this.veiculo == null || !this.veiculo.equals(other.veiculo))) {
            return false;
        }
        if ((this.data == null) ? (other.data != null) : !this.data.equals(other.data)) {
            return false;
        }
        if (this.estado != other.estado) {
            return false;
        }
        if ((this.notas == null) ? (other.notas != null) : !this.notas.equals(other.notas)) {
            return false;
        }
        if (this.funcionario != other.funcionario && (this.funcionario == null || !this.funcionario.equals(other.funcionario))) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 29 * hash + (this.veiculo != null ? this.veiculo.hashCode() : 0);
        hash = 29 * hash + (this.data != null ? this.data.hashCode() : 0);
        hash = 29 * hash + (this.estado != null ? this.estado.hashCode() : 0);
        hash = 29 * hash + (this.notas != null ? this.notas.hashCode() : 0);
        hash = 29 * hash + (this.funcionario != null ? this.funcionario.hashCode() : 0);
        return hash;
    }
}
