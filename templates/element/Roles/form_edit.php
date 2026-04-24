<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>

<?= $this->Form->create($role) ?>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Edit Role</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <?= $this->Form->control('name', ['class' => 'form-control']) ?>
        </div>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('Update'), ['class' => 'btn btn-warning']) ?>
        <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
    </div>
</div>
<?= $this->Form->end() ?>
