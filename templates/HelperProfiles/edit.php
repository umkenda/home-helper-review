<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HelperProfile $helperProfile
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $createdByUsers
 * @var string[]|\Cake\Collection\CollectionInterface $educations
 * @var string[]|\Cake\Collection\CollectionInterface $services
 * @var string[]|\Cake\Collection\CollectionInterface $skills
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $helperProfile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $helperProfile->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Helper Profiles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="helperProfiles form content">
            <?= $this->Form->create($helperProfile) ?>
            <fieldset>
                <legend><?= __('Edit Helper Profile') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('created_by_user_id', ['options' => $createdByUsers, 'empty' => true]);
                    echo $this->Form->control('full_name');
                    echo $this->Form->control('contact_email_public');
                    echo $this->Form->control('contact_phone_public');
                    echo $this->Form->control('profile_picture_public');
                    echo $this->Form->control('professional_summary');
                    echo $this->Form->control('availability');
                    echo $this->Form->control('preferred_locations');
                    echo $this->Form->control('rate_pricing');
                    echo $this->Form->control('is_searchable');
                    echo $this->Form->control('resume_path');
                    echo $this->Form->control('educations._ids', ['options' => $educations]);
                    echo $this->Form->control('services._ids', ['options' => $services]);
                    echo $this->Form->control('skills._ids', ['options' => $skills]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
