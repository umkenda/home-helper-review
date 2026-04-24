<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?> | HomeHelpers</title>

    <!-- AdminLTE & Bootstrap CSS -->
    <?= $this->Html->css([
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css',
        'https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css'
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <!-- Optional: Custom style to ensure centering -->
    <style>
        .login-page {
            background-color: #f4f6f9;
        }
        .login-box {
            width: 100%;
            max-width: 400px;
            margin: auto;
        }
    </style>
</head>

<body class="hold-transition login-page">
<div class="login-box">
    <!-- Flash messages -->
    <?= $this->Flash->render() ?>

    <!-- Main Content (your login form will go here) -->
    <section>
        <?= $this->fetch('content') ?>
    </section>
</div>

<!-- Footer (optional on login page) -->
<footer class="main-footer text-center mt-4">
    <strong>&copy; <?= date('Y') ?> HomeHelpers</strong> - All rights reserved.
</footer>

<!-- AdminLTE Scripts -->
<?= $this->Html->script([
    'https://code.jquery.com/jquery-3.6.0.min.js',
    'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js',
    'https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js'
]) ?>

<?= $this->fetch('script') ?>
</body>
</html>
