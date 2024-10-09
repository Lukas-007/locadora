<?php 

class Usuario extends model {

    
    private $id = "";
    private $nome = null;
    private $email = null;
    private $telefone = "";
    private $senha = "";
    private $altSenha = 1;
    private $permissoes = "";
    private $cpf = null;
    private $grupo = null;
    private $tipo = "";
    private $img1 = null;
    private $img2 = null;
    private $img3 = null;



    
  

    public function adicionar($usuario) {
        // 1 passo = vefifica se o email ja existe no sistema
        // 2 passo = adicionar
        // echo '<pre>';
        //          var_dump($this->existeEmail($usuario->getEmail()),$usuario->getEmail());
        if($this->existeEmail($usuario->getEmail()) == false) {
            
            // var_dump('add',$dados);
            // exit;
            $usuario->setSenha(md5($usuario->getSenha()));
           $sql = "INSERT INTO usuario (
                        nome , 
                        email,
                        senha,
                        cpf ,                        
                        telefone, 
                        permissoes,  
                        img_1,
                        img_2,
                        img_3,
                        tipo,                     
                        grupo_id,
                        alt_senha
                        
                    )
            VALUES (
                        :nome , 
                        :email,
                        :senha,
                        :cpf ,                        
                        :telefone, 
                        :permissoes,  
                        :img_1,
                        :img_2,
                        :img_3,
                        :tipo,                     
                        :grupo_id,
                        :alt_senha
                    )";
           $sql = $this->db->prepare($sql);
           $sql->bindValue(':nome', $usuario->getNome());
           $sql->bindValue(':email', $usuario->getEmail());
           $sql->bindValue(':senha', $usuario->getSenha());
           $sql->bindValue(':cpf', $usuario->getCpf());
           $sql->bindValue(':telefone', $usuario->getTelefone());
           $sql->bindValue(':permissoes', $usuario->getPermissoes());
           $sql->bindValue(':img_1', $usuario->getImg1());
           $sql->bindValue(':img_2', $usuario->getImg2());
           $sql->bindValue(':img_3', $usuario->getImg3());
           $sql->bindValue(':tipo', $usuario->getTipo());
           $sql->bindValue(':grupo_id', $usuario->getGrupo());
           if ($usuario->getAltSenha() == 'on') {               
               $sql->bindValue(':alt_senha', 1); 
           } else {
                $sql->bindValue(':alt_senha', 0);
           } 
        //    var_dump($usuario->getAltSenha());         
        //    exit;

           $rs = $sql->execute();
           if ($rs=="true") {
                $this->log("USUARIO","CREATE",$usuario ,1 );
                //tipos = success , danger , warning 
                $_SESSION["msg_titulo"]="Sucesso!";
                $_SESSION["msg_texto"]="Cadastro realizado.";
                $_SESSION["msg_tipo"]="success";
                return $this->db->lastInsertId();
           } else {
                $this->log("USUARIO","CREATE",$usuario ,0 );                
                //tipos = success , danger , warning 
                $_SESSION["msg_titulo"]="Erro!";
                $_SESSION["msg_texto"]="Não foi possível realizar cadastro. Tente mais tarde";
                $_SESSION["msg_tipo"]="danger";
                return false;
           }
           
           
        }else {
            //tipos = success , danger , warning 
            $_SESSION["msg_titulo"]="Informação:";
            $_SESSION["msg_texto"]="E-mail cadastrador já existe. Favor alterar e-mail.";
            $_SESSION["msg_tipo"]="warning";
            return false;
        }

    }

  


   public function getInfo($usuario) {
        $sql = "SELECT * FROM usuario WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $usuario);
        $sql->execute();

        if ($sql-> rowCount() > 0) {
            $item = $sql->fetch();
            // echo '<pre>';
            // var_dump($item['id']);
            $usuario = new Usuario();
               $usuario->setId($item['id']);
               $usuario->setNome($item['nome']);
               $usuario->setEmail($item['email']);
               $usuario->setCpf($item['cpf']);
               $usuario->setTelefone($item['telefone']); 
               $usuario->setImg1($item['img_1']); 
               $usuario->setImg2($item['img_2']); 
               $usuario->setImg3($item['img_3']); 
               $usuario->setTipo($item['tipo']);                           
               $usuario->setGrupo($item['grupo_id']);
            return $usuario;


        }else {
            //tipos = success , danger , warning 
            $_SESSION["msg_titulo"]="Informação:";
            $_SESSION["msg_texto"]="Cadastro não encontrado.";
            $_SESSION["msg_tipo"]="warning";
            return array();
    
        }

    }

    

    public function getAll($offset = null, $limit = null,$tipo = null,$status = null) {
        $sql = "SELECT * FROM usuario WHERE 1 ";
        if ($tipo == "jurado") {
            $sql.=" AND tipo = 'jurado'";
        }elseif ($tipo == "modelo") {
            $sql.=" AND tipo = 'modelo'";
        }
        elseif ($tipo == "admin") {
            $sql.=" AND tipo = 'admin'";
        }
        if ($status != null) {
            
            $sql.=" AND status = ".intval($status);
        }
        if ($limit != null) {
            
            $sql.=" LIMIT $offset, $limit";
        }
        $sql = $this->db->query($sql);
        $usuarios = array();

        if ($sql-> rowCount() > 0) {
           // return $sql->fetchAll();
           foreach ($sql->fetchAll() as $key => $item) {
               $usuario = new Usuario();
               $usuario->setId($item['id']);
               $usuario->setNome($item['nome']);
               $usuario->setImg1($item['img_1']);
               $usuario->setEmail($item['email']);
               $usuario->setTelefone($item['telefone']);               
               $usuario->setCpf($item['cpf']);
               $usuario->setGrupo($item['grupo_id']);
               
               

               $usuarios[] = $usuario;
           }
           return $usuarios;
        }else {
            //tipos = success , danger , warning            
            $_SESSION["msg_texto"]="Nenhum registro encontrado.";
            $_SESSION["msg_tipo"]="warning";
            return array();
            
        }
    }

    public function getModelo($usuario) {
        $sql = "SELECT * FROM usuario WHERE id = :id
         AND tipo = 'modelo'";
        
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $usuario);
        // echo '<pre>';
        // var_dump($sql);
        $sql->execute();
        // echo '<pre>';
        // var_dump($sql->execute());
        if ($sql-> rowCount() > 0) {
            $item = $sql->fetch();
            // echo '<pre>';
            // var_dump($item['id']);
            $usuario = new Usuario();
               $usuario->setId($item['id']);
               $usuario->setNome($item['nome']);
               $usuario->setEmail($item['email']);
               $usuario->setImg1($item['img_1']); 
               $usuario->setImg2($item['img_2']); 
               $usuario->setImg3($item['img_3']);
               $usuario->setTelefone($item['telefone']);               
               $usuario->setCpf($item['cpf']);
               $usuario->setGrupo($item['grupo_id']);
            return $usuario;


        }else {
            //tipos = success , danger , warning 
            $_SESSION["msg_titulo"]="Informação:";
            $_SESSION["msg_texto"]="Modelo não encontrada.";
            $_SESSION["msg_tipo"]="warning";
            return null;
    
        }

    }

    public function editar($usuario) {
        //var_dump("existe",$this->existeEmail($usuario->getEmail()) == false);
        //if ($this->existeEmail($usuario->getEmail()) == false) {
        $sql = "UPDATE usuario SET 
                nome = :nome, 
                email = :email,
                cpf = :cpf,                
                telefone = :telefone,                
                tipo = :tipo,
                grupo_id = :grupo_id,
                alt_senha = :alt_senha";


        if ($usuario->getImg1() != "") {
            $sql .= ", img_1 = :img_1";
        }
        if ($usuario->getImg2() != "") {
            $sql .= ", img_2 = :img_2";
        }
        if ($usuario->getImg3() != "") {
            $sql .= ", img_3 = :img_3";
        }
        if ($usuario->getSenha() != "123456" || $usuario->getAltSenha()=='on') {
            $sql .= ", senha = :senha";
            $usuario->setSenha(md5($usuario->getSenha()));
        }

        $sql .= " WHERE id = :id";
         //var_dump('sql',$sql);
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':nome', $usuario->getNome());
        $sql->bindValue(':email', $usuario->getEmail());
        $sql->bindValue(':cpf', $usuario->getCpf());
        $sql->bindValue(':telefone', $usuario->getTelefone());
        
        $sql->bindValue(':tipo', $usuario->getTipo());
        $sql->bindValue(':grupo_id', $usuario->getGrupo());  
        if ($usuario->getAltSenha() == 'on') {               
            $sql->bindValue(':alt_senha', 1); 
        } else {
             $sql->bindValue(':alt_senha', 0);
        }  
        if ($usuario->getImg1() != "") {
            $sql->bindValue(':img_1', $usuario->getImg1());
        }
        if ($usuario->getImg2() != "") {
            $sql->bindValue(':img_2', $usuario->getImg2());
        }
        if ($usuario->getImg3() != "") {
            $sql->bindValue(':img_3', $usuario->getImg3());
        }
        if ($usuario->getSenha() != "123456" || $usuario->getAltSenha()=='on') {
            $sql->bindValue(':senha', $usuario->getSenha());
        }
        
        $sql->bindValue(':id', $usuario->getId());
           

            $rs = $sql->execute();
            if ($rs=="true") {
                 $this->log("USUARIO","UPDATE",$usuario ,1 );
                 //tipos = success , danger , warning 
                $_SESSION["msg_titulo"]="Sucesso!";
                $_SESSION["msg_texto"]="Alteração salva.";
                $_SESSION["msg_tipo"]="success";
                 return true;
            } else {
                 $this->log("USUARIO","UPDATE",$usuario ,0 );  
                 //tipos = success , danger , warning 
                 $_SESSION["msg_titulo"]="Erro!";
                 $_SESSION["msg_texto"]="Não foi possível salvar alteração. Tente mais tarde";
                 $_SESSION["msg_tipo"]="success";              
                 return false;
            }
    }

    public function inativarPeloId($id) {
        $sql = "UPDATE usuario SET 
                status = :status
         WHERE id = :id";
         //var_dump('sql',$sql);
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':status', 0);             
        $sql->bindValue(':id', $id);
           

            $rs = $sql->execute();
            if ($rs=="true") {
                 $this->log("USUARIO","INATIVAR",$id ,1 );
                 //tipos = success , danger , warning 
                $_SESSION["msg_titulo"]="Sucesso!";
                $_SESSION["msg_texto"]="Usuário desativado.";
                $_SESSION["msg_tipo"]="success";
                 return true;
            } else {
                $this->log("USUARIO","INATIVAR",$id ,0 ); 
                 //tipos = success , danger , warning 
                 $_SESSION["msg_titulo"]="Erro!";
                 $_SESSION["msg_texto"]="Não foi possível inativar alteração. Tente mais tarde";
                 $_SESSION["msg_tipo"]="success";              
                 return false;
            }
    }
    public function ativarPeloId($id) {
        $sql = "UPDATE usuario SET 
                status = :status
         WHERE id = :id";
         //var_dump('sql',$sql);
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':status', 1);             
        $sql->bindValue(':id', $id);
           

            $rs = $sql->execute();
            if ($rs=="true") {
                 $this->log("USUARIO","ATIVAR",$id ,1 );
                 //tipos = success , danger , warning 
                $_SESSION["msg_titulo"]="Sucesso!";
                $_SESSION["msg_texto"]="Usuário ativado.";
                $_SESSION["msg_tipo"]="success";
                 return true;
            } else {
                $this->log("USUARIO","ATIVAR",$id ,0 ); 
                 //tipos = success , danger , warning 
                 $_SESSION["msg_titulo"]="Erro!";
                 $_SESSION["msg_texto"]="Não foi possível ativar alteração. Tente mais tarde";
                 $_SESSION["msg_tipo"]="success";              
                 return false;
            }
    }


    private function existeEmail($email) {
        //var_dump('email',$email);
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        // var_dump('count',$sql->fetch());

        if ($sql->rowCount() > 0) {
            return true;
        }else {
            return false;
        }
    }

    //buscaNome
    public function buscaNome($id) {
        //var_dump('email',$email);
        $sql = "SELECT nome FROM usuario WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        // var_dump('count',$sql->fetch());

        if ($sql->rowCount() > 0) {
            return $sql->fetch()[0];
        }else {
            return '';
        }
    }

    //verificaSenha
    public function verificaSenha($email,$senha) {
        //var_dump('email',$email);
        $sql = "SELECT * FROM usuario WHERE email = :email AND alt_senha = 1 AND senha = :senha";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();
        // var_dump('count',$sql->fetch());

        if ($sql->rowCount() > 0) {
            return true;
            //tipos = success , danger , warning 
            $_SESSION["msg_titulo"]="Informação:";
            $_SESSION["msg_texto"]="Senha padrão deve ser alterada para o primeiro acesso.";
            //$_SESSION["msg_tipo"]="success";
        }else {
            return false;
        }
    }
    //alterarSenha
    public function alterarSenha($email,$senha) {
        //var_dump('email',$email);
        $sql = "UPDATE usuario SET 
                alt_senha = 0,
                senha = :senha
         WHERE email = :email";
       
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':senha', $senha);
        $sql->bindValue(':email', $email);
        $rs = $sql->execute();
        // var_dump('count',$sql->fetch());

        if ($rs) {
            //$this->log("USUARIO","UPDATE-SENHA",$email ,1 );
            //tipos = success , danger , warning 
            $_SESSION["msg_titulo"]="Sucesso! ";
            $_SESSION["msg_texto"]="Senha alterada.";
            $_SESSION["msg_tipo"]="success";
            return true;
        }else {
            //$this->log("USUARIO","UPDATE-SENHA",$email ,0 );
            //tipos = success , danger , warning 
            $_SESSION["msg_titulo"]="Erro! ";
            $_SESSION["msg_texto"]="Não foi possivel alterar senha. Tente mais tarde.";
            $_SESSION["msg_tipo"]="danger";
            return false;
        }
    }

    //resetarSenha
    public function resetarSenha($id) {
        //var_dump('email',$email);
        $sql = "UPDATE usuario SET 
                alt_senha = 1,
                senha = :senha
         WHERE id = :id";
       
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':senha', md5('123456'));
        $sql->bindValue(':id', $id);
        $rs = $sql->execute();
        // var_dump('count',$sql->fetch());

        if ($rs) {
            //$this->log("USUARIO","UPDATE-SENHA",$email ,1 );
            //tipos = success , danger , warning 
            $_SESSION["msg_titulo"]="Sucesso! ";
            $_SESSION["msg_texto"]="Senha resetada para '123456'. Alteração de senha será solicitada no próximo acesso";
            $_SESSION["msg_tipo"]="success";
            return true;
        }else {
            //$this->log("USUARIO","UPDATE-SENHA",$email ,0 );
            //tipos = success , danger , warning 
            $_SESSION["msg_titulo"]="Erro! ";
            $_SESSION["msg_texto"]="Não foi possivel alterar senha. Tente mais tarde.";
            $_SESSION["msg_tipo"]="danger";
            return false;
        }
    }

    public function getTotal($tipo = null,$status = null){
        
        $sql = "SELECT * FROM usuario WHERE 1";
        if ($tipo == "jurado") {
            $sql.=" AND tipo = 'jurado'";
        }elseif ($tipo == "modelo") {
            $sql.=" AND tipo = 'modelo'";
        }
        elseif ($tipo == "admin") {
            $sql.=" AND tipo = 'admin'";
        }
        if ($status != null) {
            
            $sql.=" AND status = ".intval($status);
        }
        $sql = $this->db->query($sql);
        
        return $sql->rowCount();
    }

    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     */
    public function setTelefone($telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     */
    public function setSenha($senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of permissoes
     */
    public function getPermissoes()
    {
        return $this->permissoes;
    }

    /**
     * Set the value of permissoes
     */
    public function setPermissoes($permissoes): self
    {
        $this->permissoes = $permissoes;

        return $this;
    }

    /**
     * Get the value of cpf
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     */
    public function setCpf($cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of grupo
     */ 
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set the value of grupo
     *
     * @return  self
     */ 
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get the value of altSenha
     */
    public function getAltSenha()
    {
        return $this->altSenha;
    }

    /**
     * Set the value of altSenha
     */
    public function setAltSenha($altSenha): self
    {
        $this->altSenha = $altSenha;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of img1
     */ 
    public function getImg1()
    {
        return $this->img1;
    }

    /**
     * Set the value of img1
     *
     * @return  self
     */ 
    public function setImg1($img1)
    {
        $this->img1 = $img1;

        return $this;
    }

    /**
     * Get the value of img2
     */ 
    public function getImg2()
    {
        return $this->img2;
    }

    /**
     * Set the value of img2
     *
     * @return  self
     */ 
    public function setImg2($img2)
    {
        $this->img2 = $img2;

        return $this;
    }

    /**
     * Get the value of img3
     */ 
    public function getImg3()
    {
        return $this->img3;
    }

    /**
     * Set the value of img3
     *
     * @return  self
     */ 
    public function setImg3($img3)
    {
        $this->img3 = $img3;

        return $this;
    }
}

?>