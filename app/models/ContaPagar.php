<?php
class ContaPagar {
    private $id;
    private $id_empresa;
    private $data_pagar;
    private $valor;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdEmpresa() {
        return $this->id_empresa;
    }

    public function setIdEmpresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    public function getDataPagar() {
        return $this->data_pagar;
    }

    public function setDataPagar($data_pagar) {
        $this->data_pagar = $data_pagar;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }
}
?>