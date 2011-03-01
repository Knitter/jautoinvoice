/*
 * SrvClienteImpl.java
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
import java.util.ArrayList;
import net.sf.jautoinvoice.client.model.Cliente;
import net.sf.jautoinvoice.client.srvs.SrvCliente;
import net.sf.jautoinvoice.server.JAutoInvoiceManager;

/**
 * Implementação do serviço de gestão de clientes.
 * 
 * @see SrvCliente
 * @since 1.0
 */
public class SrvClienteImpl extends RemoteServiceServlet implements SrvCliente {

    private JAutoInvoiceManager gestor;

    public SrvClienteImpl() {
        super();
        gestor = new JAutoInvoiceManager();
    }

    public void adicionarCliente(Cliente novo) {
        gestor.adicionarCliente(novo);
    }

    public void removerCliente(Cliente apagar) {
        gestor.removerCliente(apagar);
    }

    public ArrayList<Cliente> listarTodos() {
        return gestor.listarTodosClientes();
    }
}