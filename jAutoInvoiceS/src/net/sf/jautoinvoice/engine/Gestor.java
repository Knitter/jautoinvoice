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
import com.db4o.ObjectSet;
import com.db4o.query.Predicate;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

public class Gestor {

    private ObjectContainer db;
    private Utilizador autenticado;

    public Gestor(String ficheiro, boolean novo) {
        db = Db4oEmbedded.openFile(Db4oEmbedded.newConfiguration(), ficheiro);

        if (novo) {
            db.store(new Utilizador("admin", Utilizador.gerarHash("admin")));
        }
    }

    public void desligar() {
        db.close();
    }

    public boolean autenticar(String username, String password) {
        if (db != null) {
            Utilizador prototype = new Utilizador(username, Utilizador.gerarHash(password));
            ObjectSet<Utilizador> result = db.queryByExample(prototype);
            if (result.hasNext()) {
                autenticado = result.next();

                return true;
            }
        }

        return false;
    }

    public List<Empregado> listarTodosEmpregados() {
        return db.query(Empregado.class);
    }

    public Empregado adicionarEmpregado(String username, String password, String nome,
            double valorHora) {

        Empregado empregado = new Empregado(username, password, nome, valorHora);
        db.store(empregado);
        return empregado;
    }

    public void removerEmpregado(Empregado empregado) {
        db.delete(empregado);
    }

    public void actualizarEmpregado(Empregado empregado) {
        db.store(empregado);
    }

    public List<Empregado> procurarEmpregado(final String nome) {
        return db.query(new Predicate<Empregado>() {

            @Override
            public boolean match(Empregado et) {
                return et.getNome().matches(nome);
            }
        });
    }

    /////////////////////////////////////////////////////////////////TODO: ....
    public List<Cliente> listarTodosClientes() {
        throw new UnsupportedOperationException("Por Implementar.");
        //return db.query(Cliente.class);
    }

    public List<Cliente> pesquisarCliente(String nome, String email, String localidade,
            String matricula, String codigoPostal) {

        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarCliente(Cliente cliente) {
        //db.store(cliente);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void removerCliente(Cliente cliente) {
        //db.delete(cliente);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void actualizarCliente(Cliente cliente) {
        //db.store(cliente);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public List<Marca> listarTodasMarcas() {
        //return db.query(Marca.class);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public List<Marca> procurarMarca(String nome) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarMarca(Marca marca) {
        //db.store(marca);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void removerMarca(Marca marca) {
        //db.delete(marca);
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void actualizarMarca(Marca marca) {
        //db.store(marca);
        throw new UnsupportedOperationException("Por Implementar.");
    }

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
