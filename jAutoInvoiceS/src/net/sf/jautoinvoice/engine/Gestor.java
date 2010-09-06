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

    /**
     * Permite desligar correctamente o motor de bases de dados.
     */
    public void desligar() {
        autenticado = null;
        if (db != null) {
            db.close();
        }
    }

    /**
     * Grava qualquer dado que não tenha sido ainda registado e remove o
     * utilizador autenticado.
     */
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

    /**
     * Devolve o utilizador autenticado neste momento.
     *
     * @return utilizador autenticado ou null se nenhum existir.
     */
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
            String observacoes, String contribuinte) {

        if (autenticado != null) {
            Cliente cliente = new Cliente(nome, endereco, codigoPostal, localidade,
                    telefone1, telefone2, email, null, observacoes, contribuinte);

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

    public Modelo adicionarModelo(String nome, Marca marca) {
        if (autenticado != null) {
            Modelo modelo = new Modelo(nome, marca);
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

    public List<Iva> listarTodosIvas() {
        if (autenticado != null) {
            return db.query(new Predicate<Iva>() {

                @Override
                public boolean match(Iva et) {
                    return et.isActivo();
                }
            });
        }

        return null;
    }

    public Iva adicionarIva(String descricao, double valor) {
        if (autenticado != null) {
            Iva iva = new Iva(descricao, valor);
            db.store(iva);
            return iva;
        }

        return null;
    }

    public boolean removerIva(Iva iva) {
        if (autenticado != null) {
            iva.setActivo(false);
            db.store(iva);
            return true;
        }

        return false;
    }

    public List<Retencao> listarTodasRetencoes() {
        if (autenticado != null) {
            return db.query(new Predicate<Retencao>() {

                @Override
                public boolean match(Retencao et) {
                    return et.isActivo();
                }
            });
        }

        return null;
    }

    public Retencao adicionarRetencao(String descricao, double valor) {
        if (autenticado != null) {
            Retencao retencao = new Retencao(descricao, valor);
            db.store(retencao);
            return retencao;
        }

        return null;
    }

    public boolean removerRetencao(Retencao retencao) {
        if (autenticado != null) {
            retencao.setActivo(false);
            db.store(retencao);
            return true;
        }

        return false;
    }

    public List<Peca> listarTodasPecas() {
        if (autenticado != null) {
            return db.query(new Predicate<Peca>() {

                @Override
                public boolean match(Peca et) {
                    return et.isActivo();
                }
            });
        }

        return null;
    }

    public List<Peca> procurarPeca(final String nome, final String referencia,
            final String descricao, final Modelo modelo) {

        if (autenticado != null) {
            return db.query(new Predicate<Peca>() {

                @Override
                public boolean match(Peca et) {
                    if (!et.isActivo()) {
                        return false;
                    }

                    boolean resultado = et.getNome().matches(nome) || et.getReferencia().matches(referencia)
                            || et.getDescricao().matches(descricao);

                    if (modelo == null) {
                        return resultado;
                    }

                    for (Modelo m : et.getModelos()) {
                        if (m.equals(modelo)) {
                            return resultado && true;
                        }
                    }

                    return false;
                }
            });
        }

        return null;
    }

    public List<Peca> listarPecaDeModelo(final Modelo modelo) {

        if (autenticado != null) {
            return db.query(new Predicate<Peca>() {

                @Override
                public boolean match(Peca et) {
                    if (!et.isActivo()) {
                        return false;
                    }

                    for (Modelo m : et.getModelos()) {
                        if (m.equals(modelo)) {
                            return true;
                        }
                    }

                    return false;
                }
            });
        }

        return null;
    }

    public Peca adicionarPeca(String nome, String referencia, String descricao,
            double preco, Iva iva, List<Modelo> modelos) {

        if (autenticado != null) {
            Peca peca = new Peca(nome, referencia, descricao, preco, iva, modelos);
            db.store(peca);
            return peca;
        }

        return null;
    }

    public boolean removerPeca(Peca peca) {
        if (autenticado != null) {
            peca.setActivo(false);
            db.store(peca);
            return true;
        }

        return false;
    }

    public boolean actualizarPeca(Peca peca) {
        if (autenticado != null) {
            db.store(peca);
            return true;
        }

        return false;
    }

    public List<Reparacao> listarTodasReparacoes() {
        if (autenticado != null) {
            return db.query(new Predicate<Reparacao>() {

                @Override
                public boolean match(Reparacao et) {
                    return et.isActivo();
                }
            });
        }

        return null;
    }

    public List<Reparacao> procurarReparacao(final Date inicio, final Date fim, final String avaria) {
        if (autenticado != null) {
            return db.query(new Predicate<Reparacao>() {

                @Override
                public boolean match(Reparacao et) {
                    if (!et.isActivo()) {
                        return false;
                    }

                    //TODO: implementar comparacao de dadas
                    //TODO: implementar obtenção de reparacções para determinado veiculo, cliente e empregado
                    return et.getDescricaoAvaria().matches(avaria);
                }
            });
        }

        return null;
    }

    public Reparacao adicionarReparacao(Date data, String avaria, int quilometros,
            String descReparacao, Veiculo veiculo) {

        if (autenticado != null) {
            Reparacao reparacao = new Reparacao(data, avaria, quilometros, descReparacao, veiculo);
            db.store(reparacao);
            return reparacao;
        }

        return null;
    }

    public boolean removerReparacao(Reparacao reparacao) {
        if (autenticado != null) {
            reparacao.setActivo(false);
            db.store(reparacao);
            return true;
        }

        return false;
    }

    public boolean actualizarReparacao(Reparacao reparacao) {
        if (autenticado != null) {
            db.store(reparacao);
            return true;
        }

        return false;
    }

    public List<LinhaReparacao> listarTodasLinhasReparacao() {
        if (autenticado != null) {
            return db.query(LinhaReparacao.class);
        }

        return null;
    }

    public LinhaReparacao adicionarLinhaReparacao(Empregado empregado, double valorHora,
            int horas, Reparacao reparacao) {

        if (autenticado != null) {
            LinhaReparacao linha = new LinhaReparacao(empregado, valorHora, horas, reparacao);
            db.store(linha);
            return linha;
        }

        return null;
    }

    public boolean removerLinhaReparacao(LinhaReparacao linha) {
        if (autenticado != null) {
            db.delete(linha);
            return true;
        }

        return false;
    }

    public boolean actualizarLinhaReparacao(LinhaReparacao linha) {
        if (autenticado != null) {
            db.store(linha);
            return true;
        }

        return false;
    }

    public List<Veiculo> listarTodosVeiculos() {
        if (autenticado != null) {
            return db.query(new Predicate<Veiculo>() {

                @Override
                public boolean match(Veiculo et) {
                    return et.isActivo();
                }
            });
        }

        return null;
    }

    public List<Veiculo> procurarVeiculo() {
        if (autenticado != null) {
            return db.query(new Predicate<Veiculo>() {

                @Override
                public boolean match(Veiculo et) {
                    return et.isActivo(); //TODO: filtrar
                }
            });
        }

        return null;
    }

    public Veiculo adicionarVeiculo(Marca marca, Modelo modelo, String matricula,
            String chassis, String cilindrada, String motor, Cliente cliente,
            String observacoes, Date registo) {

        if (autenticado != null) {
            Veiculo veiculo = new Veiculo(marca, modelo, registo, matricula, chassis,
                    cilindrada, motor, cliente, observacoes);
            db.store(veiculo);
            return veiculo;
        }

        return null;
    }

    public boolean removerVeiculo(Veiculo veiculo) {
        if (autenticado != null) {
            veiculo.setActivo(false);
            db.store(veiculo);
            return true;
        }

        return false;
    }

    public boolean actualizarVeiculo(Veiculo veiculo) {
        if (autenticado != null) {
            db.store(veiculo);
            return true;
        }

        return false;
    }

    public List<Log> listarTodosLogs() {
        if (autenticado != null) {
            return db.query(Log.class);
        }

        return null;
    }

    public List<Log> filtrarLogs(final Date data) {
        if (autenticado != null) {
            return db.query(new Predicate<Log>() {

                @Override
                public boolean match(Log et) {
                    return true;//TODO: aplicar filtro
                }
            });
        }

        return null;
    }

    public Log adicionarLog(String descricao) {
        if (autenticado != null) {
            Log log = new Log(descricao, new Date(), autenticado);
            db.store(log);
            return log;
        }

        return null;
    }
}
