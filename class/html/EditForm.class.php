<?php

    class EditForm {

        static function pageHead(){
            $htmlHead = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Edit Word</title>
                <link rel="stylesheet" href="../../css/style.css">
                <script src="https://code.jquery.com/jquery-3.7.1.js"
                integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
                crossorigin="anonymous"></script>
            </head>
            <body>
            ';
            return $htmlHead;
        }

        static function title(){
            $htmlTitle = '
            <main class="edit">
                <article>
                    <h3>Edit a Word</h3>
                </article>
            ';
            return $htmlTitle;
        }

        static function form($word){
            $htmlForm = '
            <section>
                <form action="" method="POST" class="sditForm">
                    <aside>
                        <label for="word">English Word:</label>
                        <input type="text" name="word" id="word" value="'.$word->word.'" required>
                    </aside>
                    <aside>
                        <label for="meaningNum">Number of meanings:</label>
                        <select name="meaningNum" id="meaningNum" required>
                            <option value ="">Select</option>
                        </select>
                    </aside>
                    <aside>
                        <label for="meanings">Meanings:</label>
                        <aside class="meanings">
                        </aside>
                    </aside>
                    <aside>
                        <label for="date">Current date:</label>
                        <input type="date" name="date" id="date" value="'.$word->date.'" required>
                    </aside>
                    <button onsubmit="">Edit</button>
                </form>
            </section>
            ';
            return $htmlForm;
        }

        static function options($word){
            $htmlOptions = '
                <aside>
                    <a href="home.php">List</a>
                    <a href="word.php?id='.$word->id.'" class="goBack">Go back</a>
                </aside>
            </main>
            ';
            return $htmlOptions;
        }

        static function pageEnd($meaningNum, $meanings){
            $htmlEnd = '
                </main>
            </body>
            <script>
                var meaningNum = '.$meaningNum.';
                var meanings = "'.$meanings.'";
            </script>
            <script src="../../Components/js/form.js" defer></script>
            </html>
            ';
            return $htmlEnd;
        }
    }