<h1>Zarządzanie użytkownikami</h1>
<div>
    <ul>
        <?php foreach ($users as $user) : ?>
            <li>
                <?= $user->username ?> | <?= $user->role ?>
                <form action="/users/<?= $user->id ?>/delete" method="post">
                    <input type="submit" value="Usuń">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
