/*
 * PainelVeiculos.java
 *
 * This file is part of jAutoInvoice, http://sourceforge.net/p/jautoinvoice
 *
 * Copyright (C) 2010  Sérgio Lopes
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
package net.sf.jautoinvoice.paineis;

import java.util.List;
import javax.swing.DefaultComboBoxModel;
import javax.swing.DefaultListModel;
import javax.swing.ImageIcon;
import javax.swing.tree.DefaultMutableTreeNode;
import javax.swing.tree.DefaultTreeCellRenderer;
import javax.swing.tree.DefaultTreeModel;
import net.sf.jautoinvoice.JAutoInvoiceApp;
import net.sf.jautoinvoice.engine.Cliente;
import net.sf.jautoinvoice.engine.Marca;
import net.sf.jautoinvoice.engine.Modelo;
import net.sf.jautoinvoice.engine.Veiculo;

public class PainelVeiculos extends javax.swing.JPanel {

    private JAutoInvoiceApp app;
    private Veiculo actual;
    //
    private DefaultTreeCellRenderer renderer;
    private DefaultMutableTreeNode root;
    private boolean pesquisa;
    private DefaultComboBoxModel modeloComboDonosAntigos;
    private DefaultListModel modeloListaDonosAntigos;
    private DefaultComboBoxModel modeloMarcas;
    private DefaultComboBoxModel modeloModelos;

    public PainelVeiculos(JAutoInvoiceApp app) {
        this.app = app;

        actual = null;
        pesquisa = false;

        modeloComboDonosAntigos = new DefaultComboBoxModel();
        modeloListaDonosAntigos = new DefaultListModel();
        modeloMarcas = new DefaultComboBoxModel();
        for (Marca m : app.getGestor().listarTodasMarcas()) {
            modeloMarcas.addElement(m);
        }

        modeloModelos = new DefaultComboBoxModel();
        actualizarComboModelos();

        root = new DefaultMutableTreeNode("Veículos");

        processarListaVeiculos();

        ImageIcon rootIcon = new ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/x16/autos.png"));
        ImageIcon leafIcon = new ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/x16/car.png"));
        renderer = new DefaultTreeCellRenderer();
        renderer.setClosedIcon(rootIcon);
        renderer.setOpenIcon(rootIcon);
        renderer.setLeafIcon(leafIcon);

        initComponents();
    }

    private void processarListaVeiculos() {
        DefaultMutableTreeNode elem;
        for (Veiculo v : app.getGestor().listarTodosVeiculos()) {
            elem = new DefaultMutableTreeNode(v);
            root.add(elem);
        }
    }

    private void actualizarListaDonosAntigos() {
        modeloListaDonosAntigos.removeAllElements();
        for (Cliente c : actual.getAntigosDonos()) {
            modeloListaDonosAntigos.addElement(c);
        }
    }

    private void actualizarComboModelos() {
        if (modeloModelos.getSize() > 0) {
            modeloModelos.removeAllElements();
        }

        for (Modelo m : ((Marca) modeloMarcas.getSelectedItem()).getModelos()) {
            modeloModelos.addElement(m);
        }
    }

    private void actualizarComboDonosAntigos() {
        for (Cliente c : app.getGestor().listarTodosClientes()) {
            if (c != actual.getDono() && !actual.getAntigosDonos().contains(c)) {
                modeloComboDonosAntigos.addElement(c);
            }
        }
    }

    private void mostrarDadosVeiculo() {
        jdcRegisto.setDate(actual.getRegisto());
        jcbxCategoria.setSelectedItem(actual.getCategoria());
        jcbxDono.setSelectedItem(actual.getDono());
        jcbxMarca.setSelectedItem(actual.getMarca());
        actualizarListaDonosAntigos();
        actualizarComboDonosAntigos();
        jtaObservacoes.setText(actual.getObservacoes());
        jtfCilindrada.setText(actual.getCilindrada());
        jtfMatricula.setText(actual.getMatricula());
        jtfNrChassis.setText(actual.getNrChassis());
        jtfNrMotor.setText(actual.getNrMotor());
    }

    /** This method is called from within the constructor to
     * initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is
     * always regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {
        java.awt.GridBagConstraints gridBagConstraints;

        jspSplit = new javax.swing.JSplitPane();
        jpPainelLista = new javax.swing.JPanel();
        jtfPesquisa = new javax.swing.JTextField();
        jbtnRemoverVeiculo = new javax.swing.JButton();
        jbtnAdicionarVeiculo = new javax.swing.JButton();
        jscpScrollVeiculos = new javax.swing.JScrollPane();
        jtVeiculos = new javax.swing.JTree();
        jpPainelDireita = new javax.swing.JPanel();
        jbtnGravar = new javax.swing.JButton();
        jPanel1 = new javax.swing.JPanel();
        jlblDono = new javax.swing.JLabel();
        jcbxDono = new javax.swing.JComboBox();
        jlblMarca = new javax.swing.JLabel();
        jcbxMarca = new javax.swing.JComboBox();
        jlblModelo = new javax.swing.JLabel();
        jcbxModelo = new javax.swing.JComboBox();
        jlblCategoria = new javax.swing.JLabel();
        jcbxCategoria = new javax.swing.JComboBox();
        jlblNrMotor = new javax.swing.JLabel();
        jtfNrMotor = new javax.swing.JTextField();
        jlblNrChassis = new javax.swing.JLabel();
        jtfNrChassis = new javax.swing.JTextField();
        jlblCilindrada = new javax.swing.JLabel();
        jtfCilindrada = new javax.swing.JTextField();
        Registo = new javax.swing.JLabel();
        jdcRegisto = new com.toedter.calendar.JDateChooser();
        jlblMatricula = new javax.swing.JLabel();
        jtfMatricula = new javax.swing.JTextField();
        jbtnAdicionarCliente = new javax.swing.JButton();
        jpPainelObservacoes = new javax.swing.JPanel();
        jscpObservacoes = new javax.swing.JScrollPane();
        jtaObservacoes = new javax.swing.JTextArea();
        jpDonosAntigos = new javax.swing.JPanel();
        jcbxDonosAntigos = new javax.swing.JComboBox();
        jbtnRemoverDonoAntigo = new javax.swing.JButton();
        jbtnAdicionarDonoAntigo = new javax.swing.JButton();
        jscpDonosAntigos = new javax.swing.JScrollPane();
        jlstDonosAntigos = new javax.swing.JList();

        setLayout(new java.awt.BorderLayout());

        jspSplit.setDividerLocation(200);

        jbtnRemoverVeiculo.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/x16/car_delete.png"))); // NOI18N

        jbtnAdicionarVeiculo.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/x16/car_add.png"))); // NOI18N

        jtVeiculos.setModel(new DefaultTreeModel(root));
        jtVeiculos.setCellRenderer(renderer);
        jtVeiculos.addTreeSelectionListener(new javax.swing.event.TreeSelectionListener() {
            public void valueChanged(javax.swing.event.TreeSelectionEvent evt) {
                jtVeiculosValueChanged(evt);
            }
        });
        jscpScrollVeiculos.setViewportView(jtVeiculos);

        javax.swing.GroupLayout jpPainelListaLayout = new javax.swing.GroupLayout(jpPainelLista);
        jpPainelLista.setLayout(jpPainelListaLayout);
        jpPainelListaLayout.setHorizontalGroup(
            jpPainelListaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jpPainelListaLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jpPainelListaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(javax.swing.GroupLayout.Alignment.LEADING, jpPainelListaLayout.createSequentialGroup()
                        .addComponent(jbtnAdicionarVeiculo)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jbtnRemoverVeiculo))
                    .addComponent(jtfPesquisa, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, 158, Short.MAX_VALUE)
                    .addComponent(jscpScrollVeiculos, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, 158, Short.MAX_VALUE))
                .addContainerGap())
        );
        jpPainelListaLayout.setVerticalGroup(
            jpPainelListaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jpPainelListaLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jtfPesquisa, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jscpScrollVeiculos, javax.swing.GroupLayout.DEFAULT_SIZE, 412, Short.MAX_VALUE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jpPainelListaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(jbtnRemoverVeiculo)
                    .addComponent(jbtnAdicionarVeiculo))
                .addContainerGap())
        );

        jspSplit.setLeftComponent(jpPainelLista);

        jbtnGravar.setText("Gravar");

        jPanel1.setBorder(javax.swing.BorderFactory.createTitledBorder(""));
        jPanel1.setLayout(new java.awt.GridBagLayout());

        jlblDono.setText("Dono");
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jlblDono, gridBagConstraints);

        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridwidth = 5;
        gridBagConstraints.fill = java.awt.GridBagConstraints.HORIZONTAL;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jcbxDono, gridBagConstraints);

        jlblMarca.setText("Marca");
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 0;
        gridBagConstraints.gridy = 1;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jlblMarca, gridBagConstraints);

        jcbxMarca.setModel(modeloMarcas);
        jcbxMarca.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jcbxMarcaActionPerformed(evt);
            }
        });
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 1;
        gridBagConstraints.gridy = 1;
        gridBagConstraints.fill = java.awt.GridBagConstraints.HORIZONTAL;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jcbxMarca, gridBagConstraints);

        jlblModelo.setText("Modelo");
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 2;
        gridBagConstraints.gridy = 1;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jlblModelo, gridBagConstraints);

        jcbxModelo.setModel(modeloModelos);
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 3;
        gridBagConstraints.gridy = 1;
        gridBagConstraints.fill = java.awt.GridBagConstraints.HORIZONTAL;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jcbxModelo, gridBagConstraints);

        jlblCategoria.setText("Categoria");
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 4;
        gridBagConstraints.gridy = 1;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jlblCategoria, gridBagConstraints);

        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 5;
        gridBagConstraints.gridy = 1;
        gridBagConstraints.fill = java.awt.GridBagConstraints.HORIZONTAL;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jcbxCategoria, gridBagConstraints);

        jlblNrMotor.setText("Nr. Motor");
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 0;
        gridBagConstraints.gridy = 2;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jlblNrMotor, gridBagConstraints);
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 1;
        gridBagConstraints.gridy = 2;
        gridBagConstraints.fill = java.awt.GridBagConstraints.HORIZONTAL;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jtfNrMotor, gridBagConstraints);

        jlblNrChassis.setText("Nr. Chassis");
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 2;
        gridBagConstraints.gridy = 2;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jlblNrChassis, gridBagConstraints);
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 3;
        gridBagConstraints.gridy = 2;
        gridBagConstraints.fill = java.awt.GridBagConstraints.HORIZONTAL;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jtfNrChassis, gridBagConstraints);

        jlblCilindrada.setText("Cilidranda");
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 4;
        gridBagConstraints.gridy = 2;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jlblCilindrada, gridBagConstraints);
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 5;
        gridBagConstraints.gridy = 2;
        gridBagConstraints.fill = java.awt.GridBagConstraints.HORIZONTAL;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jtfCilindrada, gridBagConstraints);

        Registo.setText("Registo");
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 0;
        gridBagConstraints.gridy = 3;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(Registo, gridBagConstraints);
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 1;
        gridBagConstraints.gridy = 3;
        gridBagConstraints.fill = java.awt.GridBagConstraints.HORIZONTAL;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jdcRegisto, gridBagConstraints);

        jlblMatricula.setText("Matrícula");
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 2;
        gridBagConstraints.gridy = 3;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jlblMatricula, gridBagConstraints);
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 3;
        gridBagConstraints.gridy = 3;
        gridBagConstraints.fill = java.awt.GridBagConstraints.HORIZONTAL;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.WEST;
        jPanel1.add(jtfMatricula, gridBagConstraints);

        jbtnAdicionarCliente.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/x16/add.png"))); // NOI18N
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 5;
        gridBagConstraints.gridy = 4;
        jPanel1.add(jbtnAdicionarCliente, gridBagConstraints);

        jpPainelObservacoes.setBorder(javax.swing.BorderFactory.createTitledBorder("Observações"));

        jtaObservacoes.setColumns(20);
        jtaObservacoes.setRows(5);
        jscpObservacoes.setViewportView(jtaObservacoes);

        javax.swing.GroupLayout jpPainelObservacoesLayout = new javax.swing.GroupLayout(jpPainelObservacoes);
        jpPainelObservacoes.setLayout(jpPainelObservacoesLayout);
        jpPainelObservacoesLayout.setHorizontalGroup(
            jpPainelObservacoesLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpPainelObservacoesLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jscpObservacoes, javax.swing.GroupLayout.DEFAULT_SIZE, 371, Short.MAX_VALUE)
                .addContainerGap())
        );
        jpPainelObservacoesLayout.setVerticalGroup(
            jpPainelObservacoesLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpPainelObservacoesLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jscpObservacoes, javax.swing.GroupLayout.DEFAULT_SIZE, 23, Short.MAX_VALUE)
                .addContainerGap())
        );

        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 0;
        gridBagConstraints.gridy = 5;
        gridBagConstraints.gridwidth = 6;
        gridBagConstraints.fill = java.awt.GridBagConstraints.HORIZONTAL;
        jPanel1.add(jpPainelObservacoes, gridBagConstraints);

        jpDonosAntigos.setBorder(javax.swing.BorderFactory.createTitledBorder("Donos Antigos"));

        jbtnRemoverDonoAntigo.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/x16/delete.png"))); // NOI18N

        jbtnAdicionarDonoAntigo.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/x16/add.png"))); // NOI18N

        jscpDonosAntigos.setViewportView(jlstDonosAntigos);

        javax.swing.GroupLayout jpDonosAntigosLayout = new javax.swing.GroupLayout(jpDonosAntigos);
        jpDonosAntigos.setLayout(jpDonosAntigosLayout);
        jpDonosAntigosLayout.setHorizontalGroup(
            jpDonosAntigosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpDonosAntigosLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jpDonosAntigosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jscpDonosAntigos, javax.swing.GroupLayout.DEFAULT_SIZE, 371, Short.MAX_VALUE)
                    .addGroup(jpDonosAntigosLayout.createSequentialGroup()
                        .addComponent(jcbxDonosAntigos, 0, 0, Short.MAX_VALUE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jbtnAdicionarDonoAntigo)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jbtnRemoverDonoAntigo)))
                .addContainerGap())
        );
        jpDonosAntigosLayout.setVerticalGroup(
            jpDonosAntigosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpDonosAntigosLayout.createSequentialGroup()
                .addGroup(jpDonosAntigosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jcbxDonosAntigos, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jbtnRemoverDonoAntigo)
                    .addComponent(jbtnAdicionarDonoAntigo))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jscpDonosAntigos, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 0;
        gridBagConstraints.gridy = 6;
        gridBagConstraints.gridwidth = 6;
        gridBagConstraints.fill = java.awt.GridBagConstraints.HORIZONTAL;
        jPanel1.add(jpDonosAntigos, gridBagConstraints);

        javax.swing.GroupLayout jpPainelDireitaLayout = new javax.swing.GroupLayout(jpPainelDireita);
        jpPainelDireita.setLayout(jpPainelDireitaLayout);
        jpPainelDireitaLayout.setHorizontalGroup(
            jpPainelDireitaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpPainelDireitaLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jpPainelDireitaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, 449, Short.MAX_VALUE)
                    .addComponent(jbtnGravar, javax.swing.GroupLayout.Alignment.TRAILING))
                .addContainerGap())
        );
        jpPainelDireitaLayout.setVerticalGroup(
            jpPainelDireitaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpPainelDireitaLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addGap(18, 18, 18)
                .addComponent(jbtnGravar)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        jspSplit.setRightComponent(jpPainelDireita);

        add(jspSplit, java.awt.BorderLayout.CENTER);
    }// </editor-fold>//GEN-END:initComponents

    private void jtVeiculosValueChanged(javax.swing.event.TreeSelectionEvent evt) {//GEN-FIRST:event_jtVeiculosValueChanged
        if (jtVeiculos.getLastSelectedPathComponent().toString().equalsIgnoreCase("Veículos")) {
            actual = null;
            //semVeiculoSeleccionado();
            //jbtnRemoverVeiculo.setEnabled(false);
        } else {
            actual = (Veiculo) ((DefaultMutableTreeNode) jtVeiculos.getLastSelectedPathComponent()).getUserObject();
            //jbtnRemoverVeiculo.setEnabled(false);
            mostrarDadosVeiculo();
        }
    }//GEN-LAST:event_jtVeiculosValueChanged

    private void jcbxMarcaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jcbxMarcaActionPerformed
        actualizarComboModelos();
    }//GEN-LAST:event_jcbxMarcaActionPerformed
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel Registo;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JButton jbtnAdicionarCliente;
    private javax.swing.JButton jbtnAdicionarDonoAntigo;
    private javax.swing.JButton jbtnAdicionarVeiculo;
    private javax.swing.JButton jbtnGravar;
    private javax.swing.JButton jbtnRemoverDonoAntigo;
    private javax.swing.JButton jbtnRemoverVeiculo;
    private javax.swing.JComboBox jcbxCategoria;
    private javax.swing.JComboBox jcbxDono;
    private javax.swing.JComboBox jcbxDonosAntigos;
    private javax.swing.JComboBox jcbxMarca;
    private javax.swing.JComboBox jcbxModelo;
    private com.toedter.calendar.JDateChooser jdcRegisto;
    private javax.swing.JLabel jlblCategoria;
    private javax.swing.JLabel jlblCilindrada;
    private javax.swing.JLabel jlblDono;
    private javax.swing.JLabel jlblMarca;
    private javax.swing.JLabel jlblMatricula;
    private javax.swing.JLabel jlblModelo;
    private javax.swing.JLabel jlblNrChassis;
    private javax.swing.JLabel jlblNrMotor;
    private javax.swing.JList jlstDonosAntigos;
    private javax.swing.JPanel jpDonosAntigos;
    private javax.swing.JPanel jpPainelDireita;
    private javax.swing.JPanel jpPainelLista;
    private javax.swing.JPanel jpPainelObservacoes;
    private javax.swing.JScrollPane jscpDonosAntigos;
    private javax.swing.JScrollPane jscpObservacoes;
    private javax.swing.JScrollPane jscpScrollVeiculos;
    private javax.swing.JSplitPane jspSplit;
    private javax.swing.JTree jtVeiculos;
    private javax.swing.JTextArea jtaObservacoes;
    private javax.swing.JTextField jtfCilindrada;
    private javax.swing.JTextField jtfMatricula;
    private javax.swing.JTextField jtfNrChassis;
    private javax.swing.JTextField jtfNrMotor;
    private javax.swing.JTextField jtfPesquisa;
    // End of variables declaration//GEN-END:variables
}
