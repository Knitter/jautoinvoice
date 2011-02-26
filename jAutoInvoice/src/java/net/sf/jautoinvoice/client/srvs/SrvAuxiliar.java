/*
 * SrvAuxiliar.java
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
import net.sf.jautoinvoice.client.modelo.IVA;
import net.sf.jautoinvoice.client.modelo.Marca;
import net.sf.jautoinvoice.client.modelo.Modelo;
import net.sf.jautoinvoice.client.modelo.Servico;

/**
 * Serviço de gestão de dados auxiliares.
 * 
 * @since 1.0
 */
@RemoteServiceRelativePath("auxiliar")
public interface SrvAuxiliar extends RemoteService {

    /**
     * 
     * @param novo 
     * @since 1.0
     */
    public void adicionarIVA(IVA novo);

    /**
     * 
     * @param apagar 
     * @since 1.0
     */
    public void removerIVA(IVA apagar);

    /**
     * 
     * @return 
     * @since 1.0
     */
    public ArrayList<IVA> listarTodosIVAs();
    //TODO: pesquisar

    /**
     * 
     * @param nova 
     * @since 1.0
     */
    public void adicionarMarca(Marca nova);

    /**
     * 
     * @param apagar 
     * @since 1.0
     */
    public void removerMarca(Marca apagar);

    /**
     * 
     * @return 
     * @since 1.0
     */
    public ArrayList<Marca> listarTodasMarcas();
    //TODO: pesquisar

    /**
     * 
     * @param novo 
     * @since 1.0
     */
    public void adicionarModelo(Modelo novo);

    /**
     * 
     * @param apagar 
     * @since 1.0
     */
    public void removerModelo(Modelo apagar);

    /**
     * 
     * @return 
     * @since 1.0
     */
    public ArrayList<Modelo> listarTodosModelos();
    //TODO: pesquisar

    /**
     * 
     * @param novo 
     * @since 1.0
     */
    public void adicionarServico(Servico novo);

    /**
     * 
     * @param apagar 
     * @since 1.0
     */
    public void removerServico(Servico apagar);

    /**
     * 
     * @return 
     * @since 1.0
     */
    public ArrayList<Servico> listarTodosServicos();
    //TODO: pesquisar
}
//TODO: completar