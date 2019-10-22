const DOMElement = {
  is(obj = false) {
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
  },

  type(obj = false) {
    if(!DOMElement.is(obj)) {
      return null;
    } else {
      return obj.nodeName.toLowerCase();
    }
  }
}

export default DOMElement;