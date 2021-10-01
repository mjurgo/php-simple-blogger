<h1><?= $post->title ?></h1>
<a href=<?= "/posts/{$post->id}/edit" ?>>Edytuj</a>
<form action="/posts/<?= $post->id ?>/delete" method="post">
    <input type="submit" value="Delete">
</form>
<p><?= $post->body ?></p>
<hr>
<?php if (loggedIn()) : ?>
<form action="/posts/<?= $post->id ?>/comment", method="post">
    <textarea name="body" cols="50" rows="6"></textarea>
    <input type="submit" value="Skomentuj">
</form>
<?php endif; ?>

<h2>Comments</h2>
<ul>
<?php foreach ($comments as $comment) : ?>
    <li><?= $comment->body ?> --- <?= $comment->author()->username ?></li>
<?php endforeach; ?>
</ul>
