<h2>Total Exame por Paciente: <?php count($total)?></h2>
<hr/>
<table>
    <tr>
        <th>Exame</th>
        <th>Paciente</th>
    </tr>

    <?php foreach($total as $e): ?>
    <tr>
        <td>
            <?php echo $e['Procedimento']['nome']; ?>
        </td>
        <td>
            <?php echo $e['Paciente']['nome']; ?>
        </td>
    </tr>
    <?php endforeach ?>
</table>


<h2>Total Exame por Procedimento:<?php count($total)?></h2>
<hr/>
<table>
    <tr>
        <th>Exame</th>
        <th>Valor</th>
        <th>Data</th>
    </tr>

    <?php foreach($total as $e): ?>
    <tr>
        <td>
            <?php echo $e['Procedimento']['nome']; ?>
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