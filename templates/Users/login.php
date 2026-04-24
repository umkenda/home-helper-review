<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="/" class="h4"><b>HomeHelpers</b></a>
    </div>
    <div class="card-body">

        <p class="login-box-msg">Sign in to start your session</p>

        <?= $this->Form->create() ?>
        <div class="input-group mb-3">
            <?= $this->Form->control('email', [
                'label' => false,
                'class' => 'form-control',
                'placeholder' => 'Email',
                'required' => true
            ]) ?>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <?= $this->Form->control('password', [
                'label' => false,
                'class' => 'form-control',
                'placeholder' => 'Password',
                'required' => true
            ]) ?>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <?= $this->Form->button('Sign In', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
