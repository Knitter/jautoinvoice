/*
 * JAutoInvoiceApp.java
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
package net.sf.jautoinvoice;

import java.awt.CardLayout;
import java.awt.EventQueue;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.InvalidPropertiesFormatException;
import java.util.Properties;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.LogManager;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.UIManager;
import javax.swing.UnsupportedLookAndFeelException;
import net.sf.jautoinvoice.engine.Gestor;
import net.sf.jautoinvoice.janelas.Configuracoes;
import net.sf.jautoinvoice.janelas.Empregados;
import net.sf.jautoinvoice.janelas.ErrosSugestoes;
import net.sf.jautoinvoice.janelas.Sobre;
import net.sf.jautoinvoice.paineis.PainelAutenticacao;
import net.sf.jautoinvoice.paineis.PainelClientes;
import net.sf.jautoinvoice.paineis.PainelFacturas;
import net.sf.jautoinvoice.paineis.PainelPecas;
import net.sf.jautoinvoice.paineis.PainelReparacoes;
import net.sf.jautoinvoice.paineis.PainelVeiculos;
import org.javadev.AnimatingCardLayout;
import org.javadev.effects.Animation;
import org.javadev.effects.DashboardAnimation;

public class JAutoInvoiceApp extends javax.swing.JFrame {

    private final Gestor gestor;
    private final JAutoInvoiceApp frame = this;
    private CardLayout anicard;
    private Properties configuracoes;
    //
    private static final String P_AUTENTICACAO = "autenticacao";
    private static final String P_CLIENTES = "clientes";
    private static final String P_FACTURAS = "facturas";
    private static final String P_REPARACOES = "reparacoes";
    private static final String P_VEICULOS = "veiculos";
    private static final String P_PECAS = "pecas";
    private static final String P_MARCACOES = "marcacoes";
    //
    private boolean usarAnimacoes;

    public JAutoInvoiceApp(String ficheiro, Properties props, boolean novo) {
        configuracoes = props;
        gestor = new Gestor(ficheiro, novo);

        usarAnimacoes = Boolean.parseBoolean(configuracoes.getProperty("animacoes", "false"));
        if (usarAnimacoes) {
            String tipoAnimacao = configuracoes.getProperty("tipoAnimacao", "dashboard");
            Animation animacao = null;
            if (tipoAnimacao.equals("dashboard")) {
                animacao = new DashboardAnimation();
                animacao.setAnimationDuration(500);
            } else if (tipoAnimacao.equals("")) {
            } else {
            }

            anicard = new AnimatingCardLayout(animacao);
        } else {
            anicard = new CardLayout();
        }

        initComponents();
        desactivarInteraccao();
        anicard.show(jpPainelPrincipal, P_AUTENTICACAO);
    }

    private void desactivarInteraccao() {
        jbtnClientes.setEnabled(false);
        jbtnFacturas.setEnabled(false);
        jbtnImprimir.setEnabled(false);
        jbtnMarcacoes.setEnabled(false);
        jbtnPecas.setEnabled(false);
        jbtnPesquisa.setEnabled(false);
        jbtnReparacoes.setEnabled(false);
        jbtnVeiculos.setEnabled(false);
        jbtnRelatorios.setEnabled(false);
        jbtnRelatorios.setVisible(false);
        jbtnConfiguracoes.setEnabled(false);
        jbtnConfiguracoes.setVisible(false);
        jbtnEmpregados.setEnabled(false);
        jbtnEmpregados.setVisible(false);
        jbtnEstatisticas.setEnabled(false);
        jbtnEstatisticas.setVisible(false);
        jSeparator5.setVisible(false);
        jSeparator6.setVisible(false);
    }

    private void activarInteraccao() {
        jbtnClientes.setEnabled(true);
        jbtnFacturas.setEnabled(true);
        jbtnImprimir.setEnabled(true);
        jbtnMarcacoes.setEnabled(true);
        jbtnPecas.setEnabled(true);
        jbtnPesquisa.setEnabled(true);
        jbtnReparacoes.setEnabled(true);
        jbtnVeiculos.setEnabled(true);
        if (gestor.getAutenticado().isAdministrador()) {
            jbtnRelatorios.setEnabled(true);
            jbtnRelatorios.setVisible(true);
            jbtnConfiguracoes.setEnabled(true);
            jbtnConfiguracoes.setVisible(true);
            jbtnEmpregados.setEnabled(true);
            jbtnEmpregados.setVisible(true);
            jbtnEstatisticas.setEnabled(true);
            jbtnEstatisticas.setVisible(true);
            jSeparator5.setVisible(true);
            jSeparator6.setVisible(true);
        }
    }

    public void autenticar(String utilizador, String password) {
        if (gestor.autenticar(utilizador, password)) {
            //alterarEstadoInteraccao(true);
            anicard.show(jpPainelPrincipal, P_REPARACOES);
        } else {
            ResourceBundle bundle = java.util.ResourceBundle.getBundle("net/sf/jautoinvoice/i18n/dialogos");
            JOptionPane.showMessageDialog(this, bundle.getString("mensagem.erro.autenticacao.texto"),
                    bundle.getString("mensagem.erro.autenticacao.titulo"), JOptionPane.ERROR_MESSAGE);
        }
    }

    private void sair() {
        gestor.desligar();

        String base = System.getProperty("user.home");
        File directoria = new File(base + File.separator + ".jautoinvoice");

        if (!directoria.exists()) {
            directoria.mkdir();
        }

        File ficheiro = new File(directoria.getAbsolutePath() + File.separator + "conf.xml");
        try {
            if (!ficheiro.exists()) {
                ficheiro.createNewFile();
            }
            configuracoes.storeToXML(new FileOutputStream(ficheiro), null);
        } catch (IOException ex) {
            Logger.getLogger(Gestor.class.getName()).log(Level.SEVERE, null, ex);
        }
        System.exit(0);
    }

    /** This method is called from within the constructor to
     * initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is
     * always regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtbBarraFerramentas = new javax.swing.JToolBar();
        jbtnReparacoes = new javax.swing.JButton();
        jbtnFacturas = new javax.swing.JButton();
        jbtnVeiculos = new javax.swing.JButton();
        jbtnClientes = new javax.swing.JButton();
        jbtnPecas = new javax.swing.JButton();
        jSeparator3 = new javax.swing.JToolBar.Separator();
        jbtnPesquisa = new javax.swing.JButton();
        jbtnImprimir = new javax.swing.JButton();
        jSeparator4 = new javax.swing.JToolBar.Separator();
        jbtnMarcacoes = new javax.swing.JButton();
        jSeparator5 = new javax.swing.JToolBar.Separator();
        jbtnEstatisticas = new javax.swing.JButton();
        jbtnRelatorios = new javax.swing.JButton();
        jSeparator6 = new javax.swing.JToolBar.Separator();
        jbtnEmpregados = new javax.swing.JButton();
        jbtnConfiguracoes = new javax.swing.JButton();
        jSeparator7 = new javax.swing.JToolBar.Separator();
        jbtnSair = new javax.swing.JButton();
        jpPainelPrincipal = new javax.swing.JPanel();
        jmbBarraMenu = new javax.swing.JMenuBar();
        jmApp = new javax.swing.JMenu();
        jSeparator2 = new javax.swing.JPopupMenu.Separator();
        jmiSair = new javax.swing.JMenuItem();
        jmAjuda = new javax.swing.JMenu();
        jmiAjuda = new javax.swing.JMenuItem();
        jSeparator1 = new javax.swing.JPopupMenu.Separator();
        jmiActualizacoes = new javax.swing.JMenuItem();
        jmiSugestoes = new javax.swing.JMenuItem();
        jmiSobre = new javax.swing.JMenuItem();

        setDefaultCloseOperation(javax.swing.WindowConstants.DO_NOTHING_ON_CLOSE);
        java.util.ResourceBundle bundle = java.util.ResourceBundle.getBundle("net/sf/jautoinvoice/i18n/principal"); // NOI18N
        setTitle(bundle.getString("JAutoInvoiceApp.title")); // NOI18N
        addWindowListener(new java.awt.event.WindowAdapter() {
            public void windowClosing(java.awt.event.WindowEvent evt) {
                formWindowClosing(evt);
            }
        });

        jtbBarraFerramentas.setFloatable(false);

        jbtnReparacoes.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/wrench_orange.png"))); // NOI18N
        jbtnReparacoes.setText(bundle.getString("JAutoInvoiceApp.jbtnReparacoes.text")); // NOI18N
        jbtnReparacoes.setToolTipText(bundle.getString("JAutoInvoiceApp.jbtnReparacoes.toolTipText")); // NOI18N
        jbtnReparacoes.setEnabled(false);
        jbtnReparacoes.setFocusable(false);
        jbtnReparacoes.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jbtnReparacoes.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        jbtnReparacoes.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnReparacoesActionPerformed(evt);
            }
        });
        jtbBarraFerramentas.add(jbtnReparacoes);

        jbtnFacturas.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/document_prepare.png"))); // NOI18N
        jbtnFacturas.setText(bundle.getString("JAutoInvoiceApp.jbtnFacturas.text")); // NOI18N
        jbtnFacturas.setToolTipText(bundle.getString("JAutoInvoiceApp.jbtnFacturas.toolTipText")); // NOI18N
        jbtnFacturas.setEnabled(false);
        jbtnFacturas.setFocusable(false);
        jbtnFacturas.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jbtnFacturas.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        jbtnFacturas.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnFacturasActionPerformed(evt);
            }
        });
        jtbBarraFerramentas.add(jbtnFacturas);

        jbtnVeiculos.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/car.png"))); // NOI18N
        jbtnVeiculos.setText(bundle.getString("JAutoInvoiceApp.jbtnVeiculos.text")); // NOI18N
        jbtnVeiculos.setToolTipText(bundle.getString("JAutoInvoiceApp.jbtnVeiculos.toolTipText")); // NOI18N
        jbtnVeiculos.setEnabled(false);
        jbtnVeiculos.setFocusable(false);
        jbtnVeiculos.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jbtnVeiculos.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        jbtnVeiculos.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnVeiculosActionPerformed(evt);
            }
        });
        jtbBarraFerramentas.add(jbtnVeiculos);

        jbtnClientes.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/vcard.png"))); // NOI18N
        jbtnClientes.setText(bundle.getString("JAutoInvoiceApp.jbtnClientes.text")); // NOI18N
        jbtnClientes.setToolTipText(bundle.getString("JAutoInvoiceApp.jbtnClientes.toolTipText")); // NOI18N
        jbtnClientes.setEnabled(false);
        jbtnClientes.setFocusable(false);
        jbtnClientes.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jbtnClientes.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        jbtnClientes.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnClientesActionPerformed(evt);
            }
        });
        jtbBarraFerramentas.add(jbtnClientes);

        jbtnPecas.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/brick.png"))); // NOI18N
        jbtnPecas.setText(bundle.getString("JAutoInvoiceApp.jbtnPecas.text")); // NOI18N
        jbtnPecas.setToolTipText(bundle.getString("JAutoInvoiceApp.jbtnPecas.toolTipText")); // NOI18N
        jbtnPecas.setEnabled(false);
        jbtnPecas.setFocusable(false);
        jbtnPecas.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jbtnPecas.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        jbtnPecas.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnPecasActionPerformed(evt);
            }
        });
        jtbBarraFerramentas.add(jbtnPecas);
        jtbBarraFerramentas.add(jSeparator3);

        jbtnPesquisa.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/find.png"))); // NOI18N
        jbtnPesquisa.setText(bundle.getString("JAutoInvoiceApp.jbtnPesquisa.text")); // NOI18N
        jbtnPesquisa.setToolTipText(bundle.getString("JAutoInvoiceApp.jbtnPesquisa.toolTipText")); // NOI18N
        jbtnPesquisa.setEnabled(false);
        jbtnPesquisa.setFocusable(false);
        jbtnPesquisa.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jbtnPesquisa.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        jbtnPesquisa.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnPesquisaActionPerformed(evt);
            }
        });
        jtbBarraFerramentas.add(jbtnPesquisa);

        jbtnImprimir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/printer.png"))); // NOI18N
        jbtnImprimir.setText(bundle.getString("JAutoInvoiceApp.jbtnImprimir.text")); // NOI18N
        jbtnImprimir.setToolTipText(bundle.getString("JAutoInvoiceApp.jbtnImprimir.toolTipText")); // NOI18N
        jbtnImprimir.setEnabled(false);
        jbtnImprimir.setFocusable(false);
        jbtnImprimir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jbtnImprimir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        jbtnImprimir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnImprimirActionPerformed(evt);
            }
        });
        jtbBarraFerramentas.add(jbtnImprimir);
        jtbBarraFerramentas.add(jSeparator4);

        jbtnMarcacoes.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/calendar.png"))); // NOI18N
        jbtnMarcacoes.setText(bundle.getString("JAutoInvoiceApp.jbtnMarcacoes.text")); // NOI18N
        jbtnMarcacoes.setToolTipText(bundle.getString("JAutoInvoiceApp.jbtnMarcacoes.toolTipText")); // NOI18N
        jbtnMarcacoes.setEnabled(false);
        jbtnMarcacoes.setFocusable(false);
        jbtnMarcacoes.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jbtnMarcacoes.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        jbtnMarcacoes.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnMarcacoesActionPerformed(evt);
            }
        });
        jtbBarraFerramentas.add(jbtnMarcacoes);
        jtbBarraFerramentas.add(jSeparator5);

        jbtnEstatisticas.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/chart_pie.png"))); // NOI18N
        jbtnEstatisticas.setText(bundle.getString("JAutoInvoiceApp.jbtnEstatisticas.text")); // NOI18N
        jbtnEstatisticas.setToolTipText(bundle.getString("JAutoInvoiceApp.jbtnEstatisticas.toolTipText")); // NOI18N
        jbtnEstatisticas.setFocusable(false);
        jbtnEstatisticas.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jbtnEstatisticas.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        jbtnEstatisticas.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnEstatisticasActionPerformed(evt);
            }
        });
        jtbBarraFerramentas.add(jbtnEstatisticas);

        jbtnRelatorios.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/report.png"))); // NOI18N
        jbtnRelatorios.setText(bundle.getString("JAutoInvoiceApp.jbtnRelatorios.text")); // NOI18N
        jbtnRelatorios.setToolTipText(bundle.getString("JAutoInvoiceApp.jbtnRelatorios.toolTipText")); // NOI18N
        jbtnRelatorios.setFocusable(false);
        jbtnRelatorios.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jbtnRelatorios.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        jbtnRelatorios.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnRelatoriosActionPerformed(evt);
            }
        });
        jtbBarraFerramentas.add(jbtnRelatorios);
        jtbBarraFerramentas.add(jSeparator6);

        jbtnEmpregados.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/user_green.png"))); // NOI18N
        jbtnEmpregados.setText(bundle.getString("JAutoInvoiceApp.jbtnEmpregados.text")); // NOI18N
        jbtnEmpregados.setToolTipText(bundle.getString("JAutoInvoiceApp.jbtnEmpregados.toolTipText")); // NOI18N
        jbtnEmpregados.setFocusable(false);
        jbtnEmpregados.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jbtnEmpregados.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        jbtnEmpregados.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnEmpregadosActionPerformed(evt);
            }
        });
        jtbBarraFerramentas.add(jbtnEmpregados);

        jbtnConfiguracoes.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/cog.png"))); // NOI18N
        jbtnConfiguracoes.setText(bundle.getString("JAutoInvoiceApp.jbtnConfiguracoes.text")); // NOI18N
        jbtnConfiguracoes.setToolTipText(bundle.getString("JAutoInvoiceApp.jbtnConfiguracoes.toolTipText")); // NOI18N
        jbtnConfiguracoes.setFocusable(false);
        jbtnConfiguracoes.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jbtnConfiguracoes.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        jbtnConfiguracoes.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnConfiguracoesActionPerformed(evt);
            }
        });
        jtbBarraFerramentas.add(jbtnConfiguracoes);
        jtbBarraFerramentas.add(jSeparator7);

        jbtnSair.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/door_out.png"))); // NOI18N
        jbtnSair.setText(bundle.getString("JAutoInvoiceApp.jbtnSair.text")); // NOI18N
        jbtnSair.setToolTipText(bundle.getString("JAutoInvoiceApp.jbtnSair.toolTipText")); // NOI18N
        jbtnSair.setFocusable(false);
        jbtnSair.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jbtnSair.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        jbtnSair.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnSairActionPerformed(evt);
            }
        });
        jtbBarraFerramentas.add(jbtnSair);

        getContentPane().add(jtbBarraFerramentas, java.awt.BorderLayout.NORTH);

        jpPainelPrincipal.setLayout(null);
        jpPainelPrincipal.setLayout(anicard);
        jpPainelPrincipal.add(new PainelAutenticacao(this), P_AUTENTICACAO);
        jpPainelPrincipal.add(new PainelReparacoes(), P_REPARACOES);
        jpPainelPrincipal.add(new PainelFacturas(), P_FACTURAS);
        jpPainelPrincipal.add(new PainelVeiculos(), P_VEICULOS);
        jpPainelPrincipal.add(new PainelClientes(), P_CLIENTES);
        jpPainelPrincipal.add(new PainelPecas(), P_PECAS);
        getContentPane().add(jpPainelPrincipal, java.awt.BorderLayout.CENTER);

        jmApp.setText(bundle.getString("JAutoInvoiceApp.jmApp.text")); // NOI18N
        jmApp.add(jSeparator2);

        jmiSair.setText(bundle.getString("JAutoInvoiceApp.jmiSair.text")); // NOI18N
        jmiSair.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jmiSairActionPerformed(evt);
            }
        });
        jmApp.add(jmiSair);

        jmbBarraMenu.add(jmApp);

        jmAjuda.setText(bundle.getString("JAutoInvoiceApp.jmAjuda.text")); // NOI18N

        jmiAjuda.setText(bundle.getString("JAutoInvoiceApp.jmiAjuda.text")); // NOI18N
        jmiAjuda.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jmiAjudaActionPerformed(evt);
            }
        });
        jmAjuda.add(jmiAjuda);
        jmAjuda.add(jSeparator1);

        jmiActualizacoes.setText(bundle.getString("JAutoInvoiceApp.jmiActualizacoes.text")); // NOI18N
        jmiActualizacoes.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jmiActualizacoesActionPerformed(evt);
            }
        });
        jmAjuda.add(jmiActualizacoes);

        jmiSugestoes.setText(bundle.getString("JAutoInvoiceApp.jmiSugestoes.text")); // NOI18N
        jmiSugestoes.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jmiSugestoesActionPerformed(evt);
            }
        });
        jmAjuda.add(jmiSugestoes);

        jmiSobre.setText(bundle.getString("JAutoInvoiceApp.jmiSobre.text")); // NOI18N
        jmiSobre.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jmiSobreActionPerformed(evt);
            }
        });
        jmAjuda.add(jmiSobre);

        jmbBarraMenu.add(jmAjuda);

        setJMenuBar(jmbBarraMenu);

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jmiSairActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jmiSairActionPerformed
        sair();
    }//GEN-LAST:event_jmiSairActionPerformed

    private void jmiActualizacoesActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jmiActualizacoesActionPerformed
        JOptionPane.showMessageDialog(this, "Por Implementar", "Funcionalidade", JOptionPane.INFORMATION_MESSAGE);
    }//GEN-LAST:event_jmiActualizacoesActionPerformed

    private void jbtnSairActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnSairActionPerformed
        sair();
    }//GEN-LAST:event_jbtnSairActionPerformed

    private void formWindowClosing(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowClosing
        sair();
    }//GEN-LAST:event_formWindowClosing

    private void jbtnClientesActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnClientesActionPerformed
        anicard.show(jpPainelPrincipal, P_CLIENTES);
    }//GEN-LAST:event_jbtnClientesActionPerformed

    private void jbtnVeiculosActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnVeiculosActionPerformed
        anicard.show(jpPainelPrincipal, P_VEICULOS);
    }//GEN-LAST:event_jbtnVeiculosActionPerformed

    private void jbtnFacturasActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnFacturasActionPerformed
        anicard.show(jpPainelPrincipal, P_FACTURAS);
    }//GEN-LAST:event_jbtnFacturasActionPerformed

    private void jbtnReparacoesActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnReparacoesActionPerformed
        anicard.show(jpPainelPrincipal, P_REPARACOES);
    }//GEN-LAST:event_jbtnReparacoesActionPerformed

    private void jbtnPecasActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnPecasActionPerformed
        anicard.show(jpPainelPrincipal, P_PECAS);
    }//GEN-LAST:event_jbtnPecasActionPerformed

    private void jbtnPesquisaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnPesquisaActionPerformed
        JOptionPane.showMessageDialog(this, "Por Implementar", "Funcionalidade", JOptionPane.INFORMATION_MESSAGE);
    }//GEN-LAST:event_jbtnPesquisaActionPerformed

    private void jbtnImprimirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnImprimirActionPerformed
        JOptionPane.showMessageDialog(this, "Por Implementar", "Funcionalidade", JOptionPane.INFORMATION_MESSAGE);
    }//GEN-LAST:event_jbtnImprimirActionPerformed

    private void jbtnMarcacoesActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnMarcacoesActionPerformed
        anicard.show(jpPainelPrincipal, P_MARCACOES);
    }//GEN-LAST:event_jbtnMarcacoesActionPerformed

    private void jbtnEstatisticasActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnEstatisticasActionPerformed
        JOptionPane.showMessageDialog(this, "Por Implementar", "Funcionalidade", JOptionPane.INFORMATION_MESSAGE);
    }//GEN-LAST:event_jbtnEstatisticasActionPerformed

    private void jbtnRelatoriosActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnRelatoriosActionPerformed
        JOptionPane.showMessageDialog(this, "Por Implementar", "Funcionalidade", JOptionPane.INFORMATION_MESSAGE);
    }//GEN-LAST:event_jbtnRelatoriosActionPerformed

    private void jbtnEmpregadosActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnEmpregadosActionPerformed
        EventQueue.invokeLater(new Runnable() {

            public void run() {
                new Empregados(frame, true, gestor).setVisible(true);
            }
        });
    }//GEN-LAST:event_jbtnEmpregadosActionPerformed

    private void jbtnConfiguracoesActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnConfiguracoesActionPerformed
        EventQueue.invokeLater(new Runnable() {

            public void run() {
                new Configuracoes(frame, true, configuracoes).setVisible(true);
            }
        });
    }//GEN-LAST:event_jbtnConfiguracoesActionPerformed

    private void jmiSugestoesActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jmiSugestoesActionPerformed
        EventQueue.invokeLater(new Runnable() {

            public void run() {
                new ErrosSugestoes(frame, true).setVisible(true);
            }
        });
    }//GEN-LAST:event_jmiSugestoesActionPerformed

    private void jmiAjudaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jmiAjudaActionPerformed
        throw new UnsupportedOperationException("Por implementar");
    }//GEN-LAST:event_jmiAjudaActionPerformed

    private void jmiSobreActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jmiSobreActionPerformed
        EventQueue.invokeLater(new Runnable() {

            public void run() {
                new Sobre(frame, true).setVisible(true);
            }
        });
    }//GEN-LAST:event_jmiSobreActionPerformed

    public static void main(String args[]) {
        EventQueue.invokeLater(new Runnable() {

            public void run() {
                Properties props = new Properties();
                String base = System.getProperty("user.home");
                File directoria = new File(base + File.separator + ".jautoinvoice");

                if (!directoria.exists()) {
                    directoria.mkdir();
                }

                File ficheiro = new File(directoria.getAbsolutePath() + File.separator + "conf.xml");
                String ficheiroDados = directoria.getAbsolutePath() + File.separator + "dados.db4o.inv";
                if (ficheiro.exists()) {
                    try {
                        props.loadFromXML(new FileInputStream(ficheiro));
                        ficheiroDados = props.getProperty("caminho", directoria.getAbsolutePath()
                                + File.separator + "dados.db4o.inv");

                    } catch (InvalidPropertiesFormatException ex) {
                        Logger.getLogger(Gestor.class.getName()).log(Level.SEVERE, null, ex);
                    } catch (IOException ex) {
                        Logger.getLogger(Gestor.class.getName()).log(Level.SEVERE, null, ex);
                    }
                }

                try {
                    System.setProperty("java.util.logging.config.file", "logging.properties");
                    LogManager logManager = LogManager.getLogManager();
                    logManager.readConfiguration();
                } catch (IOException ex) {
                    System.err.println("FAILED: Logging setup.");
                } catch (SecurityException ex) {
                    System.err.println("FAILED: Logging setup.");
                }

                try {
                    UIManager.setLookAndFeel(UIManager.getSystemLookAndFeelClassName());
                } catch (ClassNotFoundException ex) {
                    Logger.getLogger(JAutoInvoiceApp.class.getName()).log(Level.SEVERE, null, ex);
                } catch (InstantiationException ex) {
                    Logger.getLogger(JAutoInvoiceApp.class.getName()).log(Level.SEVERE, null, ex);
                } catch (IllegalAccessException ex) {
                    Logger.getLogger(JAutoInvoiceApp.class.getName()).log(Level.SEVERE, null, ex);
                } catch (UnsupportedLookAndFeelException ex) {
                    Logger.getLogger(JAutoInvoiceApp.class.getName()).log(Level.SEVERE, null, ex);
                }

                new JAutoInvoiceApp(ficheiroDados, props, new File(ficheiroDados).exists()).setVisible(true);
            }
        });
    }
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JPopupMenu.Separator jSeparator1;
    private javax.swing.JPopupMenu.Separator jSeparator2;
    private javax.swing.JToolBar.Separator jSeparator3;
    private javax.swing.JToolBar.Separator jSeparator4;
    private javax.swing.JToolBar.Separator jSeparator5;
    private javax.swing.JToolBar.Separator jSeparator6;
    private javax.swing.JToolBar.Separator jSeparator7;
    private javax.swing.JButton jbtnClientes;
    private javax.swing.JButton jbtnConfiguracoes;
    private javax.swing.JButton jbtnEmpregados;
    private javax.swing.JButton jbtnEstatisticas;
    private javax.swing.JButton jbtnFacturas;
    private javax.swing.JButton jbtnImprimir;
    private javax.swing.JButton jbtnMarcacoes;
    private javax.swing.JButton jbtnPecas;
    private javax.swing.JButton jbtnPesquisa;
    private javax.swing.JButton jbtnRelatorios;
    private javax.swing.JButton jbtnReparacoes;
    private javax.swing.JButton jbtnSair;
    private javax.swing.JButton jbtnVeiculos;
    private javax.swing.JMenu jmAjuda;
    private javax.swing.JMenu jmApp;
    private javax.swing.JMenuBar jmbBarraMenu;
    private javax.swing.JMenuItem jmiActualizacoes;
    private javax.swing.JMenuItem jmiAjuda;
    private javax.swing.JMenuItem jmiSair;
    private javax.swing.JMenuItem jmiSobre;
    private javax.swing.JMenuItem jmiSugestoes;
    private javax.swing.JPanel jpPainelPrincipal;
    private javax.swing.JToolBar jtbBarraFerramentas;
    // End of variables declaration//GEN-END:variables
}
