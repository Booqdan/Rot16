<?php

function rot($string){
    $alfabetSmall = 'a b c d e f g h i j k l m n o p q r s t u v w x y z';
    $alfabetBig = 'A B C D E F G H I J K L M N O P Q R S T U W V X Y Z';

    $alfabetSmallx2= 'a b c d e f g h i j k l m n o p q r s t u v w x y z a b c d e f g h i j k l m n o p q r s t u v w x y z';
    $alfabetBigx2= 'A B C D E F G H I J K L M N O P Q R S T U W V X Y Z A B C D E F G H I J K L M N O P Q R S T U W V X Y Z';

    $explodedAlfabetSmall= explode(' ', $alfabetSmall);
    $explodedAlfabetBig= explode(' ', $alfabetBig);
    $explodedAlfabetSmallx2 = explode(' ', $alfabetSmallx2);
    $explodedBigAlfabetx2 = explode(' ', $alfabetBigx2);

    $textTab = str_split($string);
    $countString = count($textTab);
    $countAlfabet = count($explodedAlfabetSmall);
    echo $string.'<br>';

    for($i = 0; $i < $countString; $i++){
        for($j = 0; $j < $countAlfabet; $j++){
            if($textTab[$i] == $explodedAlfabetSmall[$j]){
                $textTab[$i] = $explodedAlfabetSmallx2[$j+16];
                break;
            }
            elseif($textTab[$i] == $explodedAlfabetBig[$j]){
                $textTab[$i] = $explodedBigAlfabetx2[$j+16];
                break;
            }
        }
    }
    $implodedString = implode('', $textTab);
    echo $implodedString;
}
?>

<!DOCTYPE html>
<html lang="en">
<title>ROT16</title>
<head>
    <legend>ROT16</legend>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

</head>

<body>
<div id="wrap">
    <div class="container">
        <div class="row">

            <form action = "index.php" method="post">
                <textarea name="alfabet"></textarea>
                <button type="submit" class="btn btn-danger">Dodaj</button>
            </form>
        </div>
        <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $string = $_POST['alfabet'];
            rot($string);
        }
        ?>
    </div>
</div>
</body>
</html>
