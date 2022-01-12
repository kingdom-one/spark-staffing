export function packageSelector() {
	const jobPackages = document.querySelectorAll('.job-package'),
		jobPackageContainer = document.querySelector('.job_packages'),
		radioButtons = jobPackageContainer.querySelectorAll('input');

	jobPackages.forEach((job, i) =>
		job.addEventListener('click', () => {
			radioButtons[i].checked = true;
		}),
	);
}
