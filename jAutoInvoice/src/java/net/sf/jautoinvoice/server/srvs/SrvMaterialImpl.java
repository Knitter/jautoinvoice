/*
 * SrvMaterialImpl.java
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
import net.sf.jautoinvoice.client.model.Material;
import net.sf.jautoinvoice.client.srvs.SrvMaterial;
import net.sf.jautoinvoice.server.JAutoInvoiceManager;

/**
 * Implementação do serviço de gestão de materiais.
 * 
 * @see SrvMaterial
 * @since 1.0
 */
public class SrvMaterialImpl extends RemoteServiceServlet implements SrvMaterial {

    private JAutoInvoiceManager gestor;

    public SrvMaterialImpl() {
        super();
        gestor = new JAutoInvoiceManager();
    }

    public void adicionarMaterial(Material novo) {
        gestor.adicionarMaterial(novo);
    }

    public void removerMaterial(Material apagar) {
        gestor.removerMaterial(apagar);
    }

    public ArrayList<Material> listarTodosMateriais() {
        return gestor.listarTodosMateriais();
    }
}
