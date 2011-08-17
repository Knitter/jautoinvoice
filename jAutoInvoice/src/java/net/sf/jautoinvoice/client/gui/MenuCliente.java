/*
 * MenuCliente.java
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
import com.google.gwt.user.client.rpc.AsyncCallback;
import com.google.gwt.user.client.ui.AbstractImagePrototype;
import com.google.gwt.user.client.ui.Widget;
import java.util.ArrayList;
import net.sf.jautoinvoice.client.JAutoInvoiceApp;

/**
 * @author sergiolopes
 */
public final class MenuCliente extends Conteudo {

    private ButtonBar barraFerramentas;
    //private SrvClienteAsync srvCliente = (SrvClienteAsync) GWT.create(SrvCliente.class);

    public MenuCliente() {
        super();
        init();
    }

    @Override
    public void init() {
        ButtonGroup grupo;
        Button botao;

        barraFerramentas = new ButtonBar();

        grupo = new ButtonGroup(5);
        grupo.setHeading("");

        botao = new Button("Facturas", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x32DocumentPrepare()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                //TODO: implementar
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
                //TODO: implementar
            }
        });
        grupo.add(botao);

        botao = new Button("Veículos", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x32Car()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                //TODO: implementar
            }
        });
        grupo.add(botao);

        //TODO: configurar
        botao = new Button("Perfil", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x32Cog()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent event) {
                //TODO: implementar
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
                //TODO:
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