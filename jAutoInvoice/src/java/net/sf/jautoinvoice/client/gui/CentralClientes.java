/*
 * CentralClientes.java
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

import com.extjs.gxt.ui.client.widget.LayoutContainer;
import com.extjs.gxt.ui.client.widget.form.FieldSet;
import com.extjs.gxt.ui.client.widget.form.TextField;
import com.extjs.gxt.ui.client.widget.layout.FormLayout;

/**
 * Zona central para gestão de clientes.
 * 
 * @since 1.0
 */
public final class CentralClientes extends LayoutContainer {

    public CentralClientes() {
        super();
        init();
    }

    private void init() {
        FieldSet fdset = new FieldSet();
        fdset.setHeading("Dados Gerais");

        FormLayout layout = new FormLayout();
        layout.setLabelWidth(75);
        fdset.setLayout(layout);

        TextField<String> codigo = new TextField<String>();
        codigo.setFieldLabel("Código");
        codigo.setEnabled(false);
        fdset.add(codigo);

        TextField<String> nome = new TextField<String>();
        nome.setFieldLabel("Nome");
        fdset.add(nome);

        TextField<String> email = new TextField<String>();
        email.setFieldLabel("E-mail");
        fdset.add(email);

        TextField<String> endereco = new TextField<String>();
        endereco.setFieldLabel("Endereço");
        fdset.add(endereco);

        add(fdset);
        //private ArrayList<String> contactos;
        //private ArrayList<Veiculo> veiculos;
    }
}
//TODO: completar