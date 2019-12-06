<?php

if (!isset($_SESSION['CUSID'])){
redirect(web_root."index.php");
}




$customerid =$_SESSION['CUSID'];
$customer = New Customer();
$singlecustomer = $customer->single_customer($customerid);

  ?>

<?php
  $autonumber = New Autonumber();
  $res = $autonumber->set_autonumber('ordernumber');
?>


<form onsubmit="return orderfilter()" action="customer/controller.php?action=processorder" method="post" >
<section id="cart_items">
    <div class="container">
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#"><?php echo $lang['BACK_TO_SITE'];?></a></li>
          <li class="active"><?php echo $lang['ORDER_INFORMATION'];?></li>
        </ol>
      </div>
      <div class="row">
    <div class="col-md-6 pull-left">
      <div class="col-md-2 col-lg-2 col-sm-2" style="float:left">
        <?php echo $lang['NAME'];?>
      </div>
      <div class="col-md-8 col-lg-10 col-sm-3" style="float:left">
        <?php echo $singlecustomer->FNAME .' '.$singlecustomer->LNAME; ?>
      </div>
       <div class="col-md-2 col-lg-2 col-sm-2" style="float:left">
        <?php echo $lang['ADDRESS'];?>
      </div>
      <div class="col-md-8 col-lg-10 col-sm-3" style="float:left">
        <?php echo $singlecustomer->CUSHOMENUM . ' ' . $singlecustomer->STREETADD . ' ' .$singlecustomer->BRGYADD . ' ' . $singlecustomer->CITYADD . ' ' .$singlecustomer->PROVINCE . ' ' .$singlecustomer->COUNTRY; ?>
      </div>
    </div>

    <div class="col-md-6 pull-right">
    <div class="col-md-10 col-lg-12 col-sm-8">
    <input type="hidden" value="<?php echo $res->AUTO; ?>" id="ORDEREDNUM" name="ORDEREDNUM">
      <?php echo $lang['ORDER_NUMBER'];?><?php echo $res->AUTO; ?>
    </div>
    </div>
 </div>
      <div class="table-responsive cart_info">

              <table class="table table-condensed" id="table">
                <thead >
                <tr class="cart_menu">
                  <th style="width:12%; align:center; "><?php echo $lang['PRODUCT'];?></th>
                  <th >Description</th>
                  <th style="width:15%; align:center; "><?php echo $lang['DESCRIPTION'];?></th>
                  <th style="width:15%; align:center; "><?php echo $lang['PRICE'];?></th>
                  <th style="width:15%; align:center; "><?php echo $lang['TOTAL'];?></th>
                  </tr>
                </thead>
                <tbody>

              <?php

              $tot = 0;
                if (!empty($_SESSION['gcCart'])){
                      $count_cart = @count($_SESSION['gcCart']);
                      for ($i=0; $i < $count_cart  ; $i++) {

                      $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                           WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  and p.PROID='".$_SESSION['gcCart'][$i]['productid']."'";
                        $mydb->setQuery($query);
                        $cur = $mydb->loadResultList();
                        foreach ($cur as $result){
              ?>

                         <tr>
                         <!-- <td></td> -->
                          <td><img src="admin/products/<?php echo $result->IMAGES ?>"  width="50px" height="50px"></td>
                          <td><?php echo $result->PRODESC ; ?></td>
                          <td align="center"><?php echo $_SESSION['gcCart'][$i]['qty']; ?></td>
                          <td>&#36 <?php echo  $result->PRODISPRICE ?></td>
                          <td>&#36 <output><?php echo $_SESSION['gcCart'][$i]['price']?></output></td>
                        </tr>
              <?php
              $tot +=$_SESSION['gcCart'][$i]['price'];
                        }

                      }
                }
              ?>


                </tbody>

              </table>
                <div class="  pull-right">
                  <p align="right">
                  <div > Total Price :   &#36 <span id="sum">0.00</span></div>
                   <div > Delivery Fee : &#36 <span id="fee">0.00</span></div>
                   <div> Overall Price : &#36 <span id="overall"><?php echo $tot ;?></span></div>
                   <input type="hidden" name="alltot" id="alltot" value="<?php echo $tot ;?>"/>
                  </p>
                </div>

      </div>
    </div>
  </section>

 <section id="do_action">
    <div class="container">
      <div class="heading">
        <h3><?php echo $lang['WHAT_DO_YOU_WANT'];?></h3>
        <p><?php echo $lang['DISCOUNTS'];?></p>
      </div>
      <div class="row">
         <div class="row">
                   <div class="col-md-7">
              <div class="form-group">
                  <label><?php echo $lang['PAYMENT_METHOD'];?></label>
                  <div class="radio" >
                      <label >
                          <input type="radio"  class="paymethod" name="paymethod" id="deliveryfee" value="Cash on Delivery" checked="true" data-toggle="collapse"  data-parent="#accordion" data-target="#collapseOne" ><?php echo $lang['CASH_ON'];?>

                      </label>
                  </div>
              </div>
                        <div class="panel">
                                <div class="panel-body">
                                    <div class="form-group ">
                                      <label><?php echo $lang['ADDRESS'];?></label>


                                        <div class="col-md-12">
                                          <label class="col-md-4 control-label" for=
                                          "PLACE"><?php echo $lang['CITY'];?></label>

                                          <div class="col-md-8">
                                           <select class="form-control paymethod" name="PLACE" id="PLACE" onchange="validatedate()">
                                           <option value="0" ><?php echo $lang['SELECTS'];?></option>
                                              <?php
                                            $query = "SELECT * FROM `tblsetting` ";
                                            $mydb->setQuery($query);
                                            $cur = $mydb->loadResultList();

                                            foreach ($cur as $result) {
                                              echo '<option value='.$result->DELPRICE.'>'.$result->BRGY.' '.$result->PLACE.' </option>';
                                            }
                                            ?>
                                          </select>
                                          </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        <input type="hidden"  placeholder="HH-MM-AM/PM"  id="CLAIMEDDATE" name="CLAIMEDDATE" value="<?php echo date('y-m-d h:i:s') ?>"  class="form-control"/>

                   </div>



              </div>
<br/>
              <div class="row">
                <div class="col-md-6">
                    <a href="index.php?q=cart" class="btn btn-default pull-left"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong><?php echo $lang['SHOPING_CART'];?></strong></a>
                   </div>
                  <div class="col-md-6">
                      <button type="submit" class="btn btn-pup  pull-right " name="btn" id="btn" onclick="return validatedate();"   /> <?php echo $lang['SUBMIT_ORDERS'];?><span class="glyphicon glyphicon-chevron-right"></span></button>
                </div>
              </div>

      </div>
    </div>
  </section><!--/#do_action-->
</form>
