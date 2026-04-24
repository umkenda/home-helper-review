<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WorkExperience $workExperience
 * @var \Cake\Collection\CollectionInterface $helperProfiles
 */
?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-success card-outline">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Add Work Experience</h3>
                <div class="card-tools">
                    <?= $this->Html->link(
                        '<i class="fas fa-arrow-left"></i> Back to List',
                        ['action' => 'index'],
                        ['class' => 'btn btn-primary btn-sm', 'escape' => false]
                    ) ?>
                </div>
            </div>

            <?= $this->Form->create($workExperience) ?>
            <div class="card-body">
                <div class="form-group">
                    <?= $this->Form->control('helper_profile_id', [
                        'type' => 'select',
                        'options' => $helperProfiles,
                        'empty' => '-- Select Helper Profile --',
                        'class' => 'form-control',
                        'label' => 'Helper Profile',
                        'required' => true
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('company_name', [
                        'class' => 'form-control',
                        'placeholder' => 'Enter company name'
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('role', [
                        'class' => 'form-control',
                        'placeholder' => 'Enter role'
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('start_date', [
                        'class' => 'form-control',
                        'type' => 'date'
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('end_date', [
                        'class' => 'form-control',
                        'type' => 'date'
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('responsibilities', [
                        'type' => 'textarea',
                        'class' => 'form-control',
                        'placeholder' => 'Enter responsibilities'
                    ]) ?>
                </div>
            </div>

            <div class="card-footer text-end">
                <?= $this->Form->button('<i class="fas fa-save"></i> Save', [
                    'class' => 'btn btn-success',
                    'escapeTitle' => false
                ]) ?>
                <?= $this->Html->link('<i class="fas fa-times"></i> Cancel',
                    ['action' => 'index'],
                    ['class' => 'btn btn-secondary', 'escape' => false]
                ) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
