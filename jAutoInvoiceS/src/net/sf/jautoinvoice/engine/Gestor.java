/*
 * Gestor.java
 *
 * This file is part of jAutoInvoice, http://sourceforge.net/p/jautoinvoice
 *
 * Copyright (C) 2010  Sérgio Lopes
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
package net.sf.jautoinvoice.engine;

import com.db4o.Db4oEmbedded;
import com.db4o.ObjectContainer;
import com.db4o.query.Predicate;
import java.util.Date;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

public final class Gestor {

    private ObjectContainer db;
    private Utilizador autenticado;

    public Gestor(String ficheiro, boolean novo) {
        db = Db4oEmbedded.openFile(Db4oEmbedded.newConfiguration(), ficheiro);

        if (novo) {
            db.store(new Utilizador("admin", Utilizador.gerarHash("admin"), true));
            db.commit();
        }
    }

    public void desligar() {
        autenticado = null;
        if (db != null) {
            db.close();
        }
    }

    public void logout() {
        db.commit();
        autenticado = null;
    }

    /**
     * Permite autenticar um utilizador no sistema. Se a conbinação entre
     * utilizador e password estiver correcta, esse utilizador passa a ser
     * considerado o utilizador autenticado em todas as operações seguintes.
     *
     * @param username Nome do utilizador a autenticar.
     * @param password Password a usar na autenticação.
     * 
     * @return verdadeiro caso a autenticação seja válida, falso caso contrário.
     */
    public boolean autenticar(final String username, final String password) {
        if (db != null) {
            List<Utilizador> resultados = db.query(new Predicate<Utilizador>() {

                @Override
                public boolean match(Utilizador et) {
                    return et.getUsername().equals(username)
                            && et.getPassword().equals(Utilizador.gerarHash(password))
                            && et.isActivo();
                }
            });

            //só pode existir um resultado
            if (resultados.size() == 1) {
                autenticado = resultados.get(0);
                return true;
            }

            Logger.getLogger(Gestor.class.getName()).log(Level.SEVERE, "Database inconsistent! More than one user in the DB.");
            return false;
        }

        return false;
    }

    public Utilizador getAutenticado() {
        return autenticado;
    }

    /**
     * Permite listar todos os empregados existentes no sistema que se encontrem
     * activos.
     *
     * @return lista com empregados, se existirem, ou null se não existe um
     * utilizador autenticado no sistema.
     */
    public List<Empregado> listarTodosEmpregados() {
        if (autenticado != null) {
            return db.query(new Predicate<Empregado>() {

                @Override
                public boolean match(Empregado et) {
                    return et.isActivo();
                }
            });
        }

        return null;
    }

    /**
     * Adiciona um novo empregado ao sistema.
     * 
     * @param username Nome de utilizador a usar na autenticação
     * @param password Password do novo utilizador
     * @param nome Nome real do empregado
     * @param valorHora Valor hora padrão a usar para este empregado
     *
     * @return o novo empregado criado e registado ou null caso não existe um
     * utilizador autenticado no sistema.
     */
    public Empregado adicionarEmpregado(String username, String password, String nome,
            double valorHora, boolean adminstrador) {

        if (autenticado != null) {
            Empregado empregado = new Empregado(username, password, nome, valorHora,
                    adminstrador);

            db.store(empregado);
            return empregado;
        }

        return null;

    }

    /**
     * Remove um empregado do sistema. Uma remoção é, na verdade, uma modificação
     * de estado activo para inactivo.
     *
     * @param empregado Empregado a remover. Precisa ser obtido por pesquisa.
     * 
     * @return verdadeiro caso exista um utilizador autenticado no sistema, falso
     * caso contrário.
     */
    public boolean removerEmpregado(Empregado empregado) {
        if (autenticado != null) {
            empregado.setActivo(false);
            db.store(empregado);
            return true;
        }

        return false;
    }

    /**
     * Actualiza um empregado do sistema.
     *
     * @param empregado Empregado a actualizar. Precisa ser obtido por pesquisa.
     *
     * @return verdadeiro caso exista um utilizador autenticado no sistema, falso
     * caso contrário.
     */
    public boolean actualizarEmpregado(Empregado empregado) {
        if (autenticado != null) {
            db.store(empregado);
            return true;
        }

        return false;
    }

    /**
     * Permite a pesquisa de empregados usando o nome real do empregado como
     * termo de pesquisa.
     *
     * @param nome Nome real, o username não é válido, para pesquisar.
     *
     * @return lista com todos os empregados encontrados, se alguns.
     */
    public List<Empregado> procurarEmpregado(final String nome) {
        if (autenticado != null) {
            return db.query(new Predicate<Empregado>() {

                @Override
                public boolean match(Empregado et) {
                    return et.getNome().matches(nome);
                }
            });
        }

        return null;
    }

    public List<Cliente> listarTodosClientes() {
        if (autenticado != null) {
            return db.query(new Predicate<Cliente>() {

                @Override
                public boolean match(Cliente et) {
                    return et.isActivo();
                }
            });
        }

        return null;
    }

    public List<Cliente> procurarCliente(final String nome, final String email,
            final String localidade, final String matricula, final String codigoPostal) {

        if (autenticado != null) {
            return db.query(new Predicate<Cliente>() {

                @Override
                public boolean match(Cliente et) {

                    if (!et.isActivo()) {
                        return false;
                    }

                    boolean resultado = et.getNome().matches(nome)
                            || et.getEmail().matches(email)
                            || et.getLocalidade().matches(localidade)
                            || et.getCodigoPostal().matches(codigoPostal);

                    if (resultado) {
                        return resultado;
                    }

                    for (Veiculo v : et.getVeiculosActuais()) {
                        if (v.getMatricula().matches(matricula)) {
                            return true;
                        }
                    }

                    for (Veiculo v : et.getVeiculosAnteriores()) {
                        if (v.getMatricula().matches(matricula)) {
                            return true;
                        }
                    }

                    return false;
                }
            });
        }

        return null;
    }

    public Cliente adicionarCliente(String nome, String endereco, String codigoPostal,
            String localidade, String telefone1, String telefone2, String email,
            String observacoes) {

        if (autenticado != null) {
            Cliente cliente = new Cliente(nome, endereco, codigoPostal, localidade,
                    telefone1, telefone2, email, null, observacoes);

            db.store(cliente);
            return cliente;
        }

        return null;

    }

    public boolean removerCliente(Cliente cliente) {
        if (autenticado != null) {
            cliente.setActivo(false);
            db.store(cliente);
            return true;
        }

        return false;
    }

    public boolean actualizarCliente(Cliente cliente) {
        if (autenticado != null) {
            db.store(cliente);
            return true;
        }

        return false;
    }

    public List<Marca> listarTodasMarcas() {
        if (autenticado != null) {
            return db.query(new Predicate<Marca>() {

                @Override
                public boolean match(Marca et) {
                    return et.isActivo();
                }
            });
        }

        return null;
    }

    public List<Marca> procurarMarca(final String nome) {
        if (autenticado != null) {
            return db.query(new Predicate<Marca>() {

                @Override
                public boolean match(Marca et) {
                    return et.isActivo() && et.getNome().matches(nome);
                }
            });
        }

        return null;
    }

    public Marca adicionarMarca(String nome) {
        if (autenticado != null) {
            Marca marca = new Marca(nome);
            db.store(marca);
            return marca;
        }

        return null;
    }

    public boolean removerMarca(Marca marca) {
        if (autenticado != null) {
            marca.setActivo(false);
            db.store(marca);
            return true;
        }

        return false;
    }

    public boolean actualizarMarca(Marca marca) {
        if (autenticado != null) {
            db.store(marca);
            return true;
        }

        return false;
    }

    public List<Modelo> listarTodosModelos() {
        if (autenticado != null) {
            return db.query(new Predicate<Modelo>() {

                @Override
                public boolean match(Modelo et) {
                    return et.isActivo();
                }
            });
        }

        return null;
    }

    public List<Modelo> procurarModelo(final String nome) {
        if (autenticado != null) {
            return db.query(new Predicate<Modelo>() {

                @Override
                public boolean match(Modelo et) {
                    return et.isActivo() && et.getNome().matches(nome);
                }
            });
        }

        return null;
    }

    public Modelo adicionarModelo(String nome) {
        if (autenticado != null) {
            Modelo modelo = new Modelo(nome);
            db.store(modelo);
            return modelo;
        }

        return null;
    }

    public boolean removerModelo(Modelo modelo) {
        if (autenticado != null) {
            modelo.setActivo(false);
            db.store(modelo);
            return true;
        }

        return false;
    }

    public boolean actualizarModelo(Modelo modelo) {
        if (autenticado != null) {
            db.store(modelo);
            return true;
        }

        return false;
    }

    ////////////////////////////////////////////////////////////////////////////
    public List<Reparacao> listarTodasReparacoes() {
        //return db.query(Reparacao.class);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public List<Reparacao> procurarReparacao(Date data, String matricula, String empregado) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarReparacao(Reparacao reparacao) {
        //db.store(reparacao);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void removerReparacao(Reparacao reparacao) {
        //db.delete(reparacao);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void actualizarReparacao(Reparacao reparacao) {
        //db.store(reparacao);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public List<Veiculo> listarTodosVeiculos() {
        //return db.query(Veiculo.class);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public List<Veiculo> procurarVeiculo(String dono, String matricula, String marca,
            Date reparacao, String empregado) {

        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarVeiculo(Veiculo veiculo) {
        //db.store(veiculo);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void removerVeiculo(Veiculo veiculo) {
        //db.delete(veiculo);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void actualizarVeiculo(Veiculo veiculo) {
        //db.store(veiculo);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public List<Utilizador> listarTodosUtilizadores() {
        //return db.query(Utilizador.class);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarUtilizador(Utilizador utilizador) {
        //db.store(utilizador);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void removerUtilizador(Utilizador utilizador) {
        //db.delete(utilizador);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void actualizarUtilizador(Utilizador utilizador) {
        //db.store(utilizador);
        throw new UnsupportedOperationException("Por Implementar.");
    }
}
