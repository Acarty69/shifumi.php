
<?php
    session_start();
    if(empty($_SESSION['manche']))
    {
        $_SESSION['manche']=0;
        $_SESSION['scoreu']=0;
        $_SESSION['score2']=0;
    }

    if(empty($_SESSION['partie']))
    {
        $_SESSION['partie']=0;
    }
$tableau=["pierre","feuille","ciseau"];
$random=$tableau[rand(0,2)];



    if(isset($_POST['choix']))
    {
        
        $choix=$_POST['choix'];
        function shifumi($choix,$random)
        {
            if($choix == $random)
            {
                echo "égalité";
                file_put_contents('logs.txt',"l'utilisateur a fait égalité avec". $choix ."\n" ,FILE_APPEND);
                
            }
            elseif ($choix == "feuille" and $random == "pierre" or $choix == "pierre" and $random == "ciseau" or $choix == "ciseau"and $random == "feuille")
            {
                echo "c'est gagné ";
                file_put_contents('logs.txt',"l'utilisateur a gagné avec ". $choix ."\n" ,FILE_APPEND);
                $_SESSION['manche']++;
                $_SESSION['scoreu']++;

                if ($_SESSION['partie'] < 3)
                {

                if ($_SESSION['manche'] >= 3 and  $_SESSION['scoreu'] >= 2)
                {
                    file_put_contents("score.txt"," le score est ". $_SESSION['scoreu'] . " pour l'utilisateur et " .$_SESSION['score2']. " pour l'ordinateur pour la partie " . $_SESSION['partie'] + 1 . " \n",FILE_APPEND);
                    unset($_SESSION['manche']);
                    echo "c'est fini et bien joué pour ta victoire";
                    $_SESSION['partie']++;
                }
                elseif ($_SESSION['manche'] >= 3)
                {
                    "c'est fini et t'as perdu ";
                    file_put_contents("score.txt"," le score est ". $_SESSION['scoreu'] . " pour l'utilisateur et " .$_SESSION['score2']. " pour l'ordinateur pour la partie " . $_SESSION['partie'] + 1 . " \n",FILE_APPEND);
                    unset($_SESSION['manche']);
                    $_SESSION['partie']++;
                }
                }
                else
                {
                    unset($_SESSION['partie']);
                    $score=file_get_contents('score.txt');
                    echo $score;
                    file_put_contents('score.txt'," ");
                }
            }

            elseif ($choix == "ciseau" and $random == "pierre" or $choix == "feuille" and $random == "ciseau" or $choix == "pierre"and $random == "feuille")
            {
                echo "c'est perdu ";
                file_put_contents('logs.txt',"l'utilisateur a perdu avec ". $choix ."\n" ,FILE_APPEND);
                $_SESSION['manche']++;
                $_SESSION['score2']++;
                
                
                if ($_SESSION['partie'] < 3)
                {

                    if ($_SESSION['manche'] >= 3 and  $_SESSION['scoreu'] >= 2)
                    {
                    file_put_contents("score.txt"," le score est ". $_SESSION['scoreu'] . " pour l'utilisateur et " .$_SESSION['score2']. " pour l'ordinateur pour la partie " . $_SESSION['partie'] + 1 . " \n",FILE_APPEND);
                    unset($_SESSION['manche']);
                    echo " c'est fini et bien joué pour ta victoire de la manche";
                    $_SESSION['partie']++;
                
                    }
                    elseif ($_SESSION['manche'] >= 3)
                    {
                    "c'est fini et t'as perdu";
                    file_put_contents("score.txt"," le score est ". $_SESSION['scoreu'] . " pour l'utilisateur et " .$_SESSION['score2']. " pour l'ordinateur pour la partie " . $_SESSION['partie'] + 1 . " \n",FILE_APPEND);
                    unset($_SESSION['manche']);
                    $_SESSION['partie']++;
                    }
                    

                }
                else
                {
                unset($_SESSION['partie']);
                $score=file_get_contents('score.txt');
                echo $score;
                file_put_contents('score.txt'," ");
                }
            }
        }
        var_dump($_SESSION);
        shifumi($choix,$random);
    }
    else
    {
        echo "choisis";
    }

    /* if(isset($_GET['choix']))
    {
        
        if($_GET['choix'] == "feuille" and $tableau[rand(0,2)] == "feuille")
        {
            echo "égalité";
            file_put_contents('logs.txt',"l'utilisateur a fait égalité avec feuille \n",FILE_APPEND);
        }
        elseif($_GET['choix'] == "feuille" and $tableau[rand(0,2)] == "pierre")
        {
            echo "c'est gagner";
            file_put_contents('logs.txt',"l'utilisateur a gagné avec feuille \n",FILE_APPEND);
        }
        elseif($_GET['choix'] == "feuille" and $tableau[rand(0,2)] == "ciseau")
        {
            echo "c'est perdu";
            file_put_contents('logs.txt',"l'utilisateur a perdu avec feuille \n",FILE_APPEND);
        }
        elseif($_GET['choix'] == "pierre" and $tableau[rand(0,2)] == "feuille")
        {
            echo "c'est perdu";
            file_put_contents('logs.txt',"l'utilisateur a perdu avec pierre \n",FILE_APPEND);
        }
        elseif($_GET['choix'] == "pierre" and $tableau[rand(0,2)] == "pierre")
        {
            echo "égalité";
            file_put_contents('logs.txt',"l'utilisateur a fait égalité avec pierre \n",FILE_APPEND);
        }
        elseif($_GET['choix'] == "pierre" and $tableau[rand(0,2)] == "ciseau")
        {
            echo "c'est gagner";
            file_put_contents('logs.txt',"l'utilisateur a gagné avec pierre \n",FILE_APPEND);
        }
        elseif($_GET['choix'] == "ciseau" and $tableau[rand(0,2)] == "feuille")
        {
            echo "c'est gagner";
            file_put_contents('logs.txt',"l'utilisateur a gagné avec ciseau \n",FILE_APPEND);
        }
        elseif($_GET['choix'] == "ciseau" and $tableau[rand(0,2)] == "pierre")
        {
            echo "c'est perdu";
            file_put_contents('logs.txt',"l'utilisateur a perdu avec ciseau \n",FILE_APPEND);
        }
        elseif($_GET['choix'] == "ciseau" and $tableau[rand(0,2)] == "ciseau")
        {
            echo "égalité";
            file_put_contents('logs.txt',"l'utilisateur a fait égalité avec ciseau \n",FILE_APPEND);
        }
        
    }
    else
    {
        echo "choisis";
    } */
?>

<html>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form name="shifumi" action="index2.php" method="post">
            <label for="choix">Choisis pierre, feuille ou ciseau</label>
            <input name="choix" type="submit" value="pierre">
            <input name="choix" type="submit" value="feuille">
            <input name="choix" type="submit" value="ciseau">
        </form>
    </body>
    </html>
</html>

