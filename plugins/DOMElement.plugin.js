const DOMElement = {
  is(obj = false) {
    if(obj === false || obj === null) {
      return false;
    }

    if(typeof obj === 'array') {
      if(obj.length < 1) {
        return false;
      } else {
        obj = obj[0];
      }
    }

    if(obj.length > 1) {
      obj = obj[0];
    }

    return (
      typeof HTMLElement === "object" ? obj instanceof HTMLElement :
      obj && typeof obj === "object" && obj !== null && obj.nodeType === 1 && typeof obj.nodeName === "string"
    );
  },

  type(obj = false, tag = false) {
    if(!DOMElement.is(obj)) {
      return null;
    } else {
      if(tag === false) {
        return obj.nodeName.toLowerCase();
      } else {
        if(obj.nodeName.toLowerCase() === tag) {
          return true;
        } else {
          return false;
        }
      }
    }
  }
}

export default DOMElement;