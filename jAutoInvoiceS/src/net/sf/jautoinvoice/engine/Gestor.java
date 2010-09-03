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
import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.Date;
import java.util.InvalidPropertiesFormatException;
import java.util.List;
import java.util.Properties;
import java.util.logging.Level;
import java.util.logging.Logger;

public class Gestor {

    private ObjectContainer db;
    private Utilizador autenticado;
    private File configuracoes;
    private Properties properties;

    public Gestor() {
        properties = new Properties();
    }

    public void init() {
        String base = System.getProperty("user.home");
        String dados = null;

        File directoria = new File(base + File.separator
                + ".jautoinvoice");

        if (!directoria.exists()) {
            directoria.mkdir();
        }

        configuracoes = new File(directoria.getAbsolutePath() + File.separator + "conf.xml");
        if (configuracoes.exists()) {
            try {
                properties.loadFromXML(new FileInputStream(configuracoes));
                dados = properties.getProperty("caminho", directoria.getAbsolutePath()
                        + File.separator + "dados.db4o.inv");

            } catch (InvalidPropertiesFormatException ex) {
                Logger.getLogger(Gestor.class.getName()).log(Level.SEVERE, null, ex);
            } catch (IOException ex) {
                Logger.getLogger(Gestor.class.getName()).log(Level.SEVERE, null, ex);
            }
        } else {
            dados = directoria.getAbsolutePath() + File.separator + "dados.db4o.inv";
        }

        boolean existe = (new File(dados).exists());

        db = Db4oEmbedded.openFile(Db4oEmbedded.newConfiguration(), dados);

        if(existe) {
            db.store(new Utilizador("admin", Utilizador.gerarHash("admin")));
        }
    }

    public void desligar() {
        try {
            if (!configuracoes.exists()) {
                configuracoes.createNewFile();
            }
            properties.storeToXML(new FileOutputStream(configuracoes), null);

        } catch (IOException ex) {
            Logger.getLogger(Gestor.class.getName()).log(Level.SEVERE, null, ex);
        }
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

    public List<Cliente> listarTodosClientes() {
        return db.query(Cliente.class);
    }

    public List<Cliente> pesquisarCliente(String nome, String email, String localidade,
            String matricula, String codigoPostal) {
        
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarCliente(Cliente cliente) {
        db.store(cliente);
    }

    public void removerCliente(Cliente cliente) {
        db.delete(cliente);
    }

    public void actualizarCliente(Cliente cliente) {
        db.store(cliente);
    }

    public List<Marca> listarTodasMarcas() {
        return db.query(Marca.class);
    }

    public List<Marca> procurarMarca(String nome) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarMarca(Marca marca) {
        db.store(marca);
    }

    public void removerMarca(Marca marca) {
        db.delete(marca);
    }

    public void actualizarMarca(Marca marca) {
        db.store(marca);
    }

    public List<Empregado> listarTodosEmpregados() {
        return db.query(Empregado.class);
    }

    public List<Empregado> procurarEmpregado(String nome) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarEmpregado(Empregado empregado) {
        db.store(empregado);
    }

    public void removerEmpregado(Empregado empregado) {
        db.delete(empregado);
    }

    public void actualizarEmpregado(Empregado empregado) {
        db.store(empregado);
    }

    public List<Reparacao> listarTodasReparacoes() {
        return db.query(Reparacao.class);
    }

    public List<Reparacao> procurarReparacao(Date data, String matricula, String empregado) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarReparacao(Reparacao reparacao) {
        db.store(reparacao);
    }

    public void removerReparacao(Reparacao reparacao) {
        db.delete(reparacao);
    }

    public void actualizarReparacao(Reparacao reparacao) {
        db.store(reparacao);
    }

    public List<Veiculo> listarTodosVeiculos() {
        return db.query(Veiculo.class);
    }

    public List<Veiculo> procurarVeiculo(String dono, String matricula, String marca,
            Date reparacao, String empregado) {
        
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarVeiculo(Veiculo veiculo) {
        db.store(veiculo);
    }

    public void removerVeiculo(Veiculo veiculo) {
        db.delete(veiculo);
    }

    public void actualizarVeiculo(Veiculo veiculo) {
        db.store(veiculo);
    }

    public List<Utilizador> listarTodosUtilizadores() {
        return db.query(Utilizador.class);
    }

    public void adicionarUtilizador(Utilizador utilizador) {
        db.store(utilizador);
    }

    public void removerUtilizador(Utilizador utilizador) {
        db.delete(utilizador);
    }

    public void actualizarUtilizador(Utilizador utilizador) {
        db.store(utilizador);
    }
}
