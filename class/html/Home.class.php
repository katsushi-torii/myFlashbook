<?php

    class Home {

        static function pageHead(){
            $htmlHead = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Home</title>
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

        static function fixedButtons(){
            $htmlFixedButtons = '
            <main class="home"> 
                <aside>
                    <button class="search">Search</button>
                    <a href="addForm.php">Add</a>
                    <a href="start.php">Test</a>
                    <a class="toTop">↑</a>
                </aside>
            ';
            return $htmlFixedButtons;
        }

        static function filter(){
            $htmlFilter = '
            <section class="filter">
                <button class="close">✖</button>
                <form method="GET">
                    <input type="text" name="keyword" placeholder="Enter Keyword">
                    <input type="submit" value="Search">
                </form>
            </section>
            ';
            return $htmlFilter;
        }

        static function order($parameter){
            $htmlOrder = '
            <article>
                <ul class="order">
                    <li><a href="?" class="reset">Reset</a></li>
                    <li><a href="?'.$parameter.'&sortBy=alpDesc">A↓</a></li>
                    <li><a href="?'.$parameter.'&sortBy=alp">Z↓</a></li>
                    <li><a href="?'.$parameter.'&sortBy=dateDesc">Date↓</a></li>
                    <li><a href="?'.$parameter.'&sortBy=date">Date↑</a></li>
                </ul>
            ';
            return $htmlOrder;
        }

        static function wordList($wordList){
            $htmlWordList = '<ul class="list">';
            foreach($wordList as $word){
                $htmlWordList .= self::wordRow($word);
            }
            $htmlWordList .= '
                </ul>
            </article>';
            return $htmlWordList;
        }

        static function wordRow($word){
            $htmlRow = '
            <li>
                <section>
                    <strong>';
            if($word->aqquirement){
                $htmlRow .= '<i class="fa-solid fa-check"></i> ';
            }
            $htmlRow .= ' '.$word->word.'</strong>
                    <span>'.$word->meaning.'</span>
                </section>
                <aside>
                    <a href="word.php?id='.$word->id.'">Detail</a>
                </aside>
            </li>
            ';
            return $htmlRow;
        }

        static function pageEnd(){
            $htmlEnd = '
                </main>
            </body>
            <script src="../../Components/js/home.js" defer></script>
            </html>
            ';
            return $htmlEnd;
        }
    }