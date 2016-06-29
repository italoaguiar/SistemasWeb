<br/><br/>
<div class="row">
    <?php foreach($produtos as $e): ?>
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="../img/<?php echo $e['Produto']['imagem']; ?>" alt="Generic placeholder thumbnail">
            </div>

            <div class="caption">
                <h3>
                <?php
                    echo $this->Html->link($e['Produto']['nome'],
                    array('controller' => 'produtos',
                            'action' => 'view',$e['Produto']['id']));
                ?>
                </h3>
                <p>R$ <?php echo $e['Produto']['preco']; ?></p>
            </div>
        </div>
    <?php endforeach ?>
</div>