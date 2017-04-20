var i = 0
var contenu = '<input class="submit" id="submit0" type="submit" name="submit" value="Submit"><br><br><label class="name2" for="name">Name of the event :</label><select class="name" name="name0"><option value="1">Bowling</option><option value="2">Afterwork</option><option value="3">Mini-golf</option><option value="4">Laser game</option><option value="5">Basketball</option><option value="6">Football</option></select><br><label class="date2" for="date">Date of the event :</label><input type="date" class="date" name="date0" placeholder="2017-04-30"><br><label class="time2" for="time">Time of the event :</label><input type="time" class="time" name="time0" placeholder="18:00:00"><br><input class="price" id="price0" type="button" value="Add price" onclick="price(0)"><br><input type="text" id="gwenole" name="blc" value="0" hidden>'
 
function newForm(){
    i = i + 1;
    contenu = contenu + '<label class="name2" for="name">Name of the event :</label><select class="name" name="name'+ i + '"><option value="1">Bowling</option><option value="2">Afterwork</option><option value="3">Mini-golf</option><option value="4">Laser game</option><option value="5">Basketball</option><option value="6">Football</option></select><br><label class="date2" for="date">Date of the event :</label><input type="date" class="date" name="date'+ i + '" placeholder="2017-04-30"><br><label class="time2" for="time">Time of the event :</label><input type="time" class="time" name="time'+ i +'" placeholder="18:00:00"><br><input class="price" id="price'+ i +'" type="button" value="Add price" onclick="price('+ i +')"><br>';
    document.getElementById('gwenochou').innerHTML = contenu;
    document.getElementById('gwenole').setAttribute('value', i);
}

function price(d){
	document.getElementById('price'+d).setAttribute('type', 'number');
	document.getElementById('price'+d).setAttribute('name', 'price'+d);
	document.getElementById('price'+d).setAttribute('min', '0');
}