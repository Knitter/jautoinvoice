/*
 * DBManager.java
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
package net.sf.jautoinvoice.server;

import com.db4o.Db4oEmbedded;
import com.db4o.ObjectContainer;

/**
 * Gestor de ligação à base de dados. É esta classe que permite iniciar o motor
 * de bases de dados e obter o objecto de execução de queries.
 * 
 * Esta classe deve ser única no sistema.
 * 
 * @since 1.0
 */
public final class DBManager {

    private static DBManager instance;
    private ObjectContainer container;
    private String path;

    private DBManager() {
        //DO NOTHING
    }

    public static DBManager getInstance() {
        if (instance == null) {
            instance = new DBManager();
        }

        return instance;
    }

    public synchronized ObjectContainer getObjectContainer() {
        if (container == null || container.ext().isClosed()) {
            startup();
        }

        return container;

    }

    public synchronized void shutdown() {
        if (container != null) {
            container.close();
        }
    }

    private void startup() {
        container = Db4oEmbedded.openFile(Db4oEmbedded.newConfiguration(), path);
    }

    public String getPath() {
        return path;
    }

    public void setPath(String path) {
        this.path = path;
    }
}
