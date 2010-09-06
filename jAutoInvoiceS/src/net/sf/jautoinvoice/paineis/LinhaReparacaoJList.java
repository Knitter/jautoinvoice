package net.sf.jautoinvoice.paineis;

import net.sf.jautoinvoice.engine.LinhaReparacao;

public class LinhaReparacaoJList {

    private LinhaReparacao linha;
    private StringBuilder descricao;

    public LinhaReparacaoJList(LinhaReparacao linha) {
        this.linha = linha;
    }

    public LinhaReparacao getLinha() {
        return linha;
    }

    public void setLinha(LinhaReparacao linha) {
        this.linha = linha;
    }

    public void recriarDescricao() {
        descricao = new StringBuilder();

        descricao.append(linha.getReparacao().getData());
        descricao.append(" - ");
        descricao.append(linha.getReparacao().getVeiculo().getMatricula());
        descricao.append(" (");
        descricao.append(linha.getHoras());
        descricao.append(" horas a ");
        descricao.append(linha.getValorHora());
        descricao.append(" euros/hora)");
    }

    @Override
    public String toString() {
        if (descricao == null) {
            recriarDescricao();
        }

        return descricao.toString();
    }
}
