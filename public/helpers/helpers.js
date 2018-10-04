function randombgcolor(){
	var backgroundcolors = [
            'primary',
            'info',
            'success',
            'warning',
            'danger',
            'gray',
            'navy',
            'teal',
            'purple',
            'orange',
            'maroon',
            'black'
	];

	return backgroundcolors[Math.floor(Math.random()*backgroundcolors.length)];
}


function random_bootstrap_bgcolor(){
	var backgroundcolors = [
            'active',
            'success',
            'info',
            'warning',
            'danger'
	];

	return backgroundcolors[Math.floor(Math.random()*backgroundcolors.length)];
}

/*function toString(value) {
  return value.toString();
}*/
