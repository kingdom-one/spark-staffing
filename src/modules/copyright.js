export function sparkCopyrightInjection() {
	const copyright = document.getElementById('copyright');
	const thisYear = new Date().getFullYear();
	const brand = 'Kingdom One';
	const kjLink =
		'<a href="https://kj.roelke.info" target ="_blank">K.J. Roelke</a>';
	copyright.innerHTML = `<p>&copy; ${thisYear} ${brand} All Rights Reserved.<br/>spark* staffing is a product by Kingdom One.<br> Learn more at <a href="https://kingdomone.co" target="_blank">kingdomone.co</a></p>`;
}
