/*
 * FormularioFornecedor.java
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
import com.extjs.gxt.ui.client.widget.MessageBox;
import com.extjs.gxt.ui.client.widget.Window;
import com.extjs.gxt.ui.client.widget.button.Button;
import com.extjs.gxt.ui.client.widget.form.FormPanel;
import com.extjs.gxt.ui.client.widget.form.TextArea;
import com.extjs.gxt.ui.client.widget.form.TextField;
import com.extjs.gxt.ui.client.widget.layout.FitLayout;
import com.google.gwt.user.client.rpc.AsyncCallback;
import com.google.gwt.user.client.ui.AbstractImagePrototype;
import net.sf.jautoinvoice.client.JAutoInvoiceApp;
import net.sf.jautoinvoice.client.model.Fornecedor;

/**
 * Zona central para gestão de fornecedores.
 * 
 * @author Sérgio Lopes
 * @since 1.0
 */
public final class FormularioFornecedor extends Window {

    private FormularioFornecedor me = this;
    private PainelFornecedores parent;
    private TextField<String> nome;
    private TextField<String> email;
    private TextField<String> telefone;
    private TextField<String> fax;
    private TextArea notas;

    public FormularioFornecedor(PainelFornecedores parent) {
        super();
        this.parent = parent;

        init();
    }

    private void init() {
        FormPanel dados = new FormPanel();
        dados.setHeaderVisible(false);

        nome = new TextField<String>();
        nome.setFieldLabel("Nome");
        dados.add(nome);

        email = new TextField<String>();
        email.setFieldLabel("E-mail");
        dados.add(email);

        telefone = new TextField<String>();
        telefone.setFieldLabel("Telefone");
        dados.add(telefone);

        fax = new TextField<String>();
        fax.setFieldLabel("FAX");
        dados.add(fax);

        notas = new TextArea();
        notas.setFieldLabel("Notas");
        dados.add(notas);
        
        
        Button botao = new Button("Gravar", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x16Disk()));
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent ce) {
                Fornecedor novo = new Fornecedor();
                
                novo.setNome(nome.getValue());
                novo.setEmail(email.getValue());
                novo.setFax(fax.getValue());
                novo.setNotas(notas.getValue());
                novo.setTelefone(telefone.getValue());
                novo.setActivo(true);
                JAutoInvoiceApp.getInstance().getSrvFornecedor().adicionarFornecedor(novo, new AsyncCallback<Void>() {

                    public void onFailure(Throwable caught) {
                        MessageBox.alert("Erro", "Não foi possível adicionar o novo fornecedor.", null);
                    }

                    public void onSuccess(Void result) {
                        parent.getLoader().load();
                    }
                });
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

        setHeading("Novo Fornecedor");
        setLayout(new FitLayout());
        setModal(true);
        setHeight(280);
        setWidth(450);

        add(dados);

    }
}