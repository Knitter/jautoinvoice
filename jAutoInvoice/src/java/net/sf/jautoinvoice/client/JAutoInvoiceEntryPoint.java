/*
 * JAutoInvoiceEntryPoint.java
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
package net.sf.jautoinvoice.client;

import com.google.gwt.core.client.EntryPoint;
import com.google.gwt.core.client.GWT;
import com.google.gwt.user.client.History;
import net.sf.jautoinvoice.client.srvs.SrvAuxiliar;
import net.sf.jautoinvoice.client.srvs.SrvAuxiliarAsync;
import net.sf.jautoinvoice.client.srvs.SrvClienteAsync;
import net.sf.jautoinvoice.client.srvs.SrvConfiguracao;
import net.sf.jautoinvoice.client.srvs.SrvConfiguracaoAsync;
import net.sf.jautoinvoice.client.srvs.SrvFornecedor;
import net.sf.jautoinvoice.client.srvs.SrvFornecedorAsync;
import net.sf.jautoinvoice.client.srvs.SrvFuncionario;
import net.sf.jautoinvoice.client.srvs.SrvFuncionarioAsync;
import net.sf.jautoinvoice.client.srvs.SrvMaterial;
import net.sf.jautoinvoice.client.srvs.SrvMaterialAsync;
import net.sf.jautoinvoice.client.srvs.SrvVeiculo;
import net.sf.jautoinvoice.client.srvs.SrvVeiculoAsync;

/**
 * Ponto inicial de entrada na aplicação, como exigido pelo GWT. Esta classe é
 * responsável pela iniciação da aplicação, adição de handlers de eventos, etc.
 * 
 * @since 1.0
 */
public class JAutoInvoiceEntryPoint implements EntryPoint {

    private SrvClienteAsync srvCliente;
    private SrvAuxiliarAsync srvAuxiliar;
    private SrvConfiguracaoAsync srvConfiguracao;
    private SrvFornecedorAsync srvFornecedor;
    private SrvFuncionarioAsync srvFuncionario;
    private SrvMaterialAsync srvMaterial;
    private SrvVeiculoAsync srvVeiculo;

    public void onModuleLoad() {
        srvAuxiliar = (SrvAuxiliarAsync) GWT.create(SrvAuxiliar.class);
        srvConfiguracao = (SrvConfiguracaoAsync) GWT.create(SrvConfiguracao.class);
        srvFornecedor = (SrvFornecedorAsync) GWT.create(SrvFornecedor.class);
        srvFuncionario = (SrvFuncionarioAsync) GWT.create(SrvFuncionario.class);
        srvMaterial = (SrvMaterialAsync) GWT.create(SrvMaterial.class);
        srvVeiculo = (SrvVeiculoAsync) GWT.create(SrvVeiculo.class);
        
        //??
        History.addValueChangeHandler(GestorLayout.getInstance());

        //start GUI
        GestorLayout.getInstance().doLayout();
    }
}
//TODO: completar