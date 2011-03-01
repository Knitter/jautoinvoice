/*
 * SrvVeiculoImpl.java
 *
 * This file is part of jAutoInvoice, http://sourceforge.net/p/jautoinvoice
 *
 * Copyright (C) 2011 jAutoInvoice
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
package net.sf.jautoinvoice.server.srvs;

import com.google.gwt.user.server.rpc.RemoteServiceServlet;
import java.util.ArrayList;
import net.sf.jautoinvoice.client.model.FolhaObra;
import net.sf.jautoinvoice.client.model.Funcionario;
import net.sf.jautoinvoice.client.model.Inspeccao;
import net.sf.jautoinvoice.client.model.Veiculo;
import net.sf.jautoinvoice.client.srvs.SrvVeiculo;
import net.sf.jautoinvoice.server.JAutoInvoiceManager;

/**
 * Implementação do serviço de gestão de veículos.
 * 
 * @see SrvVeiculo
 * @since 1.0
 */
public final class SrvVeiculoImpl extends RemoteServiceServlet implements SrvVeiculo {

    private JAutoInvoiceManager gestor;

    public SrvVeiculoImpl() {
        super();
        gestor = new JAutoInvoiceManager();
    }

    public void adicionarVeiculo(Veiculo novo) {
        gestor.adicionarVeiculo(novo);
    }

    public void removerVeiculo(Veiculo apagar) {
        gestor.removerVeiculo(apagar);
    }

    public ArrayList<Veiculo> listarTodosVeiculos() {
        return gestor.listarTodosVeiculos();
    }

    public ArrayList<FolhaObra> listarFolhasObra(Veiculo veiculo) {
        return gestor.listarFolhasObraVeiculo(veiculo);
    }

    public void adicionarInspeccao(Inspeccao nova) {
        gestor.adicionarInspeccao(nova);
    }

    public void removerInspeccao(Inspeccao apagar) {
        gestor.removerInspeccao(apagar);
    }

    public ArrayList<Inspeccao> listarInspeccoes(Veiculo veiculo) {
        return gestor.listarInspeccoesVeiculo(veiculo);
    }

    public ArrayList<Veiculo> inpeccionadosPeloFuncionario(Funcionario funcionario) {
        return gestor.listarVeiculosInspeccianadosPor(funcionario);
    }
}
