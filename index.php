<?php
include_once 'include/header.php';
include_once 'include/nav.php';
?>
<?php require "login/loginheader.php"; ?>
<script src="js/index.js" type="text/javascript"/></script>
    <!-- Page Content -->
    <div class="container">
<div style="margin-top:48px;" class="notifications top-right"></div>
        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard
                </h1>
            </div>
        </div>
        <!-- /.row -->
	<!-- Login Success Message -->

        <!-- Portfolio Item Row -->
        <div class="row">
        
               <div class="col-md-8">   
           
                <br/>
                <br/>

                <div class="table-responsive">
                <h3>Documents</h3>
		<table class="table table-striped table-hover">
		<thead>
    			<tr>
      				<th>#</th>
      				<th>File Name</th>
      				<th>File Size</th>
      				<th>Action</th>
    			</tr>
  		</thead>
  		<tbody>
		<?php
			//connect to the database
//			$id = $_COOKIE['UploaderUserId'];
			$id= ($_SESSION['username']);
			echo $id_1;
			$con = mysqli_connect("localhost","root","Pass1233~","bobchain");
			$query = "SELECT * FROM files WHERE user_id='$id'";
			$result = mysqli_query($con, $query) or die(mysql_error($con));
			//$flag = FALSE;
			while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
				$rows[] = $row;
   		 	
			} 
			$data =  json_encode($rows);
			$download_link = "http://192.168.44.129/upload/server/php/files/";
			// echo "<table class="table">";
		//	 echo "<thead><tr><th>File Name</th><th>File Size</th></tr> </thead>";
        		foreach($rows as $item) 
      			{
              			echo '<tr>';
                  		echo '<td>'.$item['id'].'</td>';
                  		echo '<td>'.$item['file_name'].'</td>';
                  		echo '<td>'.$item['file_size'].'</td>';
				echo '<td>'.'<a href="'.$download_link.$id.'/'.$item['file_name'].'"><button class="btn btn-primary">Download</button></a>';
              			echo '</tr>';
      			}

        		// Close the table
        	//	echo "</table>";
		?>
		</tbody>
		</table>
                <table class="table table-striped table-hover" id=""></table>
                </div>
            
                <br/>
                <br/>

            </div>

            <div class="col-md-4">
            <div id="description_container">
                <?php
                include_once 'include/product_description.php';
            ?> 
            </div>
            </div>

        </div>
        <!-- /.row -->


<?php
include_once 'include/footer.php';
?>        
