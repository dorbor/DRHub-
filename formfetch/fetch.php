<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "testing");
$output = '';

if(isset($_POST["query"])) {
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tbl_customer 
  WHERE CustomerID LIKE '".$search."' ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0) {
 
 while($row = mysqli_fetch_array($result)) {
  $customer_name = $row["CustomerName"];
  $customer_address = $row["Address"]; 
  $customer_city = $row["City"];
  $customer_pcode = $row["PostalCode"];
  $customer_country = $row["Country"];
 }


  $output .= '
   <form>
    <div class="form-group">
      <input type="text" value="'.$customer_name.'"  class="form-control">
    </div>
    <div class="form-group">
      <input type="text" value="'.$customer_address.'" class="form-control">
    </div>
    <div class="form-group">
      <input type="text" value="'.$customer_city.'" class="form-control">
    </div>
    <div class="form-group">
      <input type="text" name="PostalCode" value="'.$customer_pcode.'" class="form-control">
    </div>
    <div class="form-group">
      <input type="text" name="Country" value="'.$customer_country.'" class="form-control">
    </div>
    <button name="submit" class="btn btn-large btn-primary">Update Data</Button>
  </form>
  ';
  echo $output;
 
} else {
 

?>
<form>
    <div class="form-group">
      <input type="text" class="form-control">
    </div>
    <div class="form-group">
      <input type="text" class="form-control">
    </div>
    <div class="form-group">
      <input type="text" class="form-control">
    </div>
    <div class="form-group">
      <input type="text" name="PostalCode" class="form-control">
    </div>
    <div class="form-group">
      <input type="text" name="Country" class="form-control">
    </div>
    <button name="submit" class="btn btn-large btn-primary">Update Data</Button>
  </form>

  <?php
    }
    ?>