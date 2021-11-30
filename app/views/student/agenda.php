<?php
// print_r($data[1]);
// $datas = $data['data'];

require APPROOT . '/views/student/include/head.php';
require APPROOT . '/views/student/include/nav.php';

?>  
<style>
table {
  border-collapse: collapse;
  width: 80%;
  margin-left: 25px;
  border-spacing: 0;
}
.tableFixHead th { position: sticky; top: 0; }

table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px; }
th     { background:#eee; }

th, td {
  padding: 8px;
  border-bottom: 1px solid #DDD;
}


.hover:hover { background-color: #D6EEEE; }
</style>
<?php
$i = 0;
foreach($data[0] as $date) {
?>

<div style="padding-top: 30px;"><h3><?php echo $date[$i]['dayname'];?></h3><p><?php echo $date[$i]['day'] . '-' . $date[$i]['month'] . '-' . $date[$i]['year']; ?></p></div>
<table>
    <tr>
        <thead>
            <th><strong>Vak</strong></th>
            <th><strong>Docent</strong></th>
            <th><strong>Vanaf</strong></th>
            <th><strong>Tot</strong></th>
        </thead>
    </tr>
    <tbody>
    <?php  foreach($data[1] as $les) {
        $vanafArr = explode('-', $les->vanaf);
        $totArr = explode('-', $les->tot);
        $vanafArr[2] = explode(" ", $vanafArr[2]);
        $totArr[2] = explode(" ", $totArr[2]);
        if($date[$i]['day'] == $vanafArr[2][0] && $date[$i]['month'] == $vanafArr[1] && $date[$i]['year'] == $vanafArr[0]
        && $date[$i]['day'] == $totArr[2][0] && $date[$i]['month'] == $totArr[1] && $date[$i]['year'] == $totArr[0]
        ) {
    ?>
    
    <tr class='hover'>
        <th><?php  echo $les->naam; ?></th>
        <th><?php  echo $les->docent; ?></th>
        <th><?php  echo $vanafArr[2][1]; ?></th>
        <th><?php  echo $totArr[2][1]; ?></th>
    </tr>
        <?php }}?>
    </tbody>
    

</table>



<?php } ?>

</body>
</html>