export default function highlightApplications() {
	const applications = document.querySelectorAll(
		'.job-manager__job--applications',
	);
	applications.forEach((app) => {
		if (app.innerText === '–') return;
		const link = app.querySelector('a');
		const number = app.innerText;
		link.innerText = `${number} application${+number > 1 ? 's' : ''}!`;
		link.style.fontWeight = '700';
	});
}
