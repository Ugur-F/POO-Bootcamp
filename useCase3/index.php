<?php

    class Content {
        private $title;
        private $text;

        public function __construct(string $title, string $text)
        {
            $this->title = $title;
            $this->text = $text;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getText() {
            return $this->text;
        }
    }

    class Article extends Content {
        private $isBreakingNews;

        public function __construct($title, $text, $isBreakingNews = false)
        {
            parent::__construct($title, $text);
            $this->isBreakingNews = $isBreakingNews;
        }

        public function getTitle() {
            $title = parent::getTitle();

            if ($this->isBreakingNews) {
                $title = "BREAKING NEWS: " . $title;
            }

            return $title;
        }
    }

    $articles = [
        new Article("Guerre en Ukraine", "Les autorités russes abandonnent les charges retenues contre la milice Wagner.", true),
        new Article("News Hainaut", "Mons expose l'un des plus grands artistes du monde : les coulisses de l'installation de l'exposition E6K.")
    ];

    $ads = [
        new Content("Rejoignez notre mini bootcamp", "W3Schools Bootcamp est le meilleur investissement que vous ayez jamais fait.")
    ];

    $vacancies = [
        new Content("Développeur Full Stack", "Pour différents clients impliqués dans le secteur Médical, nous recherchons des développeurs Fullstack qui seraient disponibles dans les plus brefs délais pour un nouveau défi passionnant.")
    ];

    $contentArray = array_merge($articles, $ads, $vacancies);

    foreach ($contentArray as $content) {
        $title = $content->getTitle();
        $text = $content->getText();

        if (in_array($content, $ads)) {
            $title = strtoupper($title);
        } elseif (in_array($content, $vacancies)) {
            $title .= " - apply now!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oop Bootcamp</title>
</head>
<body>
    <main>
        <?php
            foreach ($contentArray as $content) {
                $title = $content->getTitle();
                $text = $content->getText();

                echo '<div>';

                if ($content instanceof Article) {
                    echo '<article>';
                    echo '<h1>' . htmlspecialchars($title) . '</h1>';
                    echo '</article>';
                } elseif (in_array($content, $ads)) {
                    echo '<article';
                    echo '<h2>' . strtoupper(htmlspecialchars($title)) . '</h2>';
                    echo '</article>';
                } elseif (in_array($content, $vacancies)) {
                    echo '<article';
                    echo '<h3>' . htmlspecialchars($title) . ' - apply now!</h3>';
                    echo '</article>';
                }

                echo '<p>' . htmlspecialchars($text) . '</p>';
                
                echo '</div>';
            }
        ?>
    </main>
</body>
</html>