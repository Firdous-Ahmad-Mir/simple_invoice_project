<?php
 if($fetch){ 
     
     foreach($fetch as $fe){
     
     ?>
 <table class="table table-condensed">
<tr><td colspan="2"><div class="alert alert-success">customer Record Already Exists</div></td></tr>

<tr><td>Name:</td><td> <?php echo $fe->name; ?></td></tr>
<tr><td>C ID:</td><td> <?php echo $fe->c_id; ?></td></tr>
<tr><td>Phone:</td><td><?php echo $fe->cell; ?></td></tr>
<tr><td>Pin-Code:</td><td><?php echo $fe->pin_code; ?></td></tr>
<tr><td>Address:</td><td><?php echo $fe->address; ?></td></tr>
<input type="hidden" name="existed" value="existed"   required="required">
<input type="hidden" name="c_id" value="<?php echo $fe->c_id; ?>"   required="required">
</table>
<?php
}
}else{ ?>
    <div class="form-group row">

    <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" value="<?php echo $cid; ?>" name="c_id" 
                    placeholder="Coustomer Id" required="required">
            </div>

            <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" name="name"  
                placeholder="Name" required="required">
            </div>
        </div>
            <div class="form-group row">
    
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="number" class="form-control form-control-user" name="pin_code"
                    placeholder=" Pin Code" required="required">
            </div>
        <div class="col-sm-6">
            <input type="number" class="form-control form-control-user"   name="cell"
                placeholder="Cell Number" required="required">
        </div>
        </div>
        <div class="form-group">
            <textarea type="number" class="form-control form-control-user"  name="address"
                placeholder="Address" required="required"></textarea>
        </div>
        <?php
}