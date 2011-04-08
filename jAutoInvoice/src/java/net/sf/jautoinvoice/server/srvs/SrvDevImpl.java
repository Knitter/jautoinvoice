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
import net.sf.jautoinvoice.client.model.Cliente;
import net.sf.jautoinvoice.client.model.ETipoUtilizador;
import net.sf.jautoinvoice.client.model.Fornecedor;
import net.sf.jautoinvoice.client.model.Funcionario;
import net.sf.jautoinvoice.client.model.IVA;
import net.sf.jautoinvoice.client.model.Marca;
import net.sf.jautoinvoice.client.model.Material;
import net.sf.jautoinvoice.client.model.Modelo;
import net.sf.jautoinvoice.client.model.Servico;
import net.sf.jautoinvoice.client.model.Utilizador;
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

        ArrayList<IVA> ivas = new ArrayList<IVA>();
        ivas.add(new IVA("Sem IVA", 0, true));
        ivas.add(new IVA("IVA 6%", 6, true));
        ivas.add(new IVA("IVA 23%", 23, true));

        ArrayList<Servico> servicos = new ArrayList<Servico>();
        servicos.add(new Servico("Inspecção", true));
        servicos.add(new Servico("Mudança de Óleo", true));
        servicos.add(new Servico("Reparação Mecânica - Motor", true));
        servicos.add(new Servico("Reparação Mecânica - Amortecedores", true));
        servicos.add(new Servico("Reparação Mecânica - Caixa de Velocidades", true));
        servicos.add(new Servico("Reparação Eléctrica - Luzes", true));
        servicos.add(new Servico("Limpeza Geral", true));
        servicos.add(new Servico("Pintura", true));
        servicos.add(new Servico("Diversos", true));
        servicos.add(new Servico("Alinhamento de Direcção", true));
        servicos.add(new Servico("Reparação de Pneus", true));
        servicos.add(new Servico("Bate-chapas", true));

        ArrayList<String> contactos = new ArrayList<String>();
        ArrayList<Cliente> clientes = new ArrayList<Cliente>();

        Cliente c = null;
        Utilizador u = null;

        u = new Utilizador("cliente1", SHA1.hash("cliente1"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C1", "António Mota", "mota@email.moc", contactos, "Rua das Flores, 32 Casal Leiria", null, true, u);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente2", SHA1.hash("cliente2"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C2", "Bhavya Deschaepmeester", "deschaepmeester@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente3", SHA1.hash("cliente3"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C3", "Keely Flaherty", "flaherty@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente4", SHA1.hash("cliente4"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C4", "Drusilla Alkin", "alkin@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente5", SHA1.hash("cliente5"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C5", "Shakini Douay", "douday@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente6", SHA1.hash("cliente6"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C6", "Shawn Cravitz", "cravitz@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente7", SHA1.hash("cliente7"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C7", "Kyle Declercq", "declercq@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente8", SHA1.hash("cliente8"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C8", "Lara Fagan", "fagan@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente9", SHA1.hash("cliente9"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C9", "Kevyn Hiranuma", "hiranuma@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente10", SHA1.hash("cliente10"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C10", "Uaithne Conlin", "conlin@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente11", SHA1.hash("cliente11"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C11", "Gorm Herreman", "herreman@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente12", SHA1.hash("cliente12"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C12", "Herluin Wiatt", "wiatt@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente13", SHA1.hash("cliente13"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C13", "Jeanina Faal", "faal@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente14", SHA1.hash("cliente14"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C14", "Burnell Laureys", "laureys@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente15", SHA1.hash("cliente15"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C15", "Amayeta Lonnqvist", "lonnqvist@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente16", SHA1.hash("cliente16"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C16", "Dhansukh Fumihiko", "fumihiko@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente17", SHA1.hash("cliente17"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C17", "Dionizy Vaninadh", "vaninadh@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        u = new Utilizador("cliente18", SHA1.hash("cliente18"), ETipoUtilizador.CLIENTE, true, null, null);
        c = new Cliente("C18", "Dymphna Keller", "keller@email.moc", contactos, "endereco", null, true, null);
        u.setCliente(c);
        clientes.add(c);

        ArrayList<Funcionario> funcionarios = new ArrayList<Funcionario>();
        u = new Utilizador("funcionario1", SHA1.hash("funcionario1"), ETipoUtilizador.FUNCIONARIO, true, null, null);
        Funcionario f = new Funcionario("Vsnderveer Meyuhas", "245987334", 10, u, true);
        u.setFuncionario(f);
        funcionarios.add(f);

        u = new Utilizador("funcionario2", SHA1.hash("funcionario2"), ETipoUtilizador.FUNCIONARIO, true, f, null);
        f = new Funcionario("Logan Baugh", "341229330", 10.50, null, true);
        u.setFuncionario(f);
        funcionarios.add(f);

        u = new Utilizador("funcionario3", SHA1.hash("funcionario3"), ETipoUtilizador.FUNCIONARIO, true, f, null);
        f = new Funcionario("Berengaria Heintz", "231009223", 15, null, true);
        funcionarios.add(f);

        u = new Utilizador("funcionario4", SHA1.hash("funcionario4"), ETipoUtilizador.FUNCIONARIO, true, f, null);
        f = new Funcionario("Seth Bethell", "122390333", 10, null, true);
        u.setFuncionario(f);
        funcionarios.add(f);

        u = new Utilizador("funcionario5", SHA1.hash("funcionario5"), ETipoUtilizador.FUNCIONARIO, true, f, null);
        f = new Funcionario("Fakhriyya Al-Naqqash", "139942009", 10.50, null, true);
        u.setFuncionario(f);
        funcionarios.add(f);

        Utilizador admin = new Utilizador("admin", SHA1.hash("admin"), ETipoUtilizador.ADMINISTRADOR, true, null, null);
        Utilizador gest = new Utilizador("gestor", SHA1.hash("gestor"), ETipoUtilizador.GESTOR, true, null, null);

        Marca m = new Marca("Renault", null);
        ArrayList<Modelo> mo = new ArrayList<Modelo>();
        mo.add(new Modelo(m, "Clio"));
        mo.add(new Modelo(m, "9"));
        mo.add(new Modelo(m, "19"));
        mo.add(new Modelo(m, "21"));
        mo.add(new Modelo(m, "Space"));
        mo.add(new Modelo(m, "Kangoo"));
        mo.add(new Modelo(m, "Twingo"));
        m.setModelos(mo);

        m = new Marca("Mercedes", null);
        mo = new ArrayList<Modelo>();
        mo.add(new Modelo(m, "SLK"));
        mo.add(new Modelo(m, "Mini"));
        mo.add(new Modelo(m, "Coupé"));
        mo.add(new Modelo(m, "Classe R"));
        mo.add(new Modelo(m, "Roadster"));
        mo.add(new Modelo(m, "Berlina"));
        mo.add(new Modelo(m, "SLS AMG"));
        m.setModelos(mo);

        m = new Marca("Fiat", null);
        mo = new ArrayList<Modelo>();
        mo.add(new Modelo(m, "Punto"));
        mo.add(new Modelo(m, "127"));
        mo.add(new Modelo(m, "Bravo"));
        mo.add(new Modelo(m, "Regata"));
        mo.add(new Modelo(m, "Uno"));
        mo.add(new Modelo(m, "X1/9"));
        mo.add(new Modelo(m, "Duna"));
        m.setModelos(mo);

        m = new Marca("BMW", null);
        mo = new ArrayList<Modelo>();
        mo.add(new Modelo(m, "GINA"));
        mo.add(new Modelo(m, "C1"));
        mo.add(new Modelo(m, "X6"));
        m.setModelos(mo);

        m = new Marca("Citroën", null);
        mo = new ArrayList<Modelo>();
        mo.add(new Modelo(m, "Xara"));
        mo.add(new Modelo(m, "Saxo"));
        mo.add(new Modelo(m, "XM"));
        mo.add(new Modelo(m, "C3"));
        mo.add(new Modelo(m, "C4"));
        mo.add(new Modelo(m, "C5"));
        mo.add(new Modelo(m, "Picasso"));
        m.setModelos(mo);

        Fornecedor fo = new Fornecedor("Francisco Alves", "falves@hotmail.com", "345112098", null, null, true);
        ArrayList<Material> materiais = new ArrayList<Material>();
        materiais.add(new Material(fo, 20.5, ivas.get(2), "FA01", "Conjunto de Pneus", true));
        materiais.add(new Material(fo, 788, ivas.get(2), "FA02", "Volante", true));
        materiais.add(new Material(fo, 257, ivas.get(2), "FA03", "Eixo frontal", true));
        materiais.add(new Material(fo, 562, ivas.get(2), "FA04", "Conjunto de Velas", true));
        materiais.add(new Material(fo, 32, ivas.get(2), "FA05", "Motor de arranque A45", true));
        materiais.add(new Material(fo, 653, ivas.get(2), "FA06", "Escovas vidro frontal Clio 90", true));
        materiais.add(new Material(fo, 4, ivas.get(2), "FA07", "Escovas traseiras Clio 90", true));
        materiais.add(new Material(fo, 234, ivas.get(2), "FA08", "Desc", true));
        materiais.add(new Material(fo, 452, ivas.get(2), "FA09", "desc", true));

        fo = new Fornecedor("Joaquim Mendes", "jm@joaquimmendes.com", "211987222", "211987233", null, true);
        materiais.add(new Material(fo, 245, ivas.get(2), "JM01", "desc", true));
        materiais.add(new Material(fo, 732, ivas.get(2), "JM02", "desc", true));
        materiais.add(new Material(fo, 76, ivas.get(2), "JM09", "desc", true));
        materiais.add(new Material(fo, 35, ivas.get(2), "JM08", "desc", true));
        materiais.add(new Material(fo, 353, ivas.get(2), "JM07", "desc", true));
        materiais.add(new Material(fo, 33, ivas.get(2), "JM06", "desc", true));
        materiais.add(new Material(fo, 3, ivas.get(2), "JM05", "desc", true));
        materiais.add(new Material(fo, 353, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 53, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 53, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 24, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 65, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 53, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 24, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 23, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 654, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 6545, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 35, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 242, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 53, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 564, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 5, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 23, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 785, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 54, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 222, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 232, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 42, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 23, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 23, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 53, ivas.get(2), "ref", "desc", true));

        fo = new Fornecedor("Audi", "pecas@audi.com", "219033222", "219033225", null, true);
        materiais.add(new Material(fo, 34, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 653, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 5, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 23, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 4, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 3, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 54, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 4, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 3, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 44, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 65, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 653, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 45, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 314, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 21, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 333, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 2, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 40, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 32, ivas.get(2), "ref", "desc", true));
        materiais.add(new Material(fo, 12, ivas.get(2), "ref", "desc", true));


        for (IVA i : ivas) {
            gestor.adicionarIVA(i);
        }

        for (Servico s : servicos) {
            gestor.adicionarServico(s);
        }

        for (Cliente c2 : clientes) {
            gestor.adicionarCliente(c2);
        }

        for (Modelo m2 : mo) {
            gestor.adicionarModelo(m2);
        }

        for (Funcionario f2 : funcionarios) {
            gestor.adicionarFuncionario(f2);
        }

        for (Material m3 : materiais) {
            gestor.adicionarMaterial(m3);
        }
    }
}
