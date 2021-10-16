<h1><?= $user->username ?></h1>
<div class="user-profile-edit">
    <form action="/users/<?= $user->id ?>" method="post">
        <div class="field">
            <label for="login">Login</label>
            <input class="input" type="text" name="login" value="<?= $user->login ?>">
        </div>
        <div class="field">
            <label for="password">Aktualne hasło</label>
            <input class="input" type="password" name="current_password">
        </div>
        <div class="field">
            <label for="password">Nowe hasło</label>
            <input class="input" type="password" name="password">
        </div>
        <div class="field">
            <label for="username">Nazwa użytkownika (wyświetlana)</label>
            <input class="input" type="text" name="username" value="<?= $user->username ?>">
        </div>
        <input class="button is-link" type="submit" value="Zaktualizuj">
    </form>
</div>

<div class="user-comments">
    <h2>Komentarze</h2>
    <ul>
        <?php foreach ($user->comments() as $comment) : ?>
            <li><?= $comment->body ?> | <?= $comment->created_at ?> | <a href="/posts/<?= $comment->post_id ?>"><?= $comment->post()->title ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
