<?php

    class Header {
        static function header($booleon){
            $htmlHeader = '
            <header>
                <h1>MyFlashbook</h1>
                <nav>';
            if($booleon){
                $htmlHeader .= '
                <a href="addForm.php" class="addMatch">Add</a>
                <a href="start.php" class="goTest">Test</a>
                <button class="search">Search</button>';
            }else{
                $htmlHeader .= '<a href="home.php" class="toHome">List</a>';
            }
            $htmlHeader .= '</nav>
            </header>
            ';
            return $htmlHeader;
        }
    }