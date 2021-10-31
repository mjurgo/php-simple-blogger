<h1>Edytuj stronę</h1>
<form action="/pages/<?= $page->id ?>" method="post">
  <div class="field">
    <label for="name">Nazwa</label>
    <input class="input" type="text" name="name" value="<?= $page->name ?? '' ?>">
  </div>
  <div class=" field">
    <textarea class="textarea" name="body" cols="30" rows="10"><?= $page->body ?? '' ?></textarea>
  </div>
  <div class="field">
    <label for="meta_title">Meta title</label>
    <input class="input" type="text" name="meta_title" value="<?= $page->meta_title ?? '' ?>">
  </div>
  <div class="field">
    <label for="meta_description">Meta description</label>
    <input class="input" type="text" name="meta_description" value="<?= $page->meta_description ?? '' ?>">
  </div>
  <div class="field">
    <label for="in_menu">Dodać do menu:
      <input type="hidden" value="0" name="in_menu">
      <input type="checkbox" name="in_menu" value="1" <?= $page->in_menu ? 'checked' : '' ?>>
    </label>
  </div>
  <input class="button is-link" type="submit" value="Edytuj">
</form>
