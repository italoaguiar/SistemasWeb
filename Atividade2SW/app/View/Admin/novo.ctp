<?php echo $this->Form->create('Produto'); ?>   
    <div class="form-horizontal">
        <h4>Novo Produto</h4>
        <hr />
        
        <div class="form-group">
            <div class="col-md-10">
                <?php echo $this->Form->input('nome', array(
                        'class' => 'form-control',
                        'data-val'=> 'true',
                        'data-val-length' => 'O Nome deve ter pelo menos 6 caracteres e no máximo 20.',
                        'data-val-length-max' => '20',
                        'data-val-length-min' => '3',
                        'data-val-required' => 'O campo nome é obrigatório.'));?>
                <span class="field-validation-valid text-danger" data-valmsg-for="data[Produto][nome]" data-valmsg-replace="true"></span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10">
                <?php echo $this->Form->input('preco', array(
                        'class' => 'form-control',
                        'data-val'=> 'true',
                        'data-val-length-max' => '6',
                        'data-val-length-min' => '1',
                        'data-val-required' => 'O campo nome é obrigatório.'));?>
                <span class="field-validation-valid text-danger" data-valmsg-for="data[Produto][preco]" data-valmsg-replace="true"></span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10">
                <?php echo $this->Form->input('image', array(
                        'type' => 'file'));?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <input type="submit" value="Adicionar" class="btn btn-default" />
            </div>
        </div>
    </div>
<?php echo $this->Form->end(); ?>
