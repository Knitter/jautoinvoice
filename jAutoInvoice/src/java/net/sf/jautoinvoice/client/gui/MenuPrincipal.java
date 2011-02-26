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

import com.extjs.gxt.ui.client.widget.button.Button;
import com.extjs.gxt.ui.client.widget.button.ButtonBar;

/**
 * Conteúdo que representa o menu principal da aplicação, através do qual o 
 * utilizador pode aceder a todos as janelas base da aplicação.
 * 
 * @author sergiolopes
 */
public final class MenuPrincipal extends Conteudo {

    public MenuPrincipal() {
        super();
        init();
    }

    @Override
    public void init() {
        ButtonBar bar = new ButtonBar();
        bar.add(new Button("Clientes"));
        bar.add(new Button("Veiculos"));
        bar.add(new Button("Folhas Obra"));
        bar.add(new Button("Estatísticas"));

        initComponent(bar);
    }
}
//TODO: completar