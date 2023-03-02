<?php
session_start();
//Import The Confif File
include("../includes/config.php");

checksession ();

$limit = 2; //Record Limit Per Page

//Get The Page No. From Post Request
if (isset($_POST['page_no'])) {
  $page = $_POST['page_no']; //Page No.
} else {
  $page = 0; //Default Page No.
}

//Fetch The Data From Datbase

$sql = "SELECT * FROM tbl_posts LIMIT {$page},$limit"; //SQL Command
$query = $conn->query($sql); //SQL Query

//Show The Data
if ($query->num_rows > 0) {
  $output = ""; //Output Variable

  while ($row = $query->fetch_assoc()) {
    $last_id = $row['id']; //Getting The Last row Id

    $cont = substr($row['post_content'], 0, 50); //Slice The Post Content
    $output .= "<tr>
<th scope='row'>{$row['id']}</th>
<td>{$row['post_title']}</td>
<td>$cont...........</td>
<td>{$row['post_author']}</td>
<td>{$row['post-slug']}</td>
<td>{$row['post_header']}</td>
<td>{$row['post_date']}</td>
<td><button onclick='deletepost({$row['id']})' class='btn btn-danger rounded'>Delete</button></td>
</tr>"; //Concat The Tr In Output Variable
  }
  $output .= "<tr id='postpagination'><td><div class='btn-div'><button class='rounded m-0 p-1' id='postbtn' data-id='$last_id'>Load More</button>
</div>
</td>
</tr>";

  echo $output; //Send The Data

} else {
  echo ""; //No Data
}

?>