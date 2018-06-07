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

