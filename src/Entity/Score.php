<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $score = null;

    #[ORM\Column(nullable: true)]
    private ?float $guess_x = null;

    #[ORM\Column(nullable: true)]
    private ?float $guess_y = null;

    #[ORM\Column(nullable: true)]
    private ?float $real_x = null;

    #[ORM\Column(nullable: true)]
    private ?float $real_y = null;

    #[ORM\ManyToOne(inversedBy: 'scores')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Game $game_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getGuessX(): ?float
    {
        return $this->guess_x;
    }

    public function setGuessX(?float $guess_x): self
    {
        $this->guess_x = $guess_x;

        return $this;
    }

    public function getGuessY(): ?float
    {
        return $this->guess_y;
    }

    public function setGuessY(?float $guess_y): self
    {
        $this->guess_y = $guess_y;

        return $this;
    }

    public function getRealX(): ?float
    {
        return $this->real_x;
    }

    public function setRealX(?float $real_x): self
    {
        $this->real_x = $real_x;

        return $this;
    }

    public function getRealY(): ?float
    {
        return $this->real_y;
    }

    public function setRealY(?float $real_y): self
    {
        $this->real_y = $real_y;

        return $this;
    }

    public function getGameId(): ?Game
    {
        return $this->game_id;
    }

    public function setGameId(?Game $game_id): self
    {
        $this->game_id = $game_id;

        return $this;
    }
}
