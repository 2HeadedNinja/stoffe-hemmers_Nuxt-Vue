let listening = false
let targets = []

const defaultOptions = {
  speed: 0.3,
  mobilePx: false,
  offset : {
    x : '0px',
    y : '0px',
    z : '0px'
  },
}

class RallaxObj {
  constructor(target, { speed, mobilePx, offset }) {

    this.speed = speed || defaultOptions.speed
    this.offset = offset || defaultOptions.offset
    this.mobilePx = mobilePx || defaultOptions.mobilePx
    this.mobileDisable = false
    this.conditions = []
    this.active = true
    this.target = target

    if (typeof target === 'string') {
      this.target = document.querySelector(`${target}`)
    }

    this.winHeight = window.innerHeight
    this.accumulated = 0
    this.getRect()

    this.startScroll = this.targetR.top - this.winHeight > 0
      ? this.targetR.top - this.winHeight
      : 0
  }

  // API
  stop() {
    this.active = false
  }

  start() {
    this.active = true
  }

  getSpeed() {
    return this.speed
  }

  changeSpeed(newSpeed) {
    if (this.inWindow() && newSpeed !== this.speed) {
      this.accumulated = this.getTranslation()
      this.startScroll = this.scrollY()
    }
    this.speed = newSpeed
  }

  when(condition, action) {
    this.conditions.push({condition, action})
    return this
  }

  // HELPERS
  scrollY() {
    return window.scrollY || window.pageYOffset
  }

  getTranslation() {
    const dist = this.scrollY() - this.startScroll
    const translation = (dist * this.speed) + this.accumulated
    //return translation >= 0 ? translation : 0
    return translation
  }

  getRect() {
    this.targetR = this.target.getBoundingClientRect()
    return this.targetR
  }

  inWindow() {
    this.getRect()
    const top = this.targetR.top
    const bottom = this.targetR.bottom

    return top < this.winHeight && bottom > 0
  }

  move() {
    this.target
      .style
      .transform = `translate3d(calc(0px + ${this.offset.x}),calc(${this.getTranslation()}px + ${this.offset.y}),calc(0px + ${this.offset.z}))`
  }
}

const addListener = () => {
  window.addEventListener('scroll', event => {
    controller(targets)
  })

  window.addEventListener('resize', event => {
    resize()
  })
}

const controller = targets => {
  requestAnimationFrame(() => {
    targets.forEach(obj => {
      if (obj.mobileDisable) return

      obj.conditions
        .forEach(({condition, action}) => {
          if (condition()) action()
        })

      if (obj.active) {
        obj.move()
      }
    })
  })
}

const resize = () => {
  const newSize = window.innerWidth

  targets.forEach(obj => {
    if (obj.mobilePx >= newSize) {
      obj.mobileDisable = true
    }
  })
}

const rallax = function(target, userOptions = {}) {
  const rallax = new RallaxObj(target, userOptions)
  targets.push(rallax)
  resize()

  if (!listening) {
    addListener()
    listening = true
  }

  return rallax
}