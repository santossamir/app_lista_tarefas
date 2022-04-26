<?php

    #CRUD do app
    class TarefaService{

        private $conexao;
        private $tarefa;

        public function __construct(Conexao $conexao, Tarefa $tarefa){
            $this->conexao = $conexao->conectar();
            $this->tarefa = $tarefa;
        }
        public function inserir(){
            $query_inserir = 'insert into tb_tarefas(tarefa)values(:tarefa)';
            $stmt = $this->conexao->prepare($query_inserir);
            $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
            $stmt->execute();
        }

        public function recuperar(){
            $query_consultar = '
                select 
                    t.id, s.status, t.tarefa
                from
                    tb_tarefas as t
                    left join tb_status as s on (t.id_status = s.id)
            ';
            $stmt = $this->conexao->prepare($query_consultar);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function atualizar(){
            $query = "update tb_tarefas set tarefa = :tarefa where id = :id";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
            $stmt->bindValue(':id', $this->tarefa->__get('id'));
            return $stmt->execute();
        }

        public function remover(){
            $query = 'delete from tb_tarefas where id = :id';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $this->tarefa->__get('id'));
            $stmt->execute();
        }
    }
?>