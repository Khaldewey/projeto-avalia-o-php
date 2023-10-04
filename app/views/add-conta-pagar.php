<?php 
	// Recupere os dados do formulário
$idEmpresa = $_POST["id_empresa"];
$dataPagar = $_POST["data_pagar"];
$valor = $_POST["valor"];

// Implemente a lógica para buscar a data da tabela tbl_conta_pagar com base no id da empresa

// Verifique se a data de pagamento é anterior à data de vencimento
if ($dataPagar < $dataVencimento) {
    // Aplicar desconto de 5%
    $valorDescontado = $valor - ($valor * 0.05);
} elseif ($dataPagar > $dataVencimento) {
    // Aplicar acréscimo de 10%
    $valorDescontado = $valor + ($valor * 0.10);
} else {
    $valorDescontado = $valor;
}

// Insira a conta a pagar no banco de dados (utilize sua função inserirContaPagar)
// Lembre-se de incluir os valores corretos na tabela tbl_conta_pagar

// Redirecione para a página de listagem de contas
header("Location: listar_contas.php");

 ?>

<form action="processar_conta.php" method="POST">
    <!-- Campo para selecionar a empresa -->
    <label for="id_empresa">Empresa:</label>
    <select name="id_empresa" id="id_empresa">
        <?php foreach ($empresas as $empresa): ?>
        	<option value="<?= $empresa['id_empresa']; ?>"><?= $empresa['nome']; ?></option>
    	<?php endforeach; ?>
    </select> 

     <!-- Campo para a data de pagamento -->
        <label for="data_pagar">Data de Pagamento:</label>
        <input type="date" name="data_pagar" id="data_pagar" required>

        <!-- Campo para o valor a ser pago -->
        <label for="valor">Valor a ser Pago (R$):</label>
        <input type="number" name="valor" id="valor" step="0.01" required>

        <!-- Botão para inserir a conta a pagar -->
        <input type="submit" value="Inserir Conta">
</form> 

