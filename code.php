<?php
// error_reporting(0);
$con = mysqli_connect('localhost', 'root', '', 'php-reg') or die('Unable To connect');
$show = "SELECT * from login_user";
$result = mysqli_query($con, $show);

if (mysqli_num_rows($result) > 0) {

  
if(isset($_POST['submit'])) {

    if(!isset($_POST['data'])){

        echo "Nothing Checked";
        ?>
        <script>
        setTimeout(function () {
            window.location.href= 'index.php';         
         },2000);

         </script>

         <?php
    }
	$id_array =$_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	
	$out = array();

	for($j = 0; $j < $id_count; $j++) { // each checked
    
		$id = $id_array[$j];
		$query = mysqli_query($con, "SELECT `id`, `name`,`email`,`age`,`gender`,`country` FROM `login_user` WHERE `id` = '$id'");

		while ($tbl = mysqli_fetch_assoc($query)) {
			$out[] = $tbl;		
		} 	
	}
	
	header("Content-type: text/csv"); 	
	header("Content-Disposition: attachment; filename=".time().".csv"); 	
	$output = fopen('php://output', 'w');

	fputcsv($output, array('id', 'name','email','age','gender','country'));

	
		foreach ($out as $tbl) {
			fputcsv($output, $tbl);
		}
	
}
}
else
{
    echo "<h3>No Record Found</h3>";
}
exit;
?>