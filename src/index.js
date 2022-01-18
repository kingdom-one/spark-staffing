import '../scss/bp-spark.scss';
import { socials } from './modules/profileScripts';
import Footer from './modules/footerScripts';
import Header from './modules/headers';
import { sparkFeaturedJob } from './modules/featuredJob';
import { packageSelector } from './modules/postAJob';
import { replacedRequiredTag, controlAsterisk } from './modules/requiredFields';
import highlightApplications from './modules/jobApplications';
function init() {
	const footer = new Footer();
	const header = new Header();
	let URL = window.location.href;
	replacedRequiredTag();
	if (URL.includes('checkout')) {
		setTimeout(controlAsterisk, 500);
	}
	if (URL.includes('profile')) {
		socials();
	}
	if (URL.includes('jobs')) {
		setTimeout(sparkFeaturedJob, 2500);
	}
	if (URL.includes('post-a-job')) {
		packageSelector();
	}
	if (URL.includes('job-dashboard')) {
		highlightApplications();
	}
}
init();
