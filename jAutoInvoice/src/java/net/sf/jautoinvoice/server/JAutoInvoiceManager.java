/*
 * JAutoInvoiceManager.java
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
 * Esta é a classe base do sistema de gestão. Qualquer serviço delega o 
 * comportamento para esta classe e é este gestor que executa todo o código 
 * necessário.
 * 
 * Garante uma independência completa da restante aplicação, podendo facilmente 
 * ser usado para criar uma aplicação <em>Desktop</em> ou de qualquer outro 
 * formato.
 * 
 * @author Sérgio Lopes
 * @since 1.0
 */
public final class JAutoInvoiceManager {

    private Persistencia motor;

    public JAutoInvoiceManager() {
        //TODO: alterar de acordo com as configurações
        motor = new MotorDB4O();
    }

    public void adicionarCliente(DTOCliente novo) {
        motor.adicionarCliente(novo);
    }

    public ArrayList<DTOCliente> listarTodosClientes() {
        return motor.listarTodosClientes();
    }

    public void removerClientes(ArrayList<DTOCliente> clientes) {
        motor.removerClientes(clientes);
    }

    public void adicionarIVA(DTOIVA novo) {
        motor.adicionarIVA(novo);
    }

    public void removerIVA(DTOIVA apagar) {
        motor.removerIVA(apagar);
    }

    public ArrayList<DTOIVA> listarTodosIVAs() {
        return motor.listarTodosIVAs();
    }

    public void adicionarMarca(DTOMarca nova) {
        motor.adicionarMarca(nova);
    }

    public void removerMarca(DTOMarca apagar) {
        motor.removerMarca(apagar);
    }

    public ArrayList<DTOMarca> listarTodasMarcas() {
        return motor.listarTodasMarcas();
    }

    public void adicionarModelo(DTOModelo novo) {
        motor.adicionarModelo(novo);
    }

    public void removerModelo(DTOModelo apagar) {
        motor.removerModelo(apagar);
    }

    public ArrayList<DTOModelo> listarTodosModelos() {
        return motor.listarTodosModelos();
    }

    public void adicionarServico(DTOServico novo) {
        motor.adicionarServico(novo);
    }

    public void removerServico(DTOServico apagar) {
        motor.removerServico(apagar);
    }

    public ArrayList<DTOServico> listarTodosServicos() {
        return motor.listarTodosServicos();
    }

    public void adicionarFornecedor(DTOFornecedor novo) {
        motor.adicionarFornecedor(novo);
    }

    public ArrayList<DTOFornecedor> listarTodosFornecedores() {
        return motor.listarTodosFornecedores();
    }

    public void removerFornecedores(ArrayList<DTOFornecedor> fornecedores) {
        motor.removerFornecedores(fornecedores);
    }

    public ArrayList<DTOMaterial> listarMateriaisDeFornecedor(final DTOFornecedor fornecedor) {
        return motor.listarMateriaisDeFornecedor(fornecedor);
    }

    public void adicionarFuncionario(DTOFuncionario novo) {
        motor.adicionarFuncionario(novo);
    }

    public ArrayList<DTOFuncionario> listarTodosFuncionarios() {
        return motor.listarTodosFuncionarios();
    }

    public void removerFuncionarios(ArrayList<DTOFuncionario> funcionarios) {
        motor.removerFuncionarios(funcionarios);
    }

    public ArrayList<DTOVeiculo> veiculosInspeccionadosPeloFuncionario(DTOFuncionario funcionario) {
        return motor.veiculosInspeccionadosPeloFuncionario(funcionario);
    }

    public ArrayList<DTOFolhaObra> obrasDoFuncionario(DTOFuncionario funcionario) {
        return motor.obrasDoFuncionario(funcionario);
    }

    public void adicionarMaterial(DTOMaterial novo) {
        motor.adicionarMaterial(novo);
    }

    public void removerMaterial(DTOMaterial apagar) {
        motor.removerMaterial(apagar);
    }

    public ArrayList<DTOMaterial> listarTodosMateriais() {
        return motor.listarTodosMateriais();
    }

    public void adicionarVeiculo(DTOVeiculo novo) {
        motor.adicionarVeiculo(novo);
    }

    public void removerVeiculo(DTOVeiculo apagar) {
        motor.removerVeiculo(apagar);
    }

    public ArrayList<DTOVeiculo> listarTodosVeiculos() {
        return motor.listarTodosVeiculos();
    }

    public ArrayList<DTOFolhaObra> listarFolhasObraVeiculo(final DTOVeiculo veiculo) {
        return motor.listarFolhasObraVeiculo(veiculo);
    }

    public void adicionarInspeccao(DTOInspeccao nova) {
        motor.adicionarInspeccao(nova);
    }

    public void removerInspeccao(DTOInspeccao apagar) {
        motor.removerInspeccao(apagar);
    }

    public ArrayList<DTOInspeccao> listarInspeccoesVeiculo(final DTOVeiculo veiculo) {
        return motor.listarInspeccoesVeiculo(veiculo);
    }

    public ArrayList<DTOVeiculo> listarVeiculosInspeccianadosPor(final DTOFuncionario funcionario) {
        return motor.listarVeiculosInspeccianadosPor(funcionario);
    }

    public boolean autenticar(String nome, String password) {
        return true;
    }

    public boolean autenticado() {
        return true;
    }

    public boolean permissoesFuncionario() {
        return true;
    }

    public boolean permissoesAdministracao() {
        return true;
    }

    public boolean permissoesCliente() {
        return true;
    }
}
//TODO: completar