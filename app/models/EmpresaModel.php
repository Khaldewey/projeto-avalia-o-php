<?php 
require_once './app/config/database.php';
	class EmpresaModel {
   	private $pdo; 

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


   	public function listarEmpresas() {
    // Execute uma consulta SQL para buscar as empresas
    $sql = "SELECT id_empresa, nome FROM tbl_empresa";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    
    // Retorne os resultados como um array associativo
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	} 
?>