<br/>
<br/>
<div class="row">
    <div class="col-md-8">
        <div class="thumbnail">
            <?php echo  $this->Html->image($produto['Produto']['imagem'], array('alt' => 'Produto')); ?>
        </div>
    </div>
    <div class="col-md-4">
        <?php echo $this->Form->create('compra'); ?>  
            <div class="form-horizontal">
                <h2><?php echo $produto['Produto']['nome']; ?></h2>
                <h3>R$ <?php echo $produto['Produto']['preco']; ?></h3>
                <div class="form-group">
                    <div class="col-md-10">
                        <?php
                            echo $this->Form->input('quantidade',array(
                                'class' => 'form-control',
                                'type' => 'number',
                                'value' => '1'
                            ));
                            echo $this->Form->input('produto',array(
                                'class' => 'form-control',
                                'type' => 'hidden',
                                'value' => $produto['Produto']['id']
                            ));
                        ?>
                    </div>
                    <br/>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="submit" value="Comprar" class="btn btn-default" />
                        </div>
                    </div>
                </div>
            </div>
        <?php echo $this->Form->end(); ?> 
    </div>
</div>

