<?php

    class Test {
        static function pageHead(){
            $htmlHead = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>TestB</title>
                <link rel="stylesheet" href="../../css/style.css">
                <script src="https://code.jquery.com/jquery-3.7.1.js"
                integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
                crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
            </head>
            <body>
            ';
            return $htmlHead;
        }

        static function quizList(array $selectedWords){
            $htmlList = '<main class="test">';
            $count = 0;
            foreach($selectedWords as $selectedWord){
                $count += 1;
                if($count == 10){      
                    $htmlList .= self::quizRow($selectedWord, $count, true);
                }else{
                    $htmlList .= self::quizRow($selectedWord, $count, false);
                }
            }
            $htmlList .= '</main>';
            return $htmlList;
        }

        static function quizRow($word, $count, $last){
            $firstLetter = substr($word->word, 0, 1);
            $letters = strlen($word->word);
            $htmlRow = '
            <section class="quiz'.$count.'">
                <article>
                    <h4>Question '.$count.'</h4>
                    <h3>'.$word->meaning.'</h3>
                    <aside>
                        <h4></h4>';
            if($word->aqquirement){
                $htmlRow .= '<i class="fa-solid fa-check"></i>';
            }
            $htmlRow .= '
                    </aside>
                    <aside>
                        <input type="text" id="question'.$count.'">
                        <button class="check'.$count.'">Answer</button>
                    </aside>
                </article>
                <section class="answer">
                    <strong>'.$word->word.'</strong>
                    <aside>
                        <i></i>';
            if($last){
                $htmlRow .= '<button onclick="result()">Result</button>';
            }else{
                $htmlRow .= '<button onclick="next()">Next</button>';
            }
            $htmlRow .= '</aside>
                    </section>
                    <p>Fill the form.</p>
                </section>
            ';
            return $htmlRow;
        }

        static function pageEnd($ids, array $selectedWords){
            $htmlEnd = '
            <form action="result.php" method="POST" hidden>
                <input type="hidden" name="score" id="score">
                <input type="hidden" name="ids" id="ids">
                <input type="hidden" name="results" id="results">
            </form>
            </body>
            <script>
                var ids = "'.$ids.'";
                let selectedWords = [];
                let objectPass = {};';
            foreach($selectedWords as $word){
                $htmlEnd .= self::arrayPass($word);
            }
            $htmlEnd .= '
            </script>
            <script src="../../Components/js/test.js" defer></script>
            </html>
            ';
            return $htmlEnd;
        }

        static function arrayPass($word){
            $htmlArrayPass = '
            objectPass = {
                "id": '.$word->id.',
                "word": "'.$word->word.'",
                "meaning": "'.$word->meaning.'",
                "date": '.$word->date.',
                "aqquirement": '.$word->aqquirement.'
            };
            selectedWords.push(objectPass);
            ';
            return $htmlArrayPass;
        }
    }