<?php
require APPROOT . '/views/student/include/head.php';
require APPROOT . '/views/student/include/nav.php';
$afwezigheidModel = new Afwezigheid();
if(isset($_SESSION['student_id'])) {
  $studentid = $_SESSION['student_id'];
  $resultsArr = $afwezigheidModel->getAfwezigheid($studentid);
} else {
  header("Location: " . URLROOT . '/student/login');
}


?>  

<!doctype html>
<style>
table {
  border-collapse: collapse;
  width: 80%;
  margin-left: 25px;
  border-spacing: 0;
}
.tableFixHead    { overflow-y: auto!important; overflow-x: hidden; height: 40%; }
.tableFixHead th { position: sticky; top: 0; }

/* Just common table stuff. */
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px; }
th     { background:#eee; }

th, td {
  padding: 8px;
  border-bottom: 1px solid #DDD;
}


.hover:hover {background-color: #D6EEEE;}
</style>
<?php if($afwezigheidModel->getLeeftijd() >= ABSENTIE_LEEFTIJD) { ?>
<h3>Nieuwe absentie toevoegen</h3>
<h6>Laat de tijd velden leeg als je de hele dag afwezig ben</h6><br>
  <form method="post">
    <input type="text" name="reden" placeholder="Reden"><br><br>
    <p style="color: black;">Vanaf</p><input type="date" name="vanaf"><input type="time" name="vanaf-tijd"><br><br>
    <p style="color: black;">Tot</p><input type="date" name="tot"><input type="time" name="tot-tijd"><br><br>
    <input type="hidden" name="studentid" value="<?php echo $studentid; ?>">
    <input type="submit" name="submit" value="Voeg absentie toe">
  </form>
  
  <?php } ?>
    <br><br><br>
    <h3>Absenties</h3>
    <br><br><br>
  <div class="tableFixHead">
    <table >
      <!-- style="overflow-y: scroll; white-space: nowrap; -webkit-overflow-scrolling: touch; width: 100%;" -->
        <tr>
          <thead>
            <th><strong>Nummer</strong></th>
            <th><strong>Absentie</strong></th>
            <th><strong>Reden</strong></th>
            <th><strong>Vanaf</strong></th>
            <th><strong>Tot</strong></th>
            <th><strong>Aantal lessen gemist</strong></th>
          </thead>
        </tr>
        <tbody>
        <?php $i = count($resultsArr); $i++; foreach($resultsArr as $result) { $i--;  ?>
            <tr class='hover'>
                <th><?php echo $i;?></th>
                <th><?php echo $result->absentie;?></th>
                <th><?php echo $result->reden;?></th>
                <th><?php echo $result->vanaf;?></th>
                <th><?php echo $result->tot;?></th>
                <th><?php echo $afwezigheidModel->getAantalLessenGemist($result->vanaf, $result->tot, $_SESSION['student_klas']);?></th>
            </tr>
            <?php } ?>
        </tbody>
    </table>
  </div>
</body>    
</html>