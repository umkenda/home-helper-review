<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface $users
 * @var int $limit
 * @var string|null $search
 */
?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
        <h3 class="card-title mb-2 mb-md-0"><?= __('Users') ?></h3>
        <div class="d-flex align-items-center flex-wrap justify-content-end">
            <?= $this->Form->create(null, ['type' => 'get', 'class' => 'form-inline']) ?>
            <?= $this->Form->control('search', [
                'label' => false,
                'value' => $search ?? '',
                'placeholder' => 'Search users...',
                'class' => 'form-control form-control-sm mr-2 mb-2'
            ]) ?>

            <?= $this->Form->control('limit', [
                'label' => false,
                'type' => 'select',
                'options' => [10 => 10, 25 => 25, 50 => 50, 100 => 100],
                'default' => $limit,
                'class' => 'form-control form-control-sm mr-2 mb-2'
            ]) ?>

            <?= $this->Form->button(__('Apply'), ['class' => 'btn btn-sm btn-primary mb-2']) ?>
            <?= $this->Form->end() ?>

            <?= $this->Html->link(__('Add User'), ['action' => 'add'], ['class' => 'btn btn-sm btn-success ml-2 mb-2']) ?>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="thead-light">
                <tr>
                    <th><?= __('ID') ?></th>
                    <th><?= __('Email') ?></th>
                    <th class="d-none d-sm-table-cell"><?= __('First Name') ?></th>
                    <th class="d-none d-sm-table-cell"><?= __('Last Name') ?></th>
                    <th class="d-none d-md-table-cell"><?= __('Role') ?></th>
                    <th class="d-none d-md-table-cell"><?= __('Created') ?></th>
                    <th class="text-right"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= h($user->id) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td class="d-none d-sm-table-cell"><?= h($user->first_name) ?></td>
                        <td class="d-none d-sm-table-cell"><?= h($user->last_name) ?></td>
                        <td class="d-none d-md-table-cell"><?= h($user->role->name ?? '—') ?></td>
                        <td class="d-none d-md-table-cell"><?= h($user->created) ?></td>
                        <td class="text-right">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                    <?= __('Actions') ?>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <?= $this->Html->link(__('Profile'), ['controller' => 'HelperProfiles', 'action' => 'add', $user->id], ['class' => 'dropdown-item']) ?>
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'dropdown-item']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'dropdown-item']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], [
                                        'class' => 'dropdown-item',
                                        'confirm' => __('Are you sure you want to delete user #{0}?', $user->id)
                                    ]) ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if ($users->isEmpty()): ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted"><?= __('No users found.') ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer clearfix">
        <div class="float-left small text-muted">
            <?= $this->Paginator->counter('Showing {{start}} - {{end}} of {{count}} users') ?>
        </div>
        <ul class="pagination pagination-sm m-0 float-right">
            <?= $this->Paginator->first('«') ?>
            <?= $this->Paginator->prev('<') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('>') ?>
            <?= $this->Paginator->last('»') ?>
        </ul>
    </div>
</div>
