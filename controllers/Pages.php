<?php
class Pages
{   
    public function __construct()
    {
    session_start();
    }
    public function home(){
        
         return display('index'); 

    }
    public function all_records(){
      
        $data = App::get('database')->selectAll('invice','');

        $list= array('coustomer_list'=>$data);

        return display('all_records',$list); 

    }
    public function invoice(){
       
        $rec = "where c_id=".htmlspecialchars(trim($_GET['p']))." group by c_id";
        $rectw = "where c_id='".htmlspecialchars(trim($_GET['p']))."' && date='".htmlspecialchars(trim($_GET['d']))."'";
         $data = App::get('database')->selectAll('invice',$rec);
         $datatwo = App::get('database')->selectAll('products',$rectw);
         $array_list= array(
             'string'=>$data, 
             'stringtwo'=>$datatwo
        );
        return display('invoice',$array_list); 


    }





    public function insert_data(){
        if(isset($_POST['button'])){                    
            $arrayName = array(            
                'name' => $_POST["name"], 
                'c_id' => $_POST["c_id"], 
                'pin_code' => $_POST["pin_code"], 
                'cell' => $_POST["cell"], 
                'address' => $_POST["address"]
        );  

        $cnt = count($_POST['p_name']);

        for($i=0; $i < $cnt; $i++){
        $arrayproduct = array(
            'c_id' => $_POST["c_id"],
            'p_name' => $_POST["p_name"][$i], 
            'p_category' => $_POST["p_category"][$i], 
            'p_qty' => $_POST["p_qty"][$i], 
            'p_price' => $_POST["p_price"][$i],
            's_price' => $_POST["s_price"][$i],
            'date' => $_POST["date"][$i]
        );
        $tabletwo ="products";
    
        App::get('database')->insert($tabletwo,$arrayproduct);
           
        if(! $_POST['existed']){       
        
            $table ="invice";
           
           
            if($i==0){
            
            App::get('database')->insert($table,$arrayName);
        
                }
    }
   
        }
       
    }

    header('Location: /');
    }


    public function update_tables(){


        if(isset($_POST['submit'])){
                    

            $arrayName = array(
            
                'name' => $_POST["name"], 
                'c_id' => $_POST["c_id"], 
                'pin_code' => $_POST["pin_code"], 
                'cell' => $_POST["cell"], 
                'address' => $_POST["address"]
        );

        $table ="invice";
            $cid=$_POST["id"];
            $dat = $_POST["date"];
            $ccid =" WHERE `id`='$cid'; ";
           
           App::get('database')->update($table,$arrayName,$ccid);

          
            header("Location: invoice?p=$_POST[c_id]&d=$dat");  
        }
        
        if(isset($_POST['productyy'])){


            $arrayName = array(
                        
                'p_name' => $_POST["p_name"][0], 
                'p_category' => $_POST["p_category"][0], 
                'p_qty' => $_POST["p_qty"][0], 
                'p_price' => $_POST["p_price"][0], 
                's_price' => $_POST["s_price"][0],
                'date' => $_POST["date"][0]
        );

            $table ="products";
            $pid=$_POST["p_id"];        
            
            $dat =$_POST["dat"];
    
            $ccid =" WHERE `p_id`='$pid'; ";
           
            App::get('database')->update($table,$arrayName,$ccid);
           
             header("Location: invoice?p=$_POST[c_id]&d=$dat");  
        }

    }
    public function delete_all(){
        if(htmlspecialchars(trim($_GET['id']))=='full'){
        $pid = htmlspecialchars(trim($_GET['p']));
        $c_id = " WHERE `c_id`='$pid'; ";
        $tableone ="invice";
        $tabletwo ="products";
        
        App::get('database')->delete($tableone,$c_id);
        App::get('database')->delete($tabletwo,$c_id);
       
        header("Location: all_records"); 
    } if($_GET['id']=='half'){

        $pid = htmlspecialchars(trim($_GET['p']));
        $c_id = " WHERE `p_id`='$pid'; ";
        $tabletwo ="products";
        App::get('database')->delete($tabletwo,$c_id);

        $_SESSION['error']='Deleted successfully';
        $p=$_GET['vl'];
        $d=$_GET['d'];
        header("Location: invoice?p=$p&d=$d"); 

    }     
    }
//////////////////on click adding product  fields\\\\\\\\\\\\
    public function input(){
     return display('add_fields'); 
    }
    /////////////// fetch duplicate data\\\\\\\\\\\\\\\\
    public function fetch(){

        $pid = htmlspecialchars(trim($_GET['p']));
        $c_id = " WHERE `c_id`='$pid'; ";
        $data = App::get('database')->selectAll('invice',$c_id );
        $new_data = array('fetch'=>$data,'cid'=>$pid);
        return display('fetch',$new_data); 
    
    }

    
}
