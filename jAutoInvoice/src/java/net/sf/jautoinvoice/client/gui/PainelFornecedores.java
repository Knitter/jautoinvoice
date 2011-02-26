/*
 * PainelFornecedores.java
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
import com.extjs.gxt.ui.client.widget.layout.BorderLayout;
import com.extjs.gxt.ui.client.widget.layout.BorderLayoutData;

/**
 * Painel que agrupa os conteúdos necessários à gestão de fornecedores, onde se 
 * incluem a lista de fornecedores e a zona central de adição/edição.
 * 
 * @since 1.0
 */
public final class PainelFornecedores extends Conteudo {

    public PainelFornecedores() {
        super();
        init();
    }

    @Override
    public void init() {
        LayoutContainer container = new LayoutContainer(new BorderLayout());
        //container.add(new ArvoreClientes(), new BorderLayoutData(LayoutRegion.WEST));
        container.add(new CentralFornecedores(), new BorderLayoutData(LayoutRegion.CENTER));

        initComponent(container);
    }
}
//TODO: completar