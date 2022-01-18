export function packageSelector() {
	const jobPackages = document.querySelectorAll('.job-package'),
		jobPackageContainer = document.querySelector('.job_packages'),
		userJobPackages = document.querySelectorAll('.user-job-package'),
		userJobPackageContainer = document.querySelector('.user-job_packages'),
		userRadioButtons = userJobPackageContainer.querySelectorAll('input'),
		radioButtons = jobPackageContainer.querySelectorAll('input');

	jobPackages.forEach((job, i) =>
		job.addEventListener('click', () => {
			radioButtons[i].checked = true;
		}),
	);
	userJobPackages.forEach((job, i) =>
		job.addEventListener('click', () => {
			userRadioButtons[i].checked = true;
		}),
	);
}
