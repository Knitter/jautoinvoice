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

import com.extjs.gxt.ui.client.Style;
import com.extjs.gxt.ui.client.widget.button.Button;
import com.extjs.gxt.ui.client.widget.button.ButtonBar;
import com.extjs.gxt.ui.client.widget.button.ButtonGroup;
import com.google.gwt.core.client.GWT;
import com.google.gwt.user.client.ui.AbstractImagePrototype;
import net.sf.jautoinvoice.client.gui.icons.Icones;

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
        ButtonGroup grupo;
        Button botao;

        //TODO: mover para registry...
        Icones icons = GWT.create(Icones.class);

        ButtonBar barraFerramentas = new ButtonBar();
        //barraFerramentas.setAlignment(Style.HorizontalAlignment.CENTER);

        //folhas obra, facturas, e marcações
        grupo = new ButtonGroup(3);
        grupo.setHeading("Obras e Facturação");
        botao = new Button("Folhas Obra", AbstractImagePrototype.create(icons.x32WrenchOrange()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        grupo.add(botao);

        botao = new Button("Facturas", AbstractImagePrototype.create(icons.x32DocumentPrepare()));
        grupo.add(botao);
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);

        botao = new Button("Marcações", AbstractImagePrototype.create(icons.x32Calendar()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        grupo.add(botao);
        barraFerramentas.add(grupo);

        //veículos, clientes e materaial
        grupo = new ButtonGroup(3);
        grupo.setHeading("Dados de Apoio");
        botao = new Button("Veículos", AbstractImagePrototype.create(icons.x32Car()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        grupo.add(botao);

        botao = new Button("Clientes", AbstractImagePrototype.create(icons.x32Vcard()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        grupo.add(botao);

        botao = new Button("Material", AbstractImagePrototype.create(icons.x32Brick()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        grupo.add(botao);
        barraFerramentas.add(grupo);

        //estatísticas e relatórios
        grupo = new ButtonGroup(2);
        grupo.setHeading("Ferramentas");
        botao = new Button("Estatísticas", AbstractImagePrototype.create(icons.x32ChartPie()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        grupo.add(botao);

        botao = new Button("Relatórios", AbstractImagePrototype.create(icons.x32Report()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        grupo.add(botao);
        barraFerramentas.add(grupo);

        //empregados, configurações e logout
        grupo = new ButtonGroup(3);
        grupo.setHeading("Sistema");
        botao = new Button("Funcionários", AbstractImagePrototype.create(icons.x32UserGreen()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        grupo.add(botao);

        botao = new Button("Opções", AbstractImagePrototype.create(icons.x32Cog()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        grupo.add(botao);

        botao = new Button("Sair", AbstractImagePrototype.create(icons.x32DoorOut()));
        botao.setScale(Style.ButtonScale.LARGE);
        botao.setIconAlign(Style.IconAlign.TOP);
        botao.setArrowAlign(Style.ButtonArrowAlign.BOTTOM);
        grupo.add(botao);
        barraFerramentas.add(grupo);

        initComponent(barraFerramentas);
    }
}
//TODO: completar