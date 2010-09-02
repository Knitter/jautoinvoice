package net.sf.jautoinvoice.engine;

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
        //codigo postal
        //email
        //nome
        //localidade
        //matricula
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

    public List<Marca> procurarMarca() {
        //nome
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

    public List<Reparacao> procurarReparacao() {
        //data
        //descricao
        //veiculo
        //empregados
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

    public List<Veiculo> procurarVeiculo() {
        //nome dono
        //matricula
        //marca
        //reparacao em data
        //reparado por empregado
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
