<h1>Relação de Procedimentos</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
    </tr>

    <?php foreach($procedimentos as $p): ?>
    <tr>
        <td>
            <?php echo $p['Procedimento']['id']; ?>
        </td>
        <td>
            <?php echo $p['Procedimento']['nome'] ?>
        </td>
        <td>
            <?php echo $p['Procedimento']['preco']; ?>
        </td>
    </tr>
    <?php endforeach ?>
</table>
