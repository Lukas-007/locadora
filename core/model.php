<?php
class model {
	
	protected $db;

	public function __construct() {
		global $db;
		$this->db = $db;
	}

	public function log($tabela='não informado',$acao='não informado',$dado='não informado',$status=0 ){
        
		$sql = "INSERT INTO log (
					  
					 dt_log,
					 tipo_acao, 
					 dados, 
					 status, 
					 id_usuario ,
					 tabela 
					 
				 )
		 VALUES (
					 :dt_log, 
					 :tipo_acao,
					 :dados, 
					 :status, 
					 :id_usuario,
					 :tabela
					 
				 )";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':dt_log', date('Y-m-d H:i:s'));
		 $sql->bindValue(':tipo_acao', $acao);
		 $sql->bindValue(':dados', str_replace('\u0000'.ucfirst(strtolower($tabela)).'\u0000','',json_encode((array)$dado,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE)));
		 $sql->bindValue(':status', $status);
		 $sql->bindValue(':id_usuario',$_SESSION['id']);
		 $sql->bindValue(':tabela',$tabela);

		$sql->execute();
			
		// echo '<pre>';			
		// $json = str_replace('\u0000'.ucfirst(strtolower($tabela)).'\u0000','',json_encode((array)$dado,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
		// $obj = json_decode($json,JSON_PRETTY_PRINT);
		// var_dump('\u0000'.ucfirst(strtolower($tabela)).'\u0000',$json,$obj);
		// exit;
		

	  

 }

}
?>