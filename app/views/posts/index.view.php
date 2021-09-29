<h1>Wpisy</h1>
<a href="/posts/new">Nowy post</a>
<ul>
    <?php foreach ($posts as $post) : ?>
        <li><a href=<?= "/posts/{$post->id}" ?>><?= $post->title ?></a></li>
    <?php endforeach; ?>
</ul>
