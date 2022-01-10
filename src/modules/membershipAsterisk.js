const parent = document.getElementById('pmpro_form'),
	required = document.querySelectorAll('.pmpro_required'),
	asterisk = ` <span class="pmpro_asterisk"></span>`;
function addAsterisk(nodeList) {
	nodeList.forEach((item) => {
		const owner = item.closest('.pmpro_checkout-field');
		const label = owner.querySelector('label');
		if (label.childElementCount === 0)
			owner.firstElementChild.insertAdjacentHTML('beforeend', asterisk);
	});
}
export function controlAsterisk() {
	required.forEach((el) => parent.querySelector('.pmpro_asterisk').remove());
	addAsterisk(required);
}
