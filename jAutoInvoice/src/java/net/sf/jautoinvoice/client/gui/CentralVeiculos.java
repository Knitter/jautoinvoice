/*
 * CentralVeiculos.java
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
import com.extjs.gxt.ui.client.widget.form.DateField;
import com.extjs.gxt.ui.client.widget.form.FieldSet;
import com.extjs.gxt.ui.client.widget.form.TextArea;
import com.extjs.gxt.ui.client.widget.form.TextField;

/**
 * Zona central para gestão de veículos.
 * 
 * @since 1.0
 */
public final class CentralVeiculos extends LayoutContainer {

    public CentralVeiculos() {
        super();
        init();
    }

    private void init() {

        FieldSet fdset = new FieldSet();
        fdset.setHeading("Dados Gerais");

        //Marca marca;
        //Modelo modelo;
        //private ECategoria categoria;
        //private ECombustivel combustivel;
        //private Cliente dono;

        DateField dataRegisto = new DateField();
        dataRegisto.setFieldLabel("Data de Registo");
        fdset.add(dataRegisto);

        TextField<String> matricula = new TextField<String>();
        matricula.setFieldLabel("Matricula");
        fdset.add(matricula);

        TextField<String> nrChassis = new TextField<String>();
        nrChassis.setFieldLabel("Nr. de Chassis");
        fdset.add(nrChassis);

        TextField<String> cilindrada = new TextField<String>();
        cilindrada.setFieldLabel("Cilindrada");
        fdset.add(cilindrada);

        TextField<String> nrMotor = new TextField<String>();
        nrMotor.setFieldLabel("Nr. de Motor");
        fdset.add(nrMotor);

        TextArea notas = new TextArea();
        fdset.add(notas);

        //private ArrayList<FolhaObra> folhasObra;
        //private ArrayList<Cliente> antigosDonos;
        //private ArrayList<Inspeccao> inspeccoes;

        add(fdset);

    }
}
//TODO: completar