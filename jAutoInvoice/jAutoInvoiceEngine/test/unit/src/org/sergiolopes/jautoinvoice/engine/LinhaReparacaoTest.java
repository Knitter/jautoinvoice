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
public class LinhaReparacaoTest {

    public LinhaReparacaoTest() {
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
     * Test of getEmpregado method, of class LinhaReparacao.
     */
    @Test
    public void testGetEmpregado() {
        System.out.println("getEmpregado");
        LinhaReparacao instance = null;
        Empregado expResult = null;
        Empregado result = instance.getEmpregado();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of setEmpregados method, of class LinhaReparacao.
     */
    @Test
    public void testSetEmpregados() {
        System.out.println("setEmpregados");
        Empregado empregado = null;
        LinhaReparacao instance = null;
        instance.setEmpregados(empregado);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of getHoras method, of class LinhaReparacao.
     */
    @Test
    public void testGetHoras() {
        System.out.println("getHoras");
        LinhaReparacao instance = null;
        double expResult = 0.0;
        double result = instance.getHoras();
        assertEquals(expResult, result, 0.0);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of setHoras method, of class LinhaReparacao.
     */
    @Test
    public void testSetHoras() {
        System.out.println("setHoras");
        double horas = 0.0;
        LinhaReparacao instance = null;
        instance.setHoras(horas);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of getValorHora method, of class LinhaReparacao.
     */
    @Test
    public void testGetValorHora() {
        System.out.println("getValorHora");
        LinhaReparacao instance = null;
        double expResult = 0.0;
        double result = instance.getValorHora();
        assertEquals(expResult, result, 0.0);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of setValorHora method, of class LinhaReparacao.
     */
    @Test
    public void testSetValorHora() {
        System.out.println("setValorHora");
        double valorHora = 0.0;
        LinhaReparacao instance = null;
        instance.setValorHora(valorHora);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of equals method, of class LinhaReparacao.
     */
    @Test
    public void testEquals() {
        System.out.println("equals");
        Object obj = null;
        LinhaReparacao instance = null;
        boolean expResult = false;
        boolean result = instance.equals(obj);
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of hashCode method, of class LinhaReparacao.
     */
    @Test
    public void testHashCode() {
        System.out.println("hashCode");
        LinhaReparacao instance = null;
        int expResult = 0;
        int result = instance.hashCode();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

}