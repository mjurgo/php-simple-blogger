<h1><?= $page->name ?></h1>
<?php if (isAdmin()) : ?>
  <a href=<?= "/pages/{$page->id}/edit" ?>>Edytuj</a>
  <form action="/pages/<?= $page->id ?>/delete" method="post">
    <input class="button is-danger" type="submit" value="Usuń">
  </form>
<?php endif; ?>
<p><?= $page->body ?></p>
