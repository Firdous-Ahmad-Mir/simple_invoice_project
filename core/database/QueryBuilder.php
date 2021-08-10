<?php
class QueryBuilder{
    protected $pdo;
    public function __construct($pdo){
    $this->pdo= $pdo;
}
    public  function selectAll($table,$style){
        $statement=$this->pdo->prepare("select * from {$table} {$style}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);

    }


  
public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
            $_SESSION['success']='Data Inserted  successfully';
        } catch (Exception $e) {
            //
        }
        // var_dump($sql);
    }

    public function update($table, $data,$id)
    {

        $string  = "UPDATE `".$table."`  SET  ";
        $cunt=count($data);
        $i=1;
    foreach($data as $del =>$vel){
        $string .= "`".$del."`='".$vel."'";
    if($i < $cunt){
        $string .= ", ";
    }

    $i++; }
    $string .= $id;

   
       

        try {
            $statement = $this->pdo->prepare($string);

            $statement->execute();
            $_SESSION['success']='Updated successfully';
        } catch (Exception $e) {
        
        }
    
    }
     public function delete($table,$qu){
        $query = "DELETE FROM `".$table."`";
        $query .= $qu;
        
        try {
            $statement = $this->pdo->prepare($query);


            $statement->execute();
            $_SESSION['error']='Deleted successfully';
        } catch (Exception $e) {
            //
        }
     }

}
