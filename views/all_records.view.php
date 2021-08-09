<?php require "partials/head.php"; ?>
       

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">invoice Record</h6>
                            </div>
        <?php if($_SESSION['success']){ ?>

    <div class="alert alert-success">
        <strong>Success!</strong> <?php echo $_SESSION["success"];  ?>
            </div>
                <?php unset ($_SESSION["success"]); } ?>

                    <?php if($_SESSION['error']){ ?>

                    <div class="alert alert-danger">
                <strong>Error !</strong> <?php echo $_SESSION["error"];  ?>
            </div>
        <?php unset ($_SESSION["error"]); } ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <?php if($coustomer_list){ ?>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Date</th>  
                                                <th></th>                                  
                                            
                                                
                                             </tr>
                                        </thead>
                                        
                                        <tbody>
                                        
                                        <?php 

                                        $i=1;
                                        foreach($coustomer_list as $list){ 
                                        $where='where c_id='.$list->c_id.' group by  date desc';
                                        $dataTwo = App::get('database')->selectAll('products',$where);
                                        foreach($dataTwo as $dTwo){
                                           
                                         echo "<tr>
                                                    <td>".$i."</td>
                                                    <td>".$dTwo->c_id."</td>
                                                    <td>".$list->name."</td>
                                                    <td>".$dTwo->date."</td>
                                                    <td><a href='/invoice?p=".$dTwo->c_id."&d=".$dTwo->date."' class='btn btn-info'><i class='fa text-white'>+</i></a></td>
                                                </tr>";
                                                $i++;
                                        }


                                        }
                                    
                                        ?>                                 
                                        </tbody>
                                        <?php }else{ ?>
                                            <tr>
                                                <td>
                                                <div class="alert alert-danger">
                <strong>Oops! </strong> No Record Found--------!
                                                </div>

                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->
    
        <?php require "partials/footer.php"; ?> 