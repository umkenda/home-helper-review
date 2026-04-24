
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?> | HomeHelpers
    </title>

    <!-- AdminLTE & Bootstrap CSS -->
    <?= $this->Html->css([
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css',
        'https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css'
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <?= $this->Html->link('<i class="fas fa-home"></i> Home', '/', ['class' => 'nav-link', 'escape' => false]) ?>
            </li>
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <span class="brand-text font-weight-light">HomeHelpers</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="nav-icon fas fa-users"></i> Helpers ', ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="nav-icon fas fa-briefcase"></i> Education', ['controller' => 'Educations', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="nav-icon fas fa-briefcase"></i> Skills', ['controller' => 'Skills', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="nav-icon fas fa-briefcase"></i> Work Experience', ['controller' => 'WorkExperiences', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content pt-3">
            <div class="container-fluid">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </section>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer text-center">
        <strong>&copy; <?= date('Y') ?> HomeHelpers</strong> - All rights reserved.
    </footer>
</div>

<!-- AdminLTE & jQuery Scripts -->
<?= $this->Html->script([
    'https://code.jquery.com/jquery-3.6.0.min.js',
    'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js',
    'https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js'
]) ?>

<?= $this->fetch('script') ?>
</body>
</html>






