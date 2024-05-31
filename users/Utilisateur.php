<?php

include_once "Log.php";

class Utilisateur
{
    private string $firstName;
    private string $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function showFullName(): void
    {
        logln($this->firstName . " " . $this->lastName);
    }
}