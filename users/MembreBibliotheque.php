<?php

require_once "Utilisateur.php";
require_once "Log.php";
require_once "books/Livre.php";

class MembreBibliotheque extends Utilisateur
{
	private int $cardNumber;
	private array $borrowedBooks;

	public function __construct($firstName, $lastName, $cardNumber)
	{
		parent::__construct($firstName, $lastName);
		$this->cardNumber = $cardNumber;
		$this->borrowedBooks = [];
	}

	public function borrowBook(Livre $book): void
	{
		// Avant version 7.0
		// if ($book instanceof Livre) {
		//     $this->borrowedBooks[] = $book;
		// }
		$this->borrowedBooks[] = $book;
	}

	public function showBorrowedBooks(): void
	{
		logln("Livre empruntés : ");
		foreach ($this->borrowedBooks as $book) {
			$book->showDetails();
		}
		logln(str_repeat("=", 10));
	}

	public function return(Livre $book): bool
	{
		if (in_array($book, $this->borrowedBooks)) {
			unset($this->borrowedBooks[array_search($book, $this->borrowedBooks)]);
			return true;
		}
		return false;
	}

	public function returnFromName(string $bookName): ?Livre
	{
		foreach ($this->borrowedBooks as $book) {
			if ($book->getTitle() == $bookName) {
				unset($this->borrowedBooks[array_search($book, $this->borrowedBooks)]);
				return $book;
			}
		}
		return null;
	}
}