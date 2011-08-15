/*
 * Persistencia.java
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

import java.util.ArrayList;
import net.sf.jautoinvoice.client.model.Cliente;
import net.sf.jautoinvoice.client.model.FolhaObra;
import net.sf.jautoinvoice.client.model.Fornecedor;
import net.sf.jautoinvoice.client.model.Funcionario;
import net.sf.jautoinvoice.client.model.IVA;
import net.sf.jautoinvoice.client.model.Inspeccao;
import net.sf.jautoinvoice.client.model.Marca;
import net.sf.jautoinvoice.client.model.Material;
import net.sf.jautoinvoice.client.model.Modelo;
import net.sf.jautoinvoice.client.model.Servico;
import net.sf.jautoinvoice.client.model.Utilizador;
import net.sf.jautoinvoice.client.model.Veiculo;

public interface Persistencia {

    public void adicionarCliente(Cliente novo);

    public ArrayList<Cliente> listarTodosClientes();

    public boolean removerCliente(Cliente cliente);

    public void adicionarIVA(IVA novo);

    public void removerIVA(IVA apagar);

    public void adicionarMarca(Marca nova);

    public ArrayList<IVA> listarTodosIVAs();

    public void removerMarca(Marca apagar);

    public ArrayList<Marca> listarTodasMarcas();

    public void adicionarModelo(Modelo novo);

    public void removerModelo(Modelo apagar);

    public ArrayList<Modelo> listarTodosModelos();

    public void adicionarServico(Servico novo);

    public void removerServico(Servico apagar);

    public ArrayList<Servico> listarTodosServicos();

    public void adicionarFornecedor(Fornecedor novo);

    public void removerFornecedor(Fornecedor apagar);

    public ArrayList<Fornecedor> listarTodosFornecedores();
    
    public void removerFornecedores(ArrayList<Fornecedor> fornecedores);

    public ArrayList<Material> listarMateriaisDeFornecedor(final Fornecedor fornecedor);

    public void adicionarFuncionario(Funcionario novo);

    public void removerFuncionario(Funcionario apagar);

    public ArrayList<Funcionario> listarTodosFuncionarios();

    public void removerFuncionarios(ArrayList<Funcionario> funcionarios);

    public ArrayList<Veiculo> veiculosInspeccionadosPeloFuncionario(Funcionario funcionario);

    public ArrayList<FolhaObra> obrasDoFuncionario(Funcionario funcionario);

    public void adicionarMaterial(Material novo);

    public void removerMaterial(Material apagar);

    public ArrayList<Material> listarTodosMateriais();

    public void adicionarVeiculo(Veiculo novo);

    public void removerVeiculo(Veiculo apagar);

    public ArrayList<Veiculo> listarTodosVeiculos();

    public ArrayList<FolhaObra> listarFolhasObraVeiculo(final Veiculo veiculo);

    public void adicionarInspeccao(Inspeccao nova);

    public void removerInspeccao(Inspeccao apagar);

    public ArrayList<Inspeccao> listarInspeccoesVeiculo(final Veiculo veiculo);

    public ArrayList<Veiculo> listarVeiculosInspeccianadosPor(final Funcionario funcionario);

    public Utilizador autenticar(String username, String password);
}
