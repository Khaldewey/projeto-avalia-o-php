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
        $this->contaPagar = new ContaPagar();
    } 

    public function adicionarContaPagar() {
        $empresas = $this->empresaModel->listarEmpresas(); // Implemente o método listarEmpresas no modelo

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recupere os valores do formulário
            $id_empresa = $_POST["id_empresa"];
            $data_pagar = $_POST["data_pagar"];
            $valor = $_POST["valor"];

            // Valide e limpe os dados (implemente validações apropriadas)

            // Crie uma instância do modelo ContaPagar
            $this->contaPagar->setIdEmpresa($id_empresa);
            $this->contaPagar->setDataPagar($data_pagar);
            $this->contaPagar->setValor($valor);

            // Chame o método para adicionar a conta a pagar no banco de dados
            $this->contaPagar->adicionarConta();

            // Redirecione para a página de sucesso ou exiba uma mensagem
            header("Location: sucesso.php");
            exit();
        }

        // Carregue a visualização para o formulário de adição
        require_once './app/views/add-conta-pagar.php';
    }
}
?>
