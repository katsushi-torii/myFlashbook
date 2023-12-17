<?php

    class Start {
        static function pageHead(){
            $htmlHead = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Test</title>
                <link rel="stylesheet" href="../../css/style.css">
                <script src="https://code.jquery.com/jquery-3.7.1.js"
                integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
                crossorigin="anonymous"></script>
            </head>
            <body>
            ';
            return $htmlHead;
        }

        static function mainHtml(){
            $htmlMain = '
                <main class="start">
                    <section>
                        <a href="test">TestA</a>
                        <a href="testB.php">TestB</a>
                    </section>
                    <article>
                        <blockquote>
                            <strong>TestA:</strong>
                            <p>Words that you answered correctly for less than 3 times appears. Max 10 questions.</p>
                        </blockquote>
                        <blockquote>
                            <strong>TestB:</strong>
                            <p>All words appears. Max 10 questions.</p>
                        </blockquote>
                    </article>
                    <aside>
                        <a href="home.php">List</a>
                    </aside>
                </main>
            </body>
            </html>
            ';
            return $htmlMain;
        }
    }