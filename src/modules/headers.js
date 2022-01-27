export default class Header {
	constructor() {
		this.loggedOutHeaderControl();
		this.preventPageReload();
		// this.toggleCart();
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
	toggleCart() {
		const cart = document.querySelector('.widget_shopping_cart_content');
		const cartToggle = document.getElementById('cartToggle');
		const addToCart = document.querySelector('.add_to_cart_button');
		console.log(cart);
		console.log(cart.children.length);
		for (let i = 0; i < cart.children.length; i++) {
			console.log(cart.children[i].tagName);
		}
		if (cart.children.length === 0) {
			cartToggle.style.display = 'none';
		}
		addToCart.addEventListener('click', () => {
			if (!cartToggle.style.display === 'none') return;
			cartToggle.style.display = 'inline-flex';
		});
	}
}
