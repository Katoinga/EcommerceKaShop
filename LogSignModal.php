 <!-- sign up modal -->
 <div class="modal fade" id="smyModal" tabindex="-1">

 <div class="modal-dialog" >
  <div class="modal-content">
    <div class="modal-header">

      <div class="modal-body">

              <!-- Nav tabs -->

              <ul class="nav nav-pills">
                  <li class="active"><a class="btn btn-outline-primary" href="#home" data-toggle="tab"><?php echo $lang['LOGIN'];?></a>
                  </li>
                  <li><a class="btn btn-outline-primary" href="#profile" data-toggle="tab"><?php echo $lang['SING_UP'];?></a>
                  </li>
                  <li><a class="btn btn-outline-primary" href="#home2" data-toggle="tab"><?php echo $lang['FORGOT_PASS'];?></a>
                  </li>

              </ul>

              <!-- Tab panes  login panel-->
              <div class="tab-content">
                  <div class="tab-pane fade in active" id="home">
                      <!-- <h4>Login Tab</h4>  -->
                       <div class="panel panel-pup">
                        <div class="panel-heading">
                            <?php echo $lang['LOGIN_DETAILS'];?>
                        </div>
                        <div class="panel-body">

                           <form class="form-horizontal span6" name=""  action="login.php" method="POST">
                              <input class="proid" type="hidden" name="proid" id="proid" value="">
                                <div class="form-group">
                                  <div class="col-md-10">
                                    <label class="col-md-4 control-label" for=
                                    "U_USERNAME"><?php echo $lang['USERNAME'];?></label>

                                    <div class="col-md-8">
                                       <input   id="U_USERNAME" name="U_USERNAME" placeholder="Username" type="text" class="form-control input-sm" >

                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-md-10">
                                    <label class="col-md-4 control-label" for=
                                    "U_PASS"><?php echo $lang['PASSWORD'];?></label>

                                    <div class="col-md-8">
                                     <input name="U_PASS" id="U_PASS" placeholder="Password" type="password" class="form-control input-sm">

                                    </div>
                                  </div>
                                </div>

                                  <div class="form-group">
                                  <div class="col-md-10">
                                    <label class="col-md-4 control-label" for=
                                    "FIRSTNAME"> </label>

                                    <div class="col-md-8">
                                    <button type="submit" id="modalLogin" name="modalLogin" class="btn btn-pup"><span class="glyphicon glyphicon-log-in "></span>   <?php echo $lang['LOGIN'];?></button>
                                     <button class="btn btn-default" data-dismiss="modal" type="button"><?php echo $lang['CLOSE'];?></button>
                                    </div>
                                  </div>
                                </div>

                                <legend class="text-muted text-center">or</legend>

                                <?php
                                $loginGoogle = '"'.$google_client->createAuthUrl().'"';
                                 ?>

                                <div class="form-group">
                                   <div class="col-md-10">
                                    <label class="col-md-4 control-label" for= "FIRSTNAME"> </label>
                                    <div class="col-md-8">
                                      <a href=<?php echo $loginFacebook ?> class="btn btn-block btn-social btn-facebook"><span class="fa fa-facebook"></span> Sign in with Facebook</a>

                                      </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                   <div class="col-md-10">
                                    <label class="col-md-4 control-label" for= "FIRSTNAME"> </label>
                                    <div class="col-md-8">
                                       <a href=<?php echo $loginGoogle ?>  class="btn btn-block btn-social btn-google"><span class="fa fa-google"></span> Sign in with Google</a>
                                      </div>
                                  </div>
                                </div>
                                
                            </form>

                       </div>

                    </div>
                  </div>
                  <!-- end login panel -->
                  <div class="tab-pane fade in active" id="home2">
                      <!-- <h4>Login Tab</h4>  -->
                       <div class="panel panel-pup">
                        <div class="panel-heading">
                            <?php echo $lang['RECOVER_PASS'];?>
                        </div>
                        <div class="panel-body">

                           <form class="form-horizontal span6" name=""  action="login.php" method="POST">
                              <input class="proid" type="hidden" name="proid" id="proid" value="">

                                  <div class="form-group">
                                  <div class="col-md-10">
                                    <label class="col-md-4 control-label" for=
                                    "FIRSTNAME"> </label>

                                    <div class="col-md-8">
                                      <a class="btn btn-outline-primary" href="passwordrecover.php?lang=en" ><?php echo $lang        ['GO_TO_RECOVER'];?></a>

                                    </div>
                                  </div>
                                </div>


                            </form>

                       </div>

                    </div>
                  </div>
                  <!-- sign in panel -->
                  <div class="tab-pane fade" id="profile">
                      <!-- <h4>Customer Details</h4>  -->

                           <form  class="form-horizontal span6" action="customer/controller.php?action=add" onsubmit="return personalInfo();" name="personal" method="POST" enctype="multipart/form-data">
                                <div class="panel panel-pup">
                                    <div class="panel-heading">
                                       <?php echo $lang['REGISTER_NOW'];?>
                                    </div>
                                     <div class="panel-body">
                                      <input class="proid" type="hidden" name="proid" id="proid" value="">
                                      <div class="form-group">
                                        <div class="col-md-10">
                                          <label class="col-md-4 control-label" for=
                                          "FNAME"><?php echo $lang['FIRST_NAME'];?></label>
                                          <!-- <input  id="CUSTOMERID" name="CUSTOMERID"  type="HIDDEN" value="<?php echo $res->AUTO; ?>">  -->
                                          <div class="col-md-8">
                                             <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
                                                "First Name" type="text" value="">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-md-10">
                                          <label class="col-md-4 control-label" for=
                                          "LNAME"><?php echo $lang['LAST_NAME'];?> </label>

                                          <div class="col-md-8">
                                             <input class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
                                                "Last Name" type="text" value="">
                                          </div>
                                        </div>
                                      </div>

                                       <div class="form-group">
                                        <div class="col-md-10">
                                          <label class="col-md-4 control-label" for=
                                          "GENDER"><?php echo $lang['GENDER'];?> </label>

                                          <div class="col-md-8">
                                            <input  id="GENDER" name="GENDER" placeholder=
                                                "Gender" type="radio" checked="true" value="Male"><b> <?php echo $lang['MALE'];?> </b>
                                                <input   id="GENDER" name="GENDER" placeholder=
                                                "Gender" type="radio" value="Female"> <b> <?php echo $lang['FEMALE'];?> </b>
                                          </div>
                                        </div>
                                      </div>

                                       <div class="form-group">
                                            <div class="col-md-10">
                                              <label class="col-md-4 control-label" for=
                                              "CITYADD"><?php echo $lang['CITY'];?></label>

                                              <div class="col-md-8">
                                                 <input class="form-control input-sm" id="CITYADD" name="CITYADD" placeholder=
                                                    "Municipality/City Address" type="text" value="">
                                              </div>
                                            </div>
                                          </div>


                                      <div class="form-group">
                                        <div class="col-md-10">
                                          <label class="col-md-4 control-label" for=
                                          "CUSUNAME"><?php echo $lang['USERNAME'];?></label>

                                          <div class="col-md-8">
                                             <input class="form-control input-sm" id="CUSUNAME" name="CUSUNAME" placeholder=
                                                "Username" type="text" value="">
                                          </div>
                                        </div>
                                      </div>

                                       <div class="form-group">
                                        <div class="col-md-10">
                                          <label class="col-md-4 control-label" for=
                                          "CUSPASS"><?php echo $lang['PASSWORD'];?></label>

                                          <div class="col-md-8">
                                             <input class="form-control input-sm" id="CUSPASS" name="CUSPASS" placeholder=
                                                "Password" type="password" value=""><span></span>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-md-10">
                                          <label class="col-md-4 control-label" for=
                                          "PASS"></label>

                                          <div class="col-md-8">
                                          <p><?php echo $lang['NOTE'];?></p>
                                            <?php echo $lang['ANOTATION'];?>
                                         </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-md-10">
                                          <label class="col-md-4 control-label" for=
                                          "PHONE"><?php echo $lang['CONTACT_NUMBER'];?></label>

                                          <div class="col-md-8">
                                             <input class="form-control input-sm" id="PHONE" name="PHONE" placeholder=
                                                "+51 0000000000" type="number" value="">
                                          </div>
                                        </div>
                                      </div>



                                       <div class="form-group">
                                        <div class="col-md-10">
                                           <label class="col-md-4" align = "right"for=
                                          "image"></label>
                                          <div class="col-md-8">
                                        <p>  I <input type="checkbox" id="conditionterms" name="conditionterms" value="checkbox" />
                                           <small><?php echo $lang['AGREE']; ?> <a class="toggle-modal"  onclick=" OpenPopupCenter('terms.php','Terms And Codition','600','600')"  ><b><?php echo $lang['TERMS']; ?></b></a></small>

                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-md-10">
                                           <label class="col-md-4" align = "right"for=
                                          "image"></label>
                                          <div class="col-md-8">
                                            <input type="submit"  name="submit"  value="Sign Up"  class="submit btn btn-pup"  />
                                             <button class="btn btn-default" data-dismiss="modal" type=
                                                "button"><?php echo $lang['CLOSE'];?></button>
                                          </div>
                                        </div>
                                      </div>



                                     </div>

                            </div>
                            <!-- end panel sign up -->
                        </form>
                   </div>
              </div>


          </div> <!-- /.modal-body -->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div>
  </div>
<!-- end sign up modal -->





<script language="javascript" type="text/javascript">
        function OpenPopupCenter(pageURL, title, w, h) {
            var left = (screen.width - w) / 2;
            var top = (screen.height - h) / 4;  // for 25% - devide by 4  |  for 33% - devide by 3
            var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        }
    </script>
