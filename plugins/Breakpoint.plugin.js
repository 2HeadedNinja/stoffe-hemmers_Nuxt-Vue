(function () {
  const Breakpoint = function () {
    var Breakpoint = {};

    Breakpoint.get = function() {
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

    return Breakpoint;
  }();

  if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') module.exports = Breakpoint; else window.Breakpoint = Breakpoint;
})();