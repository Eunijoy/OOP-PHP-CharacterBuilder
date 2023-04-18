<?php
include_once("character.php");
class Shaman extends Character{
    public $health = 150;
     function heal(){
        $this->health += 5;
        $this->stamina += 5;
        $this->manna += 5;
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
        <h1>Shaman Character</h1>
        <div class="container">
            <img src="img/shaman.gif" alt="shaman"><br>
        </div>

        <div class="container">
                <?php
                $shamanObj = new Shaman("SampleName");
                $shamanObj->walk();
                $shamanObj->walk();
                $shamanObj->walk();
                $shamanObj->run();
                $shamanObj->run();
                $shamanObj->heal();
                $shamanObj->showStats();
            ?>
        </div>

        <a href="index.php">Back to main</a>
</body>
</html>