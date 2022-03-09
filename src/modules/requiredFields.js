/** This file was originally created to edit the BuddyPress Registration Page. That page is now being bypasesed by PM Pro's Memberships page. */
import { SITE_URL } from './abstracts';

// BUDDYPRESS OR WOOCOMMERCE
/** Replace asterisk with spark brand on BuddyPress or WooCommerce pages */
export function replacedRequiredTag() {
	const requiredTag = document.querySelectorAll('.required');
	const sparkAsterisk = `<img src="${SITE_URL}/wp-content/uploads/2021/11/Icon-Simple.png" class="required--icon" style="width:18px;height=18px">`;
	if (requiredTag) {
		requiredTag.forEach((el) => {
			el.textContent = '';
			el.insertAdjacentHTML('beforeend', sparkAsterisk);
		});
	} else return;
}

// PAID MEMBERSHIPS PRO
const required = document.querySelectorAll('.pmpro_required'),
	allAsterisks = document.querySelectorAll('.pmpro_asterisk'),
	asterisk = ` <span class="pmpro_asterisk"></span>`;

function addAsterisk(nodeList) {
	nodeList.forEach((item) => {
		const owner = item.closest('.pmpro_checkout-field');
		const label = owner.querySelector('label');
		if (label.childElementCount === 0)
			owner.firstElementChild.insertAdjacentHTML('beforeend', asterisk);
	});
}

/** Replace asterisk with spark brand on Paid Memberships Pro Checkout pages */
export function controlAsterisk() {
	required.forEach((el) => {
		const parent = el.closest('div');
		const sibling = parent.querySelector('.pmpro_asterisk');
		sibling.remove();
	});
	addAsterisk(required);
}
