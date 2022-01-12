import '../scss/bp-spark.scss';
import { socials } from './modules/profileScripts';
import { sparkCopyrightInjection } from './modules/copyright';
import { sparkFeaturedJob } from './modules/featuredJob';
import loggedOutHeaderControl from './modules/loggedOutHeader';
import { controlAsterisk } from './modules/membershipAsterisk';

function init() {
	sparkCopyrightInjection();
	loggedOutHeaderControl();
	let URL = window.location.href;
	// sparkFeaturedJob();
	if (URL.includes('checkout')) {
		window.addEventListener('load', controlAsterisk);
	}
	if (URL.includes('profile')) {
		socials();
	}
	if (URL.includes('jobs')) {
		setTimeout(sparkFeaturedJob, 3000);
	}
}
init();
