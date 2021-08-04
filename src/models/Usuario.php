<?php 

namespace jon\autenticacao\models;

use Doctrine\ORM\Mapping as ORM;
use jon\autenticacao\errors\InvalidPasswordException;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuarios")
 */
class Usuario
{
    /**
     * @ORM\Column(type="string")
     */
    private string $nomeCompleto;
    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $dataNascimento;
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    private string $email;
    /**
     * @ORM\Column(type="string")
     */
    private string $login;
    /**
     * @ORM\Column(type="string")
     */
    private string $senha;

    public function __construct(){}

    public function getNomeCompleto()
    {
        return $this->nomeCompleto;
    }

    public function setNomeCompleto($nomeCompleto)
    {
        $this->nomeCompleto = $nomeCompleto;

        return $this;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function cadastrarSenha(string $senha){

        if(!preg_match('/[a-zA-z]+.*\d+/', $senha) && !preg_match('/\d+.*[a-zA-z]+/', $senha)){
            throw new InvalidPasswordException('Senha deve conter letras e numeros');
        }
        
        if(!preg_match('/.{6,}/', $senha)){
            throw new InvalidPasswordException('Senha deve conter, ao menos, 6 dígitos');
        }

        $senhaHash = password_hash($senha, PASSWORD_ARGON2I);
        $this->senha = $senhaHash;
    }

    public function verificarSenha(string $senha){
        return password_verify($senha, $this->senha);
    }
}