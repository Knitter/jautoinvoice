package net.sf.jautoinvoice.janelas;

import java.util.Properties;

public class Configuracoes extends javax.swing.JDialog {

    private Properties configuracoes;

    public Configuracoes(java.awt.Frame parent, boolean modal, Properties configuracoes) {
        super(parent, modal);

        this.configuracoes = configuracoes;

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

        jpPainelGeral = new javax.swing.JPanel();
        jlblFicheiroDados = new javax.swing.JLabel();
        jtfFicheiroDados = new javax.swing.JTextField();
        jlblPassword = new javax.swing.JLabel();
        jpfPassword = new javax.swing.JPasswordField();
        jpfPassword2 = new javax.swing.JPasswordField();
        jlblPassword2 = new javax.swing.JLabel();
        jSeparator2 = new javax.swing.JSeparator();
        jbtnExplorar = new javax.swing.JButton();
        jpPainelAspecto = new javax.swing.JPanel();
        jlblLookAndFeel = new javax.swing.JLabel();
        jcbxLookAndFeel = new javax.swing.JComboBox();
        jckbUsarAnimacao = new javax.swing.JCheckBox();
        jSeparator1 = new javax.swing.JSeparator();
        jlblTipoAnimacao = new javax.swing.JLabel();
        jcbxTipoAnimacao = new javax.swing.JComboBox();
        jbtnCancelar = new javax.swing.JButton();
        jbtnGravar = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);
        java.util.ResourceBundle bundle = java.util.ResourceBundle.getBundle("net/sf/jautoinvoice/i18n/dialogos"); // NOI18N
        setTitle(bundle.getString("Configuracoes.title")); // NOI18N

        jpPainelGeral.setBorder(javax.swing.BorderFactory.createTitledBorder(bundle.getString("Configuracoes.jpPainelGeral.border.title"))); // NOI18N

        jlblFicheiroDados.setText(bundle.getString("Configuracoes.jlblFicheiroDados.text")); // NOI18N

        jlblPassword.setText(bundle.getString("Configuracoes.jlblPassword.text")); // NOI18N

        jlblPassword2.setText(bundle.getString("Configuracoes.jlblPassword2.text")); // NOI18N

