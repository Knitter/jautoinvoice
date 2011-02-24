package net.sf.jautoinvoice.server.modelo;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;

public class Veiculo implements Serializable {

    private Marca marca;
    private Modelo modelo;
    private String dataRegisto;
    private String matricula;
    private String nrChassis;
    private String cilindrada;
    private String nrMotor;
    private Cliente dono;
    private List<Cliente> antigosDonos;
    private List<Inspeccao> inspeccoes;
    private ECategoria categoria;
    private ECombustivel combustivel;
    private String notas;
    private List<FolhaObra> folhasObra;

    public Veiculo() {
        antigosDonos = new ArrayList<Cliente>();
        inspeccoes = new ArrayList<Inspeccao>();
        folhasObra = new ArrayList<FolhaObra>();
    }

    public Veiculo(Marca marca, Modelo modelo, String dataRegisto, String matricula,
            String nrChassis, String cilindrada, String nrMotor, Cliente dono,
            List<Cliente> antigosDonos, List<Inspeccao> inspeccoes, ECategoria categoria,
            ECombustivel combustivel, String notas, List<FolhaObra> folhasObra) {

        this.marca = marca;
        this.modelo = modelo;
        this.dataRegisto = dataRegisto;
        this.matricula = matricula;
        this.nrChassis = nrChassis;
        this.cilindrada = cilindrada;
        this.nrMotor = nrMotor;
        this.dono = dono;
        this.categoria = categoria;
        this.combustivel = combustivel;
        this.notas = notas;

        this.antigosDonos = new ArrayList<Cliente>(antigosDonos.size());
        for (Cliente c : antigosDonos) {
            this.antigosDonos.add(c);
        }

        this.inspeccoes = new ArrayList<Inspeccao>(inspeccoes.size());
        for (Inspeccao i : inspeccoes) {
            this.inspeccoes.add(i);
        }

        this.folhasObra = new ArrayList<FolhaObra>();
        for (FolhaObra f : folhasObra) {
            this.folhasObra.add(f);
        }
    }

    public void adicionarAntigoDono(Cliente dono) {
        if (antigosDonos == null) {
            antigosDonos = new ArrayList<Cliente>();
        }

        antigosDonos.add(dono);
    }

    public void removerAntigoDono(Cliente dono) {
        if (antigosDonos != null) {
            antigosDonos.remove(dono);
        }
    }

    public void adicionarInspeccao(Inspeccao inspeccao) {
        if (inspeccoes == null) {
            inspeccoes = new ArrayList<Inspeccao>();
        }

        inspeccoes.add(inspeccao);
    }

    public void removerInspeccao(Inspeccao inspeccao) {
        if (inspeccoes != null) {
            inspeccoes.remove(inspeccao);
        }
    }

    public void adicionarFolhaObra(FolhaObra folha) {
        if (folhasObra == null) {
            folhasObra = new ArrayList<FolhaObra>();
        }

        folhasObra.add(folha);
    }

    public void removeFolharObra(FolhaObra folha) {
        if (folhasObra == null) {
            folhasObra.remove(folha);
        }
    }

    public List<Cliente> getAntigosDonos() {
        if (antigosDonos != null) {
            return new ArrayList(antigosDonos);
        }
        return null;
    }

    public void setAntigosDonos(List<Cliente> antigosDonos) {
        this.antigosDonos.clear();
        for (Cliente c : antigosDonos) {
            this.antigosDonos.add(c);
        }
    }

    public ECategoria getCategoria() {
        return categoria;
    }

    public void setCategoria(ECategoria categoria) {
        this.categoria = categoria;
    }

    public String getCilindrada() {
        return cilindrada;
    }

    public void setCilindrada(String cilindrada) {
        this.cilindrada = cilindrada;
    }

    public ECombustivel getCombustivel() {
        return combustivel;
    }

    public void setCombustivel(ECombustivel combustivel) {
        this.combustivel = combustivel;
    }

    public String getDataRegisto() {
        return dataRegisto;
    }

    public void setDataRegisto(String dataRegisto) {
        this.dataRegisto = dataRegisto;
    }

    public Cliente getDono() {
        return dono;
    }

    public void setDono(Cliente dono) {
        this.dono = dono;
    }

    public List<Inspeccao> getInspeccoes() {
        if (inspeccoes != null) {
            return new ArrayList(inspeccoes);
        }

        return null;
    }

    public void setInspeccoes(List<Inspeccao> inspeccoes) {
        this.inspeccoes.clear();
        for (Inspeccao i : inspeccoes) {
            this.inspeccoes.add(i);
        }
    }

    public List<FolhaObra> getFolhasObra() {
        if (folhasObra != null) {
            return new ArrayList<FolhaObra>(folhasObra);
        }
        return null;
    }

    public void setFolhasObra(List<FolhaObra> folhasObra) {
        this.folhasObra.clear();
        for (FolhaObra f : folhasObra) {
            this.folhasObra.add(f);
        }
    }

    public Marca getMarca() {
        return marca;
    }

    public void setMarca(Marca marca) {
        this.marca = marca;
    }

    public String getMatricula() {
        return matricula;
    }

    public void setMatricula(String matricula) {
        this.matricula = matricula;
    }

    public Modelo getModelo() {
        return modelo;
    }

    public void setModelo(Modelo modelo) {
        this.modelo = modelo;
    }

    public String getNotas() {
        return notas;
    }

    public void setNotas(String notas) {
        this.notas = notas;
    }

    public String getNrChassis() {
        return nrChassis;
    }

    public void setNrChassis(String nrChassis) {
        this.nrChassis = nrChassis;
    }

    public String getNrMotor() {
        return nrMotor;
    }

    public void setNrMotor(String nrMotor) {
        this.nrMotor = nrMotor;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Veiculo other = (Veiculo) obj;
        if ((this.matricula == null) ? (other.matricula != null) : !this.matricula.equals(other.matricula)) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 3;
        hash = 73 * hash + (this.matricula != null ? this.matricula.hashCode() : 0);
        return hash;
    }
}
