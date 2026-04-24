<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><?= h($role->name) ?></h3>
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9"><?= h($role->id) ?></dd>

            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9"><?= h($role->name) ?></dd>
        </dl>
    </div>
</div>

<div class="mt-3">
    <?= $this->Html->link('Edit', ['action' => 'edit', $role->id], ['class' => 'btn btn-warning']) ?>
    <?= $this->Form->postLink('Delete', ['action' => 'delete', $role->id], [
        'confirm' => 'Are you sure?',
        'class' => 'btn btn-danger'
    ]) ?>
    <?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
</div>
