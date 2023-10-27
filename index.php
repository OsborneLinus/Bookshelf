<?php

session_start();

if (!isset($_SESSION['orders'])) {
    $_SESSION['orders'] = [
        'sortTitle' => true,
        'sortAuthor' => true,
        'sortColor' => true,
        'sortPages' => true,
        'sortYear' => true,
    ];
}

$books = [
    ["title" => "The Woman In Me", "author" => "Britney Spears", "color" => "B  lack", "pages" => 252, "year" => 2023, "url" => "https://www.adlibris.com/se/bok/the-woman-in-me-sve-9789137506173"],
    ["title" => "Studie i mänskligt beteende", 'author' => "Lena Andersson", "color" => "Green", "pages" => 260, "year" => 2023, "url" => "https://www.adlibris.com/se/bok/studie-i-manskligt-beteende-9789177959540"],
    ["title" => "Can't Hurt Me", "author" => "David Goggings", "color" => "Black", "pages" => 364, "year" => 2018, "url" => "https://www.adlibris.com/se/bok/cant-hurt-me-9781544512273"],
    ["title" => "Hundmanuskripten", "author" => "Jon Fosse", "color" => "White", "pages" => 173, "year" => 2019, "url" => "https://www.adlibris.com/se/bok/hundmanuskripten-9789177425229"],
    ["title" => "The 48 Laws of Power", "author" => "Robert Greene", "color" => "Red", "pages" => 496, "year" => 2000, "url" => "https://www.adlibris.com/se/bok/the-48-laws-of-power-9780140280197"],
    ["title" => "Eldslandet", "author" => "Pascal Engman", "color" => "Brown", "pages" => 516, "year" => 2019, "url" => "https://www.adlibris.com/se/bok/eldslandet-9789164206343"],
    ["title" => "Kiss", "author" => "Anton Chekhov", "color" => "Black", "pages" => "E-Bok", "year" => 2013, "url" => "https://www.adlibris.com/se/e-bok/kiss-9781443428323"],
    ["title" => "Den hemliga historien", "author" => "Donna Tartt", "color" => "Green", "pages" => 703, "year" => 2009, "url" => "https://www.bokus.com/bok/9789174290578/den-hemliga-historien/"],
    ["title" => "Män som hatar kvinnor", "author" => "Stieg Larsson", "color" => "Black", "pages" => 567, "year" => 2015, "url" => "https://www.bokus.com/bok/9789113071299/man-som-hatar-kvinnor/"],
    ["title" => "Snabba cash", "author" => "Jens Lapidus", "color" => "Black", "pages" => 474, "year" => 2008, "url" => "https://bokus.com/bok/9789170016400/snabba-cash/"],
    ["title" => "Flickorna", "author" => "Emma Cline", "color" => "Blue", "pages" => 330, "year" => 2017, "url" => "https://www.bokus.com/bok/9789127152380/flickorna/"],
    ["title" => "Blonde", "author" => "Joyce Carol Oates", "color" => "White", "pages" => 862, "year" => 2022, "url" => "https://www.bokus.com/bok/9789100196707/blonde/"],
];


?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
</head>

<body>
    <h1 class="header">Problem Week - Bookshelf</h1>
    <div id="filter">
        <form method="post">
            <button class="btn" type="submit" name="sortTitle">Sort by Title</button>
            <button class="btn" type="submit" name="sortAuthor">Sort by Author</button>
            <button class="btn" type="submit" name="sortColor">Sort by Color</button>
            <button class="btn" type="submit" name="sortPages">Sort by Number of Pages</button>
            <button class="btn" type="submit" name="sortYear">Sort by Release Year</button>
        </form>
        <!-- Filter options go here -->
        <?php
        if (isset($_POST['sortTitle'])) {
            if ($_SESSION['orders']['sortTitle']) {
                usort($books, function ($a, $b) {
                    return strcmp($a['title'], $b['title']);
                });
            } else {
                usort($books, function ($a, $b) {
                    return strcmp($b['title'], $a['title']);
                });
            }
            $_SESSION['orders']['sortTitle'] = !$_SESSION['orders']['sortTitle'];
        }
        if (isset($_POST['sortAuthor'])) {
            if ($_SESSION['orders']['sortAuthor']) {
                usort($books, function ($a, $b) {
                    return strcmp($a['author'], $b['author']);
                });
            } else {
                usort($books, function ($a, $b) {
                    return strcmp($b['author'], $a['author']);
                });
            }
            $_SESSION['orders']['sortAuthor'] = !$_SESSION['orders']['sortAuthor'];
        }
        if (isset($_POST['sortColor'])) {
            if ($_SESSION['orders']['sortColor']) {
                usort($books, function ($a, $b) {
                    return strcmp($a['color'], $b['color']);
                });
            } else {
                usort($books, function ($a, $b) {
                    return strcmp($b['color'], $a['color']);
                });
            }
            $_SESSION['orders']['sortColor'] = !$_SESSION['orders']['sortColor'];
        }
        if (isset($_POST['sortPages'])) {
            if ($_SESSION['orders']['sortPages']) {
                usort($books, function ($a, $b) {
                    return strcmp($a['pages'], $b['pages']);
                });
            } else {
                usort($books, function ($a, $b) {
                    return strcmp($b['pages'], $a['pages']);
                });
            }
            $_SESSION['orders']['sortPages'] = !$_SESSION['orders']['sortPages'];
        }
        if (isset($_POST['sortYear'])) {
            if ($_SESSION['orders']['sortYear']) {
                usort($books, function ($a, $b) {
                    return strcmp($a['year'], $b['year']);
                });
            } else {
                usort($books, function ($a, $b) {
                    return strcmp($b['year'], $a['year']);
                });
            }
            $_SESSION['orders']['sortYear'] = !$_SESSION['orders']['sortYear'];
        } ?>
    </div>
    <div id="bookshelf">
        <?php foreach ($books as $book) {
            $author = trim($book['author']);
            $authorClass = strtolower(str_replace(' ', '-', $author)); ?>
            <div class="book <?= $authorClass; ?> ">
                <h3><?= $book['title'] ?></h3>
                <p class="displayHover">Author: <?= $book['author'] ?></p>
                <p class="displayHover">Color: <?= $book['color'] ?></p>
                <p class="displayHover">Pages: <?= $book['pages'] ?></p>
                <p class="displayHover">Release Year: <?= $book['year'] ?></p>
                <a href="<?= $book['url'] ?> " class="btn-link displayHover">Buy me</a>
            </div>
        <?php } ?>
    </div>
    <footer>
        <div class="footer">
            <p>&copy;Linus Holm 2023</p>
        </div>
    </footer>
</body>

</html>