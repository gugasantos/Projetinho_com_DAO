<?php
require_once 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO{
    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    public function searchingAll($usuario, $senha){
    
        $sql = $this->pdo->prepare("SELECT * FROM usuarios where nome = :usuario and senha = :senha");
        $sql->bindValue(":usuario" ,$usuario);
        $sql->bindValue(":senha" ,$senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            return True;
        }
        else{
            return False;
        }
    }
    public function findByEmail($email){
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email',$email);
        $sql->execute();
    
        if($sql->rowCount() > 0){    
            return True;
        }
        else{
            return False;
        }


}
    public function add(usuario $u){
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome,senha,email) VALUES (:nome,:senha,:email)");
        $sql->bindValue("nome",$u->getNome());
        $sql->bindValue("senha",$u->getSenha());
        $sql->bindValue("email",$u->getEmail());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId() );
        return $u;
    }
    public function findAll(){


    }
    public function findById($id){

    }
    public function update(Usuario $u){


    }
    public function delete($id){


    }

}