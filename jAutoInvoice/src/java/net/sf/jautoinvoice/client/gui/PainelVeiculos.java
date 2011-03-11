/*
 * PainelVeiculos.java
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

import com.extjs.gxt.ui.client.Style.HorizontalAlignment;
import com.extjs.gxt.ui.client.Style.LayoutRegion;
import com.extjs.gxt.ui.client.data.BaseListLoader;
import com.extjs.gxt.ui.client.data.BeanModel;
import com.extjs.gxt.ui.client.data.BeanModelReader;
import com.extjs.gxt.ui.client.data.ListLoadResult;
import com.extjs.gxt.ui.client.data.RpcProxy;
import com.extjs.gxt.ui.client.event.ButtonEvent;
import com.extjs.gxt.ui.client.event.SelectionListener;
import com.extjs.gxt.ui.client.store.ListStore;
import com.extjs.gxt.ui.client.store.Store;
import com.extjs.gxt.ui.client.widget.ContentPanel;
import com.extjs.gxt.ui.client.widget.Html;
import com.extjs.gxt.ui.client.widget.LayoutContainer;
import com.extjs.gxt.ui.client.widget.button.Button;
import com.extjs.gxt.ui.client.widget.form.StoreFilterField;
import com.extjs.gxt.ui.client.widget.grid.ColumnConfig;
import com.extjs.gxt.ui.client.widget.grid.ColumnModel;
import com.extjs.gxt.ui.client.widget.grid.Grid;
import com.extjs.gxt.ui.client.widget.layout.BorderLayout;
import com.extjs.gxt.ui.client.widget.layout.BorderLayoutData;
import com.extjs.gxt.ui.client.widget.layout.FitLayout;
import com.extjs.gxt.ui.client.widget.toolbar.SeparatorToolItem;
import com.extjs.gxt.ui.client.widget.toolbar.ToolBar;
import com.google.gwt.user.client.Element;
import com.google.gwt.user.client.rpc.AsyncCallback;
import java.util.ArrayList;
import net.sf.jautoinvoice.client.JAutoInvoiceApp;
import net.sf.jautoinvoice.client.model.Cliente;
import net.sf.jautoinvoice.client.model.Veiculo;

/**
 * @since 1.0
 */
public final class PainelVeiculos extends Conteudo {

    private LayoutContainer root;
    private BaseListLoader<ListLoadResult<BeanModel>> loader;

    public PainelVeiculos() {
        super();
        init();
    }

    @Override
    public void onRender(Element target, int index) {
        super.onRender(target, index);
        loader.load();
    }

    @Override
    public void init() {
        root = new LayoutContainer(new BorderLayout());
        
        ContentPanel painel = new ContentPanel();
        painel.setHeading("Lista de Veículos");
        painel.setLayout(new FitLayout());

        ToolBar barra = new ToolBar();
        barra.setSpacing(2);
        Button botao = new Button("Adicionar");
        botao.addSelectionListener(new SelectionListener<ButtonEvent>()  {

            @Override
            public void componentSelected(ButtonEvent ce) {
                //TODO: implementar
            }
        });
        barra.add(botao);
        
        botao = new Button("Remover");
        botao.addSelectionListener(new SelectionListener<ButtonEvent>()  {

            @Override
            public void componentSelected(ButtonEvent ce) {
                //TODO:implementar
            }
        });
        barra.add(botao);
        
        barra.add(new SeparatorToolItem());        
        botao = new Button("Imprimir");
        botao.addSelectionListener(new SelectionListener<ButtonEvent>()  {

            @Override
            public void componentSelected(ButtonEvent ce) {
                //TODO: implementar
            }
        });
        barra.add(botao);
        barra.add(new SeparatorToolItem());

        StoreFilterField<BeanModel> filtro = new StoreFilterField<BeanModel>()   {

            @Override
            protected boolean doSelect(Store<BeanModel> store, BeanModel parent,
                    BeanModel record, String property, String filter) {
                return true;

            }
        };
        barra.add(new Html("Filtrar: "));
        barra.add(filtro);
        painel.setTopComponent(barra);
        
        ToolBar estado = new ToolBar();
        estado.add(new SeparatorToolItem());
        estado.add(new Html("TODO: "));
        estado.setAlignment(HorizontalAlignment.RIGHT);
        painel.setBottomComponent(estado);

        ArrayList<ColumnConfig> columns = new ArrayList<ColumnConfig>();

        columns.add(new ColumnConfig("matricula", "Matricula", 50));
        columns.add(new ColumnConfig("dataRegisto", "Data de Registo", 200));
        columns.add(new ColumnConfig("cilindrada", "Cilindrada", 200));
        columns.add(new ColumnConfig("nrChassis", "Nº Chassis", 200));
        columns.add(new ColumnConfig("nrMotor", "Nº Motor", 200));
        columns.add(new ColumnConfig("notas", "Notas", 200));
        //TODO: marca, modelo, donos antigos, dono actual, categoria, inspeccoes, foljas obra, combustiveis

        RpcProxy<ArrayList<Veiculo>> proxy = new RpcProxy<ArrayList<Veiculo>>()         {

            @Override
            protected void load(Object loadConfig, AsyncCallback<ArrayList<Veiculo>> callback) {
                JAutoInvoiceApp.getInstance().getSrvVeiculo().listarTodosVeiculos(callback);
            }
        };

        loader = new BaseListLoader<ListLoadResult<BeanModel>>(proxy, new BeanModelReader());
        ListStore<BeanModel> dados = new ListStore<BeanModel>(loader);
        filtro.bind(dados);

        Grid<BeanModel> grelha = new Grid<BeanModel>(dados, new ColumnModel(columns));
        painel.add(grelha);
        root.add(painel, new BorderLayoutData(LayoutRegion.CENTER));

        initComponent(root);
    }

    @Override
    public LayoutContainer getContainer() {
        return root;
    }
}
//TODO: completar