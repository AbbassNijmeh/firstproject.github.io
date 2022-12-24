<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Info</title>

    <style>
        .cust{
            color:red;
        }
    </style>
    <?php
       include 'connection.php';

       //Catch the parameter value
       $custID = $_GET['custID'];

       $sqlCustomer = 'Select * from Customers Where CustomerID = "' . $custID . '"';
       $sqlOrders   = 'Select OrderID, OrderDate, Orders.EmployeeID As EmpID, FirstName, LastName From Employees Inner Join Orders On Employees.EmployeeID = Orders.EmployeeID Where CustomerID = "' . $custID . '"';
       
       $rsCustomer  = mysqli_query($con, $sqlCustomer);
       $rsOrders    = mysqli_query($con, $sqlOrders);

       $rCustomer   = mysqli_fetch_assoc($rsCustomer);
       
    ?>
</head>
<body>
<center>
<h1><span class="cust"><?php echo $rCustomer['CompanyName'];?></span> Record</h1>

<h2>
 Phone: <?php echo $rCustomer['Phone']; ?> <br/>
 Fax: <?php echo $rCustomer['Fax']; ?> 
</h2>
</center>

<table border="1" bordercolor="black" cellspacing="0" align="center" width="80%">
    <tr>
        <td>Customer ID</td>
        <td colspan="3"><?php echo $rCustomer['CustomerID'];?></td>
    </tr>

    <tr>
        <td>Company Name</td>
        <td colspan="3"><?php echo $rCustomer['CompanyName'];?></td>
    </tr> 

    <tr>
        <td>Contact Name</td>
        <td><?php echo $rCustomer['ContactName'];?></td>
        <td>Contact Title</td>
        <td><?php echo $rCustomer['ContactTitle'];?></td>
    </tr>

    <tr>
        <td>Phone</td>
        <td><?php echo $rCustomer['Phone'];?></td>
        <td>Fax</td>
        <td><?php echo $rCustomer['Fax'];?></td>
    </tr>  
    
    <tr>
        <td>Address</td>
        <td colspan="3"><?php echo $rCustomer['Address'];?></td>
    </tr> 
</table>

<br/>

<table border="1" bordercolor="black" cellspacing="0" align="center" width="80%">
<tr>
 <th>Order ID</th>
 <th>Order Date</th>
 <th>Employee</th>
 <th>Total</th>
</tr>

<?php 
  $gTot = 0;
  while($rOrder = mysqli_fetch_assoc($rsOrders)) 
  { 
    $sqlTotal = 'Select OrderID, SUM(UnitPrice * Quantity) As Tot From Order_Details Where OrderID = ' . $rOrder['OrderID'];
    $rsTotal  = mysqli_query($con, $sqlTotal);
    $rTotal   = mysqli_fetch_assoc($rsTotal);
?>

<tr>
  <td align="center"><?php echo $rOrder['OrderID']; ?></td>  
  <td><?php echo $rOrder['OrderDate']; ?></td> 
  <td><?php echo $rOrder['FirstName'] . ' ' . $rOrder['LastName']; ?></td> 
  <td align="right">$ <?php echo $rTotal['Tot']; ?></td> 
</tr>
<?php 
    $gTot += $rTotal['Tot'];
  }
?>

<tr>
 <td colspan="3" align="right">Grand Total</td>
 <td align="right" style="background-color:red;color:white;font-weight:bold;">$ <?php echo $gTot;?></td>
</tr>
</table>
</body>
</html>