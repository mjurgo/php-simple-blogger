<h1><?= $user->username ?></h1>
<div class="user-profile-edit">
    <form action="/users/<?= $user->id ?>" method="post">
        <div class="input">
            <label for="login">Login</label>
            <input type="text" name="login" value="<?= $user->login ?>">
        </div>
        <div class="input">
            <label for="password">Aktualne hasło</label>
            <input type="password" name="current_password">
        </div>
        <div class="input">
            <label for="password">Nowe hasło</label>
            <input type="password" name="password">
        </div>
        <div class="input">
            <label for="username">Nazwa użytkownika (wyświetlana)</label>
            <input type="text" name="username" value="<?= $user->username ?>">
        </div>
        <input type="submit" value="Zaktualizuj">
    </form>
</div>

<div class="user-comments">
    <h2>Komentarze</h2>
    <ul>
        <?php foreach ($user->comments() as $comment) : ?>
            <li><?= $comment->body ?> | <?= $comment->created_at ?></li>
        <?php endforeach; ?>
    </ul>
</div>
