package net.sf.jautoinvoice.server;

import java.lang.reflect.Array;
import java.util.ArrayList;
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

        return new DTOCliente(cliente.getCodigo(), cliente.getNome(), cliente.getEmail(), contactos, cliente.getEndereco(), veiculos, cliente.isActivo());
    }

    public Cliente decomporDTOCliente(DTOCliente dto) {
        throw new UnsupportedOperationException("Not yet implemented");
    }

    public DTOFolhaObra comporDTOFolhaObra(FolhaObra folha) {
        return null;
    }

    public FolhaObra decomporDTOFolhaObra(DTOFolhaObra dto) {
        return null;
    }

    public DTOFornecedor comporDTOFornecedor(Fornecedor fornecedor) {
        return null;
    }

    public Fornecedor decomporDTOFornecedor(DTOFornecedor dto) {
        return null;
    }

    public DTOFuncionario comporDTOFuncionario(Funcionario funcionario) {
        return null;
    }

    public Funcionario decomporDTOFuncionario(DTOFuncionario dto) {
        return null;
    }

    public DTOIVA comporDTOIVA(IVA iva) {
        return null;
    }

    public IVA decomporDTOIVA(DTOIVA dto) {
        return null;
    }

    public DTOInspeccao comporDTOInspeccao(Inspeccao inspeccao) {
        return null;
    }

    public Inspeccao decomporDTOInspeccao(DTOInspeccao dto) {
        return null;
    }

    public DTOMarca comporDTOMarca(Marca marca) {
        return null;
    }

    public Marca decomporDTOMarca(DTOMarca dto) {
        return null;
    }

    public DTOMaterial comporDTOMaterial(Material material) {
        return null;
    }

    public Material decomporDTOMaterial(DTOMaterial dto) {
        return null;
    }

    public DTOModelo comporDTOModelo(Modelo modelo) {
        return null;
    }

    public Modelo decomporDTOModelo(DTOModelo dto) {
        return null;
    }

    public DTOServico comporDTOServico(Servico servico) {
        return null;
    }

    public Servico decomporDTOServico(DTOServico dto) {
        return null;
    }

    public DTOVeiculo comporDTOVeiculo(Veiculo veiculo) {
        return null;
    }

    public Veiculo decomporDTOVeiculo(DTOVeiculo dto) {
        return null;
    }

    private static class SingletonHolder {

        public static final DTOFactory FACTORY = new DTOFactory();
    }
}
