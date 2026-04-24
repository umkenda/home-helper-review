<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface<\App\Model\Entity\Education> $educations
 */
?>
<div class="row">
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Education Levels</h3>
                <div class="card-tools">
                    <?= $this->Html->link(
                        '<i class="fas fa-plus"></i> Add Education',
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
                        <th class="text-end"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($educations as $education): ?>
                        <tr>
                            <td><?= h($education->id) ?></td>
                            <td><?= h($education->name) ?></td>
                            <td class="text-end">
                                <?= $this->Html->link(
                                    '<i class="fas fa-eye"></i>',
                                    ['action' => 'view', $education->id],
                                    ['class' => 'btn btn-xs btn-primary', 'escape' => false, 'title' => 'View']
                                ) ?>
                                <?= $this->Html->link(
                                    '<i class="fas fa-edit"></i>',
                                    ['action' => 'edit', $education->id],
                                    ['class' => 'btn btn-xs btn-warning', 'escape' => false, 'title' => 'Edit']
                                ) ?>
                                <?= $this->Form->postLink(
                                    '<i class="fas fa-trash"></i>',
                                    ['action' => 'delete', $education->id],
                                    [
                                        'class' => 'btn btn-xs btn-danger',
                                        'escape' => false,
                                        'title' => 'Delete',
                                        'confirm' => __('Are you sure you want to delete education #{0}?', $education->id)
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
