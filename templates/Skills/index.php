<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface<\App\Model\Entity\Skill> $skills
 */
?>

<div class="row">
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Skills List</h3>
                <div class="card-tools">
                    <?= $this->Html->link(
                        '<i class="fas fa-plus"></i> Add Skill',
                        ['action' => 'add'],
                        ['escape' => false, 'class' => 'btn btn-success btn-sm']
                    ) ?>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('name') ?></th>
                        <th><?= $this->Paginator->sort('created') ?></th>
                        <th><?= $this->Paginator->sort('modified') ?></th>
                        <th class="text-end"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($skills as $skill): ?>
                        <tr>
                            <td><?= h($skill->id) ?></td>
                            <td><?= h($skill->name) ?></td>
                            <td><?= h($skill->created) ?></td>
                            <td><?= h($skill->modified) ?></td>
                            <td class="text-end">
                                <?= $this->Html->link(
                                    '<i class="fas fa-eye"></i>',
                                    ['action' => 'view', $skill->id],
                                    ['class' => 'btn btn-xs btn-primary', 'escape' => false, 'title' => 'View']
                                ) ?>
                                <?= $this->Html->link(
                                    '<i class="fas fa-edit"></i>',
                                    ['action' => 'edit', $skill->id],
                                    ['class' => 'btn btn-xs btn-warning', 'escape' => false, 'title' => 'Edit']
                                ) ?>
                                <?= $this->Form->postLink(
                                    '<i class="fas fa-trash"></i>',
                                    ['action' => 'delete', $skill->id],
                                    [
                                        'class' => 'btn btn-xs btn-danger',
                                        'escape' => false,
                                        'title' => 'Delete',
                                        'confirm' => __('Are you sure you want to delete skill #{0}?', $skill->id)
                                    ]
                                ) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                <div class="float-start">
                    <p><?= $this->Paginator->counter() ?></p>
                </div>
                <div class="float-end">
                    <ul class="pagination pagination-sm m-0">
                        <?= $this->Paginator->first('«') ?>
                        <?= $this->Paginator->prev('‹') ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('›') ?>
                        <?= $this->Paginator->last('»') ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
