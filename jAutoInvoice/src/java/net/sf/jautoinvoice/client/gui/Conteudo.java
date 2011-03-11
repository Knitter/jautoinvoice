/*
 * Conteudo.java
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

import com.extjs.gxt.ui.client.widget.Composite;
import com.extjs.gxt.ui.client.widget.LayoutContainer;
import com.google.gwt.user.client.ui.Widget;

/**
 * Classe abstracta que representa um conteúdo. Um conteúdo pode ser qualquer 
 * coisa mas só será usado pelo GestorLayout ou por outros conteúdos. A ligação
 * com a API do GXT é, tipicamente, feita através de LayoutContainer.
 * 
 * @see LayoutContainer
 * @see GestorLayout
 * @since 1.0
 */
public abstract class Conteudo extends Composite {

    /**
     * Todas as classes devem implementar este método, no qual serão criados os 
     * componentes necessários à representação do conteúdo.
     * 
     * Para que este conteúdo seja apresentado é necessário invocar o método
     * <em>initComponent</em> de modo a ligar o conteúdo com o GXT.
     */
    public abstract void init();

    /**
     * Devolve o widget base usado para fazer a representação gráfica do 
     * conteúdo.
     * 
     * @return Widget base usada pelo conteúdo.
     */
    public abstract Widget getContainer();
}
