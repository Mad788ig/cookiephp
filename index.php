<?php
    //html form
    include("html_index.php");
?>
<?php
    function user_input_value($favthing ,$what_they_like, $days , $whatpage){
            if($favthing=="food"){
                return setcookie("fav_food","$what_they_like" ,time() + (86400 * $days) , "$whatpage");
            }
            elseif($favthing=="dessert"){
                setcookie("fav_dessert","$what_they_like" ,time() + (86400 * $days) , "$whatpage");
            }
            elseif($favthing=="drink"){
            setcookie("fav_drink","$what_they_like" ,time() + (86400 * $days) , "$whatpage");
            }               
        }
    //foreach ($_COOKIE as $key => $value){
           // echo "{$key} = {$value}<br>";
           // }
    if(isset($_POST["submit"])){
        $foodinputtheylike = filter_input(INPUT_POST,"foodinput",FILTER_SANITIZE_SPECIAL_CHARS);
        $dessertinputtheylike = filter_input(INPUT_POST,"dessertinput",FILTER_SANITIZE_SPECIAL_CHARS);
        $drinkinputtheylike = filter_input(INPUT_POST,"drinkinput",FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($foodinputtheylike)){
            echo "please enter a value<br>";
        }
        else{
            $cookie_fav_food=user_input_value("food",$foodinputtheylike,1,"/");
            echo "now the browser know you like $foodinputtheylike for the next 1 day<br>";
        }
        if(empty($dessertinputtheylike)){
            echo "please enter a value<br>";
        }
        else{
            $cookie_fav_dessert=user_input_value("dessert",$dessertinputtheylike,1,"/");
            echo "now the browser know you like $dessertinputtheylike for the next 1 day<br>";
        }
        if(empty($foodinputtheylike)){
            echo "please enter a value<br>";
        }
        else{
            $drinkinputtheylike=user_input_value("drink",$drinkinputtheylike,1,"/");
            echo "now the browser know you like $drinkinputtheylike for the next 1 day<br>";
        }
    }
?>
