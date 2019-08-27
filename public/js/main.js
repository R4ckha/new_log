window.onload = () => {
	document.querySelectorAll('.error').forEach( e => {
		e.onclick = event => {
			event.target.closest("div").remove();
		}
	})
}