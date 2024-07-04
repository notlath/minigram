<?php
include "header.php";

$sql_posts = "SELECT * FROM posts ORDER BY timestamp DESC";
$res_posts = mysqli_query($connect, $sql_posts);

echo "
<center>
<div class='table-responsive' style='width: 90%'>

    <table class='table table-bordered'>
        <tr>
            <th width='7%'>POST ID</th>
            <th width='40%'>IMAGE</th>
            <th width='10%'>DATE POSTED</th>
            <th width='25%'>DESCRIPTION</th>
        </tr>
";

while($row_posts = mysqli_fetch_array($res_posts))
{
    $postid = $row_posts['postid'];
    $image = $row_posts['image'];
    $timestamp = $row_posts['timestamp'];
    $text = $row_posts['text'];

    echo '<tr>';

        echo "<td>";
            echo "<center>";
                echo $postid;
            echo "</center>";
        echo "</td>";

        echo "<td>";
            echo "<img src='../uploads/".$image."' alt='".$image."'/>";
        echo "</td>";
        
        echo "<td>";
            echo date('Y-m-d', strtotime($timestamp)); // Format the timestamp to only show the date
        echo "</td>";
        
        echo "<td>";
            echo $text;
        echo "</td>";

    echo '</tr>';
}


echo " 
    </table>
    </div>
    </center>";

?>


<script>
let timestamps = document.querySelectorAll('.timestamp');
timestamps.forEach(function(timestamp) {
    let localTime = moment.utc(timestamp.innerHTML).tz('Asia/Manila').fromNow();
    timestamp.innerHTML = localTime;
});

</script>