var change = 0;
var time;

function carousel(){
	if(change == 0) {
		change = 1;
	}
	else if(change == 1){
		change = 2;
	}
	else if(change ==2){
		change = 0;
	}
}

function left(){
	if(change == 0){
		clearInterval(time);
		time = setInterval(carousel, 2000);
		carrousel();
	}
	else if(change == 1){
		clearInterval(time);
		time = setInterval(carousel, 2000);
		carrousel();
	}
	else if(change ==2){
		clearInterval(time);
		time = setInterval(carousel, 2000);
		carrousel();
	}
}

function right(){
	if(change == 0){
		clearInterval(time);
		time = setInterval(carousel, 2000);
		carrousel();
	}
	else if(change == 1){
		clearInterval(time);
		time = setInterval(carousel, 2000);
		carrousel();
	}
	else if(change ==2){
		clearInterval(time);
		time = setInterval(carousel, 2000);
		carrousel();
	}
}