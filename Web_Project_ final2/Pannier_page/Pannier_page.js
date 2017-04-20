var time;

function hide(){
	$('#my_cart').slideUp();
	$('#para').text("");
	$('#checkout').slideDown();
	time = setInterval(valid, 2000);
}

function valid(){
	$('#checkout').slideUp();
	$('#valid').slideDown();
}

function price(d, p){
	var quant = document.getElementById(d+'_select').value;
	$('#'+d+'_span').text(quant*p);
	total();
}

function total(){
	var tot = 0;
	var pr;
	var i = 1;
	while(document.getElementById(i+'_span') != null){
		pr = parseInt(document.getElementById(i+'_span').innerHTML);
		tot = tot + pr;
		i++;
	}
	document.getElementById('total_price').innerHTML = tot;
}