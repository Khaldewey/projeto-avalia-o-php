<?php
class ContaPagar {
    private $id;
    private $id_empresa;
    private $data_pagar;
    private $valor;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    } 


    public function adicionarConta($pdo) {
        try {
            $query = "INSERT INTO tbl_conta_pagar (id_empresa, data_pagar, valor) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$this->id_empresa, $this->data_pagar, $this->valor]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    } 
    public function buscarDadosContasPagar() {
        try {
            $query = "SELECT * FROM tbl_conta_pagar";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();

            // FetchAll retorna todos os resultados em um array associativo
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $resultados;
        } catch (PDOException $e) {
            // Lide com erros de consulta aqui
            return [];
        }
    }
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
