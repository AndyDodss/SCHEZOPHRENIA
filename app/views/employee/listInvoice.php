<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  

    <!-- Bootstrap core CSS -->
    <link href="../../../test-samer/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../../../test-samer/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="../../../test-samer/assets/css/style.css" rel="stylesheet">
    <link href="../../../test-samer/assets/css/style-responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="../../../test-samer/css/style.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
     <!-- MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 
          
          	<h3><i class="fa fa-angle-right"></i> Blank Page</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		<p>Place your content here.</p>
          		</div>
          	</div>
			
  <div id="f-accordion">
    <h3><i class="fa fa-tasks"></i> List Invoices</h3>
  <div>
  
    <p>
    show all Invoices we have
    </p>
	
	<aside class="alert success">
  <p><i class="icon fa fa-envelope-o"></i> Roger Roger, Message Received. <i class="close fa fa-times"></i></p>
</aside><!-- end alert -->

<input type="search" class="light-table-filter" data-table="order-table" placeholder="FILTER BY ROLE" /> <a class="button"><i class="fa fa-exclamation-circle"></i> Report Error</a>
	<section class="table-box">
		<table class="order-table">
			<thead>
				<tr>
					<th>NAME</th>
					<th>ID</th>
					<th>ITEMID</th>
					<th>Mount</th>
                    <th>UNITPRICE</th>
                    <th>TOTALPRICE</th>
					<th>INVOICEDATE</th>
                                       
				</tr>
			</thead>
			<tbody>
				 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM `invoices`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$l=$row["itemId"];
    	$sql = "SELECT `name` FROM `items` WHERE `id`=$l";
        $sult = $conn->query($sql);
        $rw = $sult->fetch_assoc();
        echo "<tr> "."<th>".$rw["name"]."</th>"."<th>".$row["id"]."</th>"."<th>".$row["itemId"]."</th>"."<th>".$row["Mount"]."</th>"."<th>".$row["unitPrice"]      ."</th>"."<th>".$row["totalPrice"]."</th>"."<th>".$row["invoiceDate"]."</th>"."</tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
            	




	       ?>		
			</tbody>
		</table>
	</section>
	
  </div>

</div>
	
	<!-- jQuery via Google's CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  
  

    <script  src="../../../test-samer/js/index.js"></script>



  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../../../test-samer/assets/js/jquery.js"></script>
    <script src="../../../test-samer/assets/js/bootstrap.min.js"></script>
    <script src="../../../test-samer/assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../../../test-samer/assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="../../../test-samer/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../../../test-samer/assets/js/jquery.scrollTo.min.js"></script>
    <script src="../../../test-samer/assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="../../../test-samer/assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
