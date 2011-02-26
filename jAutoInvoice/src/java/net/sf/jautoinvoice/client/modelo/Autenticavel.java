/*
 * Autenticavel.java
 *
 * This file is part of jAutoInvoice, http://sourceforge.net/p/jautoinvoice
 *
 * Copyright (C) 2011 jAutoInvoice
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
package net.sf.jautoinvoice.client.modelo;

/**
 * Interface que pretende marcar os elementos que podem fazer autenticação no 
 * sistema. Actualmente apenas o <em>Cliente</em> e o <em>Funcionario</em> 
 * poderão aceder ao sistema.
 * 
 * A interface foi criada para evitar misturar na mesma hierarquia os dois 
 * elementos mencionados acima.
 * 
 * @since 1.0
 */
public interface Autenticavel {

    /**
     * Devolve a password deste elemento. A password será devolvida como uma 
     * hash uma vez que não é guardado o valor orginal.
     * 
     * @return Hash da password.
     * @since 1.0
     */
    public String getPasswod();

    /**
     * Recebe uma password e guarda-a neste elemento. A password deve vir 
     * codificado, devendo ser passada a hash e não a password exacta.
     * 
     * @param password Hash da password a guardar.
     * @since 1.0
     */
    public void setPassword(String password);

    /**
     * Devolve o username deste elemento.
     * 
     * @return Username do elemento.
     * @since 1.0
     */
    public String getUsername();

    /**
     * Permite alterar o username do elemento.
     * 
     * @param username Novo username.
     * @throws IllegalArgumentException Caso o username passado seja nulo ou 
     * uma string vazia.
     * @since 1.0
     */
    public void setUsername(String username) throws IllegalArgumentException;
}
