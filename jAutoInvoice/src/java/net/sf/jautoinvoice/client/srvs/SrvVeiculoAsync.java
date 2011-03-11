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
import net.sf.jautoinvoice.client.model.FolhaObra;
import net.sf.jautoinvoice.client.model.Funcionario;
import net.sf.jautoinvoice.client.model.Inspeccao;
import net.sf.jautoinvoice.client.model.Veiculo;

/**
 * Versão assíncrona do serviço de gestão de veículos.
 * 
 * @see SrvVeiculo
 * @since 1.0
 */
public interface SrvVeiculoAsync {

    public void adicionarVeiculo(Veiculo novo, AsyncCallback<Void> call);

    public void removerVeiculo(Veiculo apagar, AsyncCallback<Void> call);

    public void listarTodosVeiculos(AsyncCallback<ArrayList<Veiculo>> call);

    public void listarFolhasObra(Veiculo veiculo, AsyncCallback<ArrayList<FolhaObra>> call);

    public void adicionarInspeccao(Inspeccao nova, AsyncCallback<Void> call);

    public void removerInspeccao(Inspeccao apagar, AsyncCallback<Void> call);

    public void listarInspeccoes(Veiculo veiculo, AsyncCallback<ArrayList<Inspeccao>> call);

    public void inpeccionadosPeloFuncionario(Funcionario funcionario, AsyncCallback<ArrayList<Veiculo>> call);
}
