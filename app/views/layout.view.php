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
        <?php if (!loggedIn()) : ?>
            <a href="/login">Zaloguj się</a>
            <a href="/register">Zarejestruj się</a>
        <?php else : ?>
            <form action="/logout" method="post">
                <input type="submit" value="Wyloguj się">
            </form>
        <?php endif; ?>
    </div>
    <div class="container">
        <div class="content">
            <?php render($view, $data) ?>
        </div>
    </div>
</body>
</html>
