

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Cooperative</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="index.html" class="logo">Cooperative</a>
                <ul class="menu">
                    <li><a href="index.html">Accueil</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>

        <h1>Bienvenue sur notre boutique</h1>
        <section class="product-list">
            <?php foreach ($parcours as $parcourss){ ?>
                 <article class="product-card">
                <a href="parcourss.html">
                    <h2><?= $parcourss['lieu_depart'] ?> - <?= $parcourss['lieu_arrivee'] ?></h2>
                </a>
            </article>
         <?php } ?>
           
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Cooperative</p>
    </footer>
</body>
</html>