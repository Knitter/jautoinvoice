/*
 * SrvFuncionario.java
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
import net.sf.jautoinvoice.client.model.FolhaObra;
import net.sf.jautoinvoice.client.model.Funcionario;
import net.sf.jautoinvoice.client.model.Veiculo;

/**
 * Serviço de gestão de funcionários.
 * 
 * @since 1.0
 */
@RemoteServiceRelativePath("funcionario")
public interface SrvFuncionario extends RemoteService {

    /**
     * Permite adicionar um novo funcionário ao sistema.
     * 
     * @param novo Funcionário a adicionar.
     * @since 1.0
     */
    public void adicionarFuncionario(Funcionario novo);

    /**
     * Remove um funcionário do sistema.
     * 
     * @param apagar Funcionário que se pretende remover.
     * @since 1.0
     */
    public void removerFuncionario(Funcionario apagar);

    /**
     * Lista todos os funcionários existentes no sistema.
     * 
     * @return ArrayList<Funcionario> com todos os funcionários encontrados.
     * @since 1.0
     */
    public ArrayList<Funcionario> listarTodosFuncionarios();

    /**
     * Lista os veículos que possuem inspecções levadas a cabo por determinado
     * funcionário (inspecções periódicas a que o funcionário levou o veículo).
     * 
     * @param funcionario Funcionário a usar na pesquisa.
     * @return ArrayList<Veiculo> com os veículos encontrados.
     * @since 1.0
     */
    public ArrayList<Veiculo> inpeccionadosPeloFuncionario(Funcionario funcionario);

    /**
     * Mostra todas as folhas de obra onde determinado funcionário interviu.
     * 
     * @param funcionario Funcionário a usar na pesquisa.
     * @return ArrayList<FolhaObra> com as folhas de obra encontradas.
     * @since 1.0
     */
    public ArrayList<FolhaObra> obrasDoFuncionario(Funcionario funcionario);
}
