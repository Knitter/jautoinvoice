/*
 * ListaClientes.java
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
package net.sf.jautoinvoice.client.gui;

import com.extjs.gxt.ui.client.data.BaseListLoader;
import com.extjs.gxt.ui.client.data.BaseTreeLoader;
import com.extjs.gxt.ui.client.data.BeanModel;
import com.extjs.gxt.ui.client.data.BeanModelReader;
import com.extjs.gxt.ui.client.data.ListLoadResult;
import com.extjs.gxt.ui.client.data.ListLoader;
import com.extjs.gxt.ui.client.data.ModelData;
import com.extjs.gxt.ui.client.data.RpcProxy;
import com.extjs.gxt.ui.client.data.TreeLoader;
import com.extjs.gxt.ui.client.store.ListStore;
import com.extjs.gxt.ui.client.store.Store;
import com.extjs.gxt.ui.client.store.TreeStore;
import com.extjs.gxt.ui.client.widget.Html;
import com.extjs.gxt.ui.client.widget.LayoutContainer;
import com.extjs.gxt.ui.client.widget.VerticalPanel;
import com.extjs.gxt.ui.client.widget.form.ListField;
import com.extjs.gxt.ui.client.widget.form.StoreFilterField;
import com.extjs.gxt.ui.client.widget.layout.FitLayout;
import com.extjs.gxt.ui.client.widget.treepanel.TreePanel;
import com.google.gwt.core.client.GWT;
import com.google.gwt.user.client.Element;
import com.google.gwt.user.client.rpc.AsyncCallback;
import java.util.ArrayList;
import net.sf.jautoinvoice.client.model.Cliente;
import net.sf.jautoinvoice.client.srvs.SrvCliente;
import net.sf.jautoinvoice.client.srvs.SrvClienteAsync;

/**
 * Representação em árvore dos clientes existentes.
 * 
 * @since 1.0
 */
public class ListaClientes extends LayoutContainer {

    private SrvClienteAsync srvClientes;

    public ListaClientes() {
        super();
        setLayout(new FitLayout());
        srvClientes = (SrvClienteAsync) GWT.create(SrvCliente.class);
    }

    @Override
    protected void onRender(Element parent, int index) {
        super.onRender(parent, index);

        //obter informação através do proxy  
        RpcProxy<ArrayList<Cliente>> proxy = new RpcProxy<ArrayList<Cliente>>()   {

            @Override
            protected void load(Object loadConfig, AsyncCallback<ArrayList<Cliente>> callback) {
                srvClientes.listarTodos(callback);
            }
        };

        //criar reader, loader e store
        BeanModelReader reader = new BeanModelReader();
        ListLoader<ListLoadResult<BeanModel>> loader = new BaseListLoader<ListLoadResult<BeanModel>>(proxy, reader);
        ListStore<BeanModel> store = new ListStore<BeanModel>(loader);

        loader.load();

        ListField<BeanModel> lista = new ListField<BeanModel>();
        lista.setStore(store);

        StoreFilterField<BeanModel> filtro = new StoreFilterField<BeanModel>()   {

            @Override
            protected boolean doSelect(Store<BeanModel> store, BeanModel parent, BeanModel record, String property, String filter) {
                //TODO: implementar filtro
                return true;
            }
        };
        filtro.bind(store);
        
        VerticalPanel painel = new VerticalPanel();
        //painel.addStyleName("x-small-editor");
        //painel.setSpacing(8);
        painel.add(filtro);
        painel.add(lista);
        add(painel);
    }
}
//TODO: completar