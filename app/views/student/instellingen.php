<?php








require APPROOT . '/views/student/include/head.php';
require APPROOT . '/views/student/include/nav.php';
?>  
<img src="<?php echo URLROOT; ?>/public/uploads/<?php echo $data['img_huidig']?>"style="min-width: 150px; min-height: 150px;max-width: 150px;max-height: 150px; border-radius: 50%;">
<br><br>
<p style="color: black;">Nieuwe profielfoto</p>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="upload" id="file">
    <br><br><br>
    <input type="password" name="update-wachtwoord" placeholder="Wijzig wachtwoord">
    <br>
    <input type="tel" name="telefoonnummer" placeholder="Wijzig telefoonnummer" value="<?php echo $data['telefoonnummer_huidig']?>">
    <br>
    <div style="margin-top: 300px;">
        <input type="password" name='wachtwoord' placeholder='Huidige wachtwoord' required>
        <input type="submit" name="submit" id="submit" value='Sla instellingen op'>
    </div>
</form>
</body>
</html>

