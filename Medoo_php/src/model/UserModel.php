<?php
require __DIR__ . '/../../config/config_Db.php';


class UserModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Create
    public function createUser($name, $email, $cpf)
    {
        $this->db->insert('colaboradores', [
            'nome' => $name,
            'email' => $email,
            'cpf' => $cpf

        ]);
        return $this->db->id();

    }
    // Read all users
    public function getUsers()
    {
        return $this->db->select("colaboradores", "*");
        while ($linha = mysqli_fetch_assoc($db)) {
            $descricao = $linha["nome"];
        }
    }



    public function getByUserId($id)
    {

        return $this->db->get('colaboradores', 'nome', ['id' => (int) $id]);
    }
    
    public function getResponsavelByName($nome)
    {

        return $this->db->get('colaboradores', 'id', ["nome[~]" => $nome]);
    }
    


   
   


}



