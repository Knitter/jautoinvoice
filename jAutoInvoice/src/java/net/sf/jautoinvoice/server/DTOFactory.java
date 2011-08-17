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
        ArrayList<String> contactos = new ArrayList<String>(dto.getContactos().size());
        for (String contacto : dto.getContactos()) {
            contactos.add(contacto);
        }

        ArrayList<Veiculo> veiculos = new ArrayList<Veiculo>(dto.getVeiculos().size());
        for (DTOVeiculo dv : dto.getVeiculos()) {
            veiculos.add(decomporDTOVeiculo(dv));
        }

        return new Cliente(dto.getId(), dto.getNome(), dto.getContribuinte(), dto.getEmail(),
                contactos, dto.getEndereco(), veiculos, decomporDTOUtilizador(dto.getUtilizador()),
                dto.isActivo());
    }

    public DTOFolhaObra comporDTOFolhaObra(FolhaObra folha) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public FolhaObra decomporDTOFolhaObra(DTOFolhaObra dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOFornecedor comporDTOFornecedor(Fornecedor fornecedor) {
        return new DTOFornecedor(fornecedor.getId(), fornecedor.getNome(), fornecedor.getEmail(),
                fornecedor.getTelefone(), fornecedor.getFax(), fornecedor.getNotas(),
                fornecedor.isActivo());
    }

    public Fornecedor decomporDTOFornecedor(DTOFornecedor dto) {
        return new Fornecedor(dto.getId(), dto.getNome(), dto.getEmail(), dto.getTelefone(),
                dto.getFax(), dto.getNotas(), dto.isActivo());
    }

    public DTOFuncionario comporDTOFuncionario(Funcionario funcionario) {
        return new DTOFuncionario(funcionario.getId(), funcionario.getNome(),
                funcionario.getContribuinte(), funcionario.getValorHora(),
                comporDTOUtilizador(funcionario.getUtilizador()), funcionario.isActivo());
    }

    public Funcionario decomporDTOFuncionario(DTOFuncionario dto) {
        return new Funcionario(dto.getId(), dto.getNome(), dto.getContribuinte(), dto.getValorHora(),
                decomporDTOUtilizador(dto.getUtilizador()), dto.isActivo());
    }

    public DTOIVA comporDTOIVA(IVA iva) {
        return new DTOIVA(iva.getId(), iva.getDescricao(), iva.getPercentagem(), iva.isActivo());
    }

    public IVA decomporDTOIVA(DTOIVA dto) {
        return new IVA(dto.getId(), dto.getDescricao(), dto.getPercentagem(), dto.isActivo());
    }

    public DTOInspeccao comporDTOInspeccao(Inspeccao inspeccao) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public Inspeccao decomporDTOInspeccao(DTOInspeccao dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOMarca comporDTOMarca(Marca marca) {
        ArrayList<DTOModelo> modelos = new ArrayList<DTOModelo>(marca.getModelos().size());
        for (Modelo modelo : marca.getModelos()) {
            modelos.add(comporDTOModelo(modelo));
        }

        return new DTOMarca(marca.getId(), marca.getNome(), modelos, marca.isActivo());
    }

    public Marca decomporDTOMarca(DTOMarca dto) {
        ArrayList<Modelo> modelos = new ArrayList<Modelo>(dto.getModelos().size());
        for (DTOModelo dm : dto.getModelos()) {
            modelos.add(decomporDTOModelo(dm));
        }

        return new Marca(dto.getId(), dto.getNome(), modelos, dto.isActivo());
    }

    public DTOMaterial comporDTOMaterial(Material material) {
        return new DTOMaterial(material.getId(), comporDTOFornecedor(material.getFornecedor()),
                material.getPrecoUnitario(), comporDTOIVA(material.getIva()),
                material.getReferencia(), material.getDescricao(), material.isActivo());
    }

    public Material decomporDTOMaterial(DTOMaterial dto) {
        return new Material(dto.getId(), decomporDTOFornecedor(dto.getFornecedor()),
                dto.getPrecoUnitario(), decomporDTOIVA(dto.getIva()), dto.getReferencia(),
                dto.getDescricao(), dto.isActivo());
    }

    public DTOModelo comporDTOModelo(Modelo modelo) {
        return new DTOModelo(modelo.getId(), comporDTOMarca(modelo.getMarca()),
                modelo.getNome(), modelo.isActivo());
    }

    public Modelo decomporDTOModelo(DTOModelo dto) {
        return new Modelo(dto.getId(), decomporDTOMarca(dto.getMarca()), dto.getNome(), dto.isActivo());
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
        return new DTOCategoria(categoria.getId(), categoria.getNome(), categoria.isActivo());
    }

    public Categoria decomporDTOCategoria(DTOCategoria dto) {
        return new Categoria(dto.getId(), dto.getNome(), dto.isActivo());
    }

    public DTOCombustivel comporDTOCombustivel(Combustivel combustivel) {
        return new DTOCombustivel(combustivel.getId(), combustivel.getNome(), combustivel.isActivo());
    }

    public Combustivel decomporDTOCombustivel(DTOCombustivel dto) {
        return new Combustivel(dto.getId(), dto.getNome(), dto.isActivo());
    }

    public DTOEstadoInspeccao comporDTOEstadoInspeccao(EstadoInspeccao estado) {
        return new DTOEstadoInspeccao(estado.getId(), estado.getNome(), estado.isActivo());
    }

    public EstadoInspeccao decomporDTOEstadoInspeccao(DTOEstadoInspeccao dto) {
        return new EstadoInspeccao(dto.getId(), dto.getNome(), dto.isActivo());
    }

    public DTOUtilizador comporDTOUtilizador(Utilizador utilizador) {
        return new DTOUtilizador(utilizador.getId(), utilizador.getNome(), utilizador.getPassword());
    }

    public Utilizador decomporDTOUtilizador(DTOUtilizador dto) {
        return new Utilizador(dto.getId(), dto.getNome(), dto.getPassword());
    }

    private static class SingletonHolder {

        public static final DTOFactory FACTORY = new DTOFactory();
    }
}
