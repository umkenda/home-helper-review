<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HelperProfile $helperProfile
 * @var array $users
 * @var array $createdByUsers
 */

$this->assign('title', 'Add Helper Profile');

// Breadcrumb is optional; you can handle in layout or here
$this->start('page-header');
?>
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1><i class="fas fa-user-tie"></i> Add Helper Profile</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><?= $this->Html->link('Home', ['controller' => 'Dashboard', 'action' => 'index']) ?></li>
                <li class="breadcrumb-item"><?= $this->Html->link('Helper Profiles', ['action' => 'index']) ?></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </div>
    </div>
</div>
<?php $this->end(); ?>

<!-- Main Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">

                <?= $this->Flash->render() ?>

                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">New Helper Profile</h3>
                    </div>

                    <?= $this->Form->create($helperProfile) ?>
                    <div class="card-body">

                        <!-- User & Created By -->
                        <div class="row">
                            <div class="col-md-6">
                                <?= $this->Form->control('user_id', [
                                    'label' => 'User *',
                                    'options' => $users,
                                    'empty' => '-- Select User --',
                                    'class' => 'form-control select2',
                                    'required' => true
                                ]) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $this->Form->control('created_by_user_id', [
                                    'label' => 'Created By',
                                    'options' => $createdByUsers,
                                    'empty' => 'Self / Not Applicable',
                                    'class' => 'form-control select2'
                                ]) ?>
                            </div>
                        </div>

                        <!-- Full Name -->
                        <div class="form-group mt-3">
                            <?= $this->Form->control('full_name', [
                                'label' => 'Full Name *',
                                'class' => 'form-control',
                                'placeholder' => 'John Doe',
                                'required' => true
                            ]) ?>
                        </div>

                        <!-- Contact Info -->
                        <div class="row">
                            <div class="col-md-6">
                                <?= $this->Form->control('contact_email_public', [
                                    'label' => 'Public Email',
                                    'type' => 'email',
                                    'class' => 'form-control',
                                    'placeholder' => 'hello@example.com'
                                ]) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $this->Form->control('contact_phone_public', [
                                    'label' => 'Public Phone',
                                    'class' => 'form-control',
                                    'placeholder' => '+1 (555) 123-4567'
                                ]) ?>
                            </div>
                        </div>

                        <!-- Profile Picture -->
                        <div class="form-group">
                            <?= $this->Form->control('profile_picture_public', [
                                'label' => 'Profile Picture URL',
                                'type' => 'text',
                                'class' => 'form-control',
                                'placeholder' => 'https://example.com/images/profile.jpg'
                            ]) ?>
                            <small class="form-text text-muted">Optional: Enter a public image URL.</small>
                        </div>

                        <!-- Professional Summary -->
                        <div class="form-group">
                            <?= $this->Form->control('professional_summary', [
                                'label' => 'Professional Summary',
                                'class' => 'form-control',
                                'rows' => 4,
                                'placeholder' => 'Describe experience, skills, certifications...'
                            ]) ?>
                        </div>

                        <!-- Availability -->
                        <div class="form-group">
                            <?= $this->Form->control('availability', [
                                'label' => 'Availability',
                                'type' => 'textarea',
                                'class' => 'form-control',
                                'rows' => 3,
                                'placeholder' => "e.g.,\nAvailable Mon-Fri\nWeekends on request"
                            ]) ?>
                        </div>

                        <!-- Preferred Locations -->
                        <div class="form-group">
                            <?= $this->Form->control('preferred_locations', [
                                'label' => 'Preferred Service Locations',
                                'type' => 'textarea',
                                'class' => 'form-control',
                                'rows' => 3,
                                'placeholder' => "e.g.,\nDowntown\nNorthside\nWithin 20 miles"
                            ]) ?>
                        </div>

                        <!-- Rate Pricing -->
                        <div class="form-group">
                            <?= $this->Form->control('rate_pricing', [
                                'label' => 'Rate / Pricing',
                                'class' => 'form-control',
                                'placeholder' => '$25/hour or Package: $100/visit'
                            ]) ?>
                        </div>

                        <!-- Resume Path -->
                        <div class="form-group">
                            <?= $this->Form->control('resume_path', [
                                'label' => 'Resume File Path or URL',
                                'type' => 'text',
                                'class' => 'form-control',
                                'placeholder' => '/files/resumes/john_doe.pdf'
                            ]) ?>
                        </div>

                        <!-- Is Searchable -->
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <?= $this->Form->checkbox('is_searchable', [
                                    'id' => 'is_searchable',
                                    'class' => 'custom-control-input',
                                    'checked' => true
                                ]) ?>
                                <label class="custom-control-label" for="is_searchable">
                                    <strong>Is this profile searchable?</strong>
                                </label>
                            </div>
                            <small class="form-text text-muted">If disabled, this helper won't appear in search results.</small>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default mr-2']) ?>
                        <?= $this->Form->button('<i class="fas fa-save"></i> Save Profile', [
                            'type' => 'submit',
                            'class' => 'btn btn-success',
                            'escape' => false
                        ]) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
