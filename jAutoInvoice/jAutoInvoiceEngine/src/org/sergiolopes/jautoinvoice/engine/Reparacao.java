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
}
