import DOMElement from '~/plugins/DOMElement.plugin.js'

const Position = {
  default : {
    offset : 0
  },

  get(el = false, options = {}) {
    if(el === false || !DOMElement.is(el)) {
      return false;
    }

    const __offset   = options.offset || this.default.offset;
    const __position = Math.ceil(el.getBoundingClientRect().top + window.pageYOffset + __offset);

    if(!__position || typeof __position !== 'number') {
      return false;
    } 
    
    return __position;
  }
}

export default Position;