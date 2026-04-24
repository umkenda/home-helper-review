<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WorkExperience $workExperience
 * @var string[]|\Cake\Collection\CollectionInterface $helperProfiles
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $workExperience->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $workExperience->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Work Experiences'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="workExperiences form content">
            <?= $this->Form->create($workExperience) ?>
            <fieldset>
                <legend><?= __('Edit Work Experience') ?></legend>
                <?php
                    echo $this->Form->control('helper_profile_id', ['options' => $helperProfiles]);
                    echo $this->Form->control('company_name');
                    echo $this->Form->control('role');
                    echo $this->Form->control('start_date', ['empty' => true]);
                    echo $this->Form->control('end_date', ['empty' => true]);
                    echo $this->Form->control('responsibilities');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
