export default class Footer {
	constructor() {
		this.sparkCopyrightInjection();
		this.homepageCredits();
	}

	sparkCopyrightInjection() {
		const copyright = document.getElementById('copyright');
		const thisYear = new Date().getFullYear();
		const brand = 'Kingdom One';
		const kjLink =
			'<a href="https://kj.roelke.info" target ="_blank">K.J. Roelke</a>';
		copyright.innerHTML = `<p>&copy; ${thisYear} ${brand} All Rights Reserved.<br/>spark* staffing is a product by Kingdom One.<br> Learn more at <a href="https://kingdomone.co" target="_blank">kingdomone.co</a></p>`;
	}
	homepageCredits() {
		if (window.location.pathname != '/') return;
		const copyright = document.getElementById('copyright');
		const iconCredits = `<span>The icons on this page came from some incredible designers. <br>See where <a href="/credits">here.</a></span>`;
		copyright.insertAdjacentHTML('afterend', iconCredits);
	}
}
