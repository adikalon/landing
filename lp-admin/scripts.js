window.onload = function () {
	if (document.getElementById('description')) {
		getDescSymb();
		document.getElementById('description').addEventListener("keyup", getDescSymb, false);
	}
	if (document.getElementById('keywords')) {
		getKeySymb();
		document.getElementById('keywords').addEventListener("keyup", getKeySymb, false);
	}
}

// description symbols count
function getDescSymb() {
	var len = document.getElementById('description').value.length;
	document.getElementById('desc_symbols').innerHTML = len;
	var cls = document.getElementById('desc_symbols_a').classList;
	if (len <= 150) {
		if (cls.contains("red")) {
			cls.remove("red");
		}
		if (cls.contains("orange")) {
			cls.remove("orange");
		}
		cls.add("green");
	} else if (len > 150 && len <= 250) {
		if (cls.contains("red")) {
			cls.remove("red");
		}
		if (cls.contains("green")) {
			cls.remove("green");
		}
		cls.add("orange");
	} else {
		if (cls.contains("orange")) {
			cls.remove("orange");
		}
		if (cls.contains("green")) {
			cls.remove("green");
		}
		cls.add("red");
	}
}

// keywords symbols count
function getKeySymb() {
	var len = document.getElementById('keywords').value.length;
	document.getElementById('key_symbols').innerHTML = len;
	var cls = document.getElementById('key_symbols_a').classList;
	if (len <= 160) {
		if (cls.contains("red")) {
			cls.remove("red");
		}
		if (cls.contains("orange")) {
			cls.remove("orange");
		}
		cls.add("green");
	} else if (len > 150 && len <= 200) {
		if (cls.contains("red")) {
			cls.remove("red");
		}
		if (cls.contains("green")) {
			cls.remove("green");
		}
		cls.add("orange");
	} else {
		if (cls.contains("orange")) {
			cls.remove("orange");
		}
		if (cls.contains("green")) {
			cls.remove("green");
		}
		cls.add("red");
	}
}

// save comment
function saveComment(id, text) {
	$.ajax({
		type: "POST",
		url: "../lp-ajax/comment.php",
		data: "id="+id+"&text="+text
	});
}

// semantic ui checkboxes
$('.ui.checkbox').checkbox();

// semantic ui popup
$('.help.circle.outline.icon.link').popup();