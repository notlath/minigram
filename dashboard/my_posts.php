<?php
include "header.php";
$userid = $_SESSION['userid'];
$sql_posts = "SELECT * FROM posts WHERE userid='".$userid."'";
$res_posts = mysqli_query($connect, $sql_posts);

echo "
<center>
<div class='table-responsive' style='width: 90%'>
    <table class='table table-bordered'>
        <tr>
            <th width='7%'>POST ID</th>
            <th width='40%'>IMAGE</th>
            <th width='10%'>DATE POSTED</th>
            <th width='25%'>TEXT</th>
        </tr>
";
while($row_posts = mysqli_fetch_array($res_posts))
{
    echo '<tr>';
        echo "<td><center>";
            echo $row_posts['postid'];
        echo "</center></td>";
        echo "<td>";
            echo "<img src='../uploads/".$row_posts['image']."' alt='".$row_posts['image']."'/>";
        echo "</td>";
        echo "<td>";
            echo date('Y-m-d', strtotime($row_posts['timestamp']));
        echo "</td>";
        echo "<td>";
            echo $row_posts['text'];
        echo "</td>";
    echo '</tr>';
}
echo " 
</table>
</div>
</center>";
?>

<script>
let timestamp = document.getElementById('timestamp').innerHTML;
document.getElementById('timestamp').innerHTML = moment(timestamp).fromNow();

</script>