<?php

require_once "Log.php";

/**
 * Classe qui représente un livre
 */
class Livre
{
	/**
	 * @var string Titre du livre
	 */
    private string $title;
	/**
	 * @var string Auteur(e) du livre
	 */
    private string $author;
	/**
	 * @var int Année de publication du livre
	 */
    private int $publicationYear;
	/**
	 * @var array Details concernant le livre
	 */
    protected array $details;

	/**
	 * @param string $title Titre du livre
	 * @param string $author Auteur(e) du livre
	 * @param int $publicationYear Année de publication du livre
	 */
    public function __construct(string $title, string $author, int $publicationYear)
    {
        $this->title = $title;
        $this->author = $author;
        $this->publicationYear = $publicationYear;
        $this->details = array($title, $author, $publicationYear);
    }

	/**
	 * Permet de voir les détails du livre
	 * @return void
	 */
    public function showDetails(): void
    {
        logln("Details :");
		foreach ($this->details as $detail) {
			logln(" - " . $detail);
		}
    }

	/**
	 * Retourne le titre du livre
	 * @return string Titre du livre
	 */
	public function getTitle(): string
	{
		return $this->title;
	}
}









