<!-- Tabela para listar as contas a pagar -->
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
                    <!-- Adicione os botões de ação aqui -->
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
