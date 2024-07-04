<?php
include "header.php";

$sql_posts = "SELECT * FROM posts ORDER BY timestamp DESC";
$res_posts = mysqli_query($connect, $sql_posts);

while($row_posts = mysqli_fetch_array($res_posts))
{
    $postid = $row_posts['postid'];
    $image = $row_posts['image'];
    $timestamp = $row_posts['timestamp'];
    $text = $row_posts['text'];

    echo "<center><div class='table-responsive' style='width: 90%'>";
    echo "<table class='table table-bordered'>";
    
    // POST ID
    echo "<tr><th width='20%'>POST ID</th>";
    echo "<td>".$postid."</td></tr>";
    
    // IMAGE
    echo "<tr><th>IMAGE</th>";
    echo "<td><img src='../uploads/".$image."' alt='".$image."'/></td></tr>";
    
    // DATE POSTED
    echo "<tr><th>DATE POSTED</th>";
    echo "<td>".date('Y-m-d', strtotime($timestamp))."</td></tr>";
    
    // TEXT
    echo "<tr><th>TEXT</th>";
    echo "<td>".$text."</td></tr>";
    
    echo "</table></div></center>";
}

?>


<script>
let timestamps = document.querySelectorAll('.timestamp');
timestamps.forEach(function(timestamp) {
    let localTime = moment.utc(timestamp.innerHTML).tz('Asia/Manila').fromNow();
    timestamp.innerHTML = localTime;
});

</script>