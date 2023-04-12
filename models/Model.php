<?php

class Model
{
    private $driver = 'mysql';
    private $host = 'localhost';
    private $dbname = 'identifica';
    private $port = '3306';
    private $user = 'root';
    private $password=  null;
    protected $table;
    protected $conex;

    public function __construct(){
        //descobre o nome da table
        $tbl = strtolower(get_class($this));
        $tbl .= 's';
        $this->table = $tbl;
   
   
    

    $this->conex = new PDO("{$this->driver}:host={$this->host};port={$this->port};dbname={$this->dbname}",$this->user,$this->password);

}
public function getById($id){
    $sql=$this->conex->prepare("SELECT * FROM {$this->table} WHERE id = :id ");
    $sql->bindValue(':id' , $id);
    $sql->execute();
     
    return $sql->fetch(PDO::FETCH_ASSOC);}

 
    public function getAll(){
        $sql=$this->conex->query("SELECT * FROM {$this->table}");   
        
        return $sql->fetchALL(PDO::FETCH_ASSOC);
    
}

public function create($data) {
    $sql = "INSERT INTO {$this->table}";
//prepara os campos e place holder
   
$sql_fields = $this->sql_fields($data);
$sql .= " SET {$sql_fields}";
//prepara e roda no banco
$insert = $this->conex->prepare($sql);
/*foreach($data as $field => $value){
    $insert->bindValue(":{$field}", $value);}
    */
    $insert->execute($data);

  

}


 public function update($data, $id){

    unset($data['id']);
$sql= "UPDATE {$this->table}";
$sql.= ' SET ' . $this->sql_fields($data);
$sql.= ' WHERE id = :id ';
$data['id'] = $id;

$upd=$this->conex->prepare($sql);
  
    $upd->execute($data);

 }




private function sql_fields($data){

    foreach (array_keys($data)as $field){
        $sql_fields[] = "{$field} = :{$field}";

    }
return implode(',', $sql_fields);
}



}

//querry = executa
//fetch = pega o primeiro
//fetchall = pega todos  

//fazer o admin