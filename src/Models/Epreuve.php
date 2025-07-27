<?php

namespace App\Models;

use PDO;

class Epreuve extends BaseModel
{
    private ?int $id = null;
    private string $nom;
    private string $type; // 'écrit' or 'oral'
    private ?int $id_examen = null;

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

    public function getType(): string
    {
        return $this->type;
    }

    public function getIdExamen(): ?int
    {
        return $this->id_examen;
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

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function setIdExamen(?int $id_examen): void
    {
        $this->id_examen = $id_examen;
    }

    // --- Méthodes CRUD ---

    // Récupérer toutes les épreuves
    public static function all(PDO $pdo): array
    {
        $stmt = $pdo->query("SELECT * FROM epreuve");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    // Trouver une épreuve par ID
    public static function find(PDO $pdo, int $id): ?self
    {
        $stmt = $pdo->prepare("SELECT * FROM epreuve WHERE id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetch() ?: null;
    }

    // Enregistrer une nouvelle épreuve
    public function save(PDO $pdo): bool
    {
        $stmt = $pdo->prepare("INSERT INTO epreuve (nom, type, id_examen) VALUES (?, ?, ?)");
        return $stmt->execute([$this->nom, $this->type, $this->id_examen]);
    }

    // Mettre à jour une épreuve existante
    public function update(PDO $pdo): bool
    {
        if (!$this->id) return false;
        $stmt = $pdo->prepare("UPDATE epreuve SET nom = ?, type = ?, id_examen = ? WHERE id = ?");
        return $stmt->execute([$this->nom, $this->type, $this->id_examen, $this->id]);
    }

    // Supprimer une épreuve
    public function delete(PDO $pdo): bool
    {
        if (!$this->id) return false;
        $stmt = $pdo->prepare("DELETE FROM epreuve WHERE id = ?");
        return $stmt->execute([$this->id]);
    }
}

?>
