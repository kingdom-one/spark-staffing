export default function loggedOutHeaderControl() {
	const parentEl = document.querySelector('.btn--register');
	if (!parentEl) return;
	parentEl.addEventListener('mouseover', (el) => {
		if (!el.target.classList.contains('btn--register')) return;
		parentEl
			.querySelector('.x-anchor-text-primary')
			.classList.toggle('hoverText');
		parentEl.querySelector('.x-anchor').classList.toggle('hoverTextBackground');
	});
}
