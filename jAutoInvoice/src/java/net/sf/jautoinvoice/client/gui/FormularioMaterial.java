/*
 * FormularioMaterial.java
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

import com.extjs.gxt.ui.client.event.ButtonEvent;
import com.extjs.gxt.ui.client.event.SelectionListener;
import com.extjs.gxt.ui.client.widget.Window;
import com.extjs.gxt.ui.client.widget.button.Button;
import com.extjs.gxt.ui.client.widget.form.FormPanel;
import com.extjs.gxt.ui.client.widget.form.NumberField;
import com.extjs.gxt.ui.client.widget.form.TextArea;
import com.extjs.gxt.ui.client.widget.form.TextField;
import com.extjs.gxt.ui.client.widget.layout.FitLayout;
import com.google.gwt.user.client.rpc.AsyncCallback;
import com.google.gwt.user.client.ui.AbstractImagePrototype;
import net.sf.jautoinvoice.client.JAutoInvoiceApp;
import net.sf.jautoinvoice.client.dto.DTOMaterial;

/**
 * @since 1.0
 */
public class FormularioMaterial extends Window {

    private FormularioMaterial me = this;
    private FormPanel dados;
    private PainelMaterial parent;
    private NumberField precoUnitario;
    private TextField<String> referencia;
    private TextArea descricao;

    public FormularioMaterial(PainelMaterial parent) {
        super();
        this.parent = parent;

        init();
    }

    private void init() {

        dados = new FormPanel();
        dados.setHeaderVisible(false);

        referencia = new TextField<String>();
        referencia.setFieldLabel("Referência:");
        dados.add(referencia);

        precoUnitario = new NumberField();
        precoUnitario.setFieldLabel("Preço Unitário:");
        dados.add(precoUnitario);

        descricao = new TextArea();
        descricao.setFieldLabel("Descrição:");
        dados.add(descricao);
        //TODO: Nr. da factura e data da compra para controlar os stocks, fornecedor e iva

        Button botao = new Button("Gravar", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x16Disk()));
        botao.addSelectionListener(new SelectionListener<ButtonEvent>()   {

            @Override
            public void componentSelected(ButtonEvent ce) {
                DTOMaterial novo = new DTOMaterial();

                novo.setReferencia(referencia.getValue());
                novo.setPrecoUnitario(precoUnitario.getValue().doubleValue());
                novo.setDescricao(descricao.getValue());
                //TODO:

                JAutoInvoiceApp.getInstance().getSrvMaterial().adicionarMaterial(novo, new AsyncCallback<Void>() {

                    public void onFailure(Throwable caught) {
                        //TODO:
                    }

                    public void onSuccess(Void result) {
                        //TODO:
                    }
                });
                //TODO: load loader
                me.hide();
            }
        });
        addButton(botao);

        botao = new Button("Cancelar", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x16Cancel()));
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent ce) {
                me.hide();
            }
        });
        addButton(botao);

        setHeading("Novo Material");
        setLayout(new FitLayout());
        setModal(true);
        setHeight(280);
        setWidth(450);

        add(dados);
    }
}
