<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Education $education
 */
?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Edit Education Level</h3>
            </div>

            <?= $this->Form->create($education) ?>
            <div class="card-body">
                <div class="form-group">
                    <?= $this->Form->control('name', [
                        'label' => 'Education Name',
                        'class' => 'form-control',
                        'placeholder' => 'Enter education level (e.g. Primary, Secondary, College)'
                    ]) ?>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <?= $this->Html->link(
                    '<i class="fas fa-arrow-left"></i> Back',
                    ['action' => 'index'],
                    ['class' => 'btn btn-secondary', 'escape' => false]
                ) ?>
                <?= $this->Form->button(
                    '<i class="fas fa-save"></i> Update',
                    ['class' => 'btn btn-primary', 'escapeTitle' => false]
                ) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
