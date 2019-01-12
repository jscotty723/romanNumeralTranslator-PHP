<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>



<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="index.css">
    <title>Roman Numeral Converter</title>
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Metamorphous" rel="stylesheet">
</head>

<body>
    <header>
        <h1 class="title">Roman Numeral Converter:</h1>
    </header>

    <main>
        <form class="inputField" action="" method="post">
            <label for="">
                <h3>Enter number to translate:</h3>
                <h6>(between 1 and 9999)</h6>
            </label>
            <input class="input" type="number" max="9999" name="testing">
            <input type="submit" value="Translate!">
        </form>


        <h3>
            <?php
            if($_POST) {
            $yourNum = $_POST["testing"];
            echo "$yourNum in Roman Numerals:";
            }
            ?>
        </h3>

        <div class="outputField">
            <?php 
                if($_POST) {
                    $toTranslate = $_POST["testing"];
                    $toTranslateRev = strrev($toTranslate);
                    
                    function translate($text) {
                        $tempArray = array(1, 5, 10);

                        $romanArray = array(
                                array("I", "V", "X"),
                                array("X", "L", "C"),
                                array("C", "D", "M"),
                                array("M", "M", "M"),
                                array("M", "M", "M")
                        );

                        $translation = array();

                        for ($i = 0; $i < strlen($text); $i++) {
                            $tempArray = $romanArray[$i];
                            $zero = null;
                            $one = $tempArray[0];
                            $two = "$tempArray[0]$tempArray[0]";
                            $three = "$tempArray[0]$tempArray[0]$tempArray[0]";
                            $four = "$tempArray[0]$tempArray[1]";
                            $five = $tempArray[1];
                            $siz = "$tempArray[1]$tempArray[0]";
                            $seven = "$tempArray[1]$tempArray[0]$tempArray[0]";
                            $eight = "$tempArray[1]$tempArray[0]$tempArray[0]$tempArray[0]";
                            $nine = "$tempArray[0]$tempArray[2]";

                            if ($i < 3) {
                                if ($text[$i] == 0) {
                                    array_unshift($translation, $zero);
                                } elseif ($text[$i] == 1) {
                                    array_unshift($translation, $one);
                                } elseif ($text[$i] == 2) {
                                    array_unshift($translation, $two);
                                } elseif ($text[$i] == 3) {
                                    array_unshift($translation, $three);
                                } elseif ($text[$i] == 4) {
                                    array_unshift($translation, $four);
                                } elseif ($text[$i] == 5) {
                                    array_unshift($translation, $five);
                                } elseif ($text[$i] == 6) {
                                    array_unshift($translation, $six);
                                } elseif ($text[$i] == 7) {
                                    array_unshift($translation, $seven);
                                } elseif ($text[$i] == 8) {
                                    array_unshift($translation, $eight);
                                } elseif ($text[$i] == 9) {
                                    array_unshift($translation, $nine);
                                }     
                            } elseif ($i > 2) {
                                $digit = null;
                                if ($i == 0) {
                                    $digit = ($text[$i]*10);
                                } elseif ($i != 0) {
                                    $digit = $text[$i];
                                }
                                for($j = 0; $j < ($digit); $j++) {
                                    array_unshift($translation, "M");
                                }
                            }
                        }
                        $romanNum = implode("", $translation);
                        echo "<div class='output'>$romanNum</div>";
                    }

                    translate($toTranslateRev);
                }
            ?>

        </div>
    </main>
</body>