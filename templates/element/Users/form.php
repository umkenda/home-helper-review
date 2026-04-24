<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?= $this->Form->create($user) ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><?= $user->isNew() ? 'Add User' : 'Edit User' ?></h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <?= $this->Form->control('email', ['class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('password', ['type' => 'password', 'class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('first_name', ['class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('last_name', ['class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('role_id', ['options' => $roles, 'class' => 'form-control', 'empty' => '-- Select Role --']) ?>
        </div>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
        <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
    </div>
</div>
<?= $this->Form->end() ?>
