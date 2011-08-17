package net.sf.jautoinvoice.server;

import java.util.ArrayList;
import net.sf.jautoinvoice.client.dto.DTOCategoria;
import net.sf.jautoinvoice.client.dto.DTOCliente;
import net.sf.jautoinvoice.client.dto.DTOCombustivel;
import net.sf.jautoinvoice.client.dto.DTOEstadoInspeccao;
import net.sf.jautoinvoice.client.dto.DTOFolhaObra;
import net.sf.jautoinvoice.client.dto.DTOFornecedor;
import net.sf.jautoinvoice.client.dto.DTOFuncionario;
import net.sf.jautoinvoice.client.dto.DTOIVA;
import net.sf.jautoinvoice.client.dto.DTOInspeccao;
import net.sf.jautoinvoice.client.dto.DTOMarca;
import net.sf.jautoinvoice.client.dto.DTOMaterial;
import net.sf.jautoinvoice.client.dto.DTOModelo;
import net.sf.jautoinvoice.client.dto.DTOServico;
import net.sf.jautoinvoice.client.dto.DTOUtilizador;
import net.sf.jautoinvoice.client.dto.DTOVeiculo;
import net.sf.jautoinvoice.server.model.Categoria;
import net.sf.jautoinvoice.server.model.Cliente;
import net.sf.jautoinvoice.server.model.Combustivel;
import net.sf.jautoinvoice.server.model.EstadoInspeccao;
import net.sf.jautoinvoice.server.model.FolhaObra;
import net.sf.jautoinvoice.server.model.Fornecedor;
import net.sf.jautoinvoice.server.model.Funcionario;
import net.sf.jautoinvoice.server.model.IVA;
import net.sf.jautoinvoice.server.model.Inspeccao;
import net.sf.jautoinvoice.server.model.Marca;
import net.sf.jautoinvoice.server.model.Material;
import net.sf.jautoinvoice.server.model.Modelo;
import net.sf.jautoinvoice.server.model.Servico;
import net.sf.jautoinvoice.server.model.Utilizador;
import net.sf.jautoinvoice.server.model.Veiculo;

/**
 *
 * @author Sérgio Lopes
 */
public final class DTOFactory {

    private DTOFactory() {
        //DO NOTHING
    }

    public static DTOFactory getFactory() {
        return SingletonHolder.FACTORY;
    }

    public DTOCliente comporDTOCliente(Cliente cliente) {
        ArrayList<String> contactos = new ArrayList<String>(cliente.getContactos().size());
        for (String contacto : cliente.getContactos()) {
            contactos.add(contacto);
        }

        ArrayList<DTOVeiculo> veiculos = new ArrayList<DTOVeiculo>(cliente.getVeiculos().size());
        for (Veiculo veiculo : cliente.getVeiculos()) {
            veiculos.add(comporDTOVeiculo(veiculo));
        }

        return new DTOCliente(cliente.getId(), cliente.getNome(), cliente.getContribuinte(), cliente.getEmail(),
                contactos, cliente.getEndereco(), veiculos, comporDTOUtilizador(cliente.getUtilizador()),
                cliente.isActivo());
    }

    public Cliente decomporDTOCliente(DTOCliente dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOFolhaObra comporDTOFolhaObra(FolhaObra folha) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public FolhaObra decomporDTOFolhaObra(DTOFolhaObra dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOFornecedor comporDTOFornecedor(Fornecedor fornecedor) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public Fornecedor decomporDTOFornecedor(DTOFornecedor dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOFuncionario comporDTOFuncionario(Funcionario funcionario) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public Funcionario decomporDTOFuncionario(DTOFuncionario dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOIVA comporDTOIVA(IVA iva) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public IVA decomporDTOIVA(DTOIVA dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOInspeccao comporDTOInspeccao(Inspeccao inspeccao) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public Inspeccao decomporDTOInspeccao(DTOInspeccao dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOMarca comporDTOMarca(Marca marca) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public Marca decomporDTOMarca(DTOMarca dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOMaterial comporDTOMaterial(Material material) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public Material decomporDTOMaterial(DTOMaterial dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOModelo comporDTOModelo(Modelo modelo) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public Modelo decomporDTOModelo(DTOModelo dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOServico comporDTOServico(Servico servico) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public Servico decomporDTOServico(DTOServico dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOVeiculo comporDTOVeiculo(Veiculo veiculo) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public Veiculo decomporDTOVeiculo(DTOVeiculo dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOCategoria comporDTOCategoria(Categoria categoria) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public Categoria decomporDTOCategoria(DTOCategoria dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOCombustivel comporDTOCombustivel(Combustivel combustivel) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public Combustivel decomporDTOCombustivel(DTOCombustivel dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOEstadoInspeccao comporDTOEstadoInspeccao(EstadoInspeccao estado) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public EstadoInspeccao decomporDTOEstadoInspeccao(DTOEstadoInspeccao dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOUtilizador comporDTOUtilizador(Utilizador utilizador) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public Utilizador decomporDTOUtilizador(DTOUtilizador dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    private static class SingletonHolder {

        public static final DTOFactory FACTORY = new DTOFactory();
    }
}
