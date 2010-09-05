/*
 * JAutoInvoiceDebugPopulate.java
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

import com.db4o.Db4oEmbedded;
import com.db4o.ObjectContainer;
import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.math.BigInteger;
import java.util.ArrayList;
import java.util.Date;
import java.util.InvalidPropertiesFormatException;
import java.util.List;
import java.util.Properties;
import java.util.Random;
import java.util.logging.Level;
import java.util.logging.LogManager;
import java.util.logging.Logger;
import net.sf.jautoinvoice.engine.Cliente;
import net.sf.jautoinvoice.engine.Empregado;
import net.sf.jautoinvoice.engine.Iva;
import net.sf.jautoinvoice.engine.LinhaReparacao;
import net.sf.jautoinvoice.engine.Marca;
import net.sf.jautoinvoice.engine.Modelo;
import net.sf.jautoinvoice.engine.Peca;
import net.sf.jautoinvoice.engine.Reparacao;
import net.sf.jautoinvoice.engine.Retencao;
import net.sf.jautoinvoice.engine.Utilizador;
import net.sf.jautoinvoice.engine.Veiculo;

/**
 * Esta classe destina-se exclusivamente à criação de um conjunto de dados de
 * teste a serem injectados na base de dados.
 *
 * Depois de executada, a base de dados deverá conter várias instâncias que
 * permitirão testar todo o sistema sem que seja necessário introduzir dados
 * manualmente.
 *
 * @author Sérgio Lopes
 */
public class JAutoInvoiceDebugPopulate {