        jbtnExplorar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/net/sf/jautoinvoice/resources/x16/folders_explorer.png"))); // NOI18N
        jbtnExplorar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnExplorarActionPerformed(evt);
            }
        });

        org.jdesktop.layout.GroupLayout jpPainelGeralLayout = new org.jdesktop.layout.GroupLayout(jpPainelGeral);
        jpPainelGeral.setLayout(jpPainelGeralLayout);
        jpPainelGeralLayout.setHorizontalGroup(
            jpPainelGeralLayout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
            .add(jpPainelGeralLayout.createSequentialGroup()
                .addContainerGap()
                .add(jpPainelGeralLayout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
                    .add(jSeparator2, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, 461, Short.MAX_VALUE)
                    .add(jpPainelGeralLayout.createSequentialGroup()
                        .add(jlblFicheiroDados)
                        .add(18, 18, 18)
                        .add(jtfFicheiroDados, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, 282, Short.MAX_VALUE)
                        .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED)
                        .add(jbtnExplorar))
                    .add(jpPainelGeralLayout.createSequentialGroup()
                        .add(jpPainelGeralLayout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
                            .add(jlblPassword)
                            .add(jlblPassword2))
                        .add(18, 18, 18)
                        .add(jpPainelGeralLayout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
                            .add(jpfPassword2, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, 253, Short.MAX_VALUE)
                            .add(jpfPassword, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, 253, Short.MAX_VALUE))))
                .addContainerGap())
        );
        jpPainelGeralLayout.setVerticalGroup(
            jpPainelGeralLayout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
            .add(jpPainelGeralLayout.createSequentialGroup()
                .addContainerGap()
                .add(jpPainelGeralLayout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                    .add(jlblFicheiroDados)
                    .add(jtfFicheiroDados, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                    .add(jbtnExplorar))
                .add(18, 18, 18)
                .add(jSeparator2, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 10, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED)
                .add(jpPainelGeralLayout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                    .add(jlblPassword)
                    .add(jpfPassword, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED)
                .add(jpPainelGeralLayout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                    .add(jpfPassword2, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                    .add(jlblPassword2))
                .addContainerGap(org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        jpPainelAspecto.setBorder(javax.swing.BorderFactory.createTitledBorder(bundle.getString("Configuracoes.jpPainelAspecto.border.title"))); // NOI18N

        jlblLookAndFeel.setText(bundle.getString("Configuracoes.jlblLookAndFeel.text")); // NOI18N

        jckbUsarAnimacao.setText(bundle.getString("Configuracoes.jckbUsarAnimacao.text")); // NOI18N
        jckbUsarAnimacao.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jckbUsarAnimacaoActionPerformed(evt);
            }
        });

        jlblTipoAnimacao.setText(bundle.getString("Configuracoes.jlblTipoAnimacao.text")); // NOI18N

        org.jdesktop.layout.GroupLayout jpPainelAspectoLayout = new org.jdesktop.layout.GroupLayout(jpPainelAspecto);
        jpPainelAspecto.setLayout(jpPainelAspectoLayout);
        jpPainelAspectoLayout.setHorizontalGroup(
            jpPainelAspectoLayout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
            .add(jpPainelAspectoLayout.createSequentialGroup()
                .addContainerGap()
                .add(jpPainelAspectoLayout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
                    .add(jpPainelAspectoLayout.createSequentialGroup()
                        .add(12, 12, 12)
                        .add(jlblTipoAnimacao)
                        .add(18, 18, 18)
                        .add(jcbxTipoAnimacao, 0, 308, Short.MAX_VALUE))
                    .add(jpPainelAspectoLayout.createSequentialGroup()
                        .add(jckbUsarAnimacao)
                        .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED)
                        .add(jSeparator1, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, 321, Short.MAX_VALUE))
                    .add(jpPainelAspectoLayout.createSequentialGroup()
                        .add(jlblLookAndFeel)
                        .add(18, 18, 18)
                        .add(jcbxLookAndFeel, 0, 349, Short.MAX_VALUE)))
                .addContainerGap())
        );
        jpPainelAspectoLayout.setVerticalGroup(
            jpPainelAspectoLayout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
            .add(jpPainelAspectoLayout.createSequentialGroup()
                .addContainerGap()
                .add(jpPainelAspectoLayout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                    .add(jlblLookAndFeel)
                    .add(jcbxLookAndFeel, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                .add(18, 18, 18)
                .add(jpPainelAspectoLayout.createParallelGroup(org.jdesktop.layout.GroupLayout.TRAILING)
                    .add(jckbUsarAnimacao)
                    .add(jSeparator1, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 10, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED)
                .add(jpPainelAspectoLayout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                    .add(jlblTipoAnimacao)
                    .add(jcbxTipoAnimacao, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        jbtnCancelar.setText(bundle.getString("Configuracoes.jbtnCancelar.text")); // NOI18N
        jbtnCancelar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnCancelarActionPerformed(evt);
            }
        });

        jbtnGravar.setText(bundle.getString("Configuracoes.jbtnGravar.text")); // NOI18N
        jbtnGravar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbtnGravarActionPerformed(evt);
            }
        });

        org.jdesktop.layout.GroupLayout layout = new org.jdesktop.layout.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
            .add(layout.createSequentialGroup()
                .addContainerGap()
                .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
                    .add(jpPainelGeral, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .add(org.jdesktop.layout.GroupLayout.TRAILING, layout.createSequentialGroup()
                        .add(jbtnGravar)
                        .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED)
                        .add(jbtnCancelar))
                    .add(org.jdesktop.layout.GroupLayout.TRAILING, jpPainelAspecto, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
            .add(layout.createSequentialGroup()
                .addContainerGap()
                .add(jpPainelGeral, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED)
                .add(jpPainelAspecto, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                    .add(jbtnCancelar)
                    .add(jbtnGravar))
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jckbUsarAnimacaoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jckbUsarAnimacaoActionPerformed
        jcbxTipoAnimacao.setEnabled(jckbUsarAnimacao.isSelected());
    }//GEN-LAST:event_jckbUsarAnimacaoActionPerformed

    private void jbtnExplorarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnExplorarActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_jbtnExplorarActionPerformed

    private void jbtnGravarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnGravarActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_jbtnGravarActionPerformed

    private void jbtnCancelarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbtnCancelarActionPerformed
        dispose();
    }//GEN-LAST:event_jbtnCancelarActionPerformed
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JSeparator jSeparator1;
    private javax.swing.JSeparator jSeparator2;
    private javax.swing.JButton jbtnCancelar;
    private javax.swing.JButton jbtnExplorar;
    private javax.swing.JButton jbtnGravar;
    private javax.swing.JComboBox jcbxLookAndFeel;
    private javax.swing.JComboBox jcbxTipoAnimacao;
    private javax.swing.JCheckBox jckbUsarAnimacao;
    private javax.swing.JLabel jlblFicheiroDados;
    private javax.swing.JLabel jlblLookAndFeel;
    private javax.swing.JLabel jlblPassword;
    private javax.swing.JLabel jlblPassword2;
    private javax.swing.JLabel jlblTipoAnimacao;
    private javax.swing.JPanel jpPainelAspecto;
    private javax.swing.JPanel jpPainelGeral;
    private javax.swing.JPasswordField jpfPassword;
    private javax.swing.JPasswordField jpfPassword2;
    private javax.swing.JTextField jtfFicheiroDados;
    // End of variables declaration//GEN-END:variables
}