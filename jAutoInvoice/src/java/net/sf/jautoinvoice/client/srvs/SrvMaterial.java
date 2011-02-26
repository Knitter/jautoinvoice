/*
 * SrvMaterial.java
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
package net.sf.jautoinvoice.client.srvs;

import com.google.gwt.user.client.rpc.RemoteService;
import com.google.gwt.user.client.rpc.RemoteServiceRelativePath;
import java.util.ArrayList;
import net.sf.jautoinvoice.client.modelo.Material;

/**
 * Serviço de gestão de material.
 * 
 * @since 1.0
 */
@RemoteServiceRelativePath("material")
public interface SrvMaterial extends RemoteService {

    /**
     * 
     * @param novo 
     * @since 1.0
     */
    public void adicionarMaterial(Material novo);

    /**
     * 
     * @param apagar 
     * @since 1.0
     */
    public void removerMaterial(Material apagar);

    /**
     * 
     * @return 
     * @since 1.0
     */
    public ArrayList<Material> listarTodosMateriais();
}
