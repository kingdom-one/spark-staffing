import '../scss/bp-spark.scss';
import { socials } from './modules/profileScripts';
import { sparkCopyrightInjection } from './modules/copyright';
import { sparkFeaturedJob } from './modules/featuredJob';
import { loggedOutHeaderControl, preventPageReload } from './modules/headers';
import { packageSelector } from './modules/postAJob';
import { replacedRequiredTag, controlAsterisk } from './modules/requiredFields';

function init() {
	sparkCopyrightInjection();
	loggedOutHeaderControl();
	preventPageReload();
	replacedRequiredTag();
	let URL = window.location.href;
	if (URL.includes('checkout')) {
		setTimeout(controlAsterisk, 500);
	}
	if (URL.includes('profile')) {
		socials();
	}
	if (URL.includes('jobs')) {
		setTimeout(sparkFeaturedJob, 3000);
	}
	if (URL.includes('post-a-job')) {
		packageSelector();
	}
}
init();
