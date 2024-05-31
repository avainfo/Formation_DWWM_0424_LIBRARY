<?php

require_once "Livre.php";

class LivreNumerique extends Livre
{

    private int $fileSize;

    public function __construct($title, $author, $publicationYear, $fileSize)
    {
        parent::__construct($title, $author, $publicationYear);
        $this->fileSize = $fileSize;
        $this->details[] = $fileSize;
    }

}