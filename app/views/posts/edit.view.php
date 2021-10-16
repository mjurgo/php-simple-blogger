<h1>Edytuj post: <?= $post->title ?></h1>
<form action="/posts/<?= $post->id ?>" method="post">
    <div class="field">
        <label for="title">Tytuł</label>
        <input class="input" type="text" name="title" value="<?= $post->title ?>">
    </div>
    <div class="field">
        <textarea class="textarea" name="body" cols="30" rows="10"><?= $post->body ?></textarea>
    </div>
    <div class="field">
        <label for="title">Meta title</label>
        <input class="input" type="text" name="meta_title" value="<?= $post->meta_title ?>">
    </div>
    <div class="field">
        <label for="title">Meta description</label>
        <input class="input" type="text" name="meta_description" value="<?= $post->meta_description ?>">
    </div>
    <input class="button is-link" type="submit" value="Edytuj">
</form>
