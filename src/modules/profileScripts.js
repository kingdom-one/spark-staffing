/** The Goal: Replace div's p > a with a > svg
 * Step 1: Grab Elements
 * Step 2: Store HTML and Clear it from markup
 * Step 3: Create HTML inside Div
 * Step 4: Apply Styles
 */

import { socialIcons } from './abstracts.js';

/** Swap URLs for branded Icons */
export function socials() {
	// Step 1: Grab Elements
	const socialContainer = document.querySelectorAll('.social__container'); // the div
	const socialMediaSection = document.querySelector('.social-media'); // the Parent
	// Step 2: Store HTML, then Erase
	socialContainer.forEach((el) => {
		const anchor = el.querySelector('a'); // full anchor element
		const link = anchor.innerHTML; // url
		el.innerHTML = '';
		// Step 3:  Create HTML
		if (anchor.innerText.includes('facebook')) swapHTML(link, el, 'Facebook');
		if (anchor.innerText.includes('twitter')) swapHTML(link, el, 'Twitter');
		if (anchor.innerText.includes('instagram')) swapHTML(link, el, 'Instagram');
		if (anchor.innerText.includes('tiktok')) swapHTML(link, el, 'TikTok');
		if (anchor.innerText.includes('pinterest')) swapHTML(link, el, 'Pinterest');
		if (anchor.innerText.includes('vimeo')) swapHTML(link, el, 'Vimeo');
		if (anchor.innerText.includes('youtube')) swapHTML(link, el, 'Youtube');
		if (anchor.innerText.includes('linkedin')) swapHTML(link, el, 'Linkedin');

		// Step 4: Apply Styles
		socialMediaSection.querySelector(
			'.bp-profile__section--content',
		).style.display = 'flex';
	});
}

/** Generate HTML with branded SVG
 * @param {string} link - the link to href
 * @param {Node} el - the `div` to rewrite in
 * @param {string} platform - the name of the platform (must be capitalized to match `socialIcons` object key)
 */
function swapHTML(link, el, platform) {
	const icon = socialIcons.findIndex((el) => el.platform === platform);
	el.innerHTML = `<a href="${link}" target="_blank" class="social--link" >${socialIcons[icon].icon}</a>`;
	const svg = el.querySelector('svg');
	svg.style.fill = `${socialIcons[icon].brand}`;
}
