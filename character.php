<?php
class Character{
    public $name;
    public $health=100;
    public $stamina=100;
    public $manna=100;

    function __construct($name){
        $this->name = $name;
    }

    function walk(){
        $this->stamina -= 1;
    }

    function run(){
        $this->stamina -= 3;
    }

    function showStats(){
        echo "Name : ".$this->name."<br>Health :".$this->health."<br>Stamina :".$this->stamina."<br>Manna :".$this->manna;
    }
}

// $test = new Character("Sample");
// $test->walk();
// $test->walk();
// $test->walk();
// $test->run();
// $test->run();
// $test->showStats();

?>