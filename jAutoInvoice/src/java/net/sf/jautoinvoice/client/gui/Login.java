/*
 * Login.java
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

import com.extjs.gxt.ui.client.Style.HorizontalAlignment;
import com.extjs.gxt.ui.client.event.ButtonEvent;
import com.extjs.gxt.ui.client.event.SelectionListener;
import com.extjs.gxt.ui.client.util.Padding;
import com.extjs.gxt.ui.client.widget.Html;
import com.extjs.gxt.ui.client.widget.LayoutContainer;
import com.extjs.gxt.ui.client.widget.Window;
import com.extjs.gxt.ui.client.widget.button.Button;
import com.extjs.gxt.ui.client.widget.button.ButtonBar;
import com.extjs.gxt.ui.client.widget.form.FormPanel;
import com.extjs.gxt.ui.client.widget.form.TextField;
import com.extjs.gxt.ui.client.widget.layout.CenterLayout;
import com.extjs.gxt.ui.client.widget.layout.VBoxLayout;
import com.google.gwt.user.client.rpc.AsyncCallback;
import com.google.gwt.user.client.ui.AbstractImagePrototype;
import com.google.gwt.user.client.ui.Widget;
import net.sf.jautoinvoice.client.JAutoInvoiceApp;
import net.sf.jautoinvoice.server.model.Utilizador;

/**
 * Janela de login.
 * 
 * @author Sérgio Lopes
 * @since 1.0
 */
public final class Login extends Conteudo {

    private LayoutContainer root;
    private Window mensagem;

    public Login() {
        super();
        init();
    }

    @Override
    public void init() {
        root = new LayoutContainer();

        VBoxLayout vbox = new VBoxLayout(VBoxLayout.VBoxLayoutAlign.CENTER);
        vbox.setPadding(new Padding(100, 0, 0, 0));
        root.setLayout(vbox);

        FormPanel formulario = new FormPanel();
        formulario.setHeading("Autenticação");
        formulario.setSize(350, 120);

        final TextField<String> username = new TextField<String>();
        username.setFieldLabel("Username");
        formulario.add(username);

        final TextField<String> password = new TextField<String>();
        password.setFieldLabel("Password");
        password.setPassword(true);
        formulario.add(password);

        //definir janela de mensagem de erro
        mensagem = new Window();
        mensagem.add(new Html("Username ou password inválidos."));
        mensagem.setModal(true);

        Button botao = new Button("Entrar", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x16ArrowRight()),
                new SelectionListener<ButtonEvent>() {

                    @Override
                    public void componentSelected(ButtonEvent ce) {

                        if (!username.getValue().isEmpty() && !password.getValue().isEmpty()) {
                            JAutoInvoiceApp.getInstance().getSrvAutorizacao().autenticar(username.getValue(),
                                    password.getValue(), new AsyncCallback<Utilizador>() {

                                public void onFailure(Throwable caught) {
                                    //TODO:...
                                }

                                public void onSuccess(Utilizador result) {
                                    if (result != null) {
                                        //JAutoInvoiceApp.getInstance().setUtilizadorAutenticado(result);
                                        //JAutoInvoiceApp.getInstance().doLayout();
                                    } else {
                                        mensagem.show();
                                    }
                                }
                            });
                        }
                    }
                });
        ButtonBar barra = new ButtonBar();
        barra.add(botao);
        barra.setAlignment(HorizontalAlignment.RIGHT);
        formulario.add(barra);

        root.add(formulario);
        initComponent(root);
    }

    @Override
    public Widget getContainer() {
        return root;
    }
}
//TODO: completar
