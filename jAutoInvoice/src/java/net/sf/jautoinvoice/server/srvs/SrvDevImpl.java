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
import net.sf.jautoinvoice.client.dto.DTOCliente;
import net.sf.jautoinvoice.client.dto.DTOFornecedor;
import net.sf.jautoinvoice.client.dto.DTOFuncionario;
import net.sf.jautoinvoice.client.dto.DTOIVA;
import net.sf.jautoinvoice.client.dto.DTOMarca;
import net.sf.jautoinvoice.client.dto.DTOMaterial;
import net.sf.jautoinvoice.client.dto.DTOModelo;
import net.sf.jautoinvoice.client.dto.DTOServico;
import net.sf.jautoinvoice.client.srvs.SrvDev;
import net.sf.jautoinvoice.server.JAutoInvoiceManager;
import net.sf.jautoinvoice.server.SHA1;
import net.sf.jautoinvoice.server.model.ETipoUtilizador;
import net.sf.jautoinvoice.server.model.Utilizador;

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

        ArrayList<DTOIVA> ivas = new ArrayList<DTOIVA>();
        ivas.add(new DTOIVA("Sem IVA", 0, true));
        ivas.add(new DTOIVA("IVA 6%", 6, true));
        ivas.add(new DTOIVA("IVA 23%", 23, true));

        ArrayList<DTOServico> servicos = new ArrayList<DTOServico>();
        servicos.add(new DTOServico("Inspecção", true));
        servicos.add(new DTOServico("Mudança de Óleo", true));
        servicos.add(new DTOServico("Reparação Mecânica - Motor", true));
        servicos.add(new DTOServico("Reparação Mecânica - Amortecedores", true));
        servicos.add(new DTOServico("Reparação Mecânica - Caixa de Velocidades", true));
        servicos.add(new DTOServico("Reparação Eléctrica - Luzes", true));
        servicos.add(new DTOServico("Limpeza Geral", true));
        servicos.add(new DTOServico("Pintura", true));
        servicos.add(new DTOServico("Diversos", true));
        servicos.add(new DTOServico("Alinhamento de Direcção", true));
        servicos.add(new DTOServico("Reparação de Pneus", true));
        servicos.add(new DTOServico("Bate-chapas", true));

        ArrayList<String> contactos = new ArrayList<String>();
        ArrayList<DTOCliente> clientes = new ArrayList<DTOCliente>();

        DTOCliente c = null;
        Utilizador u = null;

        //u = new Utilizador("cliente1", SHA1.hash("cliente1"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C1", "António Mota", "mota@email.moc", contactos, "Rua das Flores, 32 Casal Leiria", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente2", SHA1.hash("cliente2"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C2", "Bhavya Deschaepmeester", "deschaepmeester@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente3", SHA1.hash("cliente3"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C3", "Keely Flaherty", "flaherty@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente4", SHA1.hash("cliente4"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C4", "Drusilla Alkin", "alkin@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente5", SHA1.hash("cliente5"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C5", "Shakini Douay", "douday@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente6", SHA1.hash("cliente6"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C6", "Shawn Cravitz", "cravitz@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente7", SHA1.hash("cliente7"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C7", "Kyle Declercq", "declercq@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente8", SHA1.hash("cliente8"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C8", "Lara Fagan", "fagan@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente9", SHA1.hash("cliente9"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C9", "Kevyn Hiranuma", "hiranuma@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente10", SHA1.hash("cliente10"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C10", "Uaithne Conlin", "conlin@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente11", SHA1.hash("cliente11"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C11", "Gorm Herreman", "herreman@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente12", SHA1.hash("cliente12"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C12", "Herluin Wiatt", "wiatt@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente13", SHA1.hash("cliente13"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C13", "Jeanina Faal", "faal@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente14", SHA1.hash("cliente14"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C14", "Burnell Laureys", "laureys@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente15", SHA1.hash("cliente15"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C15", "Amayeta Lonnqvist", "lonnqvist@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente16", SHA1.hash("cliente16"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C16", "Dhansukh Fumihiko", "fumihiko@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente17", SHA1.hash("cliente17"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C17", "Dionizy Vaninadh", "vaninadh@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        //u = new Utilizador("cliente18", SHA1.hash("cliente18"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new DTOCliente("C18", "Dymphna Keller", "keller@email.moc", contactos, "endereco", null, true);
        //u.setCliente(c);
        clientes.add(c);

        ArrayList<DTOFuncionario> funcionarios = new ArrayList<DTOFuncionario>();
        //u = new Utilizador("funcionario1", SHA1.hash("funcionario1"), ETipoUtilizador.FUNCIONARIO, true, null, null);
        DTOFuncionario f = new DTOFuncionario("Vsnderveer Meyuhas", "245987334", 10, true);
        //u.setFuncionario(f);
        funcionarios.add(f);

        //u = new Utilizador("funcionario2", SHA1.hash("funcionario2"), ETipoUtilizador.FUNCIONARIO, true, f, null);
        f = new DTOFuncionario("Logan Baugh", "341229330", 10.50, true);
        //u.setFuncionario(f);
        funcionarios.add(f);

        //u = new Utilizador("funcionario3", SHA1.hash("funcionario3"), ETipoUtilizador.FUNCIONARIO, true, f, null);
        f = new DTOFuncionario("Berengaria Heintz", "231009223", 15, true);
        funcionarios.add(f);

        //u = new Utilizador("funcionario4", SHA1.hash("funcionario4"), ETipoUtilizador.FUNCIONARIO, true, f, null);
        f = new DTOFuncionario("Seth Bethell", "122390333", 10, true);
        //u.setFuncionario(f);
        funcionarios.add(f);

        //u = new Utilizador("funcionario5", SHA1.hash("funcionario5"), ETipoUtilizador.FUNCIONARIO, true, f, null);
        f = new DTOFuncionario("Fakhriyya Al-Naqqash", "139942009", 10.50, true);
        //u.setFuncionario(f);
        funcionarios.add(f);

        //Utilizador admin = new Utilizador("admin", SHA1.hash("admin"), ETipoUtilizador.ADMINISTRADOR, true, null, null);
        //Utilizador gest = new Utilizador("gestor", SHA1.hash("gestor"), ETipoUtilizador.GESTOR, true, null, null);

        DTOMarca m = new DTOMarca("Renault", null);
        ArrayList<DTOModelo> mo = new ArrayList<DTOModelo>();
        mo.add(new DTOModelo(m, "Clio"));
        mo.add(new DTOModelo(m, "9"));
        mo.add(new DTOModelo(m, "19"));
        mo.add(new DTOModelo(m, "21"));
        mo.add(new DTOModelo(m, "Space"));
        mo.add(new DTOModelo(m, "Kangoo"));
        mo.add(new DTOModelo(m, "Twingo"));
        m.setModelos(mo);

        m = new DTOMarca("Mercedes", null);
        mo = new ArrayList<DTOModelo>();
        mo.add(new DTOModelo(m, "SLK"));
        mo.add(new DTOModelo(m, "Mini"));
        mo.add(new DTOModelo(m, "Coupé"));
        mo.add(new DTOModelo(m, "Classe R"));
        mo.add(new DTOModelo(m, "Roadster"));
        mo.add(new DTOModelo(m, "Berlina"));
        mo.add(new DTOModelo(m, "SLS AMG"));
        m.setModelos(mo);

        m = new DTOMarca("Fiat", null);
        mo = new ArrayList<DTOModelo>();
        mo.add(new DTOModelo(m, "Punto"));
        mo.add(new DTOModelo(m, "127"));
        mo.add(new DTOModelo(m, "Bravo"));
        mo.add(new DTOModelo(m, "Regata"));
        mo.add(new DTOModelo(m, "Uno"));
        mo.add(new DTOModelo(m, "X1/9"));
        mo.add(new DTOModelo(m, "Duna"));
        m.setModelos(mo);

        m = new DTOMarca("BMW", null);
        mo = new ArrayList<DTOModelo>();
        mo.add(new DTOModelo(m, "GINA"));
        mo.add(new DTOModelo(m, "C1"));
        mo.add(new DTOModelo(m, "X6"));
        m.setModelos(mo);

        m = new DTOMarca("Citroën", null);
        mo = new ArrayList<DTOModelo>();
        mo.add(new DTOModelo(m, "Xara"));
        mo.add(new DTOModelo(m, "Saxo"));
        mo.add(new DTOModelo(m, "XM"));
        mo.add(new DTOModelo(m, "C3"));
        mo.add(new DTOModelo(m, "C4"));
        mo.add(new DTOModelo(m, "C5"));
        mo.add(new DTOModelo(m, "Picasso"));
        m.setModelos(mo);

        DTOFornecedor fo = new DTOFornecedor("Francisco Alves", "falves@hotmail.com", "345112098", null, null, true);
        ArrayList<DTOMaterial> materiais = new ArrayList<DTOMaterial>();
        materiais.add(new DTOMaterial(fo, 20.5, ivas.get(2), "FA01", "Conjunto de Pneus", true));
        materiais.add(new DTOMaterial(fo, 788, ivas.get(2), "FA02", "Volante", true));
        materiais.add(new DTOMaterial(fo, 257, ivas.get(2), "FA03", "Eixo frontal", true));
        materiais.add(new DTOMaterial(fo, 562, ivas.get(2), "FA04", "Conjunto de Velas", true));
        materiais.add(new DTOMaterial(fo, 32, ivas.get(2), "FA05", "Motor de arranque A45", true));
        materiais.add(new DTOMaterial(fo, 653, ivas.get(2), "FA06", "Escovas vidro frontal Clio 90", true));
        materiais.add(new DTOMaterial(fo, 4, ivas.get(2), "FA07", "Escovas traseiras Clio 90", true));
        materiais.add(new DTOMaterial(fo, 234, ivas.get(2), "FA08", "Desc", true));
        materiais.add(new DTOMaterial(fo, 452, ivas.get(2), "FA09", "desc", true));

        fo = new DTOFornecedor("Joaquim Mendes", "jm@joaquimmendes.com", "211987222", "211987233", null, true);
        materiais.add(new DTOMaterial(fo, 245, ivas.get(2), "JM01", "desc", true));
        materiais.add(new DTOMaterial(fo, 732, ivas.get(2), "JM02", "desc", true));
        materiais.add(new DTOMaterial(fo, 76, ivas.get(2), "JM09", "desc", true));
        materiais.add(new DTOMaterial(fo, 35, ivas.get(2), "JM08", "desc", true));
        materiais.add(new DTOMaterial(fo, 353, ivas.get(2), "JM07", "desc", true));
        materiais.add(new DTOMaterial(fo, 33, ivas.get(2), "JM06", "desc", true));
        materiais.add(new DTOMaterial(fo, 3, ivas.get(2), "JM05", "desc", true));
        materiais.add(new DTOMaterial(fo, 353, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 53, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 53, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 24, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 65, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 53, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 24, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 23, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 654, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 6545, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 35, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 242, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 53, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 564, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 5, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 23, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 785, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 54, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 222, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 232, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 42, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 23, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 23, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 53, ivas.get(2), "ref", "desc", true));

        fo = new DTOFornecedor("Audi", "pecas@audi.com", "219033222", "219033225", null, true);
        materiais.add(new DTOMaterial(fo, 34, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 653, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 5, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 23, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 4, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 3, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 54, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 4, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 3, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 44, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 65, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 653, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 45, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 314, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 21, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 333, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 2, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 40, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 32, ivas.get(2), "ref", "desc", true));
        materiais.add(new DTOMaterial(fo, 12, ivas.get(2), "ref", "desc", true));


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
