/*
 * ArvoreClientes.java
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

import com.extjs.gxt.ui.client.data.BaseTreeLoader;
import com.extjs.gxt.ui.client.data.ModelData;
import com.extjs.gxt.ui.client.data.RpcProxy;
import com.extjs.gxt.ui.client.data.TreeLoader;
import com.extjs.gxt.ui.client.store.Store;
import com.extjs.gxt.ui.client.store.TreeStore;
import com.extjs.gxt.ui.client.widget.LayoutContainer;
import com.extjs.gxt.ui.client.widget.VerticalPanel;
import com.extjs.gxt.ui.client.widget.form.StoreFilterField;
import com.extjs.gxt.ui.client.widget.treepanel.TreePanel;
import com.google.gwt.core.client.GWT;
import com.google.gwt.user.client.Element;
import com.google.gwt.user.client.rpc.AsyncCallback;
import java.util.ArrayList;
import net.sf.jautoinvoice.client.modelo.Cliente;
import net.sf.jautoinvoice.client.srvs.SrvCliente;
import net.sf.jautoinvoice.client.srvs.SrvClienteAsync;

/**
 * Representação em árvore dos clientes existentes.
 * 
 * @since 1.0
 */
public class ArvoreClientes extends LayoutContainer {

    private SrvClienteAsync srvClientes;

    public ArvoreClientes() {
        super();
        srvClientes = (SrvClienteAsync) GWT.create(SrvCliente.class);
    }

    @Override
    protected void onRender(Element parent, int index) {
        super.onRender(parent, index);

        // data proxy  
        RpcProxy<ArrayList<Cliente>> proxy = new RpcProxy<ArrayList<Cliente>>()  {

            @Override
            protected void load(Object loadConfig, AsyncCallback<ArrayList<Cliente>> callback) {
                srvClientes.listarTodos(callback);
            }
        };

        TreeLoader loader = new BaseTreeLoader(proxy);
        TreeStore store = new TreeStore(loader);
        TreePanel tree = new TreePanel(store);
        tree.setAutoLoad(true);
        tree.setDisplayProperty("nome");
        tree.setWidth(250);
//        tree.setIconProvider(new ModelIconProvider<ModelData>()   {
//
//            public AbstractImagePrototype getIcon(ModelData model) {
//                if (((TreeModel) model).isLeaf()) {
//                    return Resources.ICONS.music();
//                }
//                return null;
//            }
//        });
//
        loader.load();
        StoreFilterField<ModelData> filter = new StoreFilterField<ModelData>()  {

            @Override
            protected boolean doSelect(Store<ModelData> store, ModelData parent,
                    ModelData record, String property, String filter) {
                // only match leaf nodes  
                //if (record instanceof Folder) {
                //    return false;
                //}
                //String name = record.get("name");
                //name = name.toLowerCase();
                //if (name.startsWith(filter.toLowerCase())) {
                return true;
                //}
                //return false;
            }
        };
        filter.bind(store);
        VerticalPanel panel = new VerticalPanel();

        panel.addStyleName(
                "x-small-editor");
        panel.setSpacing(
                8);

        panel.add(filter);
        panel.add(tree);

        add(panel);
    }
}
//TODO: completar