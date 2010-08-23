/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package org.sergiolopes.jautoinvoice.engine;

import java.util.List;
import org.junit.After;
import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author sergiolopes
 */
public class GestorTest {

    public GestorTest() {
    }

    @BeforeClass
    public static void setUpClass() throws Exception {
    }

    @AfterClass
    public static void tearDownClass() throws Exception {
    }

    @Before
    public void setUp() {
    }

    @After
    public void tearDown() {
    }

    /**
     * Test of init method, of class Gestor.
     */
    @Test
    public void testInit() {
        System.out.println("init");
        Gestor instance = new Gestor();
        instance.init();
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of desligar method, of class Gestor.
     */
    @Test
    public void testDesligar() {
        System.out.println("desligar");
        Gestor instance = new Gestor();
        instance.desligar();
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of listarTodosClientes method, of class Gestor.
     */
    @Test
    public void testListarTodosClientes() {
        System.out.println("listarTodosClientes");
        Gestor instance = new Gestor();
        List expResult = null;
        List result = instance.listarTodosClientes();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of pesquisarCliente method, of class Gestor.
     */
    @Test
    public void testPesquisarCliente() {
        System.out.println("pesquisarCliente");
        Gestor instance = new Gestor();
        List expResult = null;
        List result = instance.pesquisarCliente();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of adicionarCliente method, of class Gestor.
     */
    @Test
    public void testAdicionarCliente() {
        System.out.println("adicionarCliente");
        Gestor instance = new Gestor();
        instance.adicionarCliente();
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of removerCliente method, of class Gestor.
     */
    @Test
    public void testRemoverCliente() {
        System.out.println("removerCliente");
        Gestor instance = new Gestor();
        instance.removerCliente();
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of actualizarCliente method, of class Gestor.
     */
    @Test
    public void testActualizarCliente() {
        System.out.println("actualizarCliente");
        Gestor instance = new Gestor();
        instance.actualizarCliente();
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of listarTodasMarcas method, of class Gestor.
     */
    @Test
    public void testListarTodasMarcas() {
        System.out.println("listarTodasMarcas");
        Gestor instance = new Gestor();
        List expResult = null;
        List result = instance.listarTodasMarcas();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of procurarMarca method, of class Gestor.
     */
    @Test
    public void testProcurarMarca() {
        System.out.println("procurarMarca");
        Gestor instance = new Gestor();
        List expResult = null;
        List result = instance.procurarMarca();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of adicionarMarca method, of class Gestor.
     */
    @Test
    public void testAdicionarMarca() {
        System.out.println("adicionarMarca");
        Gestor instance = new Gestor();
        instance.adicionarMarca();
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of removerMarca method, of class Gestor.
     */
    @Test
    public void testRemoverMarca() {
        System.out.println("removerMarca");
        Gestor instance = new Gestor();
        instance.removerMarca();
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of actualizarMarca method, of class Gestor.
     */
    @Test
    public void testActualizarMarca() {
        System.out.println("actualizarMarca");
        Gestor instance = new Gestor();
        instance.actualizarMarca();
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

}