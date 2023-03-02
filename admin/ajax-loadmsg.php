<?php
session_start();
//Import The Confif File
include("../includes/config.php");
checksession ();
$limit = 5; //Record Limit Per Page

//Get The Page No. From Post Request
if (isset($_POST['page_no'])) {
  $page = $_POST['page_no']; //Page No.
} else {
  $page = 0; //Default Page No.
}

//Fetch The Data From Datbase

$sql = "SELECT * FROM tbl_contact LIMIT {$page},$limit"; //SQL Command
$query = $conn->query($sql); //SQL Query

//Show The Data
if ($query->num_rows > 0) {
  $output = ""; //Output Variable

  while ($row = $query->fetch_assoc()) {
    $last_id = $row['id']; //Getting The Last row Id
    $output .= "<tr>
<th scope='row'>{$row['id']}</th>
<td>{$row['sender_name']}</td>
<td>{$row['sender_phone']}</td>
<td>{$row['sender_email']}</td>
<td>{$row['message_content']}</td>
<td>{$row['date']}</td>
</tr>"; //Concat The Tr In Output Variable
  }
  $output .= "<tr id='msgpagination'><td><div class='btn-div'><button class='rounded m-0 p-1' id='msgbtn' data-id='$last_id'>Load More</button>
</div>
</td>
</tr>";

  echo $output; //Send The Data

} else {
  echo ""; //No Data
}

?>