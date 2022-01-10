import '../scss/bp-spark.scss';
// import ChurchProfile from './modules/churchProfileScripts';
import { sparkCopyrightInjection } from './modules/copyright';
import { sparkFeaturedJob } from './modules/featuredJob';
// const churchProfile = new ChurchProfile();
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
	setTimeout(sparkFeaturedJob, 7000);
}
init();
