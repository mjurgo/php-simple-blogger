<h1>Zarządzanie postami</h1>
<div>
    <a href="/posts/new">Nowy post</a>
    <ul>
        <?php foreach ($posts as $post) : ?>
            <li>
                <a href="/posts/<?= $post->id ?>"><?= $post->title ?></a>
                | <a href="/posts/<?= $post->id ?>/edit">Edytuj</a>
                <form action="/posts/<?= $post->id ?>/delete" method="post">
                    <input type="submit" value="Usuń">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
