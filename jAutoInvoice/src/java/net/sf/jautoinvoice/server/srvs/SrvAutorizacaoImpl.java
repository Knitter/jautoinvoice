/*
 * SrvAutorizacaoImpl.java
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
package net.sf.jautoinvoice.server.srvs;

import com.google.gwt.user.server.rpc.RemoteServiceServlet;
import javax.servlet.http.HttpSession;
import net.sf.jautoinvoice.server.model.Utilizador;
import net.sf.jautoinvoice.client.srvs.SrvAutorizacao;
import net.sf.jautoinvoice.server.JAutoInvoiceManager;

/**
 * 
 * @since 1.0
 */
public final class SrvAutorizacaoImpl extends RemoteServiceServlet implements SrvAutorizacao {

    private JAutoInvoiceManager gestor;

    public SrvAutorizacaoImpl() {
        super();
        gestor = new JAutoInvoiceManager();
    }

    public Utilizador autenticar(String username, String password) {
        HttpSession session = getThreadLocalRequest().getSession();

        Utilizador autenticado = (Utilizador) session.getAttribute("utilizador");
        if (autenticado == null) {
            autenticado = gestor.autenticar(username, password);
            if (autenticado != null) {
                session.setAttribute("utilizador", autenticado);
            }
        }

        return autenticado;
    }

    public void sair() {
        HttpSession session = getThreadLocalRequest().getSession();

        Utilizador autenticado = (Utilizador) session.getAttribute("utilizador");
        if (autenticado != null) {
            session.removeAttribute("utilizador");
        }
    }

    public boolean autorizado(String area) {
        HttpSession session = getThreadLocalRequest().getSession();
        Utilizador autenticado = (Utilizador) session.getAttribute("utilizador");

        if (autenticado == null) {
            return false;
        }

        if (area.equals("*")) {
            return true;
        }

        return gestor.autorizado(autenticado, area);
    }
}
//TODO: completar
