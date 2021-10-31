<h1>Zarządzanie stronami</h1>
<div>
  <a href="/pages/new">Nowa strona</a>
  <ul>
    <?php foreach ($pages as $page) : ?>
      <li>
        <a href="/pages/<?= $page->id ?>"><?= $page->name ?></a>
        | <a href="/pages/<?= $page->id ?>/edit">Edytuj</a>
        <form action="/pages/<?= $page->id ?>/delete" method="post">
          <input type="submit" value="Usuń">
        </form>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
