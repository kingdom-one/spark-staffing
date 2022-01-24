export function sparkFeaturedJob() {
	const featured = document.querySelectorAll('.job_position_featured');
	const feature = 'Featured Job';
	const sparkle = `<span class="spark__job-feature">${feature}</span>`;
	featured.forEach((el) => {
		const jobSummary = el.querySelector('.job_listing__summary');
		jobSummary.insertAdjacentHTML('afterbegin', sparkle);
	});
}
