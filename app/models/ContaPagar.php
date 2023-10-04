<?php
class ContaPagar {
    private $id;
    private $id_empresa;
    private $data_pagar;
    private $valor;
    private $pdo; 
    private $pago;

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


    public function atualizarConta() {
        try {
            $query = "UPDATE tbl_conta_pagar SET pago = ?, valor = ? WHERE id_conta_pagar = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$this->pago, $this->valor, $this->id]);
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

            
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $resultados;
        } catch (PDOException $e) {
            
            return [];
        }
    }


     public function buscarContaPorId($id) {
        try {
            $query = "SELECT * FROM tbl_conta_pagar WHERE id_conta_pagar = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
            return null;
        }
    } 



    public function excluirConta() {
        try {
            $query = "DELETE FROM tbl_conta_pagar WHERE id_conta_pagar = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$this->getId()]);
            
            
            
            return true; 
        } catch (PDOException $e) {
            
            return false; 
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

     public function setPago($pago) {
        $this->pago = $pago;
    }
}
?>
