/*
 * GestorLayout.java
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
package net.sf.jautoinvoice.client;

import net.sf.jautoinvoice.client.gui.Conteudo;
import com.extjs.gxt.ui.client.Style.LayoutRegion;
import com.extjs.gxt.ui.client.widget.Viewport;
import com.extjs.gxt.ui.client.widget.layout.BorderLayout;
import com.extjs.gxt.ui.client.widget.layout.BorderLayoutData;
import com.google.gwt.event.logical.shared.ValueChangeEvent;
import com.google.gwt.event.logical.shared.ValueChangeHandler;
import com.google.gwt.user.client.ui.RootLayoutPanel;
import net.sf.jautoinvoice.client.gui.Cabecalho;
import net.sf.jautoinvoice.client.gui.PainelClientes;
import net.sf.jautoinvoice.client.gui.Rodape;

/**
 * Classe que permite encapsular a criação do layout e a gestão de histórico.
 * 
 * Responsável por criar o aspecto da aplicação através da definição das áreas
 * funcionais, da criação dos elementos estáticos (cabeçalho, menu e rodapé) e 
 * da gestão do componente central activo.
 * 
 * @since 1.0
 */
public final class GestorLayout implements ValueChangeHandler<String> {

    private static GestorLayout instance;
    private Conteudo conteudo;

    private GestorLayout() {
        //DO NOTHING
    }

    public static GestorLayout getInstance() {
        if (instance == null) {
            instance = new GestorLayout();
        }

        return instance;
    }

    public void setConteudo(Conteudo conteudo) {
        this.conteudo = conteudo;
    }

    public void doLayout() {
        //TODO: remove/rewrite
        if(conteudo == null) {
            conteudo = new PainelClientes();
        }
        
        Viewport view = new Viewport();
        BorderLayout root = new BorderLayout();
        view.setLayout(root);

        view.add(new Cabecalho(), new BorderLayoutData(LayoutRegion.NORTH));
        view.add(conteudo, new BorderLayoutData(LayoutRegion.CENTER));
        view.add(new Rodape(), new BorderLayoutData(LayoutRegion.SOUTH));

        RootLayoutPanel.get().add(view);
    }

    public void onValueChange(ValueChangeEvent<String> event) {
    }
}
//TODO: completar