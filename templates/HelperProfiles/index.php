<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\HelperProfile> $helperProfiles
 */
?>
<div class="helperProfiles index content">
    <?= $this->Html->link(__('New Helper Profile'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Helper Profiles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created_by_user_id') ?></th>
                    <th><?= $this->Paginator->sort('full_name') ?></th>
                    <th><?= $this->Paginator->sort('contact_email_public') ?></th>
                    <th><?= $this->Paginator->sort('contact_phone_public') ?></th>
                    <th><?= $this->Paginator->sort('profile_picture_public') ?></th>
                    <th><?= $this->Paginator->sort('rate_pricing') ?></th>
                    <th><?= $this->Paginator->sort('is_searchable') ?></th>
                    <th><?= $this->Paginator->sort('resume_path') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($helperProfiles as $helperProfile): ?>
                <tr>
                    <td><?= $this->Number->format($helperProfile->id) ?></td>
                    <td><?= $helperProfile->hasValue('user') ? $this->Html->link($helperProfile->user->email, ['controller' => 'Users', 'action' => 'view', $helperProfile->user->id]) : '' ?></td>
                    <td><?= $helperProfile->hasValue('created_by_user') ? $this->Html->link($helperProfile->created_by_user->email, ['controller' => 'Users', 'action' => 'view', $helperProfile->created_by_user->id]) : '' ?></td>
                    <td><?= h($helperProfile->full_name) ?></td>
                    <td><?= h($helperProfile->contact_email_public) ?></td>
                    <td><?= h($helperProfile->contact_phone_public) ?></td>
                    <td><?= h($helperProfile->profile_picture_public) ?></td>
                    <td><?= h($helperProfile->rate_pricing) ?></td>
                    <td><?= h($helperProfile->is_searchable) ?></td>
                    <td><?= h($helperProfile->resume_path) ?></td>
                    <td><?= h($helperProfile->created) ?></td>
                    <td><?= h($helperProfile->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $helperProfile->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $helperProfile->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $helperProfile->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $helperProfile->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>