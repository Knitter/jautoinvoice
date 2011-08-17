/*
 * MotorDB4O.java
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
import com.db4o.ObjectSet;
import com.db4o.query.Predicate;
import java.util.ArrayList;
import java.util.List;
import java.util.UUID;
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
import net.sf.jautoinvoice.server.model.Cliente;
import net.sf.jautoinvoice.server.model.FolhaObra;
import net.sf.jautoinvoice.server.model.Fornecedor;
import net.sf.jautoinvoice.server.model.Funcionario;
import net.sf.jautoinvoice.server.model.IVA;
import net.sf.jautoinvoice.server.model.Inspeccao;
import net.sf.jautoinvoice.server.model.Marca;
import net.sf.jautoinvoice.server.model.Material;
import net.sf.jautoinvoice.server.model.Modelo;
import net.sf.jautoinvoice.server.model.Servico;
import net.sf.jautoinvoice.server.model.Veiculo;

public class MotorDB4O implements Persistencia {

    private ObjectContainer db;

    public MotorDB4O() {
        db = DBManager.getInstance().getObjectContainer();
    }

    public void adicionarCliente(DTOCliente novo) {
        Cliente c = DTOFactory.getFactory().decomporDTOCliente(novo);
        c.setId(UUID.randomUUID().toString());
        db.store(c);
    }

    public ArrayList<DTOCliente> listarTodosClientes() {
        ArrayList<DTOCliente> lista = new ArrayList<DTOCliente>();
        List<Cliente> resultado = db.query(new Predicate<Cliente>() {

            @Override
            public boolean match(Cliente c) {
                return c.isActivo();
            }
        });

        for (Cliente cliente : resultado) {
            lista.add(DTOFactory.getFactory().comporDTOCliente(cliente));
        }

        return lista;
    }

    public void removerClientes(final ArrayList<DTOCliente> clientes) {
        List<Cliente> resultado = db.query(new Predicate<Cliente>() {

            @Override
            public boolean match(Cliente et) {
                for (DTOCliente dto : clientes) {
                    if (dto.getId().equals(et.getId())) {
                        return true;
                    }
                }

                return false;
            }
        });

        for (Cliente apagar : resultado) {
            apagar.setActivo(false);
            db.store(apagar);
        }
    }

    public void adicionarIVA(DTOIVA novo) {
        IVA i = DTOFactory.getFactory().decomporDTOIVA(novo);
        i.setId(UUID.randomUUID().toString());
        db.store(i);
    }

    public void removerIVA(DTOIVA apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<DTOIVA> listarTodosIVAs() {
        ArrayList<DTOIVA> lista = new ArrayList<DTOIVA>();
        List<IVA> resultado = db.query(new Predicate<IVA>() {

            @Override
            public boolean match(IVA i) {
                return i.isActivo();
            }
        });

        for (IVA iva : resultado) {
            lista.add(DTOFactory.getFactory().comporDTOIVA(iva));
        }

        return lista;
    }

    public void adicionarMarca(DTOMarca nova) {
        Marca m = DTOFactory.getFactory().decomporDTOMarca(nova);
        m.setId(UUID.randomUUID().toString());
        db.store(m);
    }

    public void removerMarca(DTOMarca apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<DTOMarca> listarTodasMarcas() {
        ArrayList<DTOMarca> lista = new ArrayList<DTOMarca>();

        List<Marca> resultado = db.query(new Predicate<Marca>() {

            public boolean match(Marca et) {
                return et.isActivo();
            }
        });

        for (Marca marca : resultado) {
            lista.add(DTOFactory.getFactory().comporDTOMarca(marca));
        }

        return lista;
    }

    public void adicionarModelo(DTOModelo novo) {
        Modelo m = DTOFactory.getFactory().decomporDTOModelo(novo);
        m.setId(UUID.randomUUID().toString());
        db.store(m);
    }

    public void removerModelo(DTOModelo apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<DTOModelo> listarTodosModelos() {
        ArrayList<DTOModelo> lista = new ArrayList<DTOModelo>();

        List<Modelo> resultado = db.query(new Predicate<Modelo>() {

            public boolean match(Modelo et) {
                return et.isActivo();
            }
        });

        for (Modelo modelo : resultado) {
            lista.add(DTOFactory.getFactory().comporDTOModelo(modelo));
        }

        return lista;
    }

    public void adicionarServico(DTOServico novo) {
        Servico s = DTOFactory.getFactory().decomporDTOServico(novo);
        s.setId(UUID.randomUUID().toString());
        db.store(s);
    }

    public void removerServico(DTOServico apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<DTOServico> listarTodosServicos() {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public void adicionarFornecedor(DTOFornecedor novo) {
        novo.setId(UUID.randomUUID().toString());
        db.store(novo);
    }

    public ArrayList<DTOFornecedor> listarTodosFornecedores() {
        ArrayList<DTOFornecedor> lista = new ArrayList<DTOFornecedor>();

        List<Fornecedor> resultado = db.query(new Predicate<Fornecedor>() {

            public boolean match(Fornecedor et) {
                return et.isActivo();
            }
        });

        for (Fornecedor fornecedor : resultado) {
            lista.add(DTOFactory.getFactory().comporDTOFornecedor(fornecedor));
        }

        return lista;
    }

    public void removerFornecedores(final ArrayList<DTOFornecedor> fornecedores) {
        List<Fornecedor> resultado = db.query(new Predicate<Fornecedor>() {

            public boolean match(Fornecedor et) {
                for (DTOFornecedor dto : fornecedores) {
                    if (dto.getId().equals(et.getId())) {
                        return true;
                    }
                }

                return false;
            }
        });

        for (Fornecedor apagar : resultado) {
            apagar.setActivo(false);
            db.store(apagar);
        }
    }

    public ArrayList<DTOMaterial> listarMateriaisDeFornecedor(DTOFornecedor fornecedor) {
        ArrayList<DTOMaterial> lista = new ArrayList<DTOMaterial>();

        final Fornecedor fo = DTOFactory.getFactory().decomporDTOFornecedor(fornecedor);

        List<Material> resultado = db.query(new Predicate<Material>() {

            @Override
            public boolean match(Material et) {
                return et.getFornecedor().equals(fo);
            }
        });

        for (Material material : resultado) {
            lista.add(DTOFactory.getFactory().comporDTOMaterial(material));
        }

        return lista;
    }

    public void adicionarFuncionario(DTOFuncionario novo) {
        novo.setId(UUID.randomUUID().toString());
        db.store(novo);
    }

    public ArrayList<DTOFuncionario> listarTodosFuncionarios() {
        ArrayList<DTOFuncionario> lista = new ArrayList<DTOFuncionario>();
        List<Funcionario> resultado = db.query(new Predicate<Funcionario>() {

            @Override
            public boolean match(Funcionario f) {
                return f.isActivo();
            }
        });

        for (Funcionario funcionario : resultado) {
            lista.add(DTOFactory.getFactory().comporDTOFuncionario(funcionario));
        }

        return lista;
    }

    public void removerFuncionarios(ArrayList<DTOFuncionario> funcionarios) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<DTOVeiculo> veiculosInspeccionadosPeloFuncionario(DTOFuncionario funcionario) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<DTOFolhaObra> obrasDoFuncionario(DTOFuncionario funcionario) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public void adicionarMaterial(DTOMaterial novo) {
        Material m = DTOFactory.getFactory().decomporDTOMaterial(novo);
        m.setId(UUID.randomUUID().toString());
        db.store(m);
    }

    public void removerMaterial(DTOMaterial apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<DTOMaterial> listarTodosMateriais() {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public void adicionarVeiculo(DTOVeiculo novo) {
        Veiculo v = DTOFactory.getFactory().decomporDTOVeiculo(novo);
        v.setId(UUID.randomUUID().toString());
        db.store(v);
    }

    public void removerVeiculo(DTOVeiculo apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<DTOVeiculo> listarTodosVeiculos() {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<DTOFolhaObra> listarFolhasObraVeiculo(final DTOVeiculo veiculo) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public void adicionarInspeccao(DTOInspeccao nova) {
        Inspeccao i = DTOFactory.getFactory().decomporDTOInspeccao(nova);
        i.setId(UUID.randomUUID().toString());
        db.store(i);
    }

    public void removerInspeccao(DTOInspeccao apagar) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<DTOInspeccao> listarInspeccoesVeiculo(final DTOVeiculo veiculo) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public ArrayList<DTOVeiculo> listarVeiculosInspeccianadosPor(DTOFuncionario funcionario) {
        ArrayList<DTOVeiculo> lista = new ArrayList<DTOVeiculo>();

        final Funcionario dono = DTOFactory.getFactory().decomporDTOFuncionario(funcionario);
        List<Veiculo> resultado = db.query(new Predicate<Veiculo>() {

            @Override
            public boolean match(Veiculo et) {

                for (Inspeccao i : et.getInspeccoes()) {
                    if (i.getFuncionario().equals(dono)) {
                        return true;
                    }
                }

                return false;
            }
        });

        for (Veiculo veiculo : resultado) {
            lista.add(DTOFactory.getFactory().comporDTOVeiculo(veiculo));
        }

        return lista;
    }
}
