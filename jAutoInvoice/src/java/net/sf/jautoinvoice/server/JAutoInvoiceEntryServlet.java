package net.sf.jautoinvoice.server;

//import java.io.IOException;
//import java.io.PrintWriter;
//import java.util.logging.Level;
//import java.util.logging.Logger;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class JAutoInvoiceEntryServlet extends HttpServlet {

//    private JAutoInvoiceManager gestor;

    public JAutoInvoiceEntryServlet() {
        super();

//        gestor = new JAutoInvoiceManager();
    }

    @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse resp) {
//        PrintWriter out = null;
//        resp.setContentType("text/html; charset=UTF-8");
//
//        try {
//            out = resp.getWriter();
//            if (gestor.autenticado()) {
//                if (gestor.permissoesFuncionario() || gestor.permissoesAdministracao()) {
//                } else if (gestor.permissoesCliente()) {
//                }
//            } else {
//            }
//        } catch (IOException ex) {
//            Logger.getLogger(JAutoInvoiceEntryServlet.class.getName()).log(Level.SEVERE, null, ex);
//        } finally {
//            out.close();
//        }
    }

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse resp) {
        doGet(req, resp);
    }
}
