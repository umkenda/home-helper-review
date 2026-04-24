<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Education $education
 */
?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-primary card-outline">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Education Details</h3>
                <div class="card-tools">
                    <?= $this->Html->link(
                        '<i class="fas fa-edit"></i> Edit',
                        ['action' => 'edit', $education->id],
                        ['class' => 'btn btn-warning btn-sm', 'escape' => false]
                    ) ?>
                    <?= $this->Form->postLink(
                        '<i class="fas fa-trash"></i> Delete',
                        ['action' => 'delete', $education->id],
                        [
                            'confirm' => __('Are you sure you want to delete education #{0}?', $education->id),
                            'class' => 'btn btn-danger btn-sm',
                            'escape' => false
                        ]
                    ) ?>
                    <?= $this->Html->link(
                        '<i class="fas fa-arrow-left"></i> Back',
                        ['action' => 'index'],
                        ['class' => 'btn btn-secondary btn-sm', 'escape' => false]
                    ) ?>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <td><?= h($education->id) ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?= h($education->name) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
