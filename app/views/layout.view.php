<!DOCTYPE html>
<html lang="en">
<head>
    <title>Poor Blogging CMS</title>
</head>
<body>
    <div class="nav">
        <a href="/">Start</a>
        <a href="/about">About</a>
        <a href="/posts">Posty</a>
        <?php

if (isAdmin()) : ?>
            <a href="/admin">Panel</a>
        <?php endif; ?>
        <?php if (!loggedIn()) : ?>
            <a href="/login">Zaloguj się</a>
            <a href="/register">Zarejestruj się</a>
        <?php else : ?>
            <a href="/users/<?= currentUser()->id ?>">Profil</a>
            <form action="/logout" method="post">
                <input type="submit" value="Wyloguj się">
            </form>
        <?php endif; ?>
    </div>
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
