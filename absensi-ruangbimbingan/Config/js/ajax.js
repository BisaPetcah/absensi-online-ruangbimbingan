const ajax = (url, method, data = null, callback) => {
	const xhr = new XMLHttpRequest();

	xhr.open(method, url, true);

	xhr.onreadystatechange = () => {
		callback(xhr);
	};

	xhr.send(data);
};
