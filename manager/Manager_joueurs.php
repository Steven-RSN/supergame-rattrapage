<?php


class Manager_joueurs extends Model_joueurs
{

    public function addPlayer(): string
    {
        $pseudo = $this->getPseudo();
        $email  = $this->getEmail();
        $password = $this->getPassword();
        $score    = $this->getScore();

        try {
            $request = $this->getBdd()->prepare('INSERT INTO players( email, pseudo, score, psswrd) VALUE(?,?,?,?)');

            $request->bindParam(1, $email, PDO::PARAM_STR);
            $request->bindParam(2, $pseudo, PDO::PARAM_STR);
            $request->bindParam(3, $score, PDO::PARAM_INT);
            $request->bindParam(4, $password, PDO::PARAM_STR);

            $request->execute();

            return 'Vous avez bien été enregistré ! Bravo !';
        } catch (EXCEPTION $e) {
            return $e->getMessage();
        }
    }

    public function getPlayers(): array|string
    {
        try {
            $request = $this->getBdd()->prepare('SELECT id , pseudo, email, psswrd, score FROM players');

            $request->execute();

            $dataPlayers = $request->fetchAll(PDO::FETCH_ASSOC);
            return $dataPlayers;
        } catch (EXCEPTION $e) {
            return $e->getMessage();
        }
    }

    public function getPlayerByMail(): array|string
    {
        try {
            $request = $this->getBdd()->prepare('SELECT id , pseudo, psswrd, score FROM players WHERE ?');

            $email = $this->getEmail();
            $request-> bindParam(1,$email,PDO::PARAM_STR);

            $request->execute();

            $dataPlayer= $request->fetchAll(PDO::FETCH_ASSOC);
            return $dataPlayer;

        } catch (EXCEPTION $e) {
            return $e->getMessage();
        }
    }
}
