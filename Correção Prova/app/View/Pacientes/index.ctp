<h1>Login realizado com sucesso!</h1>
<?php echo $this->Html->link("Agendar novo exame",
                    array('controller' => 'pacientes',
                            'action' => 'add'));?>
<h2>Meus Exames</h2>
<hr/>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
    </tr>

    <?php foreach($exames as $e): ?>
    <tr>
        <td>
            <?php echo $e['Exame']['id']; ?>
        </td>
        <td>
            <?php echo $e['Procedimento']['nome']; ?>
        </td>
        <td>
            <?php echo $e['Exame']['data']; ?>
        </td>
    </tr>
    <?php endforeach ?>
</table>
