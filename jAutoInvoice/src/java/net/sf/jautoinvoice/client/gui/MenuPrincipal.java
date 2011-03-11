/*
 * MenuPrincipal.java
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
package net.sf.jautoinvoice.client.gui;

import com.extjs.gxt.ui.client.Style;
import com.extjs.gxt.ui.client.event.ButtonEvent;
import com.extjs.gxt.ui.client.event.SelectionListener;
import com.extjs.gxt.ui.client.widget.button.Button;
import com.extjs.gxt.ui.client.widget.button.ButtonBar;
import com.extjs.gxt.ui.client.widget.button.ButtonGroup;
import com.google.gwt.core.client.GWT;
import com.google.gwt.user.client.ui.AbstractImagePrototype;
import com.google.gwt.user.client.ui.Widget;
import net.sf.jautoinvoice.client.JAutoInvoiceApp;
import net.sf.jautoinvoice.client.srvs.SrvCliente;
import net.sf.jautoinvoice.client.srvs.SrvClienteAsync;

/**
 * Conteúdo que representa o menu principal da aplicação, através do qual o 
 * utilizador pode aceder a todos as janelas base da aplicação.
 * 
 * @author sergiolopes
 */
public final class MenuPrincipal extends Conteudo {

    private ButtonBar barraFerramentas;
    private SrvClienteAsync srvCliente = (SrvClienteAsync) GWT.create(SrvCliente.class);

    public MenuPrincipal() {
        super();
        init();
    }

    @Override
    public void init() {
        ButtonGroup grupo;
        Button botao;

        barraFerramentas = new ButtonBar();
        //barraFerramentas.setAlignment(Style.HorizontalAlignment.CENTER);

        //folhas obra, facturas, e marcações
        grupo = new ButtonGroup(3);
        grupo.setHeading("Obras e Facturação");
        botao = new Button("Folhas Obra", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x32WrenchOrange()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                JAutoInvoiceApp.getInstance().setConteudo(
                        JAutoInvoiceApp.getInstance().getPainel(JAutoInvoiceApp.PAINEL_OBRAS));
            }
        });
        grupo.add(botao);

        botao = new Button("Facturas", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x32DocumentPrepare()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                JAutoInvoiceApp.getInstance().setConteudo(
                        JAutoInvoiceApp.getInstance().getPainel(JAutoInvoiceApp.PAINEL_FACTURAS));
            }
        });
        grupo.add(botao);

        botao = new Button("Marcações", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x32Calendar()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                JAutoInvoiceApp.getInstance().setConteudo(
                        JAutoInvoiceApp.getInstance().getPainel(JAutoInvoiceApp.PAINEL_MARCACOES));
            }
        });
        grupo.add(botao);
        barraFerramentas.add(grupo);

        //veículos, clientes, materaial e fornecedores
        grupo = new ButtonGroup(4);
        grupo.setHeading("Dados de Apoio");
        botao = new Button("Veículos", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x32Car()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                JAutoInvoiceApp.getInstance().setConteudo(
                        JAutoInvoiceApp.getInstance().getPainel(JAutoInvoiceApp.PAINEL_VEICULOS));
            }
        });
        grupo.add(botao);

        botao = new Button("Clientes", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x32Vcard()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                JAutoInvoiceApp.getInstance().setConteudo(
                        JAutoInvoiceApp.getInstance().getPainel(JAutoInvoiceApp.PAINEL_CLIENTES));
            }
        });
        grupo.add(botao);

        botao = new Button("Material", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x32Brick()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                JAutoInvoiceApp.getInstance().setConteudo(
                        JAutoInvoiceApp.getInstance().getPainel(JAutoInvoiceApp.PAINEL_MATERIAL));
            }
        });
        grupo.add(botao);
        
        botao = new Button("Fornecedores");
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                JAutoInvoiceApp.getInstance().setConteudo(
                        JAutoInvoiceApp.getInstance().getPainel(JAutoInvoiceApp.PAINEL_FORNECEDORES));
            }
        });
        grupo.add(botao);       
        barraFerramentas.add(grupo);

        //estatísticas e relatórios
        grupo = new ButtonGroup(2);
        grupo.setHeading("Ferramentas");
        botao = new Button("Estatísticas", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x32ChartPie()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                JAutoInvoiceApp.getInstance().setConteudo(
                        JAutoInvoiceApp.getInstance().getPainel(JAutoInvoiceApp.PAINEL_ESTATISTICAS));
            }
        });
        grupo.add(botao);

        botao = new Button("Relatórios", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x32Report()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                JAutoInvoiceApp.getInstance().setConteudo(
                        JAutoInvoiceApp.getInstance().getPainel(JAutoInvoiceApp.PAINEL_RELATORIOS));
            }
        });
        grupo.add(botao);
        barraFerramentas.add(grupo);

        //empregados, configurações e logout
        grupo = new ButtonGroup(3);
        grupo.setHeading("Sistema");
        botao = new Button("Funcionários", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x32UserGreen()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                JAutoInvoiceApp.getInstance().setConteudo(
                        JAutoInvoiceApp.getInstance().getPainel(JAutoInvoiceApp.PAINEL_FUNCIONARIOS));
            }
        });
        grupo.add(botao);

        botao = new Button("Opções", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x32Cog()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                JAutoInvoiceApp.getInstance().setConteudo(
                        JAutoInvoiceApp.getInstance().getPainel(JAutoInvoiceApp.PAINEL_OPCOES));
            }
        });
        grupo.add(botao);

        botao = new Button("Sair", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x32DoorOut()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                //TODO: implementar logout
            }
        });
        grupo.add(botao);
        barraFerramentas.add(grupo);

        initComponent(barraFerramentas);
    }

    @Override
    public Widget getContainer() {
        return barraFerramentas;
    }
}
//TODO: completar