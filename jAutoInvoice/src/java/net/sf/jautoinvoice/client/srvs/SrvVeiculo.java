/*
 * SrvVeiculo.java
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
import net.sf.jautoinvoice.client.model.FolhaObra;
import net.sf.jautoinvoice.client.model.Funcionario;
import net.sf.jautoinvoice.client.model.Inspeccao;
import net.sf.jautoinvoice.client.model.Veiculo;

/**
 * Serviço de gestão de veículos.
 * 
 * @since 1.0
 */
@RemoteServiceRelativePath("veiculo")
public interface SrvVeiculo extends RemoteService {

    /**
     * 
     * @param novo 
     * @since 1.0
     */
    public void adicionarVeiculo(Veiculo novo);

    /**
     * 
     * @param apagar 
     * @since 1.0
     */
    public void removerVeiculo(Veiculo apagar);

    /**
     * 
     * @return 
     * @since 1.0
     */
    public ArrayList<Veiculo> listarTodosVeiculos();

    /**
     * 
     * @param veiculo
     * @return 
     * @since 1.0
     */
    public ArrayList<FolhaObra> listarFolhasObra(Veiculo veiculo);

    /**
     * 
     * @param nova 
     * @since 1.0
     */
    public void adicionarInspeccao(Inspeccao nova);

    /**
     * 
     * @param apagar 
     * @since 1.0
     */
    public void removerInspeccao(Inspeccao apagar);

    /**
     * 
     * @param veiculo
     * @return 
     * @since 1.0
     */
    public ArrayList<Inspeccao> listarInspeccoes(Veiculo veiculo);

    /**
     * 
     * @param funcionario
     * @return 
     * @since 1.0
     */
    public ArrayList<Veiculo> inpeccionadosPeloFuncionario(Funcionario funcionario);
}
