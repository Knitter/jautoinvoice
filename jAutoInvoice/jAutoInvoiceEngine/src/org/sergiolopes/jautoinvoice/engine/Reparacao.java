package org.sergiolopes.jautoinvoice.engine;

import java.util.Date;

/**
 *
 * @author sergiolopes
 */
public class Reparacao {

    private Date data;
    private String descricaoAvaria;
    private int quilometros;
    private String descricaoReparacao;

    public Reparacao(Date data, String descricaoAvaria, int quilometros, String descricaoReparacao) {
        this.data = data;
        this.descricaoAvaria = descricaoAvaria;
        this.quilometros = quilometros;
        this.descricaoReparacao = descricaoReparacao;
    }

    public Date getData() {
        return data;
    }

    public void setData(Date data) {
        this.data = data;
    }

    public String getDescricaoAvaria() {
        return descricaoAvaria;
    }

    public void setDescricaoAvaria(String descricaoAvaria) {
        this.descricaoAvaria = descricaoAvaria;
    }

    public String getDescricaoReparacao() {
        return descricaoReparacao;
    }

    public void setDescricaoReparacao(String descricaoReparacao) {
        this.descricaoReparacao = descricaoReparacao;
    }

    public int getQuilometros() {
        return quilometros;
    }

    public void setQuilometros(int quilometros) {
        this.quilometros = quilometros;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Reparacao other = (Reparacao) obj;
        if (this.data != other.data && (this.data == null || !this.data.equals(other.data))) {
            return false;
        }
        if ((this.descricaoAvaria == null) ? (other.descricaoAvaria != null) : !this.descricaoAvaria.equals(other.descricaoAvaria)) {
            return false;
        }
        if (this.quilometros != other.quilometros) {
            return false;
        }
        if ((this.descricaoReparacao == null) ? (other.descricaoReparacao != null) : !this.descricaoReparacao.equals(other.descricaoReparacao)) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 19 * hash + (this.data != null ? this.data.hashCode() : 0);
        hash = 19 * hash + (this.descricaoAvaria != null ? this.descricaoAvaria.hashCode() : 0);
        hash = 19 * hash + this.quilometros;
        hash = 19 * hash + (this.descricaoReparacao != null ? this.descricaoReparacao.hashCode() : 0);
        return hash;
    }
}
