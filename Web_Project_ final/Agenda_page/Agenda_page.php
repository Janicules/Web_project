<?php
//start of the global variable SESSION
session_start();
if(isset($_SESSION['account'])){
	echo '
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
					$(\'.month\').hide();
					$(\'.month:first\').show();
					$(\'.months a:first\').addClass(\'active\');
					var current = 1;

					$(\'.months a\').click(function(){
						// Stock the month selected
						var month = $(this).attr(\'id\').replace(\'linkMonth\',\'\');
						if(month != current){
							$(\'#month\'+current).slideUp();
							$(\'#month\'+month).slideDown();
							$(\'.months a\').removeClass(\'active\');
							$(\'.months a#linkMonth\'+month).addClass(\'active\');

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

	                    <a href="https://exia.cesi.fr/"><img src="../Images/logopng.png" alt="Logo of Exia CESI"></a>

	                    <nav>
	                        <!-- Links with same properties thanks to the attribute "class" -->
	                        <a href="../Gallery_Users/gallery_users.php" class="selected">Gallery</a>
	                        <a href="../Agenda_page/Agenda_page.php" class="selected">Schedule</a>
	                        <a href="../Shop/all.php" class="selected">Shop</a>
	                        <a href="../Pinned_Gallery/pinned_gallery.php " class="selected">Pinned pictures</a>
	                    </nav>

				        <a href="../Logout/Logout.php" id="logout" class="log">Log out</a>
	                    <a href="../Profile_page/Profile_page.php" class="log">Your account</a>

	            </div>

	            <div id="white_bar">
	                    <nav>
	                        <a href="http://www.facebook.com"><i class="fa fa-facebook-square"></i>&nbsp Facebook</a>
	                        <a href="http://www.twitter.com"><i class="fa fa-twitter-square"></i>&nbsp Twitter</a>
	                        <a href="http://www.youtube.com"><i class="fa fa-youtube-square"></i>&nbsp Youtube</a>
	                        <a href="../Pannier_page/Pannier_page.php"><i class="fa fa-shopping-cart"></i>&nbsp Cart</a>
	                    </nav>
	            </div>
	        </header>
			';
				require('../Connection_To_BDD/connection_BDD.php');
				require('date.php');
				$date = new Date();
				$year = date('Y');
				$name = $date->getName($year);
				$locate = $date->getLocation($year);
				$timer = $date->getTime($year);
				$dates = $date->getAll($year);
			echo '
			<div class="periods">
				<div class="year">'; echo $year; echo '</div>
				<div class="months">
					<ul>
						<!-- We go through the array of the var months in the class Date and for each iteration, the value of the current element will be assigned to $m; and we assigned the $id for each iteration -->
						'; foreach ($date->months as $id=>$m): echo '
							<li><a href="" id="linkMonth';echo $id+1; echo '">'; echo substr($m,0,3); echo '</a></li>
						'; endforeach; echo '
					</ul>
				</div>
				<div class="clear"></div>
				';  $dates = current($dates); echo '
				'; foreach ($dates as $m => $days): echo '
					<div class="month relative" id="month'; echo $m; echo '">
					<table>
						<thead>
							<tr>
								'; foreach ($date->days as $d): echo '
									<th>'; echo substr($d, 0, 3); echo '</th>
								'; endforeach; echo '
							</tr>
						</thead>
						<tbody>
							<tr>
								'; $end = end($days); foreach ($days as $d => $w): echo '
									'; $time = strtotime("$year-$m-$d"); echo '
									'; if($d == 1 && $w != 1): echo '
										<td colspan="'; echo $w-1; echo '" class="passing"></td>
									'; endif; echo '
									<td'; if($time == strtotime(date('Y-m-d'))): echo ' class="today" '; endif; echo '>
										<div class="relative">
											<div class="day">'; echo $d; echo '</div>
										</div>
										<div class="daytitle">
											'; echo $date->days[$w-1]; echo ' '; echo $d; echo ' '; echo $date->months[$m-1]; echo '
										</div>
										<ul class="events">
											'; if(isset($name[$time])): foreach($name[$time] as $names): echo '
												<li>'; echo $names; echo '</li>
											'; endforeach; endif; echo '
										</ul>
									</td>
									'; if($w == 7): echo '
										</tr><tr>
									'; endif; echo '
								'; endforeach; echo '
								'; if($end != 7): echo '
									<td colspan="'; echo 7-$end; echo '" class="passing"></td>
								'; endif; echo '
							</tr>
						</tbody>
					</table>
					</div>
				'; endforeach; echo '
			</div>
			<div id="button">
				<a href="../Event_Creation/Event_Creation.php"><button type="button" class="button">Create an event</button></a>
				<a href="../Vote_page/Vote_page.php"><button type="button" class="button">Vote for a proposition of an event</button></a>
			</div>

			<footer>
	            <!-- Link to send a mail to the webmaster -->
	            <a class="links" href="mailto:">Contact</a>
	            <!-- Link to see the condition of use -->
	            <a class="links" href="../Conditionofuse/conditions.html">Condition of use</a>
	            <!-- Link to see the privacy notice -->
	            <a class="links" href="../Privacypolicy/privacypolicy.html">Privacy policy</a>
	            <!-- End of the footer -->
	        </footer>
		</body>
	</html>';
}
else{
	echo '
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
					$(\'.month\').hide();
					$(\'.month:first\').show();
					$(\'.months a:first\').addClass(\'active\');
					var current = 1;

					$(\'.months a\').click(function(){
						// Stock the month selected
						var month = $(this).attr(\'id\').replace(\'linkMonth\',\'\');
						if(month != current){
							$(\'#month\'+current).slideUp();
							$(\'#month\'+month).slideDown();
							$(\'.months a\').removeClass(\'active\');
							$(\'.months a#linkMonth\'+month).addClass(\'active\');

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

	                    <a href="https://exia.cesi.fr/"><img src="../Images/logopng.png" alt="Logo of Exia CESI"></a>

	                    <nav>
	                        <!-- Links with same properties thanks to the attribute "class" -->
	                        <a href="../Gallery_Users/gallery_users.php" class="selected">Gallery</a>
	                        <a href="../Agenda_page/Agenda_page.php" class="selected">Schedule</a>
	                        <a href="../Shop/all.php" class="selected">Shop</a>
	                    </nav>

	                    <a href="../Createaccount/Createaccount.html" id="" class="log">Sign up</a>
                    	<a href="../login/login.html" class="log">Log in</a>

	            </div>

	            <div id="white_bar">
	                    <nav>
	                        <a href="http://www.facebook.com"><i class="fa fa-facebook-square"></i>&nbsp Facebook</a>
	                        <a href="http://www.twitter.com"><i class="fa fa-twitter-square"></i>&nbsp Twitter</a>
	                        <a href="http://www.youtube.com"><i class="fa fa-youtube-square"></i>&nbsp Youtube</a>
	                        <a href="../Pannier_page/Pannier_page.php"><i class="fa fa-shopping-cart"></i>&nbsp Cart</a>
	                    </nav>
	            </div>
	        </header>
			';
				require('../Connection_To_BDD/connection_BDD.php');
				require('date.php');
				$date = new Date();
				$year = date('Y');
				$name = $date->getName($year);
				$locate = $date->getLocation($year);
				$timer = $date->getTime($year);
				$dates = $date->getAll($year);
			echo '
			<div class="periods">
				<div class="year">'; echo $year; echo '</div>
				<div class="months">
					<ul>
						<!-- We go through the array of the var months in the class Date and for each iteration, the value of the current element will be assigned to $m; and we assigned the $id for each iteration -->
						'; foreach ($date->months as $id=>$m): echo '
							<li><a href="" id="linkMonth';echo $id+1; echo '">'; echo substr($m,0,3); echo '</a></li>
						'; endforeach; echo '
					</ul>
				</div>
				<div class="clear"></div>
				';  $dates = current($dates); echo '
				'; foreach ($dates as $m => $days): echo '
					<div class="month relative" id="month'; echo $m; echo '">
					<table>
						<thead>
							<tr>
								'; foreach ($date->days as $d): echo '
									<th>'; echo substr($d, 0, 3); echo '</th>
								'; endforeach; echo '
							</tr>
						</thead>
						<tbody>
							<tr>
								'; $end = end($days); foreach ($days as $d => $w): echo '
									'; $time = strtotime("$year-$m-$d"); echo '
									'; if($d == 1 && $w != 1): echo '
										<td colspan="'; echo $w-1; echo '" class="passing"></td>
									'; endif; echo '
									<td'; if($time == strtotime(date('Y-m-d'))): echo ' class="today" '; endif; echo '>
										<div class="relative">
											<div class="day">'; echo $d; echo '</div>
										</div>
										<div class="daytitle">
											'; echo $date->days[$w-1]; echo ' '; echo $d; echo ' '; echo $date->months[$m-1]; echo '
										</div>
										<ul class="events">
											'; if(isset($name[$time])): foreach($name[$time] as $names): echo '
												<li>'; echo $names; echo '</li>
											'; endforeach; endif; echo '
										</ul>
									</td>
									'; if($w == 7): echo '
										</tr><tr>
									'; endif; echo '
								'; endforeach; echo '
								'; if($end != 7): echo '
									<td colspan="'; echo 7-$end; echo '" class="passing"></td>
								'; endif; echo '
							</tr>
						</tbody>
					</table>
					</div>
				'; endforeach; echo '
			</div>
			<footer>
	            <!-- Link to send a mail to the webmaster -->
	            <a class="links" href="mailto:">Contact</a>
	            <!-- Link to see the condition of use -->
	            <a class="links" href="../Conditionofuse/conditions.html">Condition of use</a>
	            <!-- Link to see the privacy notice -->
	            <a class="links" href="../Privacypolicy/privacypolicy.html">Privacy policy</a>
	            <!-- End of the footer -->
	        </footer>
		</body>
	</html>';
}
?>