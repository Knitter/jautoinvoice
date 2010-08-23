/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package org.sergiolopes.jautoinvoice.engine;

import java.util.Date;
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
public class ReparacaoTest {

    public ReparacaoTest() {
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
     * Test of getData method, of class Reparacao.
     */
    @Test
    public void testGetData() {
        System.out.println("getData");
        Reparacao instance = null;
        Date expResult = null;
        Date result = instance.getData();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of setData method, of class Reparacao.
     */
    @Test
    public void testSetData() {
        System.out.println("setData");
        Date data = null;
        Reparacao instance = null;
        instance.setData(data);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of getDescricaoAvaria method, of class Reparacao.
     */
    @Test
    public void testGetDescricaoAvaria() {
        System.out.println("getDescricaoAvaria");
        Reparacao instance = null;
        String expResult = "";
        String result = instance.getDescricaoAvaria();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of setDescricaoAvaria method, of class Reparacao.
     */
    @Test
    public void testSetDescricaoAvaria() {
        System.out.println("setDescricaoAvaria");
        String descricaoAvaria = "";
        Reparacao instance = null;
        instance.setDescricaoAvaria(descricaoAvaria);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of getDescricaoReparacao method, of class Reparacao.
     */
    @Test
    public void testGetDescricaoReparacao() {
        System.out.println("getDescricaoReparacao");
        Reparacao instance = null;
        String expResult = "";
        String result = instance.getDescricaoReparacao();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of setDescricaoReparacao method, of class Reparacao.
     */
    @Test
    public void testSetDescricaoReparacao() {
        System.out.println("setDescricaoReparacao");
        String descricaoReparacao = "";
        Reparacao instance = null;
        instance.setDescricaoReparacao(descricaoReparacao);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of getQuilometros method, of class Reparacao.
     */
    @Test
    public void testGetQuilometros() {
        System.out.println("getQuilometros");
        Reparacao instance = null;
        int expResult = 0;
        int result = instance.getQuilometros();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of setQuilometros method, of class Reparacao.
     */
    @Test
    public void testSetQuilometros() {
        System.out.println("setQuilometros");
        int quilometros = 0;
        Reparacao instance = null;
        instance.setQuilometros(quilometros);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of equals method, of class Reparacao.
     */
    @Test
    public void testEquals() {
        System.out.println("equals");
        Object obj = null;
        Reparacao instance = null;
        boolean expResult = false;
        boolean result = instance.equals(obj);
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of hashCode method, of class Reparacao.
     */
    @Test
    public void testHashCode() {
        System.out.println("hashCode");
        Reparacao instance = null;
        int expResult = 0;
        int result = instance.hashCode();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

}