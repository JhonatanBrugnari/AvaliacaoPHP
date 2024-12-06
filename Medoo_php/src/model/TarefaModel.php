<?php
require __DIR__ . '/../../config/config_Db.php';
date_default_timezone_set('America/Sao_Paulo');


class TarefaModel
{
    private $db;

     //contrutor da classe
    public function __construct($db)
    {
        $this->db = $db;
    }
    //cria uma nova tarefa
    public function createTarefa($descricao, $prioridade, $exec, $resp)
    {
        $this->db->insert('tarefas', [
            'descricao' => $descricao,

            'prioridade' => $prioridade,
            'data_execucao' => $exec,
            'responsavel_id' => $resp,
            'data_cadastro' => date_format(date_create("now"), "Y/m/d H:i:s"),
            'prazo_limite' => date('Y-m-d', strtotime($exec . ' +1 day'))
        ]);
        return $this->db->id();
    }
     //busca todas as tarefas no banco
    public function getTarefas()
    {
        return $this->db->select("tarefas", "*");
        while ($linha = mysqli_fetch_assoc($db)) {
            $descricao = $linha["descricao"];
        }
    }


    // seleciona tarefas por id
    public function getTarefaById($id)
    {

        return $this->db->select('tarefas', '*', ['id' => (int) $id]);
    }
     // seleciona tarefas por nome
    public function getTarefaByname($name)
    {

        return $this->db->select('tarefas', '*', ['name' => $name]);
    }

     // função responsavel pelo funcionamento do filtro
    public function getByResponsavelId($where)
    {
        if (empty($where)) {
            return $this->db->select('tarefas', '*');
        } else {
            return $this->db->select('tarefas', '*', [
                'AND' => $where,
            ]);
        }
    }



}
