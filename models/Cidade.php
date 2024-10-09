<?php 

class Cidade extends model {

    
    private string $id;
    private string $nome;
    private string $descricao;

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }


    public function getInfo($idCidade) {
        $sql = "SELECT * FROM cidade WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $idCidade);
        $sql->execute();

        if ($sql-> rowCount() > 0) {
            $item = $sql->fetch();
            // echo '<pre>';
            // var_dump($item['id']);
            $cidade = new Cidade();
               $cidade->setId($item['id']);
               $cidade->setNome($item['nome']);
               $cidade->setDescricao($item['descricao']);
            return $cidade;

        }else {
            //tipos = success , danger , warning 
            $_SESSION["msg_titulo"]="Informação:";
            $_SESSION["msg_texto"]="Cadastro não encontrado.";
            $_SESSION["msg_tipo"]="warning";
            return array();
    
        }

    }

    public function getAll($offset = null, $limit = null) {
        $sql = "SELECT * FROM cidade WHERE 1 ";
       
        if ($limit != null) {            
            $sql.=" LIMIT $offset, $limit";
        }

        $sql = $this->db->query($sql);
        $usuarios = array();

        if ($sql-> rowCount() > 0) {
            
           foreach ($sql->fetchAll() as $key => $item) {
               $cidade = new Cidade();
               $cidade->setId($item['id']);
               $cidade->setNome($item['nome']);
               $cidade->setDescricao($item['descricao']);   
               $cidades[] = $cidade;
           }
           return $cidades;
        }else {
            //tipos = success , danger , warning            
            $_SESSION["msg_texto"]="Nenhum registro encontrado.";
            $_SESSION["msg_tipo"]="warning";
            return array();
            
        }
    }

}