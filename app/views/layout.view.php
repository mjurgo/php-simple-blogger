<!DOCTYPE html>
<html lang="en">
<head>
    <title>Poor Blogging CMS</title>
</head>
<body>
    <div class="nav">
        <a href="/">Start</a>
        <a href="/about">About</a>
        <a href="/posts">Posty</a>
    </div>
    <div class="container">
        <div class="content">
            <?php render($view, $data) ?>
        </div>
    </div>
</body>
</html>