    public static void main(String[] args) {
        try {
            System.setProperty("java.util.logging.config.file", "logging.properties");
            LogManager logManager = LogManager.getLogManager();
            logManager.readConfiguration();
        } catch (IOException ex) {
            System.err.println("FAILED: Logging setup.");
        } catch (SecurityException ex) {
            System.err.println("FAILED: Logging setup.");
        }

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
                Logger.getLogger(JAutoInvoiceDebugPopulate.class.getName()).log(Level.SEVERE, null, ex);
            } catch (IOException ex) {
                Logger.getLogger(JAutoInvoiceDebugPopulate.class.getName()).log(Level.SEVERE, null, ex);
            }
        }

        ObjectContainer db = Db4oEmbedded.openFile(Db4oEmbedded.newConfiguration(), ficheiroDados);

        db.store(new Utilizador("admin", Utilizador.gerarHash("admin"), true));
        //Valores de IVA
        Iva iva21 = new Iva("21%", 21.0);
        db.store(new Iva("20%", 20.0));
        db.store(new Iva("5%", 5.0));

        //Valores de retenção na fonte
        Retencao retencao215 = new Retencao("21,5%", 21.50);
        db.store(new Retencao("20%", 20.0));

        //Empregados
        Empregado joao = new Empregado("empregado1", Utilizador.gerarHash("empregado1"), "João Lopes", 10.0, false);
        Empregado antonio = new Empregado("empregado2", Utilizador.gerarHash("empregado2"), "António Vieira", 10.0, false);
        Empregado ricardo = new Empregado("empregado3", Utilizador.gerarHash("empregado3"), "Ricardo Antunes", 10.0, false);

        //Marcas
        ArrayList<Marca> marcas = new ArrayList<Marca>();
        Marca toyota = new Marca("Toyota");
        marcas.add(toyota);
        Marca renault = new Marca("Renault");
        marcas.add(renault);
        Marca mercedes = new Marca("Mercedes");
        marcas.add(mercedes);
        Marca nissan = new Marca("Nissan");
        marcas.add(nissan);
        Marca ferrari = new Marca("Ferrari");
        marcas.add(ferrari);

        //Modelos        
        ferrari.adicionarModelo(new Modelo("Zagato 575 GTZ", ferrari));
        ferrari.adicionarModelo(new Modelo("Scuderia Marlboro 248 F1", ferrari));
        ferrari.adicionarModelo(new Modelo("Novitec F 612", ferrari));
        ferrari.adicionarModelo(new Modelo("Hamann F430 Spider", ferrari));
        ferrari.adicionarModelo(new Modelo("GG50", ferrari));
        ferrari.adicionarModelo(new Modelo("FXX", ferrari));
        mercedes.adicionarModelo(new Modelo("Benz C230", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz Model S Roadster", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz C-Class", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz SSK", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz CL500", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz SSK Murphy Roadster", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz CLK-DTM", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz DTM", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz 38/250 SS", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz E320", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz 200B Cabriolet", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz E55 AMG", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz 500K", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz ML430", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz 500K", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz Renntech CLK60", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz 540K Cabriolet C Special", mercedes));
        mercedes.adicionarModelo(new Modelo("Benz S 600 PULLMAN", mercedes));
        toyota.adicionarModelo(new Modelo("AURIS", toyota));
        toyota.adicionarModelo(new Modelo("AVENSIS", toyota));
        toyota.adicionarModelo(new Modelo("AVENSIS CROSS SPORT", toyota));
        toyota.adicionarModelo(new Modelo("AYGO", toyota));
        toyota.adicionarModelo(new Modelo("COROLLA SEDAN", toyota));
        toyota.adicionarModelo(new Modelo("DYNA", toyota));
        toyota.adicionarModelo(new Modelo("HIACE", toyota));
        toyota.adicionarModelo(new Modelo("HILUX", toyota));
        toyota.adicionarModelo(new Modelo("IQ", toyota));
        nissan.adicionarModelo(new Modelo("Leaf", nissan));
        nissan.adicionarModelo(new Modelo("370Z", nissan));
        nissan.adicionarModelo(new Modelo("ATLEON", nissan));
        nissan.adicionarModelo(new Modelo("CABSTAR", nissan));
        nissan.adicionarModelo(new Modelo("CUBE", nissan));
        nissan.adicionarModelo(new Modelo("GT-R", nissan));
        nissan.adicionarModelo(new Modelo("INTERSTAR", nissan));
        nissan.adicionarModelo(new Modelo("KUBISTAR", nissan));
        nissan.adicionarModelo(new Modelo("MICRA", nissan));
        nissan.adicionarModelo(new Modelo("MICRA C+", nissan));
        renault.adicionarModelo(new Modelo("CLIO", renault));
        renault.adicionarModelo(new Modelo("CLIO CAMPUS", renault));
        renault.adicionarModelo(new Modelo("CLIO GRAND TOUR", renault));
        renault.adicionarModelo(new Modelo("ESPACE", renault));
        renault.adicionarModelo(new Modelo("FLUENCE", renault));
        renault.adicionarModelo(new Modelo("GRAND ESPACE", renault));
        renault.adicionarModelo(new Modelo("GRAND MODUS", renault));
        renault.adicionarModelo(new Modelo("GRAND SCÉNIC", renault));
        renault.adicionarModelo(new Modelo("KANGOO", renault));

        ArrayList<Modelo> modelos = new ArrayList<Modelo>();
        for (Modelo m : renault.getModelos()) {
            modelos.add(m);
        }
        for (Modelo m : nissan.getModelos()) {
            modelos.add(m);
        }
        for (Modelo m : toyota.getModelos()) {
            modelos.add(m);
        }
        for (Modelo m : mercedes.getModelos()) {
            modelos.add(m);
        }
        for (Modelo m : ferrari.getModelos()) {
            modelos.add(m);
        }

        //Peças
        ArrayList<Peca> pecas = new ArrayList<Peca>();
        for (int i = 0; i < 100; i++) {
            ArrayList<Modelo> ms = new ArrayList<Modelo>();
            for (int j = (int) (Math.random() * 10); --j > 0;) {
                ms.add(modelos.get((int) (Math.random() * modelos.size())));
            }

            pecas.add(new Peca("Peca " + i, "R#" + i, "", Math.random() * 200, iva21, ms));
        }

        //Clientes
        ArrayList<Cliente> clientes = new ArrayList<Cliente>();
        clientes.add(new Cliente("António Sousa", "Rua das Flores nr. 32", "2400-023", "Coimbra", "203123432", null, "antonio@email.com", null, ""));
        clientes.add(new Cliente("Ricardo Costa Sousa", "Urbanização Antunes lt 2, 3ºDrt.", "2000-321", "Porto", "204245098", null, "ricardo@email.com", null, ""));
        clientes.add(new Cliente("Rui Pedro Lopes", "Rua Silva nr. 33", "1899-345", "Leiria", "919109823", null, "rui@email.com", null, ""));
        clientes.add(new Cliente("Pedro Antunes Costa", "Av. Alves nr. 32", "4000-034", "Leiria", "989723482", null, "pedro@email.com", null, ""));
        clientes.add(new Cliente("Cristina Rito", "Charneca da Lousa 3ºA", "5000-341", "Guimarães", "234908765", null, "cristina@email.com", null, ""));
        clientes.add(new Cliente("Joaquim Antunes", "Rua das Flores nr. 40", "1000-342", "Porto", "213876213", null, "joaquim@email.com", null, ""));
        clientes.add(new Cliente("Ana Quintas", "Rua Antunes", "2100-009", "Coimbra", "345123455", null, "ana@email.com", null, ""));
        clientes.add(new Cliente("Celeste Costa", "Rua Clara", "2220-002", "Lisboa", "456789223", null, "celeste@email.com", null, ""));
        clientes.add(new Cliente("Rita Pedro", "", "", "", "929590234", null, "rita@email.com", null, ""));
        clientes.add(new Cliente("João Maria", "", "", "", "587902123", "234999455", "joao@email.com", null, ""));

        //Veiculos
        ArrayList<Veiculo> veiculos = new ArrayList<Veiculo>();
        Veiculo v = null;
        Marca marca = null;
        Modelo modelo = null;
        Cliente cliente = null;
        char letras[] = new char[]{'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', '1', '2', '3', '4', '5'};
        StringBuilder matricula = null;
        String[] cilindradas = new String[]{"100", "125", "150", "1200", "1600"};
        //String nrChassis, String cilindrada, String nrMotor, Cliente dono, String observacoes
        for (int i = 0; i < 25; i++) {

            marca = marcas.get((int) (Math.random() * marcas.size()));
            modelo = marca.getModelos().get((int) (Math.random() * marca.getModelos().size()));
            cliente = clientes.get((int) (Math.random() * clientes.size()));

            matricula = new StringBuilder();
            matricula.append(letras[(int)(Math.random() * letras.length)]);
            matricula.append(letras[(int)(Math.random() * letras.length)]);
            matricula.append('-');
            matricula.append(letras[(int)(Math.random() * letras.length)]);
            matricula.append(letras[(int)(Math.random() * letras.length)]);
            matricula.append('-');
            matricula.append(letras[(int)(Math.random() * letras.length)]);
            matricula.append(letras[(int)(Math.random() * letras.length)]);

            v = new Veiculo(marca, modelo, new Date(), matricula.toString(), 
                    new BigInteger(16, new Random(System.currentTimeMillis())).toString(),
                    cilindradas[(int)(Math.random() * cilindradas.length)],
                    new BigInteger(8, new Random(System.currentTimeMillis())).toString(), cliente, "");
            cliente.adicionarVeiculoActual(v);

            veiculos.add(v);
        }

        for(Veiculo ve : veiculos) {
            db.store(ve);
        }

        //Reparacoes
        //Reparacao r1 = new Reparacao(null, ficheiroDados, quilometros, ficheiroDados);
        //Reparacao r2 = new Reparacao(null, ficheiroDados, quilometros, ficheiroDados);
        //Reparacao r3 = new Reparacao(null, ficheiroDados, quilometros, ficheiroDados);
        //Reparacao r4 = new Reparacao(null, ficheiroDados, quilometros, ficheiroDados);
        //Reparacao r5 = new Reparacao(null, ficheiroDados, quilometros, ficheiroDados);

        //Linha de Reparação
        //LinhaReparacao l1 = new LinhaReparacao(joao, valorHora, horas);
        //LinhaReparacao l1 = new LinhaReparacao(joao, valorHora, horas);
        //LinhaReparacao l1 = new LinhaReparacao(joao, valorHora, horas);
        //LinhaReparacao l1 = new LinhaReparacao(joao, valorHora, horas);
        //LinhaReparacao l1 = new LinhaReparacao(joao, valorHora, horas);
        //LinhaReparacao l1 = new LinhaReparacao(joao, valorHora, horas);
        //LinhaReparacao l1 = new LinhaReparacao(joao, valorHora, horas);
        //LinhaReparacao l1 = new LinhaReparacao(joao, valorHora, horas);
        //LinhaReparacao l1 = new LinhaReparacao(joao, valorHora, horas);
        //LinhaReparacao l1 = new LinhaReparacao(joao, valorHora, horas);
        //LinhaReparacao l1 = new LinhaReparacao(joao, valorHora, horas);

        db.close();
    }
}
