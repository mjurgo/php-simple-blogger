<h1>Edytuj post: <?= $post->title ?></h1>
<form action="/posts/<?= $post->id ?>" method="post">
    <div class="input">
        <label for="title">Tytuł</label>
        <input type="text" name="title" value="<?= $post->title ?>">
    </div>
    <div class="input">
        <textarea name="body" cols="30" rows="10"><?= $post->body ?></textarea>
    </div>
    <div class="input">
        <label for="title">Meta title</label>
        <input type="text" name="meta_title" value="<?= $post->meta_title ?>">
    </div>
    <div class="input">
        <label for="title">Meta description</label>
        <input type="text" name="meta_description" value="<?= $post->meta_description ?>">
    </div>
    <input type="submit" value="Edytuj">
</form>
