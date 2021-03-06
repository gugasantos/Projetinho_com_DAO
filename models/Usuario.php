<?php
class Usuario {
    
    private $id;
    private $nome;
    private $senha;
    private $email;

    public function getId(){
        return $this->id;
    }
    public function setId($i){
        $this->id = trim($i);
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($n){
        $this->nome = ucwords(trim($n));
    }
    public function getSenha(){
        return $this->senha;    
    }
    public function setSenha($s){
        $this->senha = trim($s);        
    }
    public function getEmail(){
        return $this->email;    
    }
    public function setEmail($e){
        $this->email = strtolower(trim($e));
    }
}


interface UsuarioDAO {
    public function add(usuario $u);
    public function findAll();
    public function findById($id);
    public function update(Usuario $u);
    public function delete($id);
}
?>