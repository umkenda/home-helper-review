<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface<\App\Model\Entity\WorkExperience> $workExperiences
 */
?>

<div class="row">
    <div class="col-12">
        <div class="card card-info card-outline">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Work Experiences</h3>
                <div class="card-tools">
                    <?= $this->Html->link(
                        '<i class="fas fa-plus"></i> New Work Experience',
                        ['action' => 'add'],
                        ['class' => 'btn btn-success btn-sm', 'escape' => false]
                    ) ?>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('helper_profile_id', 'Helper Profile') ?></th>
                        <th><?= $this->Paginator->sort('company_name') ?></th>
                        <th><?= $this->Paginator->sort('role') ?></th>
                        <th><?= $this->Paginator->sort('start_date') ?></th>
                        <th><?= $this->Paginator->sort('end_date') ?></th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($workExperiences)): ?>
                        <?php foreach ($workExperiences as $workExperience): ?>
                            <tr>
                                <td><?= h($workExperience->id) ?></td>
                                <td>
                                    <?= $workExperience->has('helper_profile')
                                        ? $this->Html->link(
                                            $workExperience->helper_profile->id,
                                            ['controller' => 'HelperProfiles', 'action' => 'view', $workExperience->helper_profile->id]
                                        )
                                        : '' ?>
                                </td>
                                <td><?= h($workExperience->company_name) ?></td>
                                <td><?= h($workExperience->role) ?></td>
                                <td><?= h($workExperience->start_date) ?></td>
                                <td><?= h($workExperience->end_date) ?></td>
                                <td class="text-center">
                                    <?= $this->Html->link(
                                        '<i class="fas fa-eye"></i>',
                                        ['action' => 'view', $workExperience->id],
                                        ['class' => 'btn btn-info btn-sm', 'escape' => false]
                                    ) ?>
                                    <?= $this->Html->link(
                                        '<i class="fas fa-edit"></i>',
                                        ['action' => 'edit', $workExperience->id],
                                        ['class' => 'btn btn-warning btn-sm', 'escape' => false]
                                    ) ?>
                                    <?= $this->Form->postLink(
                                        '<i class="fas fa-trash"></i>',
                                        ['action' => 'delete', $workExperience->id],
                                        [
                                            'confirm' => __('Are you sure you want to delete # {0}?', $workExperience->id),
                                            'class' => 'btn btn-danger btn-sm',
                                            'escape' => false
                                        ]
                                    ) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No work experiences found.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix d-flex justify-content-between align-items-center">
                <div>
                    <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
                </div>
                <div>
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
