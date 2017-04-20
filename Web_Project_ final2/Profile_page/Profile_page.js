function edit(){
	document.getElementById('my_button').innerHTML = 'import';
	document.getElementById('my_button').setAttribute("type", "file");
	document.getElementById('submit').style.visibility ="visible";
	document.getElementById('submit').css('margin-left', '=500px');
}

function first(){
	document.getElementById('first').style.visibility ="visible";
	document.getElementById('submitf').style.visibility ="visible";
	document.getElementById('first_button').style.visibility ="hidden";
}

function last(){
	document.getElementById('last').style.visibility ="visible";
	document.getElementById('submitl').style.visibility ="visible";
	document.getElementById('last_button').style.visibility ="hidden";	
}

function mail(){
	document.getElementById('mail').style.visibility ="visible";
	document.getElementById('submitm').style.visibility ="visible";
	document.getElementById('mail_button').style.visibility ="hidden";		
}

function studies(){
	document.getElementById('studies').style.visibility ="visible";
	document.getElementById('submits').style.visibility ="visible";
	document.getElementById('studies_button').style.visibility ="hidden";
}

function hide(){
	$('#profile_div').slideUp();
	$('#histo').slideDown();
}

function show(){
	$('#histo').slideUp();
	$('#profile_div').slideDown();
}