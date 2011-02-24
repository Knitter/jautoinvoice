package net.sf.jautoinvoice.server.modelo;

import java.math.BigDecimal;
import java.util.ArrayList;
import java.util.List;

public class LinhaServico {

    private FolhaObra folha;
    private double duracao;
    private Funcionario funcionario;
    private BigDecimal valorHora;
    private Servico servico;
    private String notas;
    private List<LinhaGasto> gastos;

    public LinhaServico() {
        gastos = new ArrayList<LinhaGasto>();
    }

    public LinhaServico(FolhaObra folha, double duracao, Funcionario funcionario,
            BigDecimal valorHora, Servico servico, String notas, List<LinhaGasto> gastos) {
        this.folha = folha;
        this.duracao = duracao;
        this.funcionario = funcionario;
        this.valorHora = valorHora;
        this.servico = servico;
        this.notas = notas;

        this.gastos = new ArrayList<LinhaGasto>();
        for (LinhaGasto l : gastos) {
            this.gastos.add(l);
        }
    }

    public void adicionarLinhaGasto(LinhaGasto gasto) {
        if (gastos == null) {
            gastos = new ArrayList<LinhaGasto>();
        }

        gastos.add(gasto);
    }

    public void removerLinhaGasto(LinhaGasto gasto) {
        if (gastos != null) {
            gastos.remove(gasto);
        }
    }

    public double getDuracao() {
        return duracao;
    }

    public void setDuracao(double duracao) {
        this.duracao = duracao;
    }

    public FolhaObra getFolha() {
        return folha;
    }

    public void setFolha(FolhaObra folha) {
        this.folha = folha;
    }

    public Funcionario getFuncionario() {
        return funcionario;
    }

    public void setFuncionario(Funcionario funcionario) {
        this.funcionario = funcionario;
    }

    public List<LinhaGasto> getGastos() {
        if (gastos != null) {
            return new ArrayList<LinhaGasto>(gastos);
        }

        return null;
    }

    public void setGastos(List<LinhaGasto> gastos) {
        this.gastos.clear();
        for (LinhaGasto l : gastos) {
            this.gastos.add(l);
        }
    }

    public String getNotas() {
        return notas;
    }

    public void setNotas(String notas) {
        this.notas = notas;
    }

    public Servico getServico() {
        return servico;
    }

    public void setServico(Servico servico) {
        this.servico = servico;
    }

    public BigDecimal getValorHora() {
        return valorHora;
    }

    public void setValorHora(BigDecimal valorHora) {
        this.valorHora = valorHora;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final LinhaServico other = (LinhaServico) obj;
        if (this.folha != other.folha && (this.folha == null || !this.folha.equals(other.folha))) {
            return false;
        }
        if (Double.doubleToLongBits(this.duracao) != Double.doubleToLongBits(other.duracao)) {
            return false;
        }
        if (this.funcionario != other.funcionario && (this.funcionario == null || !this.funcionario.equals(other.funcionario))) {
            return false;
        }
        if (this.valorHora != other.valorHora && (this.valorHora == null || !this.valorHora.equals(other.valorHora))) {
            return false;
        }
        if (this.servico != other.servico && (this.servico == null || !this.servico.equals(other.servico))) {
            return false;
        }
        if ((this.notas == null) ? (other.notas != null) : !this.notas.equals(other.notas)) {
            return false;
        }
        if (this.gastos != other.gastos && (this.gastos == null || !this.gastos.equals(other.gastos))) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 5;
        hash = 97 * hash + (this.folha != null ? this.folha.hashCode() : 0);
        hash = 97 * hash + (int) (Double.doubleToLongBits(this.duracao) ^ (Double.doubleToLongBits(this.duracao) >>> 32));
        hash = 97 * hash + (this.funcionario != null ? this.funcionario.hashCode() : 0);
        hash = 97 * hash + (this.valorHora != null ? this.valorHora.hashCode() : 0);
        hash = 97 * hash + (this.servico != null ? this.servico.hashCode() : 0);
        hash = 97 * hash + (this.notas != null ? this.notas.hashCode() : 0);
        hash = 97 * hash + (this.gastos != null ? this.gastos.hashCode() : 0);
        return hash;
    }
}
