<h2>Pacientes</h2>
<hr/>
<table>
    <tr>
        <th>Id</th>
        <th>Nome</th>
    </tr>

    <?php foreach($pacientes as $e): ?>
    <tr>
        <td>
            <?php echo $e['Paciente']['id']; ?>
        </td>
        <td>
            <?php echo $e['Paciente']['nome']; ?>
        </td>
    </tr>
    <?php endforeach ?>
</table>