<h1><?= $post->title ?></h1>
<small><?= $post->created_at ?></small>
<br>
<?php if (isAdmin()) : ?>
    <a href=<?= "/posts/{$post->id}/edit" ?>>Edytuj</a>
    <form action="/posts/<?= $post->id ?>/delete" method="post">
        <input type="submit" value="Usuń">
    </form>
<?php endif; ?>
<p><?= $post->body ?></p>
<hr>
<?php if (loggedIn()) : ?>
    <form action="/posts/<?= $post->id ?>/comment", method="post">
        <textarea name="body" cols="50" rows="6"></textarea>
        <input type="submit" value="Skomentuj">
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
