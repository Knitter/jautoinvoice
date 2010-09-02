package net.sf.jautoinvoice.engine;

/**
 *
 * @author sergiolopes
 */
public class LinhaReparacao {

    private Empregado empregado;
    private double valorHora;
    private double horas;

    public LinhaReparacao(Empregado empregado, double valorHora, double horas) {
        this.empregado = empregado;
        this.valorHora = valorHora;
        this.horas = horas;
    }

    public Empregado getEmpregado() {
        return empregado;
    }

    public void setEmpregados(Empregado empregado) {
        this.empregado = empregado;
    }

    public double getHoras() {
        return horas;
    }

    public void setHoras(double horas) {
        this.horas = horas;
    }

    public double getValorHora() {
        return valorHora;
    }

    public void setValorHora(double valorHora) {
        this.valorHora = valorHora;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final LinhaReparacao other = (LinhaReparacao) obj;
        if (this.empregado != other.empregado && (this.empregado == null || !this.empregado.equals(other.empregado))) {
            return false;
        }
        if (Double.doubleToLongBits(this.valorHora) != Double.doubleToLongBits(other.valorHora)) {
            return false;
        }
        if (Double.doubleToLongBits(this.horas) != Double.doubleToLongBits(other.horas)) {
            return false;
        }
        return true;
    }

    @Override
    public int hashCode() {
        int hash = 5;
        hash = 61 * hash + (this.empregado != null ? this.empregado.hashCode() : 0);
        hash = 61 * hash + (int) (Double.doubleToLongBits(this.valorHora) ^ (Double.doubleToLongBits(this.valorHora) >>> 32));
        hash = 61 * hash + (int) (Double.doubleToLongBits(this.horas) ^ (Double.doubleToLongBits(this.horas) >>> 32));
        return hash;
    }
}
