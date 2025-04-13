<?php
//MODEL POUR LA TABLE JOUEURS

class Model_joueurs{

    private ?int    $id;
    private ?string $pseudo;
    private ?string $email;
    private ?int    $score;
    private ?string $password;
    private ?PDO    $bdd;

    public function __construct(){
        $this->bdd = connect();
    }
    




    /**
     * Get the value of id
     *
     * @return ?int
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param ?int $id
     *
     * @return self
     */
    public function setId(?int $id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of pseudo
     *
     * @return ?string
     */
    public function getPseudo(): ?string {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @param ?string $pseudo
     *
     * @return self
     */
    public function setPseudo(?string $pseudo): self {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * Get the value of email
     *
     * @return ?string
     */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param ?string $email
     *
     * @return self
     */
    public function setEmail(?string $email): self {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of score
     *
     * @return ?int
     */
    public function getScore(): ?int {
        return $this->score;
    }

    /**
     * Set the value of score
     *
     * @param ?int $score
     *
     * @return self
     */
    public function setScore(?int $score): self {
        $this->score = $score;
        return $this;
    }

    /**
     * Get the value of password
     *
     * @return ?string
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param ?string $password
     *
     * @return self
     */
    public function setPassword(?string $password): self {
        $this->password = $password;
        return $this;
    }

    /**
     * Get the value of bdd
     *
     * @return ?PDO
     */
    public function getBdd(): ?PDO {
        return $this->bdd;
    }

    /**
     * Set the value of bdd
     *
     * @param ?PDO $bdd
     *
     * @return self
     */
    public function setBdd(?PDO $bdd): self {
        $this->bdd = $bdd;
        return $this;
    }
}
?>