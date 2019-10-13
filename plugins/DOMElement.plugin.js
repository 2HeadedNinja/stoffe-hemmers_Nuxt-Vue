(function () {
  const DOMElement = function () {
  	var DOMElement = {};

    DOMElement.is = function(obj = false) {
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

    DOMElement.type = function(obj = false) {
    	if(!DOMElement.is(obj)) {
    		return null;
    	} else {
    		return obj.nodeName.toLowerCase();
    	}
    }

    return DOMElement;
  }();

  if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') module.exports = DOMElement;else window.DOMElement = DOMElement;
})();
