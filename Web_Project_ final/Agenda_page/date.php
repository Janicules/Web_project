<?php
	class Date{

		var $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
		var $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

		
		
		function getName($year){
			global $bdd;
			$select = $bdd->prepare('SELECT actName, actLocation , actDate FROM `activities` WHERE YEAR(actDate) = ?;');
			$select->bindParam(1, $year);
			$select->execute();

			while($d = $select->fetch(PDO::FETCH_OBJ)){
				$r[strtotime($d->actDate)][$d->actLocation] = $d->actName;
			}
			return $r;
		}

		function getLocation($year){
			global $bdd;
			$select = $bdd->prepare('SELECT actName, actLocation , actDate FROM `activities` WHERE YEAR(actDate) = ?;');
			$select->bindParam(1, $year);
			$select->execute();

			while($d = $select->fetch(PDO::FETCH_OBJ)){
				$r[strtotime($d->actDate)][$d->actName] = $d->actLocation;
			}
			return $r;
		}

		function getTime($year){
			global $bdd;
			$select = $bdd->prepare('SELECT actName, actDate, actTime FROM `activities` WHERE YEAR(actDate) = ?;');
			$select->bindParam(1, $year);
			$select->execute();

			while($d = $select->fetch(PDO::FETCH_OBJ)){
				$r[strtotime($d->actDate)][$d->actName] = $d->actTime;
			}
			return $r;
		}

		function getAll($year){
			$r = array();			
			$date = new DateTime($year.'-01-01');

			while($date->format('Y') <= $year){
				$y = $date->format('Y');
				$m = $date->format('n');
				$d = $date->format('j');
				$w = str_replace('0','7',$date->format('w'));
				$r[$y][$m][$d] = $w;
				$date->add(new DateInterval('P1D'));
			}
			return $r;
		}
	}
?>