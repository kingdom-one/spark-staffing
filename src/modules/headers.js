export default class Header {
	constructor() {
		this.preventPageReload();
	}

	preventPageReload() {
		const topLinks = document.querySelectorAll('.prevent-default');
		topLinks.forEach((el) => {
			const link = el.querySelector('a');
			link.addEventListener('click', (e) => e.preventDefault());
		});
	}
}
