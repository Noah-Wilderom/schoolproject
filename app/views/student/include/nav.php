<?php
session_start();
?>
<body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="index.html" class="logo"><?php echo WEBSITENAAM; ?></a></h1>
        <div style="display: inline-flex; width: 100px;">
          <img style="border-radius: 50%; max-width: 50px; max-height: auto; margin: auto 15px;" src="<?php echo URLROOT; ?>/public/uploads/<?php if(isset($_SESSION['student_img'])) { echo $_SESSION['student_img']; } else { echo "default.png"; }?>">
          <p style="color: #FFFFFF; margin: auto 15px;"><?php if(isset($_SESSION)) { echo $_SESSION['student_voornaam'] . " " . $_SESSION['student_achternaam']; } ?></p>
        </div>
        <ul class="list-unstyled components mb-5">
          <li class="<?php if(Helpers::getUrl()[1] == 'home') { ?> active <?php } ?>" >
            <a href="<?php echo URLROOT; ?>/student/home"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li class="<?php if(Helpers::getUrl()[1] == 'afwezigheid') { ?> active <?php } ?>" >
              <a href="<?php echo URLROOT; ?>/student/afwezigheid"><span class="fa fa-user mr-3"></span> Afwezigheid</a>
          </li>
          <li class="<?php if(Helpers::getUrl()[1] == 'agenda') { ?> active <?php } ?>" >
            <a href="<?php echo URLROOT; ?>/student/agenda"><span class="fa fa-sticky-note mr-3"></span> Agenda</a>
          </li>
          <li class="<?php if(Helpers::getUrl()[1] == 'resultaten') { ?> active <?php } ?>" >
            <a href="<?php echo URLROOT; ?>/student/resultaten"><span class="fa fa-sticky-note mr-3"></span> Resultaten</a>
          </li>
          <li class="<?php if(Helpers::getUrl()[1] == 'berichten') { ?> active <?php } ?>" >
            <a href="<?php echo URLROOT; ?>/student/berichten"><span class="fa fa-paper-plane mr-3"></span> Berichten</a>
          </li>
          <li class="<?php if(Helpers::getUrl()[1] == 'overzicht') { ?> active <?php } ?>" >
            <a href="<?php echo URLROOT; ?>/student/overzicht"><span class="fa fa-line-chart mr-3"></span> Overzicht</a>
          </li><li class="<?php if(Helpers::getUrl()[1] == 'instellingen') { ?> active <?php } ?>" >
            <a href="<?php echo URLROOT; ?>/student/instellingen"><span class="fa fa-cogs mr-3"></span> Instellingen</a>
          </li>
        </ul>

    	</nav>
      <div id="content" class="p-4 p-md-5 pt-5">
   