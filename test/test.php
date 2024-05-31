<?php

include_once "books/Livre.php";
include_once "books/LivreNumerique.php";
include_once "users/Utilisateur.php";
include_once "users/MembreBibliotheque.php";
include_once "Bibliotheque.php";

$book = new Livre("Tchoupi", "TchoupiAuthor", 1885);

$book->showDetails();

$user1 = new Utilisateur("John", "Doe");

$user1->showFullName();

$ebook1 = new LivreNumerique("ETchoupi", "ETchoupiAuthor", 1885, 15);

$ebook1->showDetails();

$member1 = new MembreBibliotheque("John", "Doe", 1234567890);

$member1->showFullName();

$lib = new Bibliotheque("Super Bibliotheque", "A coté de chez moi", $book, $ebook1);

$ebook1 = new LivreNumerique("Php pour les nuls", "Moi", 2024, 1);
$ebook2 = new LivreNumerique("Php pour les nuls 2", "Moi2", 2025, 2);

$member1->showBorrowedBooks();
$lib->addBook($ebook1, $ebook2);

$lib->borrow($member1, $ebook1);


foreach ($lib->books as $b) {
	$b->showDetails();
}

$member1->showBorrowedBooks();

$lib->return($member1, $ebook1);

foreach ($lib->books as $b) {
	$b->showDetails();
}

$member1->showBorrowedBooks();

// ====================

$lib->borrowFromName($member1, "Php pour les nuls 2");


foreach ($lib->books as $b) {
	$b->showDetails();
}

$member1->showBorrowedBooks();

$lib->returnFromName($member1, "Php pour les nuls 2");

foreach ($lib->books as $b) {
	$b->showDetails();
}

$member1->showBorrowedBooks();