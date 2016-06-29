<h2>Administração</h2>
<hr/>
<?php echo $this->Html->link('Adicionar novo Produto', array('action' => 'novo')); ?>

<table>
    <tr>
        <th style="width:65px;text-align:center;">Código</th>
        <th>Nome</th>
        <th>Ações</th>
    </tr>
    <?php
    foreach ($produtos as $produto) {
        ?>
        <tr>
            <td><?php echo $produto['Produto']['id']; ?></td>
            <td><?php echo $produto['Produto']['nome']; ?></td>
            <td><?php echo $this->Html->link('Editar', array('action' => 'editar', $produto['Produto']['id'])); ?>
                | <?php if($CanDelete){ echo $this->Html->link(
                    'Excluir', array(
                        'action' => 'excluir',
                        $produto['Produto']['id']), array('confirm' => 'Você tem certeza que quer excluir este produto?')
                );} ?></td>
        </tr>
    <?php
    }
    ?>
</table>