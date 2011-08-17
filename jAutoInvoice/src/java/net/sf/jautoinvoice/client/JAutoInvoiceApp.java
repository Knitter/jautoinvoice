/*
 * JAutoInvoiceApp.java
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

import net.sf.jautoinvoice.client.gui.Conteudo;
import com.extjs.gxt.ui.client.Style.LayoutRegion;
import com.extjs.gxt.ui.client.widget.Viewport;
import com.extjs.gxt.ui.client.widget.layout.BorderLayout;
import com.extjs.gxt.ui.client.widget.layout.BorderLayoutData;
import com.google.gwt.core.client.GWT;
import com.google.gwt.event.logical.shared.ValueChangeEvent;
import com.google.gwt.event.logical.shared.ValueChangeHandler;
import com.google.gwt.user.client.ui.RootLayoutPanel;
import java.util.HashMap;
import net.sf.jautoinvoice.client.gui.Cabecalho;
import net.sf.jautoinvoice.client.gui.icons.Icones;
import net.sf.jautoinvoice.client.gui.PainelClientes;
import net.sf.jautoinvoice.client.gui.PainelFornecedores;
import net.sf.jautoinvoice.client.gui.PainelFuncionarios;
import net.sf.jautoinvoice.client.gui.PainelMaterial;
import net.sf.jautoinvoice.client.gui.PainelVeiculos;
import net.sf.jautoinvoice.client.srvs.SrvAuxiliar;
import net.sf.jautoinvoice.client.srvs.SrvAuxiliarAsync;
import net.sf.jautoinvoice.client.srvs.SrvCliente;
import net.sf.jautoinvoice.client.srvs.SrvClienteAsync;
import net.sf.jautoinvoice.client.srvs.SrvConfiguracao;
import net.sf.jautoinvoice.client.srvs.SrvConfiguracaoAsync;
import net.sf.jautoinvoice.client.srvs.SrvDev;
import net.sf.jautoinvoice.client.srvs.SrvDevAsync;
import net.sf.jautoinvoice.client.srvs.SrvFornecedor;
import net.sf.jautoinvoice.client.srvs.SrvFornecedorAsync;
import net.sf.jautoinvoice.client.srvs.SrvFuncionario;
import net.sf.jautoinvoice.client.srvs.SrvFuncionarioAsync;
import net.sf.jautoinvoice.client.srvs.SrvMaterial;
import net.sf.jautoinvoice.client.srvs.SrvMaterialAsync;
import net.sf.jautoinvoice.client.srvs.SrvVeiculo;
import net.sf.jautoinvoice.client.srvs.SrvVeiculoAsync;

/**
 * @author Sérgio Lopes
 * @since 1.0
 */
public final class JAutoInvoiceApp implements ValueChangeHandler<String> {

    private static JAutoInvoiceApp instance;
    private Conteudo conteudo;
    private HashMap<String, Conteudo> paineis;
    private Icones icons;
    //
    private SrvClienteAsync srvCliente;
    private SrvAuxiliarAsync srvAuxiliar;
    private SrvConfiguracaoAsync srvConfiguracao;
    private SrvFornecedorAsync srvFornecedor;
    private SrvFuncionarioAsync srvFuncionario;
    private SrvMaterialAsync srvMaterial;
    private SrvVeiculoAsync srvVeiculo;
    private SrvDevAsync srvDev;
    //
    public static final String PAINEL_OBRAS = "obras";
    public static final String PAINEL_FACTURAS = "facturas";
    public static final String PAINEL_MARCACOES = "marcacoes";
    public static final String PAINEL_VEICULOS = "veiculos";
    public static final String PAINEL_CLIENTES = "clientes";
    public static final String PAINEL_MATERIAL = "material";
    public static final String PAINEL_ESTATISTICAS = "estatisticas";
    public static final String PAINEL_RELATORIOS = "relatorios";
    public static final String PAINEL_FUNCIONARIOS = "funcionarios";
    public static final String PAINEL_OPCOES = "opcoes";
    public static final String PAINEL_FORNECEDORES = "fornecedores";

    private JAutoInvoiceApp() {
        paineis = new HashMap<String, Conteudo>();
        icons = GWT.create(Icones.class);

        srvAuxiliar = (SrvAuxiliarAsync) GWT.create(SrvAuxiliar.class);
        srvConfiguracao = (SrvConfiguracaoAsync) GWT.create(SrvConfiguracao.class);
        srvFornecedor = (SrvFornecedorAsync) GWT.create(SrvFornecedor.class);
        srvFuncionario = (SrvFuncionarioAsync) GWT.create(SrvFuncionario.class);
        srvMaterial = (SrvMaterialAsync) GWT.create(SrvMaterial.class);
        srvVeiculo = (SrvVeiculoAsync) GWT.create(SrvVeiculo.class);
        srvCliente = (SrvClienteAsync) GWT.create(SrvCliente.class);
        srvDev = (SrvDevAsync) GWT.create(SrvDev.class);
    }

    public static JAutoInvoiceApp getInstance() {
        if (instance == null) {
            instance = new JAutoInvoiceApp();
        }

        return instance;
    }

    public void setConteudo(Conteudo conteudo) {
        this.conteudo = conteudo;
        doLayout();
    }

    //TODO: ...
    public void doLayout() {
        Viewport view = new Viewport();
        BorderLayout root = new BorderLayout();
        view.setLayout(root);

        //TODO: autenticação
        //TODO: colocar o conteúdo correcto...
        if (conteudo == null) {
            conteudo = new PainelClientes();
        }

        view.add(new Cabecalho(), new BorderLayoutData(LayoutRegion.NORTH, 101));
        view.add(conteudo, new BorderLayoutData(LayoutRegion.CENTER));
        //}

        RootLayoutPanel.get().clear();
        RootLayoutPanel.get().add(view);
    }

    public void onValueChange(ValueChangeEvent<String> event) {
    }

    public SrvAuxiliarAsync getSrvAuxiliar() {
        return srvAuxiliar;
    }

    public SrvClienteAsync getSrvCliente() {
        return srvCliente;
    }

    public SrvConfiguracaoAsync getSrvConfiguracao() {
        return srvConfiguracao;
    }

    public SrvFornecedorAsync getSrvFornecedor() {
        return srvFornecedor;
    }

    public SrvFuncionarioAsync getSrvFuncionario() {
        return srvFuncionario;
    }

    public SrvMaterialAsync getSrvMaterial() {
        return srvMaterial;
    }

    public SrvVeiculoAsync getSrvVeiculo() {
        return srvVeiculo;
    }

    public SrvDevAsync getSrvDev() {
        return srvDev;
    }

    public Conteudo getPainel(String id) {
        Conteudo c = paineis.get(id);
        if (c == null) {
            if (id.equals(JAutoInvoiceApp.PAINEL_OBRAS)) {
                //c = new PainelFolhasObra();
            } else if (id.equals(JAutoInvoiceApp.PAINEL_FACTURAS)) {
                //c = new PainelFacturas();
            } else if (id.equals(JAutoInvoiceApp.PAINEL_MARCACOES)) {
                //c = new PainelMarcacoes();
            } else if (id.equals(JAutoInvoiceApp.PAINEL_VEICULOS)) {
                c = new PainelVeiculos();
            } else if (id.equals(JAutoInvoiceApp.PAINEL_CLIENTES)) {
                c = new PainelClientes();
            } else if (id.equals(JAutoInvoiceApp.PAINEL_MATERIAL)) {
                c = new PainelMaterial();
            } else if (id.equals(JAutoInvoiceApp.PAINEL_ESTATISTICAS)) {
                //c = new PainelEstatisticas();
            } else if (id.equals(JAutoInvoiceApp.PAINEL_RELATORIOS)) {
                //c = new PainelRelatorios();
            } else if (id.equals(JAutoInvoiceApp.PAINEL_FUNCIONARIOS)) {
                c = new PainelFuncionarios();
            } else if (id.equals(JAutoInvoiceApp.PAINEL_OPCOES)) {
                //c = new PainelOpcoes();
            } else if (id.equals(JAutoInvoiceApp.PAINEL_FORNECEDORES)) {
                c = new PainelFornecedores();
            }
            paineis.put(id, c);
        }

        return c;
    }

    public Icones getIcones() {
        return icons;
    }
}
//TODO: completar