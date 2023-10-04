
<form method="GET" action="">
    <label for="empresa">Filtrar por Nome da Empresa:</label>
    <input type="text" name="empresa" id="empresa">

    <label for="valor">Filtrar por Valor:</label>
    <select name="operador">
        <option value="maior">Maior que</option>
        <option value="menor">Menor que</option>
        <option value="igual">Igual a</option>
    </select>
    <input type="text" name="valor" id="valor">

    <label for="data_pagar">Filtrar por Data de Pagamento:</label>
    <input type="date" name="data_pagar" id="data_pagar">

    <input type="submit" value="Filtrar">
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Empresa</th>
            <th>Data de Pagamento</th>
            <th>Valor (R$)</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dadosContasPagar as $conta): ?>
            <tr>
                <td><?= $conta['id_conta_pagar']; ?></td>
                <td><?= $empresaNomes[$conta['id_empresa']]; ?></td>
                <td><?= $conta['data_pagar']; ?></td>
                <td>R$ <?= number_format($conta['valor'], 2, ',', '.'); ?></td>
                 <td>
                    <a href="./app/controllers/editar_conta.php?id=<?= $conta['id_conta_pagar']; ?>">Editar</a>
                    <a href="./app/controllers/excluir_conta.php?id=<?= $conta['id_conta_pagar']; ?>">Excluir</a>
                    <?php if (isset($conta['id_conta_pagar']) && !$conta['pago']): ?>
                        <a href="./app/controllers/marcar_como_paga.php?id=<?= $conta['id_conta_pagar']; ?>">Marcar como Pago</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
