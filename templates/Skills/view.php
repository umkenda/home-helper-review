<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skill $skill
 */
?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title">View Skill</h3>
                <div class="card-tools">
                    <?= $this->Html->link(
                        '<i class="fas fa-edit"></i> Edit',
                        ['action' => 'edit', $skill->id],
                        ['class' => 'btn btn-warning btn-sm', 'escape' => false]
                    ) ?>
                    <?= $this->Form->postLink(
                        '<i class="fas fa-trash"></i> Delete',
                        ['action' => 'delete', $skill->id],
                        [
                            'confirm' => __('Are you sure you want to delete skill "{0}"?', $skill->name),
                            'class' => 'btn btn-danger btn-sm',
                            'escape' => false
                        ]
                    ) ?>
                    <?= $this->Html->link(
                        '<i class="fas fa-arrow-left"></i> Back to List',
                        ['action' => 'index'],
                        ['class' => 'btn btn-primary btn-sm', 'escape' => false]
                    ) ?>
                </div>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped table-bordered mb-0">
                    <tr>
                        <th>ID</th>
                        <td><?= h($skill->id) ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?= h($skill->name) ?></td>
                    </tr>
                    <tr>
                        <th>Created</th>
                        <td><?= $this->Time->nice($skill->created) ?></td>
                    </tr>
                    <tr>
                        <th>Modified</th>
                        <td><?= $this->Time->nice($skill->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
