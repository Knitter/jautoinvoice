package net.sf.jautoinvoice.server;

import java.io.UnsupportedEncodingException;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.Formatter;
import java.util.logging.Level;
import java.util.logging.Logger;

public abstract class SHA1 {

    public static String hash(String data) {
        try {
            MessageDigest digester = MessageDigest.getInstance("SHA-1");
            digester.update(data.getBytes("UTF-8"), 0, data.length());

            Formatter formatter = new Formatter();
            for (byte b : digester.digest()) {
                formatter.format("%02x", b);
            }

            return formatter.toString();
        } catch (NoSuchAlgorithmException ex) {
            Logger.getLogger(SHA1.class.getName()).log(Level.SEVERE, null, ex);
        } catch (UnsupportedEncodingException ex) {
            Logger.getLogger(SHA1.class.getName()).log(Level.SEVERE, null, ex);
        }

        return null;
    }
}
