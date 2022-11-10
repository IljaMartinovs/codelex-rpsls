<?php

class Player
{
    private string $name;
    private element $element;

    public function __construct(string $name, element $element)
    {
        $this->name = $name;
        $this->element = $element;
    }

    public function getPlayer(): string
    {
        return $this->name;
    }

    public function getElement(): element
    {
        return $this->element;
    }

}