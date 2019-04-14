console.log(`Character Counter loaded`);

function textCounter(textField, count, maxAmount) {
	countField = document.getElementById(count);
	display = document.getElementById(`display`);

	if (textField.value.length > maxAmount) {
		textField.value = textField.value.substring(0, maxAmount);
	} else {
		count.innerHTML = textField.value.length;
	}

	let reader = new commonmark.Parser();
	let writer = new commonmark.HtmlRenderer();
	let parsed = reader.parse(textField.value);
	let str = writer.render(parsed);

	/** Replace the text  */
	let regex = /:text-center(.*?):text-center/gms;
	let subst = `<section style="text-align: center">$1</section>`;
	let regex1 = /:text-right(.*?):text-right/gms;
	let subst1 = `<section style="text-align: right">$1</section>`;
	let regex2 = /:text-left(.*?):text-left/gms;
	let subst2 = `<section style="text-align: left">$1</section>`;

	str = str.replace(regex, subst).replace(regex1, subst1).replace(regex2, subst2);

	/** Color  */
	regex = /:color\D(.*?),(.*?),(.*?)\D(.*?):color/gms;
	subst = `<span style="color: rgb($1,$2,$3);">$4</span>`;
	str = str.replace(regex, subst);

	display.innerHTML = str;
}