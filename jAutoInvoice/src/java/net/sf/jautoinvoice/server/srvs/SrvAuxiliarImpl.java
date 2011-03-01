/*
 * SrvAuxiliarImpl.java
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
import net.sf.jautoinvoice.client.model.IVA;
import net.sf.jautoinvoice.client.model.Marca;
import net.sf.jautoinvoice.client.model.Modelo;
import net.sf.jautoinvoice.client.model.Servico;
import net.sf.jautoinvoice.client.srvs.SrvAuxiliar;
import net.sf.jautoinvoice.server.JAutoInvoiceManager;

/**
 * Implementação do serviço de gestão de dados auxiliares.
 * 
 * @see SrvAuxiliar
 * @since 1.0
 */
public class SrvAuxiliarImpl extends RemoteServiceServlet implements SrvAuxiliar {

    private JAutoInvoiceManager gestor;

    public SrvAuxiliarImpl() {
        super();
        gestor = new JAutoInvoiceManager();
    }

    public void adicionarIVA(IVA novo) {
        gestor.adicionarIVA(novo);
    }

    public void removerIVA(IVA apagar) {
        gestor.removerIVA(apagar);
    }

    public ArrayList<IVA> listarTodosIVAs() {
        return gestor.listarTodosIVAs();
    }

    public void adicionarMarca(Marca nova) {
        gestor.adicionarMarca(nova);
    }

    public void removerMarca(Marca apagar) {
        gestor.removerMarca(apagar);
    }

    public ArrayList<Marca> listarTodasMarcas() {
        return gestor.listarTodasMarcas();
    }

    public void adicionarModelo(Modelo novo) {
        gestor.adicionarModelo(novo);
    }

    public void removerModelo(Modelo apagar) {
        gestor.removerModelo(apagar);
    }

    public ArrayList<Modelo> listarTodosModelos() {
        return gestor.listarTodosModelos();
    }

    public void adicionarServico(Servico novo) {
        gestor.adicionarServico(novo);
    }

    public void removerServico(Servico apagar) {
        gestor.removerServico(apagar);
    }

    public ArrayList<Servico> listarTodosServicos() {
        return gestor.listarTodosServicos();
    }
}
