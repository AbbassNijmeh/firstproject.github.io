<!doctype html>
<html>
<head>
<title>Customers List</title>

<?php
   include 'connection.php';

   $sqlCustomers = 'Select CustomerID, CompanyName, ContactName, Phone, Fax From Customers;';
   
   $rsCustomers  = mysqli_query($con, $sqlCustomers);
   
?>

</head>

<body>
<h1 align="center">Customers List</h1>

<table border     ="1" 
       bordercolor="black"
       cellspacing="0"
       align      ="center"
       width      ="80%">
<tr>
  <th>Customer ID</th>
  <th>Company Name</th>
  <th>Contact Name</th>
  <th>Phone</th>
  <th>Fax</th>
</tr>

<?php 
   $color="#ffffff";
   while( $rCustomer = mysqli_fetch_assoc($rsCustomers)){
?>

<tr bgcolor="<?php echo $color; ?>">
  <td>
    <a href="custInfo.php?custID=<?php echo $rCustomer['CustomerID']; ?>" >
    <?php echo $rCustomer['CustomerID']; ?>
   </a>
  </td>
  <td><?php echo $rCustomer['CompanyName']; ?></td>
  <td><?php echo $rCustomer['ContactName']; ?></td>
  <td><?php echo $rCustomer['Phone']; ?></td>
  <td><?php echo $rCustomer['Fax']; ?></td>
</tr>

<?php 
   if($color=='#ffffff')
     $color='#e6faff';
   else
     $color='#ffffff';
  }
?>

</table>
</body>
</html>