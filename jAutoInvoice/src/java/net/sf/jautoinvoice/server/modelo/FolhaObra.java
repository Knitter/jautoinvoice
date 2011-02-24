package net.sf.jautoinvoice.server.modelo;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;

public class FolhaObra implements Serializable {

    private Veiculo veiculo;
    private String data;
    private String descricaoAvaria;
    private int kms;
    private Factura factura;
    private List<LinhaServico> linhas;

    public FolhaObra() {
        linhas = new ArrayList<LinhaServico>();
    }

    public FolhaObra(Veiculo veiculo, String data, String descricaoAvaria, int kms,
            Factura factura, List<LinhaServico> linhas) {
        this.veiculo = veiculo;
        this.data = data;
        this.descricaoAvaria = descricaoAvaria;
        this.kms = kms;
        this.factura = factura;

        this.linhas = new ArrayList<LinhaServico>(linhas.size());
        for (LinhaServico l : linhas) {
            linhas.add(l);
        }
    }

    public void adicionarLinhaServico(LinhaServico linha) {
        if (linhas == null) {
            linhas = new ArrayList<LinhaServico>();
        }

        linhas.add(linha);
    }

    public void removerLinhaServico(LinhaServico linha) {
        if (linhas != null) {
            linhas.remove(linha);
        }
    }

    public String getData() {
        return data;
    }

    public void setData(String data) {
        this.data = data;
    }

    public String getDescricaoAvaria() {
        return descricaoAvaria;
    }

    public void setDescricaoAvaria(String descricaoAvaria) {
        this.descricaoAvaria = descricaoAvaria;
    }

    public Factura getFactura() {
        return factura;
    }

    public void setFactura(Factura factura) {
        this.factura = factura;
    }

    public int getKms() {
        return kms;
    }

    public void setKms(int kms) {
        this.kms = kms;
    }

    public List<LinhaServico> getLinhas() {
        if (linhas != null) {
            return new ArrayList<LinhaServico>(linhas);
        }

        return null;
    }

    public void setLinhas(List<LinhaServico> linhas) {
        this.linhas.clear();
        for (LinhaServico l : linhas) {
            linhas.add(l);
        }
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
        final FolhaObra other = (FolhaObra) obj;
        if (this.veiculo != other.veiculo && (this.veiculo == null || !this.veiculo.equals(other.veiculo))) {
            return false;
        }
        if ((this.data == null) ? (other.data != null) : !this.data.equals(other.data)) {
            return false;
        }
        if (this.kms != other.kms) {
            return false;
        }
        if (this.factura != other.factura && (this.factura == null || !this.factura.equals(other.factura))) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 3;
        hash = 17 * hash + (this.veiculo != null ? this.veiculo.hashCode() : 0);
        hash = 17 * hash + (this.data != null ? this.data.hashCode() : 0);
        hash = 17 * hash + this.kms;
        hash = 17 * hash + (this.factura != null ? this.factura.hashCode() : 0);
        return hash;
    }
}
