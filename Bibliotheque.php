<?php

include_once "users/MembreBibliotheque.php";
include_once "books/Livre.php";

class Bibliotheque
{
	private string $name;
	private string $address;
	public array $books;

	public function __construct($name, $address, ...$books)
	{
		$this->name = $name;
		$this->address = $address;
		$this->books = $books;
	}

	public function borrow(MembreBibliotheque $user, Livre $book): void
	{
		if (in_array($book, $this->books)) {
			$user->borrowBook($book);
			unset($this->books[array_search($book, $this->books)]);
		}
	}

	public function return(MembreBibliotheque $user, Livre $book): void
	{
		if ($user->return($book)) {
			$this->books[] = $book;
		}
	}

	public function borrowFromName(MembreBibliotheque $user, string $bookName): void
	{
		foreach ($this->books as $book) {
			if($book->getTitle() == $bookName) {
				$user->borrowBook($book);
				unset($this->books[array_search($book, $this->books)]);
				break;
			}
		}
	}

	public function returnFromName(MembreBibliotheque $user, string $bookName)
	{
		$returnedBook = $user->returnFromName($bookName);
		if($returnedBook != null) {
			$this->books[] = $returnedBook;
		}
	}

	public function addBook(Livre ...$book): void
	{
		$this->books = array_merge($this->books, $book);

		/*
		 * foreach ($book as $b) {
		 *     $this->books[] = $b;
		 * }
		 */
	}
}