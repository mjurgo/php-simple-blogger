<nav class="navbar" role="navigation" aria-label="main navigation">
  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
        <a href="/" class="navbar-item">Start</a>
        <a href="/about" class="navbar-item">About</a>
        <a href="/posts" class="navbar-item">Posty</a>
        <?php if (isAdmin()) : ?>
            <a href="/admin" class="navbar-item">Panel</a>
        <?php endif; ?>
    </div>

    <div class="navbar-end">
        <?php if (!loggedIn()) : ?>
            <a href="/login" class="navbar-item">Zaloguj się</a>
            <a href="/register" class="navbar-item">Zarejestruj się</a>
        <?php else : ?>
            <a href="/users/<?= currentUser()->id ?>" class="navbar-item">Profil</a>
            <form action="/logout" method="post">
                <input class="nav-button navbar-item" type="submit" value="Wyloguj się">
            </form>
        <?php endif; ?>
    </div>
  </div>
</nav>
