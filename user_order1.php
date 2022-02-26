<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<title>Plant</title>
<style>
body{
background-color: lightgray;

}

</style>
<body>
<center>
<form method="post" enctype="multipart/form-data">
<table width="50%" border="2" cellpadding="5" cellspacing="5">
<thead>
<tr>
<th>Name</th>
<th>Price</th>
<th>Action Time</th>
<th>Employee Email</th>

</tr>
</thead>

<?php
session_start();
include_once "connect.php";
include_once "function.php";

$user = check_login($conn);

$id = $user['user_email'];

$sql ="SELECT * 
FROM online_delivery AS o
RIGHT JOIN fertilizer As p
ON p.fertilizer_code = o.fertilizer_code
WHERE user_email= '$id'";

$count ="SELECT count(*)
FROM online_delivery AS o
RIGHT JOIN fertilizer As p
ON p.fertilizer_code = o.fertilizer_code
WHERE user_email= '$id'";

$total = mysqli_query($conn,$count);
$result = mysqli_query($conn,$sql);

while($row1 = mysqli_fetch_array($total)){
    echo "Total Order is : ".$row1['count(*)'];
}

while($row= mysqli_fetch_array($result)){
?>
<tr>

<td> <?php echo $row["f_name"] ?> </td>
<td> <?php echo $row["cost"] ?> </td>
<td> <?php echo $row["action_time"] ?> </td>
<td> <?php echo $row["employee_email"] ?> </td>

</tr>
<?php
}
?>
</table>

</form>

<a href="user_order.php"><button class='ui inverted orange button'>GO BACK</button></a>
<a href="user_order2.php"><button class='ui inverted orange button'>Other Order</button></a>
</center>
</body>
</head>
</html>