<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HelperProfile $helperProfile
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Helper Profile'), ['action' => 'edit', $helperProfile->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Helper Profile'), ['action' => 'delete', $helperProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $helperProfile->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Helper Profiles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Helper Profile'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="helperProfiles view content">
            <h3><?= h($helperProfile->full_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $helperProfile->hasValue('user') ? $this->Html->link($helperProfile->user->email, ['controller' => 'Users', 'action' => 'view', $helperProfile->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By User') ?></th>
                    <td><?= $helperProfile->hasValue('created_by_user') ? $this->Html->link($helperProfile->created_by_user->email, ['controller' => 'Users', 'action' => 'view', $helperProfile->created_by_user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Full Name') ?></th>
                    <td><?= h($helperProfile->full_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact Email Public') ?></th>
                    <td><?= h($helperProfile->contact_email_public) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact Phone Public') ?></th>
                    <td><?= h($helperProfile->contact_phone_public) ?></td>
                </tr>
                <tr>
                    <th><?= __('Profile Picture Public') ?></th>
                    <td><?= h($helperProfile->profile_picture_public) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rate Pricing') ?></th>
                    <td><?= h($helperProfile->rate_pricing) ?></td>
                </tr>
                <tr>
                    <th><?= __('Resume Path') ?></th>
                    <td><?= h($helperProfile->resume_path) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($helperProfile->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($helperProfile->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($helperProfile->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Searchable') ?></th>
                    <td><?= $helperProfile->is_searchable ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Professional Summary') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($helperProfile->professional_summary)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Availability') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($helperProfile->availability)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Preferred Locations') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($helperProfile->preferred_locations)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Educations') ?></h4>
                <?php if (!empty($helperProfile->educations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($helperProfile->educations as $education) : ?>
                        <tr>
                            <td><?= h($education->id) ?></td>
                            <td><?= h($education->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Educations', 'action' => 'view', $education->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Educations', 'action' => 'edit', $education->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Educations', 'action' => 'delete', $education->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $education->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Services') ?></h4>
                <?php if (!empty($helperProfile->services)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($helperProfile->services as $service) : ?>
                        <tr>
                            <td><?= h($service->id) ?></td>
                            <td><?= h($service->name) ?></td>
                            <td><?= h($service->description) ?></td>
                            <td><?= h($service->created) ?></td>
                            <td><?= h($service->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Services', 'action' => 'view', $service->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Services', 'action' => 'edit', $service->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Services', 'action' => 'delete', $service->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $service->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Skills') ?></h4>
                <?php if (!empty($helperProfile->skills)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($helperProfile->skills as $skill) : ?>
                        <tr>
                            <td><?= h($skill->id) ?></td>
                            <td><?= h($skill->name) ?></td>
                            <td><?= h($skill->created) ?></td>
                            <td><?= h($skill->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Skills', 'action' => 'view', $skill->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Skills', 'action' => 'edit', $skill->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Skills', 'action' => 'delete', $skill->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $skill->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Work Experiences') ?></h4>
                <?php if (!empty($helperProfile->work_experiences)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Helper Profile Id') ?></th>
                            <th><?= __('Company Name') ?></th>
                            <th><?= __('Role') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th><?= __('Responsibilities') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($helperProfile->work_experiences as $workExperience) : ?>
                        <tr>
                            <td><?= h($workExperience->id) ?></td>
                            <td><?= h($workExperience->helper_profile_id) ?></td>
                            <td><?= h($workExperience->company_name) ?></td>
                            <td><?= h($workExperience->role) ?></td>
                            <td><?= h($workExperience->start_date) ?></td>
                            <td><?= h($workExperience->end_date) ?></td>
                            <td><?= h($workExperience->responsibilities) ?></td>
                            <td><?= h($workExperience->created) ?></td>
                            <td><?= h($workExperience->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'WorkExperiences', 'action' => 'view', $workExperience->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'WorkExperiences', 'action' => 'edit', $workExperience->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'WorkExperiences', 'action' => 'delete', $workExperience->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $workExperience->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>