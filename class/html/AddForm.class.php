<?php

    class AddForm {

        static function pageHead(){
            $htmlHead = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Add Word</title>
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
            <main class="add">
                <article>
                    <h3>Add a Word</h3>
                </article>
            ';
            return $htmlTitle;
        }

        static function form(){
            $htmlForm = '
            <section>
                <form action="" method="POST" class="addForm">
                    <aside>
                        <label for="word">English Word:</label>
                        <input type="text" name="word" id="word" required>
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
                        <input type="date" name="date" id="date" required>
                    </aside>
                    <button onsubmit="">Add</button>
                </form>
            </section>
            ';
            return $htmlForm;
        }

        static function options(){
            $htmlOptions = '
                <aside>
                    <a href="home.php">List</a>
                </aside>
            </main>
            ';
            return $htmlOptions;
        }

        static function pageEnd(){
            $htmlEnd = '
                </main>
            </body>
            <script>
                var meaningNum = "";
                var meanings = "";
            </script>
            <script src="../../Components/js/form.js" defer></script>
            </html>
            ';
            return $htmlEnd;
        }
    }