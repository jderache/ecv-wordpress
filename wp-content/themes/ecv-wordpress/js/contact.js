const form = document.getElementById("send-contact-form");

form.addEventListener("submit", async (event) => {
	event.preventDefault();
	form.classList.remove("error");
	console.log(event.currentTarget);

	const formData = new FormData(event.currentTarget);
	const data = Object.fromEntries(formData.entries());

	let formValid = true;
	for (let key in data) {
		if (!data[key]) {
			document.querySelector(`[name="${key}"]`).classList.add("error");
			const label = document.querySelector(`[for="${key}"]`);
			label.classList.add("error");
			label.setAttribute("data-error", "Ce champ est obligatoire");
			formValid = false;
		}
	}

	if (!formValid) {
		return;
	}

	const regex = new RegExp("^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]");
	if (!regex.test(data["email"])) {
		document.querySelector(`[name="email"]`).classList.add("error");
		const label = document.querySelector(`[for="email"]`);
		label.classList.add("error");
		label.setAttribute("data-error", "Votre email n'est pas valide");
		formValid = false;
	}

	if (!formValid) {
		return;
	}

	const result = await fetch(ajaxurl, {
		method: "POST",
		body: formData,
	});

	const response = await result.json();

	if (response.success) {
		form.reset();
		form.classList.remove("error");
		form.classList.add("success");
		form.querySelector("button").disabled = true;
		setTimeout(() => {
			form.querySelector("button").innerHTML = "Message envoyé !";
		}, 100);
	} else {
		form.classList.add("error");
	}
});

const fields = form.querySelectorAll("input, textarea");

fields.forEach((field) => {
	field.addEventListener("input", (event) => {
		const {value} = event.currentTarget;
		if (value) {
			event.currentTarget.classList.remove("error");
			const label = document.querySelector(`[for="${event.currentTarget.name}"]`);
			label.classList.remove("error");
			setTimeout(() => {
				label.removeAttribute("data-error");
			}, 400);
		}
	});
});
