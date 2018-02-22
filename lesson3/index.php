<!doctype html>
<html lang=ru>
<head>
    <meta charset="UTF-8">
    <title>Домашка №3</title>
</head>
<body>
    <h2>Задание 1</h2>
    <p>
        Числа делящиеся на 3 без остатка:<br>
        <?php
            $i = 0;

            while($i < 100) {

                if($i % 3 === 0) {
                    echo "$i, ";
                }

                $i++;

            }
        ?>
    </p>
    <h2>Задание 2</h2>
    <p>
        <?php
            $i = 0;

            do {

                if($i === 0) {
                    echo "$i - это ноль.<br>";
                } else if($i % 2 === 0){
                    echo "$i - четное число.<br>";
                } else {
                    echo "$i - нечетное число.<br>" ;
                }

                $i++;

            } while($i <= 10)
        ?>
    </p>
    <h2>Задание 3</h2>
    <p>
        <?php
            $cities = [];
            $cities["Московская область"] = ["Москва", "Зеленоград", "Клин"];
            $cities["Ленинградская область"] = ["Выборг", "Волхов", "Кириши", "Ломоносов"];

            foreach($cities as $key => $value) {

                echo "<ul>";
                    echo "<li>$key";
                        echo "<ul>";

                        foreach($value as $index => $city) {
                            echo "<li>$city</li>";
                        }

                        echo "</ul>";
                    echo "</li>";

                echo "</ul>";
            }
        ?>
    </p>
    <h2>Задание 4</h2>
    <p>
        Функция translitor реализована при помощи <a href="http://www.php.su/preg_split">preg_split()</a>
        <br>При выполнении данного задания возникла проблема с методом str_split оказалось, что данный метод работает только с латинскии буквами... Вместо кириллицы выводит абракадабру
        <br>Так же существует метод <a href="http://www.php.su/strtr">strtr()</a>
    </p>
    <p>
        <?php
            $str = "Щетка";
            // echo strtr($str, $replace);
            echo translitor_in_eng($str);
        ?>
    </p>
    <h2>Задание 5</h2>
    <p>
        <?php
            $str = "Привет мир !";
            echo replace_s($str);
        ?>
    </p>
    <h2>Задание 6</h2>
    <p>Находится в папке task6</p>
    <h2>Задание 7</h2>
    <p>
        <?php
            for($i=0; $i < 10; do_something($i++))
        ?>
    </p>
    <h2>Задание 8</h2>
    <p>
        <?php
            search_in_array("К", $cities);
        ?>
    </p>

</body>
</html>

<?php
    /*** ФУНКЦИИ ***/

    function translitor_in_eng($str) {
        $replace = array(
            "А"=>"A","а"=>"a",
            "Б"=>"B","б"=>"b",
            "В"=>"V","в"=>"v",
            "Г"=>"G","г"=>"g",
            "Д"=>"D","д"=>"d",
            "Е"=>"E","е"=>"e",
            "Ё"=>"E","ё"=>"e",
            "Ж"=>"Zh","ж"=>"zh",
            "З"=>"Z","з"=>"z",
            "И"=>"I","и"=>"i",
            "Й"=>"I","й"=>"i",
            "К"=>"K","к"=>"k",
            "Л"=>"L","л"=>"l",
            "М"=>"M","м"=>"m",
            "Н"=>"N","н"=>"n",
            "О"=>"O","о"=>"o",
            "П"=>"P","п"=>"p",
            "Р"=>"R","р"=>"r",
            "С"=>"S","с"=>"s",
            "Т"=>"T","т"=>"t",
            "У"=>"U","у"=>"u",
            "Ф"=>"F","ф"=>"f",
            "Х"=>"Kh","х"=>"kh",
            "Ц"=>"Tc","ц"=>"tc",
            "Ч"=>"Ch","ч"=>"ch",
            "Ш"=>"Sh","ш"=>"sh",
            "Щ"=>"Shch","щ"=>"shch",
            "Ы"=>"Y","ы"=>"y",
            "Э"=>"E","э"=>"e",
            "Ю"=>"Iu","ю"=>"iu",
            "Я"=>"Ia","я"=>"ia",
            "ъ"=>"","ь"=>""
        );
        $arrStr = preg_split("//u", $str,-1, PREG_SPLIT_NO_EMPTY);
        $strOut = "";

        foreach($arrStr as $key => $value) {
            foreach($replace as $rus => $eng) {

                if($value === $rus) {
                    $strOut .= $eng;
                }

            }
        }

        return $strOut;
    }

    function replace_s($str) {
        $strOut = str_replace(' ','_', $str);
        return $strOut;
    }

    function do_something($i) {
        echo "$i ";
    }

    function search_in_array($str, $arr) {
        $matches = [];
        foreach($arr as $key => $value) {
            foreach($value as $index => $city) {

                $res = strpos($city, $str);
                if ($res === false) {

                } else {
                    $res .= ;
                }

            }
        }
        print_r($matches);
    }
?>