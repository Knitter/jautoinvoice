/*
 * SrvFornecedor.java
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
package net.sf.jautoinvoice.client.srvs;

import com.google.gwt.user.client.rpc.RemoteService;
import com.google.gwt.user.client.rpc.RemoteServiceRelativePath;
import java.util.ArrayList;
import net.sf.jautoinvoice.client.model.Fornecedor;
import net.sf.jautoinvoice.client.model.Material;

/**
 * Serviço de gestão de fornecedores.
 * 
 * @since 1.0
 */
@RemoteServiceRelativePath("fornecedor")
public interface SrvFornecedor extends RemoteService {

    /**
     * Permite a adição de um novo fornecedor ao sistema.
     * 
     * @param novo Fornecedor a adicionar.
     * @since 1.0
     */
    public void adicionarFornecedor(Fornecedor novo);

    /**
     * Remove um fornecedor do sistema.
     * 
     * @param apagar Fornecedor a remover.
     * @since 1.0
     */
    public void removerFornecedor(Fornecedor apagar);

    /**
     * Lista todos os fornecedores do sistema que se encontrem activos.
     * 
     * @return ArrayList<Fornecedor> com todos os fornecedores encontrados.
     * @since 1.0
     */
    public ArrayList<Fornecedor> listarTodosFornecedores();

    /**
     * Lista todos os materiais que são adquiridos a determinado fornecedor.
     * 
     * @param fornecedor Fornecedor a pesquisar.
     * @return ArrayList<Material> lista com todos os materiais encontrados.
     * @since 1.0
     */
    public ArrayList<Material> materiaisDeFornecedor(Fornecedor fornecedor);
}
