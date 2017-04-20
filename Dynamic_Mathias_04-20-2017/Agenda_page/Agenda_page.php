<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>BDE CESI</title>
		<link rel="stylesheet" type="text/css" href="Agenda_page.css" />
        <!-- Bond the HTML page to a CSS page which allow to put icon in front of Facebook, Twitter,  YouTube and Cart -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript">
			jQuery(function($){
				$('.month').hide();
				$('.month:first').show();
				$('.months a:first').addClass('active');
				var current = 1;

				$('.months a').click(function(){
					// Stock the month selected
					var month = $(this).attr('id').replace('linkMonth','');
					if(month != current){
						$('#month'+current).slideUp();
						$('#month'+month).slideDown();
						$('.months a').removeClass('active');
						$('.months a#linkMonth'+month).addClass('active');

						current = month;
					}
					return false;
				});
			});
		</script>
    <!-- End of the metadata page  -->
	</head>

	<body>

		 <header id="header">
            <!-- Create a block of elements -->
            <div id="red_bar">

                    <img src="../Images/logo.png" alt="Logo of Exia CESI">

                    <nav>
                        <!-- Links with same properties thanks to the attribute "class" -->
                        <a href="../Gallery_Users/gallery_users.html" class="selected">Gallery</a>
                        <a href="../Agenda's_page/Agenda's_page.html" class="selected">Schedule</a>
                        <a href="../Shop/Shop.html" class="selected">Shop</a>
                        <a href="../Pinned_Gallery/pinned_gallery.html" class="selected">Pinned pictures</a>
                    </nav>

                    <a href="../homepage/homepage.html" id="logout" class="log">Log out</a>
                    <a href="../Profile's_page/Profile's_page.html" class="log">Your account</a>

            </div>

            <div id="white_bar">
                    <nav>
                        <a href=""><i class="fa fa-facebook-square"></i>&nbsp Facebook</a>
                        <a href=""><i class="fa fa-twitter-square"></i>&nbsp Twitter</a>
                        <a href=""><i class="fa fa-youtube-square"></i>&nbsp Youtube</a>
                        <a href="../Pannier's_page/Pannier's_page.html"><i class="fa fa-shopping-cart"></i>&nbsp Cart</a>
                    </nav>
            </div>
        </header>
		<?php
			require('../Connection_To_BDD/connection_BDD.php');
			require('date.php');
			$date = new Date();
			$year = date('Y');
			$name = $date->getName($year);
			$locate = $date->getLocation($year);
			$timer = $date->getTime($year);
			$dates = $date->getAll($year);
		?>
		<div class="periods">
			<div class="year"><?php echo $year; ?></div>
			<div class="months">
				<ul>
					<!-- We go through the array of the var months in the class Date and for each iteration, the value of the current element will be assigned to $m; and we assigned the $id for each iteration -->
					<?php foreach ($date->months as $id=>$m): ?>
						<li><a href="" id="linkMonth<?php echo $id+1; ?>"><?php echo substr($m,0,3); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="clear"></div>
			<?php  $dates = current($dates); ?>
			<?php foreach ($dates as $m => $days): ?>
				<div class="month relative" id="month<?php echo $m; ?>">
				<table>
					<thead>
						<tr>
							<?php foreach ($date->days as $d): ?>
								<th><?php echo substr($d, 0, 3); ?></th>
							<?php endforeach; ?>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php $end = end($days); foreach ($days as $d => $w): ?>
								<?php $time = strtotime("$year-$m-$d"); ?>
								<?php if($d == 1 && $w != 1): ?>
									<td colspan="<?php echo $w-1; ?>" class="passing"></td>
								<?php endif; ?>
								<td<?php if($time == strtotime(date('Y-m-d'))): ?> class="today" <?php endif; ?>>
									<div class="relative">
										<div class="day"><?php echo $d; ?></div>
									</div>
									<div class="daytitle">
										<?php echo $date->days[$w-1]; ?> <?php echo $d; ?> <?php echo $date->months[$m-1]; ?>
									</div>
									<ul class="events">
										<?php if(isset($name[$time])): foreach($name[$time] as $names): ?>
											<li><?php echo $names; ?></li>
										<?php endforeach; endif; ?>
									</ul>
								</td>
								<?php if($w == 7): ?>
									</tr><tr>
								<?php endif; ?>
							<?php endforeach; ?>
							<?php if($end != 7): ?>
								<td colspan="<?php echo 7-$end; ?>" class="passing"></td>
							<?php endif; ?>
						</tr>
					</tbody>
				</table>
				</div>
			<?php endforeach; ?>
		</div>
		<div id="button">
			<a href="../Event_Creation/Event_Creation.html"><button type="button" class="button">Create an event</button></a>
			<a href="../Vote's_page/Vote's_page.html"><button type="button" class="button">Vote for a proposition of an event</button></a>
		</div>
		<footer>
	        <!-- Link to send a mail to the webmaster -->
	    	<a href="mailto:">Contact</a>
	        <!-- Link to see the condition of use -->
	    	<a class="links" href="">Condition of use</a>
	        <!-- Link to see the privacy notice -->
	    	<a class="links" href="">Privacy notice</a>
	        <!-- Link to get help -->
	    	<a class="links" href="">Help</a>
	        <!-- End of the footer -->
	    </footer>
	</body>
</html>