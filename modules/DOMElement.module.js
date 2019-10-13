export default function DOMElement(obj = false) {
	if(obj === false) {
		return false;
	}

	if(typeof obj === 'array') {
		if(obj.length < 1) {
			return false;
		} else {
			obj = obj[0];
		}
	}

	return (
		typeof HTMLElement === "object" ? obj instanceof HTMLElement :
	  obj && typeof obj === "object" && obj !== null && obj.nodeType === 1 && typeof obj.nodeName === "string"
	);
}
