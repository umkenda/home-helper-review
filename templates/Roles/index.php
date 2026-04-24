<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\ORM\ResultSet $roles
 */
?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Roles</h3>
        <?= $this->Html->link(__('New Role'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
            <tr>
                <th><?= __('ID') ?></th>
                <th><?= __('Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($roles as $role): ?>
                <tr>
                    <td><?= h($role->id) ?></td>
                    <td><?= h($role->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $role->id], ['class' => 'btn btn-sm btn-info']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $role->id], ['class' => 'btn btn-sm btn-warning']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $role->id], [
                            'confirm' => __('Are you sure you want to delete # {0}?', $role->id),
                            'class' => 'btn btn-sm btn-danger'
                        ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
