 <?php
  $customer = New customer;
  $res = $customer->single_customer($_SESSION['CUSID']);
 
  ?>  
<h3>Your Account</h3>
  <form  class="form-horizontal span6" action="customer/controller.php?action=edit" onsubmit="return personalInfo();" name="personal" method="POST" enctype="multipart/form-data"> 
          <div class="row">
             <div class="col-lg-6">
            <div class="form-group">
              <div class="col-md-12">
                <label class="col-md-4 control-label" for=
                "FNAME"><?php echo $lang['FIRST_NAME'];?></label>
                  <div class="col-md-8">
                   <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
                      "First Name" type="text" value="<?php echo $res->FNAME; ?>">
                </div>
              </div>
            </div>
           </div>   
           
           <div class="col-lg-6"> 
            <div class="form-group">
              <div class="col-md-12">
                <label class="col-md-4 control-label" for=
                "LNAME"><?php echo $lang['LAST_NAME'];?></label>

                <div class="col-md-8">
                   <input class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
                      "Last Name" type="text" value="<?php echo $res->LNAME; ?>">
                </div>
              </div>
            </div>
           </div>   

         
            <div class="col-lg-6">
             
             <div class="form-group">
              <div class="col-md-12">
                <label class="col-md-4 control-label" for=
                "CITYADD"><?php echo $lang['CITY'];?></label>

                <div class="col-md-8">
                   <input class="form-control input-sm" id="CITYADD" name="CITYADD" placeholder=
                      "Municipality/City Address" type="text" value="<?php echo $res->CITYADD; ?>">
                </div>
              </div>
            </div>

           </div>  


       
  

            <div class="col-lg-6"> 
                <div class="form-group">
                <div class="col-md-12">
                  <label class="col-md-4 control-label" for=
                  "PHONE"><?php echo $lang['CONTACT_NUMBER'];?></label>

                  <div class="col-md-8">
                     <input class="form-control input-sm" id="PHONE" name="PHONE" placeholder=
                        "Contact Number" type="text" value="<?php echo $res->PHONE; ?>">
                  </div>
                </div>
              </div> 
           </div> 

             <div class="col-lg-6">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="col-md-4 control-label" for=
                  "CUSUNAME"><?php echo $lang['USERNAME'];?></label>

                  <div class="col-md-8">
                     <input class="form-control input-sm" id="CUSUNAME" name="CUSUNAME" placeholder=
                        "Username" type="text" value="<?php echo $res->CUSUNAME; ?>">
                  </div>
                </div>
              </div> 
           </div>  
     <div class="col-lg-6">
          <div class="form-group">
            <div class="col-md-12">
              <label class="col-md-4 control-label" for=
              "GENDER"><?php echo $lang['GENDER'];?></label>

              <div class="col-lg-8"> 
                <input  id="GENDER" name="GENDER"  type="radio" <?php echo ($res->GENDER=='Male') ? 'CHECKED' : '' ;  ?>   value="Male" /><b> Male </b>
                    <input   id="GENDER"   name="GENDER"   type="radio" <?php echo ($res->GENDER=='Female') ? 'CHECKED' : '' ; ?> value="Female" /> <b> Female </b>
              </div>
            </div>
          </div>
          </div>
      
          </div>
          
           

          <div class="col-lg-6"> 
              <div class="form-group">
                <div class="col-md-12">
                   <label class="col-md-4" align = "right"for=
                  "btn"></label>
                  <div class="col-md-8">
                    <input type="submit"  name="save"  value="Save"  class="submit btn btn-primary btn-lg"  />
                      
                </div>
              </div>
            </div>
         </div>     
  </form>   
  
   
                
 
                  

                               
                





 
              








                   
        
        </form>