<?php require "partials/head.php"; ?>
       

       <!-- DataTales Example -->
       <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">invoice Record</h6>
                            <!--button onclick="window.print();">Click me</button-->
                            <button onclick="printDiv('pdfDocument')" class="btn btn-info"><i class="fa fa-print"></i></button>
                            <a href="delete?p=<?php echo $_GET['p']; ?>&dat=<?php echo $_GET['d']; ?>&id=full" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                       
                        
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
                            
                
                        <div class="card-body" id="pdfDocument">
                            <div class="table-responsive">
                                                          

                                   
                <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <span><span>C ID: <?php echo $_GET['p']; ?></span><span style="float:right;">Date: <?php echo $_GET['d']; ?></span></span>
                            <center><h2> Company Name</h2></center>
                        </div>
                    <?php foreach($string as $reco){ ?>
               
                        <table class="table" id="dataTable" width="100%" cellspacing="0" onmouseover="myfun()" onmouseout="myfuntw()">
                        <tr><td>
                        <div class="row">
                            <div class="col-xs-12" >
                            <button id="myDIV" class="btn btn-circle btn-sm btn-info" style="display:none;" data-toggle="modal" data-target="#UpdateAddress" ><i class="fa fa-plus"></i></button>
                                <address >
                                <strong >Billed To:</strong>
                                    <?php echo $reco->name; ?><br>
                                    <?php echo $reco->cell; ?><br>
                                    <?php echo $reco->address; ?> <br>
                                    <?php echo $reco->pin_code; ?>
                                </address>
                            </div>
                            </td>

                            <td>
                            <div class="col-xs-6 text-left">
                                <address>
                                <strong>Office: </strong>Noida sector 53 C Block <br> Building
                                No 297 4th Floor, near <br>Kanchanjunga Market,
                                Uttar Pradesh 20130
                                </address>
                            </div>
                        </div>
                        </td>
                        </tr>
                        </table>
                    
                    </div>
                </div>






            <!-- Update Address Modal-->
            <div class="modal fade" id="UpdateAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
        <form class="user" action="/update" method="post" enctype="multipart/form-data">
                          
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Addres</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                         
                <div class="form-group row">

<div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" value="<?php echo $reco->c_id; ?>" name="c_id" 
                placeholder="Coustomer Id" required="required" readonly>
        </div>

    <div class="col-sm-6">
        <input type="text" class="form-control form-control-user" name="name"  
            placeholder="Name" value="<?php echo $reco->name; ?>" required="required">
        </div>

        
    </div>



        <div class="form-group row">

        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="number" class="form-control form-control-user" name="pin_code"
                placeholder=" Pin Code" required="required" value="<?php echo $reco->pin_code; ?>">
        </div>
    


    <div class="col-sm-6">
        <input type="number" class="form-control form-control-user"   name="cell"
            placeholder="Cell Number" required="required" value="<?php echo $reco->cell; ?>">

            
            <input type="hidden"  name="id"   required="required" value="<?php echo $reco->id; ?>">
            <input type="hidden"  name="date"   required="required" value="<?php echo $_GET['d']; ?>">

    </div>
    </div>

    <div class="form-group">
        <textarea type="number" class="form-control form-control-user"  name="address"
            placeholder="Address" required="required"><?php echo $reco->address; ?></textarea>
    </div>

                </div>
                <div class="modal-footer">
               
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button value="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
        </div>
    </div>
        <!-- End Modal-->
















                <?php } ?>
                <div class="row" >
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title" ><strong>Order summary</strong></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed" >
                                        <thead>
                                            <tr>
                                                <td><strong>Item</strong></td>
                                                <td class="text-center"><strong>Price</strong></td>
                                                <td class="text-center"><strong>Discount</strong></td>
                                                <td class="text-center"><strong>Quantity</strong></td>
                                                <td class="text-right"><strong>Totals</strong></td>
                                            </tr>
                                        </thead>
                                        
                                                
                                        <tbody>

                                        <?php $total=0;
                                        $id=0;
                                        foreach($stringtwo as $recotw){ $id++; ?>
                                                               
                                      <tr onmouseover="myfunrowover(<?php echo $id; ?>)" onmouseout="myfuntwrowover(<?php echo $id; ?>)" >
                                        

                                                <td>
                                        <tt style="display:none;" rowspan="1" id="myrow<?php echo $id; ?>"> 
                                        <button class="btn btn-circle btn-sm btn-info" data-toggle="modal" data-target="#Updateprod<?php echo $id; ?>" ><i class="fa fa-plus"></i></button>
                                        <a href="/delete?p=<?php echo $recotw->p_id; ?>&id=half&vl=<?php echo $recotw->c_id; ?>&d=<?php echo $recotw->date; ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </tt>
                                        <?php echo $recotw->p_name; ?></td>
                                                <td class="text-center">&#8377; <?php echo $recotw->s_price; ?></td>
                                                <td class="text-center">&#8377;<?php echo ($recotw->p_price)-($recotw->s_price); ?></td>
                                                <td class="text-center"><?php echo $recotw->p_qty; ?></td>
                                                <td class="text-right">&#8377; <?php echo ($recotw->s_price * $recotw->p_qty); ?></td>
                                            </tr>
                                            <?php
                                             $total = $total + ($recotw->s_price * $recotw->p_qty);                                    
                                    
                                            
                                            ?>

<!---------- bootstrap modal start------------->
                                        <div class="modal fade" id="Updateprod<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <form class="user" action="/update" method="post" enctype="multipart/form-data">
                                                            
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Products</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                    <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" value="<?php echo $recotw->p_name; ?>" name="p_name[]"
                                                            placeholder="Product:" required="required">
                                                            <input type="hidden"  value="<?php echo $recotw->c_id; ?>" name="c_id" required="required">
                                                    </div>
                                                    <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-user"  value="<?php echo $recotw->p_category; ?>"  name ="p_category[]"
                                                            placeholder="Category:" required="required">
                                                    </div>
                                                    </div>
                    
                                                    <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input  type="number" class="form-control form-control-user"  value="<?php echo $recotw->p_qty; ?>"  name="p_qty[]"
                                                            placeholder=" Quentity:" required="required">
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                    <s> <input type="text" class="form-control form-control-user" value="<?php echo $recotw->p_price; ?>"  name="p_price[]"
                                                            placeholder=" Market Price:" required="required"></s>
                                                    </div>
                                                    </div>
                    
                                                    <div class="form-group row">
                    
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input  type="number" class="form-control form-control-user" value="<?php echo $recotw->s_price; ?>"  name ="s_price[]"
                                                            placeholder=" Selling Price:" required="required">
                                                            
                                                    </div>
                    
                                                    <div class="col-sm-6 ">
                                                        <input type="text" class="form-control form-control-user" value="<?php echo $recotw->date; ?>"  name="date[]"
                                                            placeholder="Date:" required="required">
                                                    </div>
                                                    </div>
                    
                                                    
                    
                    
                    
                    
                                                    
                                                    </div>
                                                    <div class="modal-footer">
                                                    <input type="hidden"  name ="dat" value="<?php echo $recotw->date; ?>"   required="required">
                                                    <input type="hidden"  name ="p_id" value="<?php echo $recotw->p_id; ?>"   required="required">
                            
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <button value="submit" name="productyy" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div> 
                                        
            <!----------- bootstrap modal end-------->

                                        <?php } ?>

                                    
                                        <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                                <td class="thick-line text-right"> &#8377;<?php echo $total; ?></td>
                                            </tr>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                










                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
























       








   



                <script>
                    function myfun(){
                       var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } 
                    }
                    function myfuntw(){
                       var x = document.getElementById("myDIV");
  if (x.style.display === "block") {
    x.style.display = "none";
  }  
                }

               
                
  function myfunrowover(num){
                       var x = document.getElementById("myrow"+num);
  if (x.style.display === "none") {
    x.style.display = "block";
  } 
                    }
                    function myfuntwrowover(num){
                       var x = document.getElementById("myrow"+num);
  if (x.style.display === "block") {
    x.style.display = "none";
  }                }





               function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>


<?php


require "partials/footer.php"; ?>