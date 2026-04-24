<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WorkExperience $workExperience
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Work Experience'), ['action' => 'edit', $workExperience->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Work Experience'), ['action' => 'delete', $workExperience->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workExperience->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Work Experiences'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Work Experience'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="workExperiences view content">
            <h3><?= h($workExperience->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Helper Profile') ?></th>
                    <td><?= $workExperience->hasValue('helper_profile') ? $this->Html->link($workExperience->helper_profile->full_name, ['controller' => 'HelperProfiles', 'action' => 'view', $workExperience->helper_profile->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Name') ?></th>
                    <td><?= h($workExperience->company_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($workExperience->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($workExperience->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($workExperience->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($workExperience->end_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($workExperience->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($workExperience->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Responsibilities') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($workExperience->responsibilities)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>