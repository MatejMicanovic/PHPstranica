CREATE TABLE clanci (
    id INT AUTO_INCREMENT PRIMARY KEY,
    datum DATE NOT NULL,
    naslov VARCHAR(255) NOT NULL,
    sazetak TEXT NOT NULL,
    tekst TEXT NOT NULL,
    slika VARCHAR(255) NOT NULL,
    kategorija VARCHAR(50) NOT NULL,
    arhiva TINYINT(1) NOT NULL DEFAULT 0,
    autor VARCHAR(100) NOT NULL
);