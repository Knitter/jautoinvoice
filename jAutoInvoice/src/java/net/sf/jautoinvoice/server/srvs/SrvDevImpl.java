/*
 * SrvDevImpl.java
 *
 * This file is part of jAutoInvoice, http://sourceforge.net/p/jautoinvoice
 *
 * Copyright (C) 2011 jAutoInvoice
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
package net.sf.jautoinvoice.server.srvs;

import com.google.gwt.user.server.rpc.RemoteServiceServlet;
import java.util.ArrayList;
import net.sf.jautoinvoice.client.dto.DTOCategoria;
import net.sf.jautoinvoice.client.dto.DTOCliente;
import net.sf.jautoinvoice.client.dto.DTOCombustivel;
import net.sf.jautoinvoice.client.dto.DTOEstadoInspeccao;
import net.sf.jautoinvoice.client.dto.DTOFornecedor;
import net.sf.jautoinvoice.client.dto.DTOFuncionario;
import net.sf.jautoinvoice.client.dto.DTOIVA;
import net.sf.jautoinvoice.client.dto.DTOMarca;
import net.sf.jautoinvoice.client.dto.DTOMaterial;
import net.sf.jautoinvoice.client.dto.DTOModelo;
import net.sf.jautoinvoice.client.dto.DTOServico;
import net.sf.jautoinvoice.client.dto.DTOUtilizador;
import net.sf.jautoinvoice.client.srvs.SrvDev;
import net.sf.jautoinvoice.server.JAutoInvoiceManager;
import net.sf.jautoinvoice.server.SHA1;

/**
 * @see SrvDev
 * @since 1.0
 */
public class SrvDevImpl extends RemoteServiceServlet implements SrvDev {

    private JAutoInvoiceManager gestor;

    public SrvDevImpl() {
        super();
        gestor = new JAutoInvoiceManager();
    }

    public void criarDadosTeste() {

        ArrayList<DTOCombustivel> combustiveis = new ArrayList<DTOCombustivel>();
        combustiveis.add(new DTOCombustivel(null, "Gasolina", true));
        combustiveis.add(new DTOCombustivel(null, "Diesel", true));
        combustiveis.add(new DTOCombustivel(null, "Bio-Diesel", true));
        combustiveis.add(new DTOCombustivel(null, "Eléctrico", true));
        combustiveis.add(new DTOCombustivel(null, "GPL", true));

        ArrayList<DTOEstadoInspeccao> estados = new ArrayList<DTOEstadoInspeccao>();
        estados.add(new DTOEstadoInspeccao(null, "Aprovado", true));
        estados.add(new DTOEstadoInspeccao(null, "Reprovado - Anomalia Nível 1", true));
        estados.add(new DTOEstadoInspeccao(null, "Reprovado - Anomalia Nível 2", true));
        estados.add(new DTOEstadoInspeccao(null, "Reprovado - Anomalia Nível 3", true));

        ArrayList<DTOCategoria> categorias = new ArrayList<DTOCategoria>();
        categorias.add(new DTOCategoria(null, "Agrícola", true));
        categorias.add(new DTOCategoria(null, "Ciclomotor", true));
        categorias.add(new DTOCategoria(null, "Triciclo", true));
        categorias.add(new DTOCategoria(null, "Quadriciclo", true));
        categorias.add(new DTOCategoria(null, "Motociclo", true));
        categorias.add(new DTOCategoria(null, "Ligeiro", true));
        categorias.add(new DTOCategoria(null, "Pesado", true));
        categorias.add(new DTOCategoria(null, "Reboque", true));

        ArrayList<DTOIVA> ivas = new ArrayList<DTOIVA>();
        ivas.add(new DTOIVA(null, "Sem IVA", 0, true));
        ivas.add(new DTOIVA(null, "IVA 6%", 6, true));
        ivas.add(new DTOIVA(null, "IVA 13%", 13, true));
        ivas.add(new DTOIVA(null, "IVA 17%", 17, true));
        ivas.add(new DTOIVA(null, "IVA 23%", 23, true));

        ArrayList<DTOServico> servicos = new ArrayList<DTOServico>();
        servicos.add(new DTOServico(null, "Inspecção", true));
        servicos.add(new DTOServico(null, "Mudança de Óleo", true));
        servicos.add(new DTOServico(null, "Reparação Mecânica - Motor", true));
        servicos.add(new DTOServico(null, "Reparação Mecânica - Amortecedores", true));
        servicos.add(new DTOServico(null, "Reparação Mecânica - Caixa de Velocidades", true));
        servicos.add(new DTOServico(null, "Reparação Eléctrica - Luzes", true));
        servicos.add(new DTOServico(null, "Limpeza Geral", true));
        servicos.add(new DTOServico(null, "Pintura", true));
        servicos.add(new DTOServico(null, "Diversos", true));
        servicos.add(new DTOServico(null, "Alinhamento de Direcção", true));
        servicos.add(new DTOServico(null, "Reparação de Pneus", true));
        servicos.add(new DTOServico(null, "Bate-chapas", true));

        ArrayList<String> contactos = new ArrayList<String>();
        ArrayList<DTOCliente> clientes = new ArrayList<DTOCliente>();

        DTOCliente c = null;
        DTOUtilizador u = new DTOUtilizador(null, "cliente1", SHA1.hash("cliente1"));
        c = new DTOCliente(null, "António Mota", null, "mota@email.moc", contactos, "Rua das Flores, 32 Casal Leiria", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente2", SHA1.hash("cliente2"));
        c = new DTOCliente(null, "Bhavya Deschaepmeester", null, "deschaepmeester@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente3", SHA1.hash("cliente3"));
        c = new DTOCliente(null, "Keely Flaherty", null, "flaherty@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente4", SHA1.hash("cliente4"));
        c = new DTOCliente(null, "Drusilla Alkin", null, "alkin@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente5", SHA1.hash("cliente5"));
        c = new DTOCliente(null, "Shakini Douay", null, "douday@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente6", SHA1.hash("cliente6"));
        c = new DTOCliente(null, "Shawn Cravitz", null, "cravitz@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente7", SHA1.hash("cliente7"));
        c = new DTOCliente(null, "Kyle Declercq", null, "declercq@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente8", SHA1.hash("cliente8"));
        c = new DTOCliente(null, "Lara Fagan", null, "fagan@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente9", SHA1.hash("cliente9"));
        c = new DTOCliente(null, "Kevyn Hiranuma", null, "hiranuma@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente10", SHA1.hash("cliente10"));
        c = new DTOCliente(null, "Uaithne Conlin", null, "conlin@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente11", SHA1.hash("cliente11"));
        c = new DTOCliente(null,  "Gorm Herreman", null, "herreman@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente12", SHA1.hash("cliente12"));
        c = new DTOCliente(null,  "Herluin Wiatt", null, "wiatt@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente13", SHA1.hash("cliente13"));
        c = new DTOCliente(null,  "Jeanina Faal", null, "faal@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente14", SHA1.hash("cliente14"));
        c = new DTOCliente(null,  "Burnell Laureys", null, "laureys@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente15", SHA1.hash("cliente15"));
        c = new DTOCliente(null,  "Amayeta Lonnqvist", null, "lonnqvist@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente16", SHA1.hash("cliente16"));
        c = new DTOCliente(null,  "Dhansukh Fumihiko", null, "fumihiko@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente17", SHA1.hash("cliente17"));
        c = new DTOCliente(null,  "Dionizy Vaninadh", null, "vaninadh@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        u = new DTOUtilizador(null, "cliente18", SHA1.hash("cliente18"));
        c = new DTOCliente(null,  "Dymphna Keller", null, "keller@email.moc", contactos, "endereco", null, u, true);
        clientes.add(c);

        ArrayList<DTOFuncionario> funcionarios = new ArrayList<DTOFuncionario>();
        u = new DTOUtilizador(null, "funcionario1", SHA1.hash("funcionario1"));
        DTOFuncionario f = new DTOFuncionario(null, "Vsnderveer Meyuhas", "245987334", 10, u, true);
        funcionarios.add(f);

        u = new DTOUtilizador(null, "funcionario2", SHA1.hash("funcionario2"));
        f = new DTOFuncionario(null, "Logan Baugh", "341229330", 10.50, u, true);
        funcionarios.add(f);

        u = new DTOUtilizador(null, "funcionario3", SHA1.hash("funcionario3"));
        f = new DTOFuncionario(null, "Berengaria Heintz", "231009223", 15, u, true);
        funcionarios.add(f);

        u = new DTOUtilizador(null, "funcionario4", SHA1.hash("funcionario4"));
        f = new DTOFuncionario(null, "Seth Bethell", "122390333", 10, u, true);
        funcionarios.add(f);

        u = new DTOUtilizador(null, "funcionario5", SHA1.hash("funcionario5"));
        f = new DTOFuncionario(null, "Fakhriyya Al-Naqqash", "139942009", 10.50, u, true);
        funcionarios.add(f);

        DTOMarca m = new DTOMarca(null, "Renault", null, true);
        ArrayList<DTOModelo> mo = new ArrayList<DTOModelo>();
        mo.add(new DTOModelo(null, m, "Clio", true));
        mo.add(new DTOModelo(null, m, "9", true));
        mo.add(new DTOModelo(null, m, "19", true));
        mo.add(new DTOModelo(null, m, "21", true));
        mo.add(new DTOModelo(null, m, "Space", true));
        mo.add(new DTOModelo(null, m, "Kangoo", true));
        mo.add(new DTOModelo(null, m, "Twingo", true));
        m.setModelos(mo);

        m = new DTOMarca(null, "Mercedes", null, true);
        mo = new ArrayList<DTOModelo>();
        mo.add(new DTOModelo(null, m, "SLK", true));
        mo.add(new DTOModelo(null, m, "Mini", true));
        mo.add(new DTOModelo(null, m, "Coupé", true));
        mo.add(new DTOModelo(null, m, "Classe R", true));
        mo.add(new DTOModelo(null, m, "Roadster", true));
        mo.add(new DTOModelo(null, m, "Berlina", true));
        mo.add(new DTOModelo(null, m, "SLS AMG", true));
        m.setModelos(mo);

        m = new DTOMarca(null, "Fiat", null, true);
        mo = new ArrayList<DTOModelo>();
        mo.add(new DTOModelo(null, m, "Punto", true));
        mo.add(new DTOModelo(null, m, "127", true));
        mo.add(new DTOModelo(null, m, "Bravo", true));
        mo.add(new DTOModelo(null, m, "Regata", true));
        mo.add(new DTOModelo(null, m, "Uno", true));
        mo.add(new DTOModelo(null, m, "X1/9", true));
        mo.add(new DTOModelo(null, m, "Duna", true));
        m.setModelos(mo);

        m = new DTOMarca(null, "BMW", null, true);
        mo = new ArrayList<DTOModelo>();
        mo.add(new DTOModelo(null, m, "GINA", true));
        mo.add(new DTOModelo(null, m, "C1", true));
        mo.add(new DTOModelo(null, m, "X6", true));
        m.setModelos(mo);

        m = new DTOMarca(null, "Citroën", null, true);
        mo = new ArrayList<DTOModelo>();
        mo.add(new DTOModelo(null, m, "Xara", true));
        mo.add(new DTOModelo(null, m, "Saxo", true));
        mo.add(new DTOModelo(null, m, "XM", true));
        mo.add(new DTOModelo(null, m, "C3", true));
        mo.add(new DTOModelo(null, m, "C4", true));
        mo.add(new DTOModelo(null, m, "C5", true));
        mo.add(new DTOModelo(null, m, "Picasso", true));
        m.setModelos(mo);

        DTOFornecedor fo = new DTOFornecedor(null, "Francisco Alves", "falves@hotmail.com", "345112098", null, null, true);
        ArrayList<DTOMaterial> materiais = new ArrayList<DTOMaterial>();
        materiais.add(new DTOMaterial(null, fo, 20.5, ivas.get(2), "FA01", "Conjunto de Pneus", true));
        materiais.add(new DTOMaterial(null, fo, 788, ivas.get(2), "FA02", "Volante", true));
        materiais.add(new DTOMaterial(null, fo, 257, ivas.get(2), "FA03", "Eixo frontal", true));
        materiais.add(new DTOMaterial(null, fo, 562, ivas.get(2), "FA04", "Conjunto de Velas", true));
        materiais.add(new DTOMaterial(null, fo, 32, ivas.get(2), "FA05", "Motor de arranque A45", true));
        materiais.add(new DTOMaterial(null, fo, 653, ivas.get(2), "FA06", "Escovas vidro frontal Clio 90", true));
        materiais.add(new DTOMaterial(null, fo, 4, ivas.get(2), "FA07", "Escovas traseiras Clio 90", true));
        materiais.add(new DTOMaterial(null, fo, 234, ivas.get(2), "FA08", "Desc", true));
        materiais.add(new DTOMaterial(null, fo, 452, ivas.get(2), "FA09", "desc", true));

        fo = new DTOFornecedor(null, "Joaquim Mendes", "jm@joaquimmendes.com", "211987222", "211987233", null, true);
        materiais.add(new DTOMaterial(null, fo, 245, ivas.get(2), "JM01", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 732, ivas.get(2), "JM02", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 76, ivas.get(2), "JM09", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 35, ivas.get(2), "JM08", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 353, ivas.get(2), "JM07", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 33, ivas.get(2), "JM06", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 3, ivas.get(2), "JM05", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 353, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 53, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 53, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 24, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 65, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 53, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 24, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 23, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 654, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 6545, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 35, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 242, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 53, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 564, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 5, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 23, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 785, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 54, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 222, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 232, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 42, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 23, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 23, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 53, ivas.get(2), "ref", "desc", true));

        fo = new DTOFornecedor(null, "Audi", "pecas@audi.com", "219033222", "219033225", null, true);
        materiais.add(new DTOMaterial(null, fo, 34, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 653, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 5, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 23, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 4, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 3, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 54, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 4, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 3, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 44, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 65, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 653, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 45, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 314, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 21, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 333, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 2, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 40, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 32, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(null, fo, 12, ivas.get(2), "ref", "desc", true));


        for (DTOIVA i : ivas) {
            gestor.adicionarIVA(i);
        }

        for (DTOServico s : servicos) {
            gestor.adicionarServico(s);
        }

        for (DTOCliente c2 : clientes) {
            gestor.adicionarCliente(c2);
        }

        for (DTOModelo m2 : mo) {
            gestor.adicionarModelo(m2);
        }

        for (DTOFuncionario f2 : funcionarios) {
            gestor.adicionarFuncionario(f2);
        }

        for (DTOMaterial m3 : materiais) {
            gestor.adicionarMaterial(m3);
        }
    }
}
