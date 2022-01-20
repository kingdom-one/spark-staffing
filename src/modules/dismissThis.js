export default function dismissals() {
	const restricted = document.querySelectorAll('.access-restricted');
	restricted.forEach((el) => {
		el.addEventListener('click', dismissThis);
	});
	function dismissThis(e) {
		e.target.closest('.access-restricted').style.opacity = 0;
		e.target.closest('.access-restricted').style.position = absolute;
		e.target.closest('.access-restricted').style.bottom = 0;
	}
}
