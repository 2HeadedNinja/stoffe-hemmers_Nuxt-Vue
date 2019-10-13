// -> Import and Initialize svg4everybody
import svg4everybody from 'svg4everybody';
svg4everybody();
// -> Import and Initialize lax.js


if(typeof lax === 'object') {
  console.log('lax setup');
  lax.setup() // init

  const updateLax = () => {
    lax.update(window.scrollY)
    window.requestAnimationFrame(updateLax)
  }

  window.requestAnimationFrame(updateLax)
}