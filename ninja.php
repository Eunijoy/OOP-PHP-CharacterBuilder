<?php
include_once("character.php");
class Ninja extends Character{
    public $health = 170;
     function slash(){
        $this->manna -= 10;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character</title>
    <link rel="stylesheet" href="character.css">
</head>
<body>
        <h1>Ninja Character</h1>
        <div class="container">
            <img src="img/ninja.gif" alt=""><br>
        </div>

        <div class="container">
                <?php
                $ninjaObj = new Ninja("SampleName");
                $ninjaObj->walk();
                $ninjaObj->walk();
                $ninjaObj->walk();
                $ninjaObj->run();
                $ninjaObj->run();
                $ninjaObj->slash();
                $ninjaObj->slash();
                $ninjaObj->showStats();
            ?>
        </div>
        <a href="index.php">Back to main</a>
</body>
</html>