<h1>Wpisy</h1>
<?php if (isAdmin()) : ?>
    <a href="/posts/new">Nowy post</a>
<?php endif; ?>
<ul>
    <?php foreach ($posts as $post) : ?>
        <li><a href=<?= "/posts/{$post->id}" ?>><?= $post->title ?></a></li>
    <?php endforeach; ?>
</ul>
