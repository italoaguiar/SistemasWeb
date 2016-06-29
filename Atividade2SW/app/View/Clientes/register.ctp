<?php echo $this->Form->create('Cliente'); ?>   
<br/> 
<h4>Criar uma nova conta.</h4>
<hr />
<div class="validation-summary-valid text-danger" data-valmsg-summary="true">
    <ul>
        <li style="display:none">
        </li>
    </ul>
</div>    
    <div class="form-group">
        <div class="col-md-10">
            <?php echo $this->Form->input('nome', array(
                        'class' => 'form-control',
                        'data-val'=> 'true',
                        'data-val-length' => 'O Nome deve ter pelo menos 6 caracteres e no máximo 20.',
                        'data-val-length-max' => '20',
                        'data-val-length-min' => '6',
                        'data-val-required' => 'O campo nome é obrigatório.'));?>
            <span class="field-validation-valid text-danger" data-valmsg-for="data[Usuario][nome]" data-valmsg-replace="true"></span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <?php echo $this->Form->input('login', array(
                        'class' => 'form-control',
                        'data-val'=> 'true',
                        'data-val-length' => 'O login deve ter pelo menos 6 caracteres e no máximo 20.',
                        'data-val-length-max' => '20',
                        'data-val-length-min' => '6',
                        'data-val-required' => 'O campo login é obrigatório.'));?>
            <span class="field-validation-valid text-danger" data-valmsg-for="data[Usuario][login]" data-valmsg-replace="true"></span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <?php echo $this->Form->input('senha', array(
                        'class' => 'form-control',
                        'type' => 'password',
                        'data-val'=> 'true',
                        'data-val-length' => 'A senha deve ter pelo menos 6 caracteres e no máximo 20.',
                        'data-val-length-max' => '20',
                        'data-val-length-min' => '3',
                        'data-val-required' => 'O campo senha é obrigatório.'));?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <?php echo $this->Form->input('confirmar', array(
                        'class' => 'form-control',
                        'type' => 'password',
                        'data-val'=> 'true',
                        'data-val-length' => 'A senha deve ter pelo menos 6 caracteres e no máximo 20.',
                        'data-val-length-max' => '20',
                        'data-val-length-min' => '3',
                        'data-val-equalto-other' => '*.Password',
                        'data-val-equalto' => 'A senha e a confirmação não são iguais.',
                        'data-val-required' => 'O campo senha é obrigatório.'));?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <?php echo $this->Form->input('registrar', array(
                        'class' => 'btn btn-default',
                        'type' => 'submit',
                        'value' => 'Registrar'));?>
        </div>
    </div>
<?php echo $this->Form->end(); ?> 
