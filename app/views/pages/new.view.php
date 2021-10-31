<h1>Nowa strona</h1>
<form action="/pages" method="post">
  <div class="field">
    <label for="name">Nazwa</label>
    <input class="input" type="text" name="name">
  </div>
  <div class="field">
    <textarea class="textarea" name="body" cols="30" rows="10"></textarea>
  </div>
  <div class="field">
    <label for="meta_title">Meta title</label>
    <input class="input" type="text" name="meta_title">
  </div>
  <div class="field">
    <label for="meta_description">Meta description</label>
    <input class="input" type="text" name="meta_description">
  </div>
  <div class="field">
    <label for="in_menu">Dodać do menu:
      <input type="checkbox" name="in_menu" value="1">
    </label>
  </div>
  <input class="button is-link" type="submit" value="Utwórz">
</form>
