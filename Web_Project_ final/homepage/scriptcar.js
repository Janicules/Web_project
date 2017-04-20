var change1 = 0;
var time1;

function carrousel(){
	if(change1 == 0) {
		change1 = 1;
	}
	else if(change1 == 1){
		change1 = 2;
	}
	else if(change1 ==2){
		change1 = 0;
	}
}

function gauche(){
	if(change1 == 0){
		clearInterval(time1);
		time1 = setInterval(carrousel, 2000);
		carrousel();
	}
	else if(change1 == 1){
		clearInterval(time1);
		time1 = setInterval(carrousel, 2000);
		carrousel();
	}
	else if(change1 ==2){
		clearInterval(time1);
		time1 = setInterval(carrousel, 2000);
		carrousel();
	}
}

function droite(){
	if(change1 == 0){
		clearInterval(time1);
		time1 = setInterval(carrousel, 2000);
		carrousel();
	}
	else if(change1 == 1){
		clearInterval(time1);
		time1 = setInterval(carrousel, 2000);
		carrousel();
	}
	else if(change1 ==2){
		clearInterval(time1);
		time1 = setInterval(carrousel, 2000);
		carrousel();
	}
}