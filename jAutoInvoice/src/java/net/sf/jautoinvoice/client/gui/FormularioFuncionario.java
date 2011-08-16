/*
 * FormularioFuncionario.java
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
import com.extjs.gxt.ui.client.widget.form.FieldSet;
import com.extjs.gxt.ui.client.widget.form.FormPanel;
import com.extjs.gxt.ui.client.widget.form.NumberField;
import com.extjs.gxt.ui.client.widget.form.TextField;
import com.extjs.gxt.ui.client.widget.layout.FitLayout;
import com.extjs.gxt.ui.client.widget.layout.FormLayout;
import com.google.gwt.user.client.rpc.AsyncCallback;
import com.google.gwt.user.client.ui.AbstractImagePrototype;
import net.sf.jautoinvoice.client.JAutoInvoiceApp;
import net.sf.jautoinvoice.client.dto.DTOFuncionario;

/**
 * @autor Sérgio Lopes
 * @since 1.0
 */
public final class FormularioFuncionario extends Window {

    private FormPanel dados;
    private TextField<String> nome;
    private TextField<String> contribuinte;
    private NumberField valorHora;
    private TextField<String> username;
    private TextField<String> password;
    private FieldSet grupo;
    private PainelFuncionarios parent;
    private FormularioFuncionario me = this;

    public FormularioFuncionario(PainelFuncionarios parent) {
        super();
        this.parent = parent;

        init();
    }

    private void init() {
        dados = new FormPanel();
        dados.setHeaderVisible(false);

        nome = new TextField<String>();
        nome.setFieldLabel("Nome");
        dados.add(nome);

        contribuinte = new TextField<String>();
        contribuinte.setFieldLabel("Contribuinte");
        dados.add(contribuinte);

        valorHora = new NumberField();
        valorHora.setPropertyEditorType(Double.class);
        valorHora.setFieldLabel("Valor/Hora");
        dados.add(valorHora);

        grupo = new FieldSet();
        grupo.setLayout(new FormLayout());
        grupo.setHeading("Acesso ao Sistema");
        grupo.setCheckboxToggle(true);

        username = new TextField<String>();
        username.setFieldLabel("Username");
        grupo.add(username);

        password = new TextField<String>();
        password.setPassword(true);
        password.setFieldLabel("Password");
        grupo.add(password);

        dados.add(grupo);

        Button botao = new Button("Gravar", AbstractImagePrototype.create(JAutoInvoiceApp.getInstance().getIcones().x16Disk()));
        botao.addSelectionListener(new SelectionListener<ButtonEvent>() {

            @Override
            public void componentSelected(ButtonEvent ce) {
                DTOFuncionario novo = new DTOFuncionario();
                novo.setNome(nome.getValue());
                novo.setContribuinte(contribuinte.getValue());
                novo.setValorHora(valorHora.getValue().floatValue());

                if (grupo.isCheckboxToggle()) {
                    //Utilizador utilizador = new Utilizador();
                    //utilizador.setUsername(username.getValue());
                    //utilizador.setPassword(password.getValue());
                    //novo.setUtilizador(utilizador);
                }
                novo.setActivo(true);
                JAutoInvoiceApp.getInstance().getSrvFuncionario().adicionarFuncionario(novo, new AsyncCallback<Void>() {

                    public void onFailure(Throwable caught) {
                        MessageBox.alert("Erro", "Não foi possível adicionar o novo funcionário.", null);
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

        setHeading("Novo Funcionário");
        setLayout(new FitLayout());
        setModal(true);
        setHeight(280);
        setWidth(450);

        add(dados);
    }
}