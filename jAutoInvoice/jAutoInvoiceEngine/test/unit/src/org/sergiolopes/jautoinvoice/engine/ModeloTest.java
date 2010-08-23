/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package org.sergiolopes.jautoinvoice.engine;

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
public class ModeloTest {

    public ModeloTest() {
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
     * Test of getNome method, of class Modelo.
     */
    @Test
    public void testGetNome() {
        System.out.println("getNome");
        Modelo instance = null;
        String expResult = "";
        String result = instance.getNome();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of setNome method, of class Modelo.
     */
    @Test
    public void testSetNome() {
        System.out.println("setNome");
        String nome = "";
        Modelo instance = null;
        instance.setNome(nome);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of equals method, of class Modelo.
     */
    @Test
    public void testEquals() {
        System.out.println("equals");
        Object obj = null;
        Modelo instance = null;
        boolean expResult = false;
        boolean result = instance.equals(obj);
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of hashCode method, of class Modelo.
     */
    @Test
    public void testHashCode() {
        System.out.println("hashCode");
        Modelo instance = null;
        int expResult = 0;
        int result = instance.hashCode();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

}