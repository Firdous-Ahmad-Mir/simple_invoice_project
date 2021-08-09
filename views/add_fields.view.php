<hr>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"  name="p_name[]"
                                            placeholder="Product:" required="required">
                                    </div>
                                    <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user"  name ="p_category[]"
                                            placeholder="Category:" required="required">
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input  type="number" class="form-control form-control-user"  name="p_qty[]"
                                            placeholder=" Quentity:" required="required">
                                    </div>
                                    <div class="col-sm-6 ">
                                    <s> <input  type="number" class="form-control form-control-user"  name="p_price[]"
                                            placeholder=" Market Price:" required="required"></s>
                                    </div>
                                    </div>

                                    <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input  type="number" class="form-control form-control-user"  name ="s_price[]"
                                            placeholder=" Selling Price:" required="required">
                                            
                                    </div>

                                    <div class="col-sm-6 ">
                                        <input type="dae" class="form-control form-control-user"  name="date[]"
                                            placeholder="Date:" value="<?php echo date("Y-m-d");  ?>" required="required">
                                    </div>
                                    </div>