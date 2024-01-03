<?php

    class Result {
        static function pageHead(){
            $htmlHead = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Result</title>
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

        static function title($score){
            $htmlTitle = '
            <main class="result">
                <aside>
                    <h3>Result</h3>
                    <h4>'.$score.'/10</h4>
                </aside>
                <p>Check if you mastered the word!</p>
            ';
            return $htmlTitle;
        }

        static function resultList($wordList, $idArray, $resultArray, $score){
            $htmlList = '<ul>';
            foreach($wordList as $word){
                $htmlList .= self::resultRow($word, $idArray, $resultArray, $score);
            }
            $htmlList .= '</ul>';
            return $htmlList;
        }

        static function resultRow($word, $idArray, $resultArray, $score){
            $htmlRow = '
            <li>
                <section>
                    <strong>'.$word->getWord().'</strong>
                    <span>'.$word->getMeaning().'</span>
                </section>
                <aside>';
            if($word->getResult() == "true"){
                $htmlRow .= '<i class="fa-solid fa-o"></i>
                ';
                if($word->getAqquirement() == 1){
                    $htmlRow .= '<form action="#" method="POST">
                        <input type="hidden" name="ids" value="'.$idArray.'">
                        <input type="hidden" name="results" value="'.$resultArray.'">
                        <input type="hidden" name="score" value="'.$score.'">
                        <input type="hidden" name="aqquireReset" value='.$word->getId().'>
                        <button type="submit" style="color: green; font-weight: 600;">✓</button>
                    </form>';
                }else{
                    $htmlRow .= '<form action="#" method="POST">
                        <input type="hidden" name="ids" value="'.$idArray.'">
                        <input type="hidden" name="results" value="'.$resultArray.'">
                        <input type="hidden" name="score" value="'.$score.'">
                        <input type="hidden" name="aqquire" value='.$word->getId().'>
                        <button type="submit" style="background-color: whitesmoke; font-weight: 600;">✓</button>
                    </form>';
                }
                $htmlRow .= '';
            }else{
                $htmlRow .= '<i class="fa-solid fa-x"></i>';
            }
            $htmlRow .= '</aside></li>';
            return $htmlRow;
        }

        static function pageEnd(){
            $htmlEnd = '
                    <a href="home.php">Go Home</a>
                </main>
            </body>
            <script src="../../Components/js/result.js" defer></script>
            </html>
            ';
            return $htmlEnd;
        }
    }