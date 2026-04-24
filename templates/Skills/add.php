<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skill $skill
 */
?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title">Add Skill</h3>
                <div class="card-tools">
                    <?= $this->Html->link(
                        '<i class="fas fa-arrow-left"></i> Back to List',
                        ['action' => 'index'],
                        ['escape' => false, 'class' => 'btn btn-primary btn-sm']
                    ) ?>
                </div>
            </div>

            <?= $this->Form->create($skill) ?>
            <div class="card-body">
                <div class="form-group">
                    <?= $this->Form->control('name', [
                        'class' => 'form-control',
                        'label' => 'Skill Name',
                        'placeholder' => 'Enter skill name',
                        'required' => true
                    ]) ?>
                </div>
            </div>

            <div class="card-footer text-end">
                <?= $this->Form->button(
                    '<i class="fas fa-save"></i> Save',
                    ['class' => 'btn btn-success', 'escapeTitle' => false]
                ) ?>
                <?= $this->Html->link(
                    '<i class="fas fa-times"></i> Cancel',
                    ['action' => 'index'],
                    ['class' => 'btn btn-secondary', 'escape' => false]
                ) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
