/*
 * Cabecalho.java
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

import com.extjs.gxt.ui.client.Style.LayoutRegion;
import com.extjs.gxt.ui.client.widget.LayoutContainer;
import com.extjs.gxt.ui.client.widget.VerticalPanel;
import com.extjs.gxt.ui.client.widget.layout.BorderLayout;
import com.extjs.gxt.ui.client.widget.layout.BorderLayoutData;
import com.extjs.gxt.ui.client.widget.layout.FlowLayout;
import com.google.gwt.user.client.ui.Image;
import com.google.gwt.user.client.ui.Widget;
import net.sf.jautoinvoice.client.JAutoInvoiceApp;

/**
 * Zona do cabeçalho onde se incluem o menu principal e o logótipo da aplicação.
 * 
 * @since 1.0
 */

public final class Cabecalho extends Conteudo {

    private LayoutContainer root;
    //private VerticalPanel root;
    
    public Cabecalho() {
        super();
        init();
    }

    @Override
    public void init() {
        root = new LayoutContainer(new BorderLayout());
        root.add(new Image(JAutoInvoiceApp.getInstance().getIcones().banner()), new BorderLayoutData(LayoutRegion.WEST, 355));
        root.add(new MenuPrincipal(), new BorderLayoutData(LayoutRegion.CENTER));
        
        initComponent(root);
    }

    @Override
    public Widget getContainer() {
        return root;
    }
}
//TODO: completar