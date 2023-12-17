<?php

    class WordData {

        static function pageHead(){
            $htmlHead = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Word</title>
                <link rel="stylesheet" href="../../css/style.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
                <script src="https://code.jquery.com/jquery-3.7.1.js"
                integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
                crossorigin="anonymous"></script>
            </head>
            <body>
            ';
            return $htmlHead;
        }

        static function wordData($word){
            $htmlData = '
            <main class="word">
                <section>
                    <aside>
                        <h4>'.$word->date.'</h4>
                    </aside>
                    <article>
                        <h4>'.$word->word.'</h4>
                    </article>
                    <article>
                        <h4>'.$word->meaning.'</h4>
                    </article>
                </section>
            ';
            return $htmlData;
        }

        static function options($word){
            $htmlOptions = '
                    <aside>
                        <a href="home.php">List</a>
                        <a href="editForm.php?='.$word->id.'">Edit</a>
                        <button onclick="deleteConfirm()">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </aside>
                    <blockquote>
                        <p>
                            Are you sure to delete?
                        </p>
                        <aside>
                            <form action="" method="POST">
                                <input type="hidden" name="deleteId" value="'.$word->id.'">
                                <button type="submit">Yes</button>
                            </form>
                            <button onclick="deleteNo()">No</button>
                        </aside>
                    </blockquote>
                </main>
            </body>
            ';
            return $htmlOptions;
        }

        static function pageEnd(){
            $htmlEnd = '
            <script src="../../Components/js/wordData.js" defer></script>
            </html>
            ';
            return $htmlEnd;
        }
    }