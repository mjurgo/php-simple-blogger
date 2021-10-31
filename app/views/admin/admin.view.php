<h1>Panel administracyjny</h1>
<div>
  <a href="/admin/posts">Posty</a>
  <a href="/admin/pages">Strony</a>
  <a href="/admin/users">Użytkownicy</a>
</div>
<h2>Posty</h2>
<ul>
  <?php foreach ($posts as $post) : ?>
    <li>
      <a href="/posts/<?= $post->id ?>"><?= $post->title ?></a>
      | <a href="/posts/<?= $post->id ?>/edit">Edytuj</a>
      <form action="/posts/<?= $post->id ?>/delete" method="post">
        <input class="button is-danger" type="submit" value="Usuń">
      </form>
    </li>
  <?php endforeach; ?>
</ul>
<h2>Użytkownicy</h2>
<ul>
  <?php foreach ($users as $user) : ?>
    <li><?= $user->username ?></li>
  <?php endforeach; ?>
</ul>
