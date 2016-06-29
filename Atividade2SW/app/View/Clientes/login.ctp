<h2>Log in.</h2>
<div class="row">
    <div class="col-md-8">
        <section id="loginForm">
        <?php echo $this->Form->create('Usuario'); ?>
                            <h4>Faça login para efetuar suas compras.</h4>
                <hr />
                <div class="form-group">
                    <div class="col-md-10">
                        <?php echo $this->Form->input('login', array(
                        'class' => 'form-control',
                        'data-val'=> 'true',
                        'data-val-required' => 'O campo Usuário é obrigatório.'));?>
                        <span class="field-validation-valid text-danger" data-valmsg-for="data[Usuario][login]" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <?php echo $this->Form->input('senha', array(
                        'class' => 'form-control',
                        'type' => 'password',
                        'data-val'=> 'true',
                        'data-val-required' => 'O campo senha é obrigatório.'));?>
                        <span class="field-validation-valid text-danger" data-valmsg-for="data[Usuario][senha]" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <?php echo $this->Form->input('enviar', array(
                        'class' => 'btn btn-default',
                        'type' => 'submit',
                        'value' => 'Entrar'));?>
                    </div>
                </div>

<?php echo $this->Form->end(); ?>        </section>
    </div>
</div>
