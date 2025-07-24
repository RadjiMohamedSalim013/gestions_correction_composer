CREATE TABLE `etablissement` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nom` varchar(50) NOT NULL UNIQUE,
  `ville` varchar(50) DEFAULT NULL
);

CREATE TABLE `examen` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nom` varchar(100) NOT NULL
);

CREATE TABLE `epreuve` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` varchar(50) NOT NULL,
  `type` enum('écrit','oral') NOT NULL,
  `id_examen` INT,
  FOREIGN KEY (id_examen) REFERENCES examen (id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `professeur` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `grade` varchar(30) NOT NULL,
  `id_etab` INT,
  FOREIGN KEY (id_etab) REFERENCES etablissement (id) ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE TABLE `correction` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_professeur` INT,
  `id_epreuve` INT,
  `date` date DEFAULT NULL,
  `nbr_copie` int(11) DEFAULT NULL,
  UNIQUE KEY unique_couple (id_professeur, id_epreuve),
  FOREIGN KEY (id_professeur) REFERENCES professeur (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_epreuve) REFERENCES epreuve (id) ON DELETE CASCADE ON UPDATE CASCADE
);