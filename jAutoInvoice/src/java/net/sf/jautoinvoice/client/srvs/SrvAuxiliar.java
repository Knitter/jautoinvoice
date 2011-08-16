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
import net.sf.jautoinvoice.client.dto.DTOIVA;
import net.sf.jautoinvoice.client.dto.DTOMarca;
import net.sf.jautoinvoice.client.dto.DTOModelo;
import net.sf.jautoinvoice.client.dto.DTOServico;

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
    public void adicionarIVA(DTOIVA novo);

    /**
     * 
     * @param apagar 
     * @since 1.0
     */
    public void removerIVA(DTOIVA apagar);

    /**
     * 
     * @return 
     * @since 1.0
     */
    public ArrayList<DTOIVA> listarTodosIVAs();
    //TODO: pesquisar

    /**
     * 
     * @param nova 
     * @since 1.0
     */
    public void adicionarMarca(DTOMarca nova);

    /**
     * 
     * @param apagar 
     * @since 1.0
     */
    public void removerMarca(DTOMarca apagar);

    /**
     * 
     * @return 
     * @since 1.0
     */
    public ArrayList<DTOMarca> listarTodasMarcas();
    //TODO: pesquisar

    /**
     * 
     * @param novo 
     * @since 1.0
     */
    public void adicionarModelo(DTOModelo novo);

    /**
     * 
     * @param apagar 
     * @since 1.0
     */
    public void removerModelo(DTOModelo apagar);

    /**
     * 
     * @return 
     * @since 1.0
     */
    public ArrayList<DTOModelo> listarTodosModelos();
    //TODO: pesquisar

    /**
     * 
     * @param novo 
     * @since 1.0
     */
    public void adicionarServico(DTOServico novo);

    /**
     * 
     * @param apagar 
     * @since 1.0
     */
    public void removerServico(DTOServico apagar);

    /**
     * 
     * @return 
     * @since 1.0
     */
    public ArrayList<DTOServico> listarTodosServicos();
    //TODO: pesquisar
}
//TODO: completar