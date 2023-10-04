<div class="title-files">Filtro de Pagamentos</div>
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
        
        <?php foreach ($dadosContasFiltrados as $conta): ?>
            
            <tr>
                <td><?= $conta['id_conta_pagar']; ?></td>
                <td><?= $empresaNomes[$conta['id_empresa']]; ?></td>
                <td><?= $conta['data_pagar']; ?></td>
                <td>R$ <?= number_format($conta['valor'], 2, ',', '.'); ?></td>
                <td>
                    <a href="./app/controllers/editar_conta.php?id=<?= $conta['id_conta_pagar']; ?>" class="btn-editar">Editar</a>
                    <a href="./app/controllers/excluir_conta.php?id=<?= $conta['id_conta_pagar']; ?>" class="btn-excluir">Excluir</a>
                    <?php if (isset($conta['id_conta_pagar']) && !$conta['pago']): ?>
                        <a href="./app/controllers/marcar_como_paga.php?id=<?= $conta['id_conta_pagar']; ?>" class="btn-pago">Marcar como Pago</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody> 
</table>
