<?php 
require_once './app/config/database.php';
	class EmpresaModel {
   	private $pdo; 

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function buscarNomeEmpresaPorId($id_empresa) {
    try {
        $query = "SELECT nome FROM tbl_empresa WHERE id_empresa = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id_empresa]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['nome'];
        } else {
            return null; 
        }
    } catch (PDOException $e) {
        return null; 
    }
	}




   	public function listarEmpresas() {
    
    $sql = "SELECT id_empresa, nome FROM tbl_empresa";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	} 
?>