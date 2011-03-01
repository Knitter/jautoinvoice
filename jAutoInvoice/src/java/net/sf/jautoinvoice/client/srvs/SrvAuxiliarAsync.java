/*
 * SrvAuxiliarAsync.java
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
import net.sf.jautoinvoice.client.model.IVA;
import net.sf.jautoinvoice.client.model.Marca;
import net.sf.jautoinvoice.client.model.Modelo;
import net.sf.jautoinvoice.client.model.Servico;

/**
 * Versão assíncrona do serviço de gestão de dados auxiliares.
 * 
 * @see SrvAuxiliar
 * @since 1.0
 */
public interface SrvAuxiliarAsync {

    public void adicionarIVA(IVA novo, AsyncCallback<Void> call);

    public void removerIVA(IVA apagar, AsyncCallback<Void> call);

    public void listarTodosIVAs(AsyncCallback<ArrayList<IVA>> call);
    //TODO: pesquisar

    public void adicionarMarca(Marca nova, AsyncCallback<Void> call);

    public void removerMarca(Marca apagar, AsyncCallback<Void> call);

    public void listarTodasMarcas(AsyncCallback<ArrayList<Marca>> call);
    //TODO: pesquisar

    public void adicionarModelo(Modelo novo, AsyncCallback<Void> call);

    public void removerModelo(Modelo apagar, AsyncCallback<Void> call);

    public void listarTodosModelos(AsyncCallback<ArrayList<Modelo>> call);
    //TODO: pesquisar

    public void adicionarServico(Servico novo, AsyncCallback<Void> call);

    public void removerServico(Servico apagar, AsyncCallback<Void> call);

    public void listarTodosServicos(AsyncCallback<ArrayList<Servico>> call);
    //TODO: pesquisar
}
//TODO: completar