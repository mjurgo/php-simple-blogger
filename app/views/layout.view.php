<!DOCTYPE html>
<html lang="en">
<head>
    <title>Poor Blogging CMS</title>
    <link rel="stylesheet" href="/public/style.css">
</head>
<body>
    <?php include('_partials/nav.view.php') ?>
    <div class="container">
        <?php if (flash_message()) : ?>
            <div class="flash-message">
                <p><?= get_flash_message() ?></p>
            </div>
        <?php endif; ?>
        <div class="content">
            <?php render($view, $data) ?>
        </div>
    </div>
</body>
</html>
