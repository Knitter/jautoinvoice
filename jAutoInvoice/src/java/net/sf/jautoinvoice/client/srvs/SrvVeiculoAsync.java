/*
 * SrvVeiculoAsync.java
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

import com.google.gwt.user.client.rpc.AsyncCallback;
import java.util.ArrayList;
import net.sf.jautoinvoice.client.dto.DTOFolhaObra;
import net.sf.jautoinvoice.client.dto.DTOFuncionario;
import net.sf.jautoinvoice.client.dto.DTOInspeccao;
import net.sf.jautoinvoice.client.dto.DTOVeiculo;

/**
 * Versão assíncrona do serviço de gestão de veículos.
 * 
 * @see SrvVeiculo
 * @since 1.0
 */
public interface SrvVeiculoAsync {

    public void adicionarVeiculo(DTOVeiculo novo, AsyncCallback<Void> call);

    public void removerVeiculo(DTOVeiculo apagar, AsyncCallback<Void> call);

    public void listarTodosVeiculos(AsyncCallback<ArrayList<DTOVeiculo>> call);

    public void listarFolhasObra(DTOVeiculo veiculo, AsyncCallback<ArrayList<DTOFolhaObra>> call);

    public void adicionarInspeccao(DTOInspeccao nova, AsyncCallback<Void> call);

    public void removerInspeccao(DTOInspeccao apagar, AsyncCallback<Void> call);

    public void listarInspeccoes(DTOVeiculo veiculo, AsyncCallback<ArrayList<DTOInspeccao>> call);

    public void inpeccionadosPeloFuncionario(DTOFuncionario funcionario, AsyncCallback<ArrayList<DTOVeiculo>> call);
}
