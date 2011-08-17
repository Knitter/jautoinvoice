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
import net.sf.jautoinvoice.client.dto.DTOCliente;
import net.sf.jautoinvoice.client.dto.DTOFolhaObra;
import net.sf.jautoinvoice.client.dto.DTOFornecedor;
import net.sf.jautoinvoice.client.dto.DTOFuncionario;
import net.sf.jautoinvoice.client.dto.DTOIVA;
import net.sf.jautoinvoice.client.dto.DTOInspeccao;
import net.sf.jautoinvoice.client.dto.DTOMarca;
import net.sf.jautoinvoice.client.dto.DTOMaterial;
import net.sf.jautoinvoice.client.dto.DTOModelo;
import net.sf.jautoinvoice.client.dto.DTOServico;
import net.sf.jautoinvoice.client.dto.DTOVeiculo;

/**
 * 
 * @author Sérgio Lopes
 * @since 1.0
 */
public interface Persistencia {

    public void adicionarCliente(DTOCliente novo);

    public ArrayList<DTOCliente> listarTodosClientes();

    public void removerClientes(ArrayList<DTOCliente> clientes);

    public void adicionarIVA(DTOIVA novo);

    public void removerIVA(DTOIVA apagar);

    public ArrayList<DTOIVA> listarTodosIVAs();

    public void adicionarMarca(DTOMarca nova);

    public void removerMarca(DTOMarca apagar);

    public ArrayList<DTOMarca> listarTodasMarcas();

    public void adicionarModelo(DTOModelo novo);

    public void removerModelo(DTOModelo apagar);

    public ArrayList<DTOModelo> listarTodosModelos();

    public void adicionarServico(DTOServico novo);

    public void removerServico(DTOServico apagar);

    public ArrayList<DTOServico> listarTodosServicos();

    public void adicionarFornecedor(DTOFornecedor novo);

    public ArrayList<DTOFornecedor> listarTodosFornecedores();

    public void removerFornecedores(ArrayList<DTOFornecedor> fornecedores);

    public ArrayList<DTOMaterial> listarMateriaisDeFornecedor(final DTOFornecedor fornecedor);

    public void adicionarFuncionario(DTOFuncionario novo);

    public ArrayList<DTOFuncionario> listarTodosFuncionarios();

    public void removerFuncionarios(ArrayList<DTOFuncionario> funcionarios);

    public ArrayList<DTOVeiculo> veiculosInspeccionadosPeloFuncionario(DTOFuncionario funcionario);

    public ArrayList<DTOFolhaObra> obrasDoFuncionario(DTOFuncionario funcionario);

    public void adicionarMaterial(DTOMaterial novo);

    public void removerMaterial(DTOMaterial apagar);

    public ArrayList<DTOMaterial> listarTodosMateriais();

    public void adicionarVeiculo(DTOVeiculo novo);

    public void removerVeiculo(DTOVeiculo apagar);

    public ArrayList<DTOVeiculo> listarTodosVeiculos();

    public ArrayList<DTOFolhaObra> listarFolhasObraVeiculo(final DTOVeiculo veiculo);

    public void adicionarInspeccao(DTOInspeccao nova);

    public void removerInspeccao(DTOInspeccao apagar);

    public ArrayList<DTOInspeccao> listarInspeccoesVeiculo(final DTOVeiculo veiculo);

    public ArrayList<DTOVeiculo> listarVeiculosInspeccianadosPor(final DTOFuncionario funcionario);

}
