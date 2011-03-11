/*
 * JAutoInvoiceEntryPoint.java
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

import com.google.gwt.core.client.EntryPoint;
import com.google.gwt.user.client.History;

/**
 * Ponto inicial de entrada na aplicação, como exigido pelo GWT. Esta classe é
 * responsável pela iniciação da aplicação, adição de handlers de eventos, etc.
 * 
 * @since 1.0
 */
public class JAutoInvoiceEntryPoint implements EntryPoint {

    

    public void onModuleLoad() {        
        //??
        History.addValueChangeHandler(JAutoInvoiceApp.getInstance());

        //start GUI
        JAutoInvoiceApp.getInstance().doLayout();
    }
}
//TODO: completar