<h1>Wpisy</h1>
<ul>
    <?php foreach ($posts as $post) : ?>
        <li><a href=<?= "/posts/{$post->id}" ?>><?= $post->title ?></a></li>
    <?php endforeach; ?>
</ul>
