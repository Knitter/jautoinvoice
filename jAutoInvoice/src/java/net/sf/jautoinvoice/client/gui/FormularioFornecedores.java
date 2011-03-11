/*
 * FormularioFornecedores.java
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
import com.extjs.gxt.ui.client.widget.form.TextArea;
import com.extjs.gxt.ui.client.widget.form.TextField;

/**
 * Zona central para gestão de fornecedores.
 * 
 * @since 1.0
 */
public final class FormularioFornecedores extends LayoutContainer {

    public FormularioFornecedores() {
        super();
        init();
    }

    private void init() {

        FieldSet fdset = new FieldSet();
        fdset.setHeading("Dados Gerais");

        TextField<String> nome = new TextField<String>();
        nome.setFieldLabel("Nome");
        fdset.add(nome);

        TextField<String> email = new TextField<String>();
        email.setFieldLabel("E-mail");
        fdset.add(email);

        TextField<String> telefone = new TextField<String>();
        telefone.setFieldLabel("Telefone");
        fdset.add(telefone);

        TextField<String> fax = new TextField<String>();
        fax.setFieldLabel("FAX");
        fdset.add(fax);

        TextArea notas = new TextArea();
        notas.setFieldLabel("Notas");
        fdset.add(notas);

        add(fdset);

    }
}
//TODO: completar