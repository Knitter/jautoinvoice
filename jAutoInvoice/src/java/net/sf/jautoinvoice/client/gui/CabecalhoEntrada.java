/*
 * CabecalhoEntrada.java
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
import com.extjs.gxt.ui.client.Style.LayoutRegion;
import com.extjs.gxt.ui.client.event.ButtonEvent;
import com.extjs.gxt.ui.client.event.SelectionListener;
import com.extjs.gxt.ui.client.util.Padding;
import com.extjs.gxt.ui.client.widget.LayoutContainer;
import com.extjs.gxt.ui.client.widget.button.Button;
import com.extjs.gxt.ui.client.widget.layout.BorderLayout;
import com.extjs.gxt.ui.client.widget.layout.BorderLayoutData;
import com.extjs.gxt.ui.client.widget.layout.BoxLayout.BoxLayoutPack;
import com.extjs.gxt.ui.client.widget.layout.HBoxLayout;
import com.google.gwt.user.client.rpc.AsyncCallback;
import com.google.gwt.user.client.ui.AbstractImagePrototype;
import com.google.gwt.user.client.ui.Image;
import com.google.gwt.user.client.ui.Widget;
import net.sf.jautoinvoice.client.JAutoInvoiceApp;

/**
 * @since 1.0
 */
public final class CabecalhoEntrada extends Conteudo {

    private LayoutContainer root;

    public CabecalhoEntrada() {
        super();
        init();
    }

    @Override
    public void init() {
        root = new LayoutContainer(new BorderLayout());
        root.add(new Image(JAutoInvoiceApp.getInstance().getIcones().banner()), new BorderLayoutData(LayoutRegion.WEST, 355));

        HBoxLayout hbox = new HBoxLayout();
        hbox.setPack(BoxLayoutPack.END);
        hbox.setPadding(new Padding(2, 2, 0, 0));

        LayoutContainer painelAjuda = new LayoutContainer(hbox);
        Button ajuda = new Button("", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x32Help()),
                new SelectionListener<ButtonEvent>() {

                    @Override
                    public void componentSelected(ButtonEvent ce) {
                    }
                });

        ajuda.setScale(Style.ButtonScale.LARGE);
        ajuda.setIconAlign(Style.IconAlign.TOP);
        ajuda.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        painelAjuda.add(ajuda);

        //TODO: remover...
        Button botao = new Button("Dev");
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                JAutoInvoiceApp.getInstance().getSrvDev().criarDadosTeste(new AsyncCallback<Void>() {

                    public void onFailure(Throwable caught) {
                        //ignorar
                    }

                    public void onSuccess(Void result) {
                        //ignorar
                    }
                });
            }
        });
        painelAjuda.add(botao);
        //TODO: remover....
        botao = new Button("Entrar");
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                JAutoInvoiceApp.getInstance().setConteudo(new PainelClientes());
            }
        });
        painelAjuda.add(botao);

        root.add(painelAjuda, new BorderLayoutData(LayoutRegion.CENTER));
        initComponent(root);
    }

    @Override
    public Widget getContainer() {
        return root;
    }
}
//TODO: completar