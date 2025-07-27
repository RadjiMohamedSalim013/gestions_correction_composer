<?php

namespace App\Models;

use PDO;

class Etablissement
{
    private ?int $id = null;
    private string $nom;
    private string $ville;

    // --- Getters & Setters ---

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }


    // --- Getters & Setters ---
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getVille(): string
    {
        return $this->ville;
    }

    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }
    

    // --- Méthodes CRUD ---

    // Récupérer tous les établissements
    public static function all(PDO $pdo): array
    {
        $stmt = $pdo->query("SELECT * FROM etablissement");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    // Trouver un établissement par ID
    public static function find(PDO $pdo, int $id): ?self
    {
        $stmt = $pdo->prepare("SELECT * FROM etablissement WHERE id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetch() ?: null;
    }

    // Enregistrer un nouvel établissement
    public function save(PDO $pdo): bool
    {
        $stmt = $pdo->prepare("INSERT INTO etablissement (nom, ville) VALUES (?, ?)");
        return $stmt->execute([$this->nom, $this->ville]);
    }

    // Mettre à jour un établissement existant
    public function update(PDO $pdo): bool
    {
        if (!$this->id) return false;
        $stmt = $pdo->prepare("UPDATE etablissement SET nom = ?, ville = ? WHERE id = ?");
        return $stmt->execute([$this->nom, $this->ville, $this->id]);
    }

    // Supprimer un établissement
    public function delete(PDO $pdo): bool
    {
        if (!$this->id) return false;
        $stmt = $pdo->prepare("DELETE FROM etablissement WHERE id = ?");
        return $stmt->execute([$this->id]);
    }
}
