<h1><?= $post->title ?></h1>
<a href=<?= "/posts/{$post->id}/edit" ?>>Edytuj</a>
<form action="/posts/<?= $post->id ?>/delete" method="post">
    <input type="submit" value="Delete">
</form>
<p><?= $post->body ?></p>
