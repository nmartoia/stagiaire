<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>— Stagiaire —</title>
    <script src="https://kit.fontawesome.com/affdc3fe7d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">
    <link rel="icon" href="/avatar.ico">
</head>
<body>
    <header>
        <nav>
            <a href="/" class="logo">LOGO</a>
            <div class="hoverLink">
                            <a href="/" class="icon"><i class="fas fa-home"></i></a>
                            <p class="hidden">Accueil</p>
                        </div>
                        <div class="hoverLink">
                            <a href="/dashboard/nouveau" class="icon"><i class="fas fa-plus"></i></a>
                            <p class="hidden">New</p>
                        </div>
                        <div class="hoverLink">
                            <a href="/dashboard" class="icon"><i style="color: white;" class="fas fa-eye"></i></a>
                            <p class="hidden">liste</p>
                        </div>

        </nav>
    </header>

    <main>
        <?php echo $content; ?>
    </main>
</body>
</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);
