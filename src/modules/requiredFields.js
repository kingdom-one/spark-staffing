/** This file was originally created to edit the BuddyPress Registration Page. That page is now being bypasesed by PM Pro's Memberships page. */
import { SITE_URL } from './abstracts';

// BUDDYPRESS OR WOOCOMMERCE
export function replacedRequiredTag() {
	const requiredTag = document.querySelectorAll('.required');
	const sparkAsterisk = `<img src="${SITE_URL}/wp-content/uploads/2021/11/cropped-Icon-Simple.png" class="required--icon" style="width:18px;height=18px">`;
	if (requiredTag) {
		requiredTag.forEach((el) => {
			el.textContent = '';
			el.insertAdjacentHTML('beforeend', sparkAsterisk);
		});
	} else return;
}

// PAID MEMBERSHIPS PRO
export function controlAsterisk() {
	required.forEach(() => parent.querySelector('.pmpro_asterisk').remove());
	addAsterisk(required);
}

function addAsterisk(nodeList) {
	nodeList.forEach((item) => {
		const owner = item.closest('.pmpro_checkout-field');
		const label = owner.querySelector('label');
		if (label.childElementCount === 0)
			owner.firstElementChild.insertAdjacentHTML('beforeend', asterisk);
	});
}
const parent = document.getElementById('pmpro_form'),
	required = document.querySelectorAll('.pmpro_required'),
	asterisk = ` <span class="pmpro_asterisk"></span>`;
console.log(parent, asterisk, required);
