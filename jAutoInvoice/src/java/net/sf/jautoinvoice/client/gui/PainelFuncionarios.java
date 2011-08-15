/*
 * PainelFuncionarios.java
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
import com.extjs.gxt.ui.client.Style.SelectionMode;
import com.extjs.gxt.ui.client.data.BaseListLoader;
import com.extjs.gxt.ui.client.data.BeanModel;
import com.extjs.gxt.ui.client.data.BeanModelReader;
import com.extjs.gxt.ui.client.data.ListLoadResult;
import com.extjs.gxt.ui.client.data.RpcProxy;
import com.extjs.gxt.ui.client.event.ButtonEvent;
import com.extjs.gxt.ui.client.event.Listener;
import com.extjs.gxt.ui.client.event.MessageBoxEvent;
import com.extjs.gxt.ui.client.event.SelectionListener;
import com.extjs.gxt.ui.client.store.ListStore;
import com.extjs.gxt.ui.client.store.Store;
import com.extjs.gxt.ui.client.widget.ContentPanel;
import com.extjs.gxt.ui.client.widget.Dialog;
import com.extjs.gxt.ui.client.widget.Html;
import com.extjs.gxt.ui.client.widget.LayoutContainer;
import com.extjs.gxt.ui.client.widget.MessageBox;
import com.extjs.gxt.ui.client.widget.button.Button;
import com.extjs.gxt.ui.client.widget.form.StoreFilterField;
import com.extjs.gxt.ui.client.widget.grid.CheckBoxSelectionModel;
import com.extjs.gxt.ui.client.widget.grid.ColumnConfig;
import com.extjs.gxt.ui.client.widget.grid.ColumnModel;
import com.extjs.gxt.ui.client.widget.grid.Grid;
import com.extjs.gxt.ui.client.widget.layout.BorderLayout;
import com.extjs.gxt.ui.client.widget.layout.BorderLayoutData;
import com.extjs.gxt.ui.client.widget.layout.FitLayout;
import com.extjs.gxt.ui.client.widget.toolbar.SeparatorToolItem;
import com.extjs.gxt.ui.client.widget.toolbar.ToolBar;
import com.google.gwt.user.client.ui.Widget;
import java.util.ArrayList;
import com.google.gwt.user.client.Element;
import com.google.gwt.user.client.rpc.AsyncCallback;
import com.google.gwt.user.client.ui.AbstractImagePrototype;
import java.util.List;
import net.sf.jautoinvoice.client.JAutoInvoiceApp;
import net.sf.jautoinvoice.client.model.Funcionario;

/**
 * @author Sérgio Lopes
 * @since 1.0
 */
public final class PainelFuncionarios extends Conteudo {

    private LayoutContainer root;
    private BaseListLoader<ListLoadResult<BeanModel>> loader;
    private PainelFuncionarios me = this;

    public PainelFuncionarios() {
        super();
        init();
    }

    @Override
    public void onRender(Element target, int index) {
        super.onRender(target, index);
        loader.load();
    }

    @Override
    public Widget getContainer() {
        return root;
    }

    @Override
    public void init() {

        //criar grelha e elementos necessários à apresentação das linhas
        CheckBoxSelectionModel<BeanModel> cbsm = new CheckBoxSelectionModel<BeanModel>();
        cbsm.setSelectionMode(SelectionMode.SIMPLE);

        ArrayList<ColumnConfig> columns = new ArrayList<ColumnConfig>();

        columns.add(cbsm.getColumn());
        columns.add(new ColumnConfig("nome", "Nome", 200));
        columns.add(new ColumnConfig("contribuinte", "Contribuinte", 100));
        columns.add(new ColumnConfig("valorHora", "Valor/Hora", 70));

        RpcProxy<ArrayList<Funcionario>> proxy = new RpcProxy<ArrayList<Funcionario>>() {

            @Override
            protected void load(Object loadConfig, AsyncCallback<ArrayList<Funcionario>> callback) {
                JAutoInvoiceApp.getInstance().getSrvFuncionario().listarTodosFuncionarios(callback);
            }
        };

        StoreFilterField<BeanModel> filtro = new StoreFilterField<BeanModel>() {

            @Override
            protected boolean doSelect(Store<BeanModel> store, BeanModel parent,
                    BeanModel record, String property, String filter) {

                String nome = record.get("nome");
                String contribuinte = record.get("contribuinte");

                //TODO: alterar para contains
                if (nome.toLowerCase().startsWith(filter.toLowerCase()) || contribuinte.startsWith(filter)) {
                    return true;
                }

                return false;
            }
        };

        loader = new BaseListLoader<ListLoadResult<BeanModel>>(proxy, new BeanModelReader());
        ListStore<BeanModel> dados = new ListStore<BeanModel>(loader);
        filtro.bind(dados);

        final Grid<BeanModel> grelha = new Grid<BeanModel>(dados, new ColumnModel(columns));
        grelha.addPlugin(cbsm);

        //restantes componentes visuais             
        ContentPanel painel = new ContentPanel();
        root = new LayoutContainer(new BorderLayout());

        painel.setHeading("Lista de Funcionários");
        painel.setLayout(new FitLayout());

        ToolBar barra = new ToolBar();
        barra.setSpacing(2);

        Button botao = new Button();
        botao.setToolTip("Adicionar");
        botao.setIcon(AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x16UserAdd()));
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent ce) {
                new FormularioFuncionario(me).show();
            }
        });
        barra.add(botao);

        final Listener<MessageBoxEvent> eventoRemocao = new Listener<MessageBoxEvent>() {

            public void handleEvent(MessageBoxEvent ce) {
                if (Dialog.YES.equals(ce.getButtonClicked().getItemId())) {
                    ArrayList<Funcionario> seleccionados = new ArrayList<Funcionario>();
                    for (BeanModel m : grelha.getSelectionModel().getSelectedItems()) {
                        seleccionados.add((Funcionario) m.getBean());
                    }

                    JAutoInvoiceApp.getInstance().getSrvFuncionario().removerFuncionarios(seleccionados, new AsyncCallback<Void>() {

                        public void onFailure(Throwable caught) {
                            MessageBox.alert("Erro", "Não foi possível remover o(s) funcionário(s).", null);
                        }

                        public void onSuccess(Void result) {
                            loader.load();
                        }
                    });
                }
            }
        };

        botao = new Button();
        botao.setToolTip("Remover");
        botao.setIcon(AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x16UserDelete()));
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent ce) {
                List<BeanModel> seleccionados = grelha.getSelectionModel().getSelectedItems();
                if (seleccionados != null && seleccionados.size() > 0) {
                    MessageBox.confirm("Confirm", "Tem a certeza que deseja remover o funcionário(s) seleccionado(s)?", eventoRemocao);
                }
            }
        });
        barra.add(botao);
        barra.add(new SeparatorToolItem());

        //botao = new Button();
        //botao.setToolTip("Imprimir");
        //botao.setIcon(AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x16Printer()));
        //botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

        //    @Override
        //    public void componentSelected(ButtonEvent ce) {
        //        //TODO: implementar impressão de funcionários
        //    }
        //});
        //barra.add(botao);
        //barra.add(new SeparatorToolItem());

        barra.add(new Html("Filtrar: "));
        barra.add(filtro);
        painel.setTopComponent(barra);

        ToolBar estado = new ToolBar();
        estado.add(new SeparatorToolItem());
        estado.add(new Html("TODO: "));
        estado.setAlignment(HorizontalAlignment.RIGHT);
        painel.setBottomComponent(estado);

        painel.add(grelha);
        root.add(painel, new BorderLayoutData(LayoutRegion.CENTER));

        initComponent(root);
    }

    public BaseListLoader getLoader() {
        return loader;
    }
}
