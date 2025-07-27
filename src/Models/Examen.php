<?php

namespace App\Models;

use PDO;

class Examen extends BaseModel
{
    private ?int $id = null;
    private string $nom;

    //----------------------------//
    // ------GETTERS -------------//
    //----------------------------//
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    //----------------------------//
    // ------ SETTERS ------------//
    //----------------------------//
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    // --- Méthodes CRUD ---

    // Récupérer tous les examens
    public static function all(PDO $pdo): array
    {
        $stmt = $pdo->query("SELECT * FROM examen");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    // Trouver un examen par ID
    public static function find(PDO $pdo, int $id): ?self
    {
        $stmt = $pdo->prepare("SELECT * FROM examen WHERE id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetch() ?: null;
    }

    // Enregistrer un nouvel examen
    public function save(PDO $pdo): bool
    {
        $stmt = $pdo->prepare("INSERT INTO examen (nom) VALUES (?)");
        return $stmt->execute([$this->nom]);
    }

    // Mettre à jour un examen existant
    public function update(PDO $pdo): bool
    {
        if (!$this->id) return false;
        $stmt = $pdo->prepare("UPDATE examen SET nom = ? WHERE id = ?");
        return $stmt->execute([$this->nom, $this->id]);
    }

    // Supprimer un examen
    public function delete(PDO $pdo): bool
    {
        if (!$this->id) return false;
        $stmt = $pdo->prepare("DELETE FROM examen WHERE id = ?");
        return $stmt->execute([$this->id]);
    }
}

?>
