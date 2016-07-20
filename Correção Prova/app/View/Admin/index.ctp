<br/>
<?php echo $this->Html->link("Listar Pacientes",
                    array('controller' => 'admin',
                            'action' => 'pacientes'));?>

<?php echo $this->Html->link("Totalização de Exames",
                    array('controller' => 'admin',
                            'action' => 'total'));?>
<h2>Exames Solicitados</h2>
<hr/>
<table>
    <tr>
        <th>Exame</th>
        <th>Paciente</th>
        <th>Valor</th>
        <th>Data</th>
    </tr>

    <?php foreach($exames as $e): ?>
    <tr>
        <td>
            <?php echo $e['Procedimento']['nome']; ?>
        </td>
        <td>
            <?php echo $e['Paciente']['nome']; ?>
        </td>
        <td>
            <?php echo $e['Procedimento']['preco']; ?>
        </td>
        <td>
            <?php echo $e['Exame']['data']; ?>
        </td>
    </tr>
    <?php endforeach ?>
</table>