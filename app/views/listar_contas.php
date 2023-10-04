<!DOCTYPE html>
<html>
<head>
    <title>Contas a Pagar</title>
</head>
<body>
    <h1>Contas a Pagar</h1>
    <table border="1">
        <tr>
            <th>Empresa</th>
            <th>Data de Pagamento</th>
            <th>Valor (R$)</th>
            <th>Ação</th>
        </tr>
        <?php
        // Aqui você deve buscar as contas cadastradas na tabela tbl_conta_pagar
        // e criar as linhas da tabela com base nos resultados da consulta
        foreach ($contas as $conta) {
            echo "<tr>";
            echo "<td>{$conta['nome_empresa']}</td>";
            echo "<td>{$conta['data_pagar']}</td>";
            echo "<td>R$ " . number_format($conta['valor'], 2, ',', '.') . "</td>";
            echo "<td>";
            echo "<a href=\"editar_conta.php?id={$conta['id_conta_pagar']}\">Editar</a> | ";
            echo "<a href=\"excluir_conta.php?id={$conta['id_conta_pagar']}\">Excluir</a> | ";
            echo "<a href=\"marcar_como_paga.php?id={$conta['id_conta_pagar']}\">Marcar como Paga</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>






