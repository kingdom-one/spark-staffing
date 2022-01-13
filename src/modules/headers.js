export default class Header {
	constructor() {
		this.loggedOutHeaderControl();
		this.preventPageReload();
	}
	loggedOutHeaderControl() {
		const parentEl = document.querySelector('.btn--register');
		if (!parentEl) return;
		parentEl.addEventListener('mouseover', (el) => {
			if (!el.target.classList.contains('btn--register')) return;
			parentEl
				.querySelector('.x-anchor-text-primary')
				.classList.toggle('hoverText');
			parentEl
				.querySelector('.x-anchor')
				.classList.toggle('hoverTextBackground');
		});
	}
	preventPageReload() {
		const topLinks = document.querySelectorAll('.prevent-default');
		topLinks.forEach((el) => {
			const link = el.querySelector('a');
			link.addEventListener('click', (e) => e.preventDefault());
		});
	}
}
