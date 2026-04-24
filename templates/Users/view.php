<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><?= h($user->email) ?></h3>
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9"><?= h($user->id) ?></dd>

            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9"><?= h($user->email) ?></dd>

            <dt class="col-sm-3">First Name</dt>
            <dd class="col-sm-9"><?= h($user->first_name) ?></dd>

            <dt class="col-sm-3">Last Name</dt>
            <dd class="col-sm-9"><?= h($user->last_name) ?></dd>

            <dt class="col-sm-3">Role</dt>
            <dd class="col-sm-9"><?= h($user->role->name ?? 'N/A') ?></dd>

            <dt class="col-sm-3">Created</dt>
            <dd class="col-sm-9"><?= h($user->created) ?></dd>

            <dt class="col-sm-3">Modified</dt>
            <dd class="col-sm-9"><?= h($user->modified) ?></dd>
        </dl>
    </div>
</div>

<div class="mt-3">
    <?= $this->Html->link('Edit', ['action' => 'edit', $user->id], ['class' => 'btn btn-warning']) ?>
    <?= $this->Form->postLink('Delete', ['action' => 'delete', $user->id], [
        'confirm' => 'Are you sure?',
        'class' => 'btn btn-danger'
    ]) ?>
    <?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
</div>
