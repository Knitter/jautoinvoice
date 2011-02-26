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

import com.db4o.ObjectContainer;
import com.db4o.query.Predicate;
import java.util.ArrayList;
import java.util.List;
import net.sf.jautoinvoice.client.modelo.Cliente;
import net.sf.jautoinvoice.client.modelo.FolhaObra;
import net.sf.jautoinvoice.client.modelo.Fornecedor;
import net.sf.jautoinvoice.client.modelo.Funcionario;
import net.sf.jautoinvoice.client.modelo.IVA;
import net.sf.jautoinvoice.client.modelo.Inspeccao;
import net.sf.jautoinvoice.client.modelo.Marca;
import net.sf.jautoinvoice.client.modelo.Material;
import net.sf.jautoinvoice.client.modelo.Modelo;
import net.sf.jautoinvoice.client.modelo.Servico;
import net.sf.jautoinvoice.client.modelo.Veiculo;

/**
 * Esta é a classe base do sistema de gestão. Qualquer serviço delega o 
 * comportamento para esta classe e é este gestor que executa todo o código 
 * necessário.
 * 
 * Garante uma independência completa da restante aplicação, podendo facilmente 
 * ser usado para criar uma aplicação <em>Desktop</em> ou de qualquer outro 
 * formato.
 * 
 * @since 1.0
 */
public final class JAutoInvoiceManager {

    private ObjectContainer db;

    public JAutoInvoiceManager() {
        db = DBManager.getInstance().getObjectContainer();
    }

    public void adicionarCliente(Cliente novo) {
        db.store(novo);
    }

    public ArrayList<Cliente> listarTodosClientes() {
        ArrayList<Cliente> lista = new ArrayList<Cliente>();
        List<Cliente> resultado = db.query(new Predicate<Cliente>()             {

            @Override
            public boolean match(Cliente c) {
                return c.isActivo();
            }
        });

        for (Cliente c : resultado) {
            lista.add(c);
        }

        return lista;
    }

    public boolean removerCliente(Cliente cliente) {
        throw new UnsupportedOperationException("Not implemented yet.");
    }

    public void adicionarIVA(IVA novo) {
        db.store(novo);
    }

    public void removerIVA(IVA apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public void adicionarMarca(Marca nova) {
        db.store(nova);
    }

    public ArrayList<IVA> listarTodosIVAs() {
        ArrayList<IVA> lista = new ArrayList<IVA>();
        List<IVA> resultado = db.query(new Predicate<IVA>()             {

            @Override
            public boolean match(IVA i) {
                return i.isActivo();
            }
        });

        for (IVA i : resultado) {
            lista.add(i);
        }

        return lista;
    }

    public void removerMarca(Marca apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<Marca> listarTodasMarcas() {
        ArrayList<Marca> lista = new ArrayList<Marca>();

        for (Marca m : db.query(Marca.class)) {
            lista.add(m);
        }

        return lista;
    }

    public void adicionarModelo(Modelo novo) {
        db.store(novo);
    }

    public void removerModelo(Modelo apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<Modelo> listarTodosModelos() {
        ArrayList<Modelo> lista = new ArrayList<Modelo>();

        for (Modelo m : db.query(Modelo.class)) {
            lista.add(m);
        }

        return lista;
    }

    public void adicionarServico(Servico novo) {
        db.store(novo);
    }

    public void removerServico(Servico apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<Servico> listarTodosServicos() {
        ArrayList<Servico> lista = new ArrayList<Servico>();
        List<Servico> resultado = db.query(new Predicate<Servico>()             {

            @Override
            public boolean match(Servico s) {
                return s.isActivo();
            }
        });

        for (Servico s : resultado) {
            lista.add(s);
        }

        return lista;
    }

    public void adicionarFornecedor(Fornecedor novo) {
        db.store(novo);
    }

    public void removerFornecedor(Fornecedor apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<Fornecedor> listarTodosFornecedores() {
        ArrayList<Fornecedor> lista = new ArrayList<Fornecedor>();

        for (Fornecedor f : db.query(Fornecedor.class)) {
            lista.add(f);
        }

        return lista;
    }

    public ArrayList<Material> listarMateriaisDeFornecedor(final Fornecedor fornecedor) {
        ArrayList<Material> lista = new ArrayList<Material>();
        List<Material> resultado = db.query(new Predicate<Material>()           {

            @Override
            public boolean match(Material et) {
                return et.getFornecedor().equals(fornecedor);
            }
        });

        for (Material m : resultado) {
            lista.add(m);
        }

        return lista;
    }

    public void adicionarFuncionario(Funcionario novo) {
        db.store(novo);
    }

    public void removerFuncionario(Funcionario apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<Funcionario> listarTodosFuncionarios() {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<Veiculo> veiculosInspeccionadosPeloFuncionario(Funcionario funcionario) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<FolhaObra> obrasDoFuncionario(Funcionario funcionario) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public void adicionarMaterial(Material novo) {
        db.store(novo);
    }

    public void removerMaterial(Material apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<Material> listarTodosMateriais() {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public void adicionarVeiculo(Veiculo novo) {
        db.store(novo);
    }

    public void removerVeiculo(Veiculo apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<Veiculo> listarTodosVeiculos() {
        ArrayList<Veiculo> lista = new ArrayList<Veiculo>();
        for (Veiculo v : db.query(Veiculo.class)) {
            lista.add(v);
        }

        return lista;
    }

    public ArrayList<FolhaObra> listarFolhasObraVeiculo(final Veiculo veiculo) {
        ArrayList<FolhaObra> lista = new ArrayList<FolhaObra>();
        List<FolhaObra> resultado = db.query(new Predicate<FolhaObra>()      {

            @Override
            public boolean match(FolhaObra et) {
                return et.getVeiculo().equals(veiculo);
            }
        });

        return lista;
    }

    public void adicionarInspeccao(Inspeccao nova) {
        db.store(nova);
    }

    public void removerInspeccao(Inspeccao apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<Inspeccao> listarInspeccoesVeiculo(final Veiculo veiculo) {
        ArrayList<Inspeccao> lista = new ArrayList<Inspeccao>();
        List<Inspeccao> resultado = db.query(new Predicate<Inspeccao>()      {

            @Override
            public boolean match(Inspeccao et) {
                return et.getVeiculo().equals(veiculo);
            }
        });

        for (Inspeccao i : resultado) {
            lista.add(i);
        }

        return lista;
    }

    public ArrayList<Veiculo> listarVeiculosInspeccianadosPor(final Funcionario funcionario) {
        ArrayList<Veiculo> lista = new ArrayList<Veiculo>();
        List<Veiculo> resultado = db.query(new Predicate<Veiculo>()      {

            @Override
            public boolean match(Veiculo et) {

                for (Inspeccao i : et.getInspeccoes()) {
                    if (i.getFuncionario().equals(funcionario)) {
                        return true;
                    }
                }

                return false;
            }
        });

        for (Veiculo v : resultado) {
            lista.add(v);
        }

        return lista;
    }
}
//TODO: completar