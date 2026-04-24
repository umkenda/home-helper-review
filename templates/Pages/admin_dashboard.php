<?php $this->assign('title', 'Admin Dashboard'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Welcome to Your Admin Panel!</h5>
            </div>
            <div class="card-body">
                <p class="card-text">AdminLTE v3.2.0 is successfully integrated with CakePHP 5!</p>
                <?= $this->Html->link('Go to Users List', ['controller' => 'Users', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>
