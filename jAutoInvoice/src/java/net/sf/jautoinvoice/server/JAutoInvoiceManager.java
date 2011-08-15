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

    public void adicionarCliente(Cliente novo) {
        motor.adicionarCliente(novo);
    }

    public ArrayList<Cliente> listarTodosClientes() {
        return motor.listarTodosClientes();
    }

    public boolean removerCliente(Cliente cliente) {
        return motor.removerCliente(cliente);
    }

    public void adicionarIVA(IVA novo) {
        motor.adicionarIVA(novo);
    }

    public void removerIVA(IVA apagar) {
        motor.removerIVA(apagar);
    }

    public void adicionarMarca(Marca nova) {
        motor.adicionarMarca(nova);
    }

    public ArrayList<IVA> listarTodosIVAs() {
        return motor.listarTodosIVAs();
    }

    public void removerMarca(Marca apagar) {
        motor.removerMarca(apagar);
    }

    public ArrayList<Marca> listarTodasMarcas() {
        return motor.listarTodasMarcas();
    }

    public void adicionarModelo(Modelo novo) {
        motor.adicionarModelo(novo);
    }

    public void removerModelo(Modelo apagar) {
        motor.removerModelo(apagar);
    }

    public ArrayList<Modelo> listarTodosModelos() {
        return motor.listarTodosModelos();
    }

    public void adicionarServico(Servico novo) {
        motor.adicionarServico(novo);
    }

    public void removerServico(Servico apagar) {
        motor.removerServico(apagar);
    }

    public ArrayList<Servico> listarTodosServicos() {
        return motor.listarTodosServicos();
    }

    public void adicionarFornecedor(Fornecedor novo) {
        motor.adicionarFornecedor(novo);
    }

    public void removerFornecedor(Fornecedor apagar) {
        motor.removerFornecedor(apagar);
    }

    public ArrayList<Fornecedor> listarTodosFornecedores() {
        return motor.listarTodosFornecedores();
    }
    
    public void removerFornecedores(ArrayList<Fornecedor> fornecedores) {
        motor.removerFornecedores(fornecedores);
    }

    public ArrayList<Material> listarMateriaisDeFornecedor(final Fornecedor fornecedor) {
        return motor.listarMateriaisDeFornecedor(fornecedor);
    }

    public void adicionarFuncionario(Funcionario novo) {
        motor.adicionarFuncionario(novo);
    }

    public void removerFuncionario(Funcionario apagar) {
        motor.removerFuncionario(apagar);
    }

    public ArrayList<Funcionario> listarTodosFuncionarios() {
        return motor.listarTodosFuncionarios();
    }

    public void removerFuncionarios(ArrayList<Funcionario> funcionarios) {
        motor.removerFuncionarios(funcionarios);
    }

    public ArrayList<Veiculo> veiculosInspeccionadosPeloFuncionario(Funcionario funcionario) {
        return motor.veiculosInspeccionadosPeloFuncionario(funcionario);
    }

    public ArrayList<FolhaObra> obrasDoFuncionario(Funcionario funcionario) {
        return motor.obrasDoFuncionario(funcionario);
    }

    public void adicionarMaterial(Material novo) {
        motor.adicionarMaterial(novo);
    }

    public void removerMaterial(Material apagar) {
        motor.removerMaterial(apagar);
    }

    public ArrayList<Material> listarTodosMateriais() {
        return motor.listarTodosMateriais();
    }

    public void adicionarVeiculo(Veiculo novo) {
        motor.adicionarVeiculo(novo);
    }

    public void removerVeiculo(Veiculo apagar) {
        motor.removerVeiculo(apagar);
    }

    public ArrayList<Veiculo> listarTodosVeiculos() {
        return motor.listarTodosVeiculos();
    }

    public ArrayList<FolhaObra> listarFolhasObraVeiculo(final Veiculo veiculo) {
        return motor.listarFolhasObraVeiculo(veiculo);
    }

    public void adicionarInspeccao(Inspeccao nova) {
        motor.adicionarInspeccao(nova);
    }

    public void removerInspeccao(Inspeccao apagar) {
        motor.removerInspeccao(apagar);
    }

    public ArrayList<Inspeccao> listarInspeccoesVeiculo(final Veiculo veiculo) {
        return motor.listarInspeccoesVeiculo(veiculo);
    }

    public ArrayList<Veiculo> listarVeiculosInspeccianadosPor(final Funcionario funcionario) {
        return motor.listarVeiculosInspeccianadosPor(funcionario);
    }

    public boolean autorizado(Utilizador utilizador, String area) {
        //TODO: ...
        return true;
    }

    public Utilizador autenticar(String username, String password) {
        password = SHA1.hash(password);

        Utilizador utilizador = motor.autenticar(username, password);
        if (utilizador != null) {
            utilizador.setPassword(null);
        }

        return utilizador;
    }
}
//TODO: completar