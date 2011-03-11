package net.sf.jautoinvoice.client.gui;

import com.extjs.gxt.ui.client.widget.form.FieldSet;
import com.extjs.gxt.ui.client.widget.form.FormPanel;
import com.extjs.gxt.ui.client.widget.form.TextField;
import com.extjs.gxt.ui.client.widget.layout.FormLayout;
import com.google.gwt.user.client.ui.Widget;

/**
 *
 * @since 1.0
 */
public final class FormularioClientes extends Conteudo {

    private FormPanel root;

    public FormularioClientes() {
        super();
        init();
    }

    @Override
    public void init() {
        root = new FormPanel();

        FieldSet fdset = new FieldSet();
        fdset.setHeading("Cliente");

        FormLayout layout = new FormLayout();
        layout.setLabelWidth(75);
        fdset.setLayout(layout);

        

        root.add(fdset);
        //private ArrayList<String> contactos;
        //private ArrayList<Veiculo> veiculos;
    }

    @Override
    public Widget getContainer() {
        return root;
    }
}
