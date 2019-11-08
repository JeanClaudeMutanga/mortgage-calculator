<?php
require 'db.php';
if (!empty($_GET['searchText'])) 
{
	echo $searchText = $_GET['searchText'];

  $query = "SELECT * FROM `calculations` WHERE `id` LIKE '%$searchText%' OR `name` LIKE '%$searchText%' ";

$query_run = mysqli_query($con, $query);
?>

  <div id="tab2" class="tab_content">

  <table class="tablesorter" cellspacing="6" align= "center"> 
			 <thead>
       <th colspan="13"> Saved calculations</th> </thead>
    <thead>
      <tr>
       
        <th>Id</th>
        <th>Name</th>       
        <th>Price</th>
        <th>Down</th> 
        <th>Interest Rate</th>
        <th>Mortgage Length</th>
        <th>Monthly Payments</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
  <?php
while ($query_row = mysqli_fetch_assoc($query_run)) 
{?>
   <tr>
   
   <td><?php echo $query_row['id']; ?></td>
   <td><?php echo $query_row['name']; ?></td>
   <td><?php echo $query_row['price']; ?></td>
   <td><?php echo $query_row['down']; ?></td>
   <td><?php echo $query_row['interest']; ?></td>
   <td><?php echo $query_row['length']; ?></td>
   <td><?php echo $query_row['monthly']; ?></td>
   <td><?php echo $query_row['date']; ?></td>
   
  </tr>
<?php
}
}

?>


</tbody>
</table>
</div><!-- end of #tab2 -->