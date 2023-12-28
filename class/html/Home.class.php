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
                    <a href="#" class="toTop">↑</a>
                </aside>
            ';
            return $htmlFixedButtons;
        }

        static function form(){
            $htmlForm = '
            <section class="filter">
                <button class="close">✖</button>
                <form method="GET">
                    <aside>
                        <input type="text" name="keyword" placeholder="Enter Keyword">
                    </aside>
                    <aside>
                        <label for="aqquirement">Aqquired: </label>
                        <select name="aqquirement" id="aqquirement">
                            <option value="" selected>Select option</option>
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                    </aside>
                    <aside>
                        <label for="sort">Order: </label>
                        <select name="sort" id="sort">
                            <option value="" selected>Select option</option>
                            <option value="alpDesc">A↓</option>
                            <option value="alp">Z↓</option>
                            <option value="dateDesc">Date↓</option>
                            <option value="date">Date↑</option>
                        </select>
                    </aside>
                    <input type="submit" value="Search">
                </form>
                <a href="?">Reset</a>
            </section>
            <article>
            ';
            return $htmlForm;
        }

        static function wordList($wordList){
            $htmlWordList = '<ul class="list">';
            foreach($wordList as $word){
                $htmlWordList .= self::wordRow($word);
            }
            $htmlWordList .= '</ul>';
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

        static function pageButtons($parameter, $pageAmount, $page){
            $htmlPageButton = '<aside class="pages">';
            for($i = 1; $i <= $pageAmount; $i++){
                if($i == $page){
                    $htmlPageButton .= '<h4>'.$i.'</h4>';
                }else{
                    $htmlPageButton .= '<a href="?'.$parameter.'&page='.$i.'">'.$i.'</a>';
                }
            }   
            $htmlPageButton .= '</aside>';
            return $htmlPageButton;
        }

        static function pageEnd(){
            $htmlEnd = '</article>
                </main>
            </body>
            <script src="../../Components/js/home.js" defer></script>
            </html>
            ';
            return $htmlEnd;
        }
    }