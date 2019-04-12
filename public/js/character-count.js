console.log(`Character Counter loaded`);

function textCounter(textField, count, maxAmount) {
	countField = document.getElementById(count);
	if (textField.value.length > maxAmount) {
		textField.value = textField.value.substring(0, maxAmount);
	} else {
		count.innerHTML = textField.value.length;
	}
}