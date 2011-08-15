/*
 * ContextListener.java
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
package net.sf.jautoinvoice.server;

import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletContext;
import javax.servlet.ServletContextEvent;
import javax.servlet.ServletContextListener;

/**
 * Listener de eventos de ServletContext. Permite saber quando uma servlet é 
 * iniciada e terminada.
 * 
 * É usado para terminar a base de dados ou iniciar com o ficheiro correcto, de
 * acordo com o contexto e de forma a ser independente do servidor/container 
 * usado.
 * 
 * @see DBManager
 * @since 1.0
 */
public class ContextListener implements ServletContextListener {

    public void contextInitialized(ServletContextEvent event) {
        ServletContext sc = event.getServletContext();

        String file = sc.getRealPath("/jauto.jdb");
        if (file != null) {
            DBManager.getInstance().setPath(file);
            Logger.getLogger(ContextListener.class.getName()).log(Level.FINE, "Contexto iniciado, caminho definido.");
        }
    }

    public void contextDestroyed(ServletContextEvent event) {
        DBManager.getInstance().shutdown();
        Logger.getLogger(ContextListener.class.getName()).log(Level.FINE, "Contexto finalizado.");
    }
}
