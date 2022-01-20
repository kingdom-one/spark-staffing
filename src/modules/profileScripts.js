import { socialIcons } from './abstracts.js';

export class ProfileScripts {
	constructor() {
		this.nav = document.querySelector(
			'nav.bp-profile__subnav.item-list-tabs.no-ajax',
		);
		this.socialContainer = document.querySelectorAll('.social__container'); // the div
		this.socialMediaSection = document.querySelector('.social-media'); // the Parent
		// Step 2: Store HTML, then Erase
	}
	/** Swap URLs for branded Icons */
	socials() {
		// Step 1: Grab Elements
		this.socialContainer.forEach((el) => {
			const anchor = el.querySelector('a'); // full anchor element
			const link = anchor.innerHTML; // url
			el.innerHTML = '';
			// Step 3:  Create HTML
			if (anchor.innerText.includes('facebook'))
				this._swapHTML(link, el, 'Facebook');
			if (anchor.innerText.includes('twitter'))
				this._swapHTML(link, el, 'Twitter');
			if (anchor.innerText.includes('instagram'))
				this._swapHTML(link, el, 'Instagram');
			if (anchor.innerText.includes('tiktok'))
				this._swapHTML(link, el, 'TikTok');
			if (anchor.innerText.includes('pinterest'))
				this._swapHTML(link, el, 'Pinterest');
			if (anchor.innerText.includes('vimeo')) this._swapHTML(link, el, 'Vimeo');
			if (anchor.innerText.includes('youtube'))
				this._swapHTML(link, el, 'Youtube');
			if (anchor.innerText.includes('linkedin'))
				this._swapHTML(link, el, 'Linkedin');

			// Step 4: Apply Styles
			this.socialMediaSection.querySelector(
				'.bp-profile__section--content',
			).style.display = 'flex';
			this.socialMediaSection.querySelector(
				'.bp-profile__section--content',
			).style.flexWrap = 'wrap';
		});
	}
	hideWooNav() {
		this.nav.style.display = 'none';
	}
	/** Generate HTML with branded SVG
	 * @param {string} link - the link to href
	 * @param {Node} el - the `div` to rewrite in
	 * @param {string} platform - the name of the platform (must be capitalized to match `socialIcons` object key)
	 */
	_swapHTML(link, el, platform) {
		const icon = socialIcons.findIndex((el) => el.platform === platform);
		el.innerHTML = `<a href="${link}" target="_blank" class="social--link" >${socialIcons[icon].icon}</a>`;
		const svg = el.querySelector('svg');
		svg.style.fill = `${socialIcons[icon].brand}`;
	}
}
