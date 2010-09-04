/*
 * PainelEmpregados.java
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
import javax.swing.ImageIcon;
import javax.swing.tree.DefaultTreeCellRenderer;
import net.sf.jautoinvoice.JAutoInvoiceApp;
import net.sf.jautoinvoice.engine.Empregado;
import net.sf.jautoinvoice.engine.Utilizador;

public class PainelEmpregados extends javax.swing.JPanel {

    private JAutoInvoiceApp app;
    private DefaultTreeCellRenderer renderer;
    private Empregado actual;

    public PainelEmpregados(JAutoInvoiceApp app) {
        this.app = app;
        actual = null;

        //TODO: activar o ícone na jTree
        ImageIcon rootIcon = new ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/x16/user_green.png"));
        renderer = new DefaultTreeCellRenderer();
        renderer.setClosedIcon(rootIcon);
        renderer.setOpenIcon(rootIcon);

        initComponents();
    }

    /** This method is called from within the constructor to
     * initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is
     * always regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jspSplit = new javax.swing.JSplitPane();
        jpPainelLista = new javax.swing.JPanel();
        jtfPesquisa = new javax.swing.JTextField();
        jbtnRemoverEmpregado = new javax.swing.JButton();
        jbtnAdicionarEmpregado = new javax.swing.JButton();
        jscpScrollEmpregados = new javax.swing.JScrollPane();
        jtEmpregados = new javax.swing.JTree();
        jpPainelDireita = new javax.swing.JPanel();
        jpPainelDados = new javax.swing.JPanel();
        jtfNome = new javax.swing.JTextField();
        jlblNome = new javax.swing.JLabel();
        jffValorHora = new javax.swing.JFormattedTextField();
        jlblMoeda = new javax.swing.JLabel();
        jlblValoHora = new javax.swing.JLabel();
        jlblSeparacaoSeccaoAutenticacao = new javax.swing.JLabel();
        jSeparator1 = new javax.swing.JSeparator();
        jlblUtilizador = new javax.swing.JLabel();
        jtfUtilizador = new javax.swing.JTextField();
        jpfPassword = new javax.swing.JPasswordField();
        jlblPassword = new javax.swing.JLabel();
        jckbAdministrador = new javax.swing.JCheckBox();
        jpReparacoes = new javax.swing.JPanel();
        jbtnRemoverReparacao = new javax.swing.JButton();
        jscpScrollReparacoes = new javax.swing.JScrollPane();
        jList1 = new javax.swing.JList();
        jbtnImprimir = new javax.swing.JButton();
        jbtnGravar = new javax.swing.JButton();

        setLayout(new java.awt.BorderLayout());

        jspSplit.setDividerLocation(200);

        jtfPesquisa.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jtfPesquisaActionPerformed(evt);
            }
        });

        jbtnRemoverEmpregado.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/x16/user_delete.png"))); // NOI18N
        jbtnRemoverEmpregado.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnRemoverEmpregadoActionPerformed(evt);
            }
        });

        jbtnAdicionarEmpregado.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/x16/user_add.png"))); // NOI18N
        jbtnAdicionarEmpregado.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnAdicionarEmpregadoActionPerformed(evt);
            }
        });

        javax.swing.tree.DefaultMutableTreeNode treeNode1 = new javax.swing.tree.DefaultMutableTreeNode("root");
        jtEmpregados.setModel(new javax.swing.tree.DefaultTreeModel(treeNode1));
        jtEmpregados.setCellRenderer(renderer);
        jscpScrollEmpregados.setViewportView(jtEmpregados);

        javax.swing.GroupLayout jpPainelListaLayout = new javax.swing.GroupLayout(jpPainelLista);
        jpPainelLista.setLayout(jpPainelListaLayout);
        jpPainelListaLayout.setHorizontalGroup(
            jpPainelListaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jpPainelListaLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jpPainelListaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(javax.swing.GroupLayout.Alignment.LEADING, jpPainelListaLayout.createSequentialGroup()
                        .addComponent(jbtnAdicionarEmpregado)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jbtnRemoverEmpregado))
                    .addComponent(jtfPesquisa, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, 176, Short.MAX_VALUE)
                    .addComponent(jscpScrollEmpregados, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, 176, Short.MAX_VALUE))
                .addContainerGap())
        );
        jpPainelListaLayout.setVerticalGroup(
            jpPainelListaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jpPainelListaLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jtfPesquisa, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jscpScrollEmpregados, javax.swing.GroupLayout.DEFAULT_SIZE, 477, Short.MAX_VALUE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jpPainelListaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(jbtnRemoverEmpregado)
                    .addComponent(jbtnAdicionarEmpregado))
                .addContainerGap())
        );

        jspSplit.setLeftComponent(jpPainelLista);

        jpPainelDados.setBorder(javax.swing.BorderFactory.createTitledBorder("Dados do Empregado"));

        jtfNome.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusLost(java.awt.event.FocusEvent evt) {
                jtfNomeFocusLost(evt);
            }
        });

        jlblNome.setText("Nome");

        jlblMoeda.setText("€");

        jlblValoHora.setText("Valor Hora");

        jlblSeparacaoSeccaoAutenticacao.setText("Dados de Autenticacao");

        jlblUtilizador.setText("Utilzador");

        jtfUtilizador.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusLost(java.awt.event.FocusEvent evt) {
                jtfUtilizadorFocusLost(evt);
            }
        });

        jpfPassword.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusLost(java.awt.event.FocusEvent evt) {
                jpfPasswordFocusLost(evt);
            }
        });

        jlblPassword.setText("Password");

        jckbAdministrador.setText("Administrador");

        jpReparacoes.setBorder(javax.swing.BorderFactory.createTitledBorder("Reparações Efectuadas"));

        jbtnRemoverReparacao.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/x16/delete.png"))); // NOI18N
        jbtnRemoverReparacao.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnRemoverReparacaoActionPerformed(evt);
            }
        });

        jscpScrollReparacoes.setViewportView(jList1);

        jbtnImprimir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/x16/printer.png"))); // NOI18N
        jbtnImprimir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnImprimirActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jpReparacoesLayout = new javax.swing.GroupLayout(jpReparacoes);
        jpReparacoes.setLayout(jpReparacoesLayout);
        jpReparacoesLayout.setHorizontalGroup(
            jpReparacoesLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpReparacoesLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jpReparacoesLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jpReparacoesLayout.createSequentialGroup()
                        .addComponent(jbtnImprimir)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jbtnRemoverReparacao))
                    .addComponent(jscpScrollReparacoes, javax.swing.GroupLayout.DEFAULT_SIZE, 377, Short.MAX_VALUE))
                .addContainerGap())
        );
        jpReparacoesLayout.setVerticalGroup(
            jpReparacoesLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpReparacoesLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jpReparacoesLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jbtnRemoverReparacao)
                    .addComponent(jbtnImprimir))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jscpScrollReparacoes, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(36, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout jpPainelDadosLayout = new javax.swing.GroupLayout(jpPainelDados);
        jpPainelDados.setLayout(jpPainelDadosLayout);
        jpPainelDadosLayout.setHorizontalGroup(
            jpPainelDadosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jpPainelDadosLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jpPainelDadosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(jpReparacoes, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addGroup(javax.swing.GroupLayout.Alignment.LEADING, jpPainelDadosLayout.createSequentialGroup()
                        .addGroup(jpPainelDadosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jlblNome)
                            .addComponent(jlblValoHora))
                        .addGap(18, 18, 18)
                        .addGroup(jpPainelDadosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jpPainelDadosLayout.createSequentialGroup()
                                .addComponent(jffValorHora, javax.swing.GroupLayout.PREFERRED_SIZE, 94, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(jlblMoeda))
                            .addComponent(jtfNome, javax.swing.GroupLayout.DEFAULT_SIZE, 325, Short.MAX_VALUE)))
                    .addGroup(javax.swing.GroupLayout.Alignment.LEADING, jpPainelDadosLayout.createSequentialGroup()
                        .addComponent(jlblSeparacaoSeccaoAutenticacao)
                        .addGap(18, 18, 18)
                        .addComponent(jSeparator1, javax.swing.GroupLayout.DEFAULT_SIZE, 234, Short.MAX_VALUE))
                    .addGroup(javax.swing.GroupLayout.Alignment.LEADING, jpPainelDadosLayout.createSequentialGroup()
                        .addGap(12, 12, 12)
                        .addGroup(jpPainelDadosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                            .addComponent(jlblPassword, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jlblUtilizador, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(jpPainelDadosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                            .addComponent(jpfPassword, javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jtfUtilizador, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, 205, Short.MAX_VALUE)
                            .addComponent(jckbAdministrador, javax.swing.GroupLayout.Alignment.LEADING))))
                .addContainerGap())
        );
        jpPainelDadosLayout.setVerticalGroup(
            jpPainelDadosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpPainelDadosLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jpPainelDadosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jlblNome)
                    .addComponent(jtfNome, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jpPainelDadosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jffValorHora, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jlblMoeda)
                    .addComponent(jlblValoHora))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jpPainelDadosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(jlblSeparacaoSeccaoAutenticacao)
                    .addComponent(jSeparator1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jpPainelDadosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jlblUtilizador)
                    .addComponent(jtfUtilizador, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jpPainelDadosLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jpfPassword, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jlblPassword))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jckbAdministrador)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jpReparacoes, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );

        jbtnGravar.setText("Gravar");
        jbtnGravar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnGravarActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jpPainelDireitaLayout = new javax.swing.GroupLayout(jpPainelDireita);
        jpPainelDireita.setLayout(jpPainelDireitaLayout);
        jpPainelDireitaLayout.setHorizontalGroup(
            jpPainelDireitaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpPainelDireitaLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jpPainelDireitaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jpPainelDados, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(jbtnGravar, javax.swing.GroupLayout.Alignment.TRAILING))
                .addContainerGap())
        );
        jpPainelDireitaLayout.setVerticalGroup(
            jpPainelDireitaLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jpPainelDireitaLayout.createSequentialGroup()
                .addGap(13, 13, 13)
                .addComponent(jpPainelDados, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jbtnGravar)
                .addGap(36, 36, 36))
        );

        jspSplit.setRightComponent(jpPainelDireita);

        add(jspSplit, java.awt.BorderLayout.CENTER);
    }// </editor-fold>//GEN-END:initComponents

    private void jtfPesquisaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jtfPesquisaActionPerformed
        String termo = jtfPesquisa.getText().trim();
        if (!termo.isEmpty()) {
            List<Empregado> resultados = app.getGestor().procurarEmpregado(termo);
            //TODO: actualizar lista, reset flags, alterar actual
        }
    }//GEN-LAST:event_jtfPesquisaActionPerformed

    private void jbtnGravarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnGravarActionPerformed
        if (actual == null) {
            actual = app.getGestor().adicionarEmpregado(jtfUtilizador.getText().trim(),
                    new String(jpfPassword.getPassword()), jtfNome.getText().trim(),
                    Double.parseDouble(jffValorHora.getValue().toString()), jckbAdministrador.isSelected());

            if (actual == null) {
                //TODO: failsafe
            } else {
                //TODO: seleccionar actual, reset flags
            }
        } else {
            actual.setNome(jtfNome.getText().trim());
            actual.setAdministrador(jckbAdministrador.isSelected());
            actual.setPassword(Utilizador.gerarHash(new String(jpfPassword.getPassword())));
            actual.setUsername(jtfUtilizador.getText().trim());
            actual.setValorHora(Double.parseDouble(jffValorHora.getValue().toString()));

            if (!app.getGestor().actualizarEmpregado(actual)) {
                //TODO: failsafe
            }
        }
    }//GEN-LAST:event_jbtnGravarActionPerformed

    private void jbtnRemoverReparacaoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnRemoverReparacaoActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_jbtnRemoverReparacaoActionPerformed

    private void jbtnImprimirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnImprimirActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_jbtnImprimirActionPerformed

    private void jbtnRemoverEmpregadoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnRemoverEmpregadoActionPerformed
        app.getGestor().removerEmpregado(actual);
    }//GEN-LAST:event_jbtnRemoverEmpregadoActionPerformed

    private void jbtnAdicionarEmpregadoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnAdicionarEmpregadoActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_jbtnAdicionarEmpregadoActionPerformed

    private void jpfPasswordFocusLost(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_jpfPasswordFocusLost
    }//GEN-LAST:event_jpfPasswordFocusLost

    private void jtfUtilizadorFocusLost(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_jtfUtilizadorFocusLost
    }//GEN-LAST:event_jtfUtilizadorFocusLost

    private void jtfNomeFocusLost(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_jtfNomeFocusLost
    }//GEN-LAST:event_jtfNomeFocusLost
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JList jList1;
    private javax.swing.JSeparator jSeparator1;
    private javax.swing.JButton jbtnAdicionarEmpregado;
    private javax.swing.JButton jbtnGravar;
    private javax.swing.JButton jbtnImprimir;
    private javax.swing.JButton jbtnRemoverEmpregado;
    private javax.swing.JButton jbtnRemoverReparacao;
    private javax.swing.JCheckBox jckbAdministrador;
    private javax.swing.JFormattedTextField jffValorHora;
    private javax.swing.JLabel jlblMoeda;
    private javax.swing.JLabel jlblNome;
    private javax.swing.JLabel jlblPassword;
    private javax.swing.JLabel jlblSeparacaoSeccaoAutenticacao;
    private javax.swing.JLabel jlblUtilizador;
    private javax.swing.JLabel jlblValoHora;
    private javax.swing.JPanel jpPainelDados;
    private javax.swing.JPanel jpPainelDireita;
    private javax.swing.JPanel jpPainelLista;
    private javax.swing.JPanel jpReparacoes;
    private javax.swing.JPasswordField jpfPassword;
    private javax.swing.JScrollPane jscpScrollEmpregados;
    private javax.swing.JScrollPane jscpScrollReparacoes;
    private javax.swing.JSplitPane jspSplit;
    private javax.swing.JTree jtEmpregados;
    private javax.swing.JTextField jtfNome;
    private javax.swing.JTextField jtfPesquisa;
    private javax.swing.JTextField jtfUtilizador;
    // End of variables declaration//GEN-END:variables
}