<?php

namespace App\Models;

use PDO;

class Correction extends BaseModel
{
    private ?int $id = null;
    private ?int $id_professeur = null;
    private ?int $id_epreuve = null;
    private ?string $date = null; // format 'YYYY-MM-DD'
    private ?int $nbr_copie = null;

    //----------------------------//
    // ------GETTERS -------------//
    //----------------------------//
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProfesseur(): ?int
    {
        return $this->id_professeur;
    }

    public function getIdEpreuve(): ?int
    {
        return $this->id_epreuve;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function getNbrCopie(): ?int
    {
        return $this->nbr_copie;
    }

    //----------------------------//
    // ------ SETTERS ------------//
    //----------------------------//
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setIdProfesseur(?int $id_professeur): void
    {
        $this->id_professeur = $id_professeur;
    }

    public function setIdEpreuve(?int $id_epreuve): void
    {
        $this->id_epreuve = $id_epreuve;
    }

    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    public function setNbrCopie(?int $nbr_copie): void
    {
        $this->nbr_copie = $nbr_copie;
    }

    // --- Méthodes CRUD ---

    // Récupérer toutes les corrections
    public static function all(PDO $pdo): array
    {
        $stmt = $pdo->query("SELECT * FROM correction");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    // Trouver une correction par ID
    public static function find(PDO $pdo, int $id): ?self
    {
        $stmt = $pdo->prepare("SELECT * FROM correction WHERE id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetch() ?: null;
    }

    // Enregistrer une nouvelle correction
    public function save(PDO $pdo): bool
    {
        $stmt = $pdo->prepare("INSERT INTO correction (id_professeur, id_epreuve, date, nbr_copie) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$this->id_professeur, $this->id_epreuve, $this->date, $this->nbr_copie]);
    }

    // Mettre à jour une correction existante
    public function update(PDO $pdo): bool
    {
        if (!$this->id) return false;
        $stmt = $pdo->prepare("UPDATE correction SET id_professeur = ?, id_epreuve = ?, date = ?, nbr_copie = ? WHERE id = ?");
        return $stmt->execute([$this->id_professeur, $this->id_epreuve, $this->date, $this->nbr_copie, $this->id]);
    }

    // Supprimer une correction
    public function delete(PDO $pdo): bool
    {
        if (!$this->id) return false;
        $stmt = $pdo->prepare("DELETE FROM correction WHERE id = ?");
        return $stmt->execute([$this->id]);
    }
}

?>
