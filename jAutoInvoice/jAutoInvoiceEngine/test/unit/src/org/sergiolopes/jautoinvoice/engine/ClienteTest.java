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
public class ClienteTest {

    public ClienteTest() {
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
     * Test of getCodigoPostal method, of class Cliente.
     */
    @Test
    public void testGetCodigoPostal() {
        System.out.println("getCodigoPostal");
        Cliente instance = null;
        String expResult = "";
        String result = instance.getCodigoPostal();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of setCodigoPostal method, of class Cliente.
     */
    @Test
    public void testSetCodigoPostal() {
        System.out.println("setCodigoPostal");
        String codigoPostal = "";
        Cliente instance = null;
        instance.setCodigoPostal(codigoPostal);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of getEmail method, of class Cliente.
     */
    @Test
    public void testGetEmail() {
        System.out.println("getEmail");
        Cliente instance = null;
        String expResult = "";
        String result = instance.getEmail();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of setEmail method, of class Cliente.
     */
    @Test
    public void testSetEmail() {
        System.out.println("setEmail");
        String email = "";
        Cliente instance = null;
        instance.setEmail(email);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of getEndereco method, of class Cliente.
     */
    @Test
    public void testGetEndereco() {
        System.out.println("getEndereco");
        Cliente instance = null;
        String expResult = "";
        String result = instance.getEndereco();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of setEndereco method, of class Cliente.
     */
    @Test
    public void testSetEndereco() {
        System.out.println("setEndereco");
        String endereco = "";
        Cliente instance = null;
        instance.setEndereco(endereco);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of getLocalidade method, of class Cliente.
     */
    @Test
    public void testGetLocalidade() {
        System.out.println("getLocalidade");
        Cliente instance = null;
        String expResult = "";
        String result = instance.getLocalidade();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of setLocalidade method, of class Cliente.
     */
    @Test
    public void testSetLocalidade() {
        System.out.println("setLocalidade");
        String localidade = "";
        Cliente instance = null;
        instance.setLocalidade(localidade);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of getNome method, of class Cliente.
     */
    @Test
    public void testGetNome() {
        System.out.println("getNome");
        Cliente instance = null;
        String expResult = "";
        String result = instance.getNome();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of setNome method, of class Cliente.
     */
    @Test
    public void testSetNome() {
        System.out.println("setNome");
        String nome = "";
        Cliente instance = null;
        instance.setNome(nome);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of getTelefone1 method, of class Cliente.
     */
    @Test
    public void testGetTelefone1() {
        System.out.println("getTelefone1");
        Cliente instance = null;
        String expResult = "";
        String result = instance.getTelefone1();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of setTelefone1 method, of class Cliente.
     */
    @Test
    public void testSetTelefone1() {
        System.out.println("setTelefone1");
        String telefone1 = "";
        Cliente instance = null;
        instance.setTelefone1(telefone1);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of getTelefone2 method, of class Cliente.
     */
    @Test
    public void testGetTelefone2() {
        System.out.println("getTelefone2");
        Cliente instance = null;
        String expResult = "";
        String result = instance.getTelefone2();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of setTelefone2 method, of class Cliente.
     */
    @Test
    public void testSetTelefone2() {
        System.out.println("setTelefone2");
        String telefone2 = "";
        Cliente instance = null;
        instance.setTelefone2(telefone2);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of getVeiculos method, of class Cliente.
     */
    @Test
    public void testGetVeiculos() {
        System.out.println("getVeiculos");
        Cliente instance = null;
        List expResult = null;
        List result = instance.getVeiculos();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of adicionarVeiculo method, of class Cliente.
     */
    @Test
    public void testAdicionarVeiculo() {
        System.out.println("adicionarVeiculo");
        Veiculo veiculo = null;
        Cliente instance = null;
        instance.adicionarVeiculo(veiculo);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of removerVeiculo method, of class Cliente.
     */
    @Test
    public void testRemoverVeiculo() {
        System.out.println("removerVeiculo");
        Veiculo veiculo = null;
        Cliente instance = null;
        instance.removerVeiculo(veiculo);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of equals method, of class Cliente.
     */
    @Test
    public void testEquals() {
        System.out.println("equals");
        Object obj = null;
        Cliente instance = null;
        boolean expResult = false;
        boolean result = instance.equals(obj);
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of hashCode method, of class Cliente.
     */
    @Test
    public void testHashCode() {
        System.out.println("hashCode");
        Cliente instance = null;
        int expResult = 0;
        int result = instance.hashCode();
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

}