/** This file was originally created to edit the BuddyPress Registration Page. That page is now being bypasesed by PM Pro's Memberships page.

export function replacedRequiredTag() {
	const requiredTag = document.querySelectorAll('.bp-required-field-label');
	const sparkAsterisk = `<img src="http://sparkstaffing.local/wp-content/uploads/2021/11/cropped-Icon-Simple.png" class="required--icon" style="width:18px;height=18px">`;
	if (requiredTag) {
		console.log(requiredTag);
		requiredTag.forEach((el) => {
			el.textContent = '';
			el.insertAdjacentHTML('beforeend', sparkAsterisk);
		});
	} else return;
}
 */
