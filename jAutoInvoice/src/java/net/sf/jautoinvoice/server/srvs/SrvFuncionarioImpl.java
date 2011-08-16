/*
 * SrvFuncionarioImpl.java
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
import net.sf.jautoinvoice.client.dto.DTOFolhaObra;
import net.sf.jautoinvoice.client.dto.DTOFuncionario;
import net.sf.jautoinvoice.client.dto.DTOVeiculo;
import net.sf.jautoinvoice.client.srvs.SrvFuncionario;
import net.sf.jautoinvoice.server.JAutoInvoiceManager;

/**
 * Implementação do serviço de gestão de funcionários.
 * 
 * @see SrvFuncionario
 * @since 1.0
 */
public class SrvFuncionarioImpl extends RemoteServiceServlet implements SrvFuncionario {

    private JAutoInvoiceManager gestor;

    public SrvFuncionarioImpl() {
        super();
        gestor = new JAutoInvoiceManager();
    }

    public void adicionarFuncionario(DTOFuncionario novo) {
        gestor.adicionarFuncionario(novo);
    }

    public ArrayList<DTOFuncionario> listarTodosFuncionarios() {
        return gestor.listarTodosFuncionarios();
    }

    public ArrayList<DTOVeiculo> inpeccionadosPeloFuncionario(DTOFuncionario funcionario) {
        return gestor.veiculosInspeccionadosPeloFuncionario(funcionario);
    }

    public ArrayList<DTOFolhaObra> obrasDoFuncionario(DTOFuncionario funcionario) {
        return gestor.obrasDoFuncionario(funcionario);
    }
    
    public void removerFuncionarios(ArrayList<DTOFuncionario> funcionarios) {
        gestor.removerFuncionarios(funcionarios);
    }
}
