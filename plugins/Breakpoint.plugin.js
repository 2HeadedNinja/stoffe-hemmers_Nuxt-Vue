import DOMElement from '~/plugins/DOMElement.plugin.js'

const Breakpoint = {
  get() {
    const __breakpoint = document.querySelector('span.breakpoint');

    if(!DOMElement.is(__breakpoint)) {
      return 'default';
    } else {
      const __content = window.getComputedStyle(
        __breakpoint,':before'
      ).getPropertyValue('content');

      if(__content !== '') {
        return __content;
      } else {
        return 'default';
      }
    }
  }
}

export default Breakpoint;