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

    //TODO: inspecções, folhas de obra, etc.
    public DTOCliente comporDTOCliente(Cliente cliente) {
        ArrayList<DTOVeiculo> veiculos = new ArrayList<DTOVeiculo>(cliente.getNumeroVeiculos());

        for (Veiculo veiculo : cliente.getVeiculos()) {
            veiculos.add(new DTOVeiculo(veiculo.getId(), comporDTOModelo(veiculo.getModelo()), veiculo.getDataRegisto(),
                    veiculo.getMatricula(), veiculo.getNrChassis(), veiculo.getCilindrada(),
                    veiculo.getNrMotor(), null, null, null, comporDTOCategoria(veiculo.getCategoria()),
                    comporDTOCombustivel(veiculo.getCombustivel()), veiculo.getNotas(), null, veiculo.isActivo()));
        }

        DTOUtilizador utilizador = comporDTOUtilizador(cliente.getUtilizador());

        return new DTOCliente(cliente.getId(), cliente.getNome(), cliente.getContribuinte(), cliente.getEmail(),
                cliente.getContactos(), cliente.getEndereco(), veiculos, utilizador, cliente.isActivo());
    }

    //TODO: inspecções, folhas de obra, etc.
    public Cliente decomporDTOCliente(DTOCliente dto) {
        ArrayList<Veiculo> veiculos = new ArrayList<Veiculo>(dto.getNumeroVeiculos());

        for (DTOVeiculo veiculo : dto.getVeiculos()) {
            veiculos.add(new Veiculo(veiculo.getId(), decomporDTOModelo(veiculo.getModelo()), veiculo.getDataRegisto(),
                    veiculo.getMatricula(), veiculo.getNrChassis(), veiculo.getCilindrada(),
                    veiculo.getNrMotor(), null, null, null, decomporDTOCategoria(veiculo.getCategoria()),
                    decomporDTOCombustivel(veiculo.getCombustivel()), veiculo.getNotas(), null, veiculo.isActivo()));
        }

        Utilizador utilizador = decomporDTOUtilizador(dto.getUtilizador());

        return new Cliente(dto.getId(), dto.getNome(), dto.getContribuinte(), dto.getEmail(),
                dto.getContactos(), dto.getEndereco(), veiculos, utilizador, dto.isActivo());
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
        ArrayList<DTOModelo> modelos = new ArrayList<DTOModelo>(marca.getNumeroModelos());
        for (Modelo modelo : marca.getModelos()) {
            modelos.add(new DTOModelo(modelo.getId(), null, modelo.getNome(), modelo.isActivo()));
        }

        return new DTOMarca(marca.getId(), marca.getNome(), modelos, marca.isActivo());
    }

    public Marca decomporDTOMarca(DTOMarca dto) {
        ArrayList<Modelo> modelos = new ArrayList<Modelo>(dto.getNumeroModelos());
        for (DTOModelo dm : dto.getModelos()) {
            modelos.add(new Modelo(dto.getId(), null, dto.getNome(), dto.isActivo()));
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
        if (modelo.getMarca() != null) {
            for (DTOModelo dm : comporDTOMarca(modelo.getMarca()).getModelos()) {
                if (dm.getId() != null && dm.getId().equals(modelo.getId())) {
                    return dm;
                }
            }
        }

        return new DTOModelo(modelo.getId(), null, modelo.getNome(), modelo.isActivo());
    }

    public Modelo decomporDTOModelo(DTOModelo dto) {
        if (dto.getMarca() != null) {
            for (Modelo modelo : decomporDTOMarca(dto.getMarca()).getModelos()) {
                if (modelo.getId() != null && modelo.getId().equals(dto.getId())) {
                    return modelo;
                }
            }
        }

        return new Modelo(dto.getId(), null, dto.getNome(), dto.isActivo());
    }

    public DTOServico comporDTOServico(Servico servico) {
        return new DTOServico(servico.getId(), servico.getDescricao(), servico.isActivo());
    }

    public Servico decomporDTOServico(DTOServico dto) {
        return new Servico(dto.getId(), dto.getDescricao(), dto.isActivo());
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
