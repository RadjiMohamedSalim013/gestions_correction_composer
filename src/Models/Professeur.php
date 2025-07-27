<?php

namespace App\Models;

use PDO;

class Professeur extends BaseModel
{
    private ?int $id = null;
    private string $nom;
    private string $prenom;
    private string $grade;
    private ?int $id_etab = null;

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

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getGrade(): string
    {
        return $this->grade;
    }

    public function getIdEtab(): ?int
    {
        return $this->id_etab;
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

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function setGrade(string $grade): void
    {
        $this->grade = $grade;
    }

    public function setIdEtab(?int $id_etab): void
    {
        $this->id_etab = $id_etab;
    }

    // --- Méthodes CRUD ---

    // Récupérer tous les professeurs
    public static function all(PDO $pdo): array
    {
        $stmt = $pdo->query("SELECT * FROM professeur");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    // Trouver un professeur par ID
    public static function find(PDO $pdo, int $id): ?self
    {
        $stmt = $pdo->prepare("SELECT * FROM professeur WHERE id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetch() ?: null;
    }

    // Enregistrer un nouveau professeur
    public function save(PDO $pdo): bool
    {
        $stmt = $pdo->prepare("INSERT INTO professeur (nom, prenom, grade, id_etab) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$this->nom, $this->prenom, $this->grade, $this->id_etab]);
    }

    // Mettre à jour un professeur existant
    public function update(PDO $pdo): bool
    {
        if (!$this->id) return false;
        $stmt = $pdo->prepare("UPDATE professeur SET nom = ?, prenom = ?, grade = ?, id_etab = ? WHERE id = ?");
        return $stmt->execute([$this->nom, $this->prenom, $this->grade, $this->id_etab, $this->id]);
    }

    // Supprimer un professeur
    public function delete(PDO $pdo): bool
    {
        if (!$this->id) return false;
        $stmt = $pdo->prepare("DELETE FROM professeur WHERE id = ?");
        return $stmt->execute([$this->id]);
    }
}

?>
