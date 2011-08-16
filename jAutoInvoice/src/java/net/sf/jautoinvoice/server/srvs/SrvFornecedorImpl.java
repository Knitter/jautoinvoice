/*
 * SrvFornecedorImpl.java
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
import net.sf.jautoinvoice.client.dto.DTOFornecedor;
import net.sf.jautoinvoice.client.dto.DTOMaterial;
import net.sf.jautoinvoice.client.srvs.SrvFornecedor;
import net.sf.jautoinvoice.server.JAutoInvoiceManager;

/**
 * Implementação do serviço de gestão de fornecedores.
 * 
 * @see SrvFornecedor
 * @since 1.0
 */
public class SrvFornecedorImpl extends RemoteServiceServlet implements SrvFornecedor {

    private JAutoInvoiceManager gestor;

    public SrvFornecedorImpl() {
        super();
        gestor = new JAutoInvoiceManager();
    }

    public void adicionarFornecedor(DTOFornecedor novo) {
        gestor.adicionarFornecedor(novo);
    }

    public ArrayList<DTOFornecedor> listarTodosFornecedores() {
        return gestor.listarTodosFornecedores();
    }

    public ArrayList<DTOMaterial> materiaisDeFornecedor(DTOFornecedor fornecedor) {
        return gestor.listarMateriaisDeFornecedor(fornecedor);
    }

    public void removerFornecedores(ArrayList<DTOFornecedor> fornecedores) {
        gestor.removerFornecedores(fornecedores);
    }
}
