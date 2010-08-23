package org.sergiolopes.jautoinvoice.engine;

import com.db4o.Db4oEmbedded;
import com.db4o.ObjectContainer;
import com.db4o.ObjectSet;
import java.util.List;
import java.util.Properties;

/**
 *
 * @author sergiolopes
 */
public class Gestor {

    private ObjectContainer db;
    private Utilizador autenticado;
    private Properties properties;

    public Gestor() {
        properties = new Properties();
    }

    public void init() {
        //properties.loadFromXML()
        db = Db4oEmbedded.openFile(Db4oEmbedded.newConfiguration(), "");
    }

    public void desligar() {
        //properties.storeToXML(null, null)
        db.close();
    }

    public boolean autenticar(String username, String password) {
        if (db != null) {
            Utilizador prototype = new Utilizador(username, Utilizador.gerarHash(password));
            ObjectSet result = db.queryByExample(prototype);
            if (result.hasNext()) {
                autenticado = (Utilizador) result.next();
                return true;
            }
        }

        return false;
    }

    public List<Cliente> listarTodosClientes() {
        return db.query(Cliente.class);
    }

    public List<Cliente> pesquisarCliente() {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarCliente() {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void removerCliente() {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void actualizarCliente() {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public List<Marca> listarTodasMarcas() {
        return db.query(Marca.class);
    }

    public List<Marca> procurarMarca() {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarMarca() {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void removerMarca() {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void actualizarMarca() {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    /////
    public List<Empregado> listarTodosEmpregados() {
        return db.query(Empregado.class);
    }

    public List<Empregado> procurarEmpregado() {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarEmpregado(Empregado empregado) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void removerEmpregado(Empregado empregado) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void actualizarEmpregado(Empregado empregado) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public List<Reparacao> listarTodasReparacoes() {
        return db.query(Reparacao.class);
    }

    public List<Reparacao> procurarReparacao() {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarReparacao(Reparacao reparacao) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void removerReparacao(Reparacao reparacao) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void actualizarReparacao(Reparacao reparacao) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public List<Veiculo> listarTodosVeiculos() {
        return db.query(Veiculo.class);
    }

    public List<Veiculo> procurarVeiculo() {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarVeiculo(Veiculo veiculo) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void removerVeiculo(Veiculo veiculo) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void actualizarVeiculo(Veiculo veiculo) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public List<Utilizador> listarTodosUtilizadores() {
        return db.query(Utilizador.class);
    }

    public List<Utilizador> procurarUtilizador() {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void adicionarUtilizador(Utilizador utilizador) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void removerUtilizador(Utilizador utilizador) {
        throw new UnsupportedOperationException("Por Implementar.");
    }

    public void actualizarUtilizador(Utilizador utilizador) {
        throw new UnsupportedOperationException("Por Implementar.");
    }
}
