/*
 * CentralFuncionarios.java
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
import com.extjs.gxt.ui.client.widget.form.NumberField;
import com.extjs.gxt.ui.client.widget.form.TextField;

/**
 * Zona central para gestão de funcionários.
 * 
 * @since 1.0
 */
public final class CentralFuncionarios extends LayoutContainer {

    public CentralFuncionarios() {
        super();
        init();
    }

    private void init() {

        FieldSet fdset = new FieldSet();
        fdset.setHeading("Dados de Funcionário");

        TextField<String> nome = new TextField<String>();
        nome.setFieldLabel("Nome");
        fdset.add(nome);

        TextField<String> contribuinte = new TextField<String>();
        contribuinte.setFieldLabel("Contribuinte");
        fdset.add(contribuinte);

        NumberField valorHora = new NumberField();
        valorHora.setPropertyEditorType(Double.class);
        valorHora.setFieldLabel("Valor Hora");
        fdset.add(valorHora);

        add(fdset);
    }
}
//TODO: completar