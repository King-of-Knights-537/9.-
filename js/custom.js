$(document).ready(function() { /*Wallpaper*/

    $('.flexslider').flexslider({
        animation: "slide"
    });

});		

document.addEventListener("DOMContentLoaded", function() { /*Line*/

	var loading = new TimelineMax();
	loading.fromTo(".line-activate", 1, { 
        autoAlpha: 0, 
		x:-50
	}, { 
		autoAlpha:1,
		x:0
	})
	
	;
	
});

const counters = document.querySelectorAll('.counter'); /*Counter*/
const speed = 5000; // The lower the slower

counters.forEach(counter => {
	const updateCount = () => {
		const target = +counter.getAttribute('data-target');
		const count = +counter.innerText;

		// Lower inc to slow and higher to slow
		const inc = target / speed;

		// console.log(inc);
		// console.log(count);

		// Check if target is reached
		if (count < target) {
			// Add inc to count and output in counter
			counter.innerText = Math.ceil(count + inc);
			// Call function every ms
			setTimeout(updateCount, 1);
		} else {
			counter.innerText = target;
		}
	};

	updateCount();
});
