import '../scss/bp-spark.scss';

import Footer from './modules/footerScripts';
import Header from './modules/headers';
import { packageSelector } from './modules/postAJob';
import { replacedRequiredTag, controlAsterisk } from './modules/requiredFields';
import highlightApplications from './modules/jobApplications';
import { ProfileScripts } from './modules/profileScripts';
import dismissals from './modules/dismissThis';
function init() {
	const profileScipts = new ProfileScripts();
	let URL = window.location.href;
	replacedRequiredTag();
	dismissals();
	if (URL.includes('checkout')) setTimeout(controlAsterisk, 500);
	if (URL.includes('profile')) {
		profileScipts.socials();
		profileScipts.restrictAccess();
	}
	if (URL.includes('profile') && URL.includes('shop'))
		profileScipts.hideWooNav();
	if (URL.includes('post-a-job')) packageSelector();
	if (URL.includes('job-dashboard')) highlightApplications();
}
init();
