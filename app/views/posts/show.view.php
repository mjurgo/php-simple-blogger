<h1><?= $post->title ?></h1>
<small><?= $post->created_at ?></small>
<br>
<?php if (isAdmin()) : ?>
    <a href=<?= "/posts/{$post->id}/edit" ?>>Edytuj</a>
    <form action="/posts/<?= $post->id ?>/delete" method="post">
        <input class="button is-danger" type="submit" value="Usuń">
    </form>
<?php endif; ?>
<div class="content mt-2">
    <p><?= $post->body ?></p>
</div>
<hr>
<?php if (loggedIn()) : ?>
    <form action="/posts/<?= $post->id ?>/comment", method="post">
        <div class="field">
            <textarea class="textarea" name="body" cols="10" rows="3"></textarea>
        </div>
        <input class="button is-link" type="submit" value="Skomentuj">
    </form>
<?php endif; ?>

<h2>Komentarze</h2>
<ul>
    <?php foreach ($comments as $comment) : ?>
        <li>
            <?= $comment->body ?> | napisał <?= $comment->author()->username ?>
            | <?= $comment->created_at ?>
        </li>
    <?php endforeach; ?>
</ul>
