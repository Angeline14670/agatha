<?php
/* connexion a la base "glam" */
$mysqli = new mysqli("localhost", "root", "root", "glam");
if ($mysqli->connect_error) {
    die("Erreur de connexion");
}

/* Requete SQL */
$result = $mysqli->query("SELECT * FROM livres_agatha_christie");

/* création d'une liste de livres */
$books = [];
while ($row = $result->fetch_assoc()) {
    $books[] = $row;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Livres d'Agatha Christie</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Livres d'Agatha Christie</h1>

<?php foreach ($books as $book): ?>

<article itemscope itemtype="https://schema.org/Book">

    <!-- titre -->
    <h2 itemprop="name">
        <?= htmlspecialchars($book['headline']) ?>
    </h2>

    <!-- titre VO -->
    <p>
        <strong>Titre original :</strong>
        <span itemprop="alternativeHeadline">
            <?= htmlspecialchars($book['alternativeHeadline']) ?>
        </span>
    </p>

    <!-- auteur -->
    <p itemprop="author">
        <strong>Auteur :</strong>
        <?= htmlspecialchars($book['author']) ?>
    </p>

    <!-- date -->
    <p>
        <strong>Date de publication :</strong>
        <span itemprop="datePublished">
            <?= htmlspecialchars($book['sdDatePublished']) ?>
        </span>
    </p>

    <!-- genre -->
    <p>
        <strong>Genre :</strong>
        <span itemprop="genre">
            <?= htmlspecialchars($book['genre']) ?>
        </span>
    </p>

    <!-- personnage -->
    <p>
        <strong>Personnage principal :</strong>
        <span itemprop="character">
            <?= htmlspecialchars($book['character']) ?>
        </span>
    </p>

    <!-- isbn -->
    <p>
        <strong>ISBN :</strong>
        <span itemprop="isbn">
            <?= htmlspecialchars($book['isbn']) ?>
        </span>
    </p>

    <!-- lien -->
    <p>
        <a href="<?= htmlspecialchars($book['url']) ?>" itemprop="url" target="_blank">
            Voir la fiche
        </a>
    </p>

</article>

<hr>

<?php endforeach; ?>

</body>
</html>