<?php

require_once "element.php";
require_once "player.php";

class Game
{
    public  function startGame()
    {
        $rock = new Element("Rock");
        $paper = new Element("Paper");
        $scissors = new Element("Scissors");
        $lizard = new Element("Lizard");
        $spock = new Element("Spock");

        $paper->setBeats([$rock,$spock]);
        $scissors->setBeats([$paper,$lizard]);
        $lizard->setBeats([$paper,$spock]);
        $rock->setBeats([$scissors,$lizard]);
        $spock->setBeats([$scissors,$rock]);

        $elements = [$rock,$paper,$scissors,$lizard,$spock];

        foreach ($elements as $key=>$element) {
            echo "[{$key}] {$element->getName()}" . PHP_EOL;
        }

        $playerSelection = (int)readline("Choose the element: ");
        $selectedElement = $elements[$playerSelection];
        $pcSelectedElement = $elements[array_rand($elements)];

        $player = new Player("Ilya", $selectedElement);
        $computer = new Player("Computer", $pcSelectedElement);

        echo $selectedElement->getName() . " VS " . $pcSelectedElement->getName() . PHP_EOL;
        echo "Your choice is : " . $selectedElement->getName() . PHP_EOL;
        if($selectedElement->getName() === $pcSelectedElement->getName()){
            echo "Draw";
            exit;
        }
        else {
            foreach ($selectedElement->getBeats() as $element)
             {
                if ($pcSelectedElement->getName() === $element->getName()) {
                    echo $player->getPlayer() . " won\n";
                    exit;
                }
            }
            echo $computer->getPlayer() . " won\n";
        }
    }
}

$test = new Game();
$test->startGame();
