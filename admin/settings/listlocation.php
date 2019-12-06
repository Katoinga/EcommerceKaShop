<?php
		check_message();
		?>

		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header"><?php echo $lang['LIST_OF_LOCATION'];?>  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> <?php echo $lang['NEW'];?></a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="controller.php?action=delete" Method="POST">
			    <div class="table-responsive">
				<table id="dash-table"  class="table table-striped table-bordered table-hover "  style="font-size:12px" cellspacing="0" >

				  <thead>
				  	<tr>
				  		<th><?php echo $lang['PLACE'];?></th>
				  		<th><?php echo $lang['DELIVERY_FEE'];?></th>
				  		<th><?php echo $lang['ACTION'];?></th>
				  	</tr>
				  </thead>

			  <tbody>
				  	<?php
				  		$query = "SELECT * FROM `tblsetting` ";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';

				  		echo '<td>'.$result->BRGY.' '.$result->PLACE.'  </a></td>';  ;
				  		echo '<td> &#36 '.  number_format($result->DELPRICE,2).'</td>';
				  		echo
				  		 '<td align="left">
							<a href="'.web_root.'admin/settings/index.php?view=edit&id='.$result->SETTINGID.'" class="btn btn-primary btn-xs"><?php echo $lang['EDIT'];?></a>
						 </td>';
				  	}
				  	?>
				  </tbody>


				</table>

				<!-- <div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><i class="fa fa-trash fw-fa"></i> Delete Selected</button>
				</div> -->
				</div>
				</form>
