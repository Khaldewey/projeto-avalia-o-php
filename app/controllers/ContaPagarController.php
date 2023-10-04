<?php

require_once './app/config/database.php';
require_once './app/models/EmpresaModel.php'; 
require_once './app/models/ContaPagar.php';

class ContaPagarController {

    private $pdo; 
    private $empresaModel;
    private $contaPagar; 
    

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->empresaModel = new EmpresaModel($this->pdo);
        $this->contaPagar = new ContaPagar($this->pdo);
    } 

    public function buscarDadosContas(){
       
        $dadosContasPagar = $this->contaPagar->buscarDadosContasPagar(); 

        $empresaNomes = [];
    
    
        foreach ($dadosContasPagar as $conta) {
            $id_empresa = $conta['id_empresa'];
            if (!isset($empresaNomes[$id_empresa])) {
                $nomeEmpresa = $this->empresaModel->buscarNomeEmpresaPorId($id_empresa);
                $empresaNomes[$id_empresa] = $nomeEmpresa;
            }
        }
    
        
        require_once './app/views/pagamentos.php';
    } 


    public function renderizarTabelaFiltrada() {
        require_once './app/views/filtro.php';
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $empresa = $_GET['empresa'] ?? '';
            $operador = $_GET['operador'] ?? '';
            $valor = $_GET['valor'] ?? '';
            $data_pagar = $_GET['data_pagar'] ?? '';
            
            
            $sql = "SELECT cp.*
                    FROM tbl_conta_pagar cp
                    INNER JOIN tbl_empresa e ON cp.id_empresa = e.id_empresa";
            
            $whereConditions = []; 
            $params = [];
            
            if (!empty($empresa)) {
                
                $whereConditions[] = "e.nome LIKE ?";
                $params[] = "%$empresa%";
            }
        
            if (!empty($valor) && is_numeric($valor)) {
               
                if ($operador == 'maior') {
                    $whereConditions[] = "cp.valor > ?";
                } elseif ($operador == 'menor') {
                    $whereConditions[] = "cp.valor < ?";
                } elseif ($operador == 'igual') {
                    $whereConditions[] = "cp.valor = ?";
                }
                $params[] = $valor;
            }
        
            if (!empty($data_pagar)) {
                
                $whereConditions[] = "cp.data_pagar = ?";
                $params[] = $data_pagar;
            }
        
            
            if (!empty($whereConditions)) {
                $sql .= " WHERE " . implode(" AND ", $whereConditions);
            }
            
            
            $stmt = $this->pdo->prepare($sql);
        
           
            $stmt->execute($params);
        
            
            $dadosContasFiltrados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            
            $empresaNomes = [];
        
            
            foreach ($dadosContasFiltrados as $conta) {
                $id_empresa = $conta['id_empresa'];
                if (!isset($empresaNomes[$id_empresa])) {
                    $nomeEmpresa = $this->empresaModel->buscarNomeEmpresaPorId($id_empresa);
                    $empresaNomes[$id_empresa] = $nomeEmpresa;
                }
            }
        
           
            require_once './app/views/filtro-table.php';
            return $dadosContasFiltrados;
        }
        
    
    }
    


    public function adicionarContaPagar() {
        $empresas = $this->empresaModel->listarEmpresas(); 

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $id_empresa = $_POST["id_empresa"];
            $data_pagar = $_POST["data_pagar"];
            $valor = $_POST["valor"];

            

            
            $this->contaPagar->setIdEmpresa($id_empresa);
            $this->contaPagar->setDataPagar($data_pagar);
            $this->contaPagar->setValor($valor);

            
            $this->contaPagar->adicionarConta($this->pdo);

            header("Location: index.php");
            exit();
        }

      
        require_once './app/views/add-conta-pagar.php';
    }
}
?>
