import $ from 'jquery'
import Swiper from 'swiper'
import 'swiper/dist/css/swiper.min.css'

class SliderImagesCentered extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args)
    self.init()
    return self
  }

  init () {
    this.$ = $(this)
    this.resolveElements()
  }

  resolveElements () {
    this.$slider = $('.slider', this)
    this.$buttonNext = $('.slider-button--next', this)
    this.$buttonPrev = $('.slider-button--prev', this)
    this.$pagination = $('.slider-pagination', this)
  }

  connectedCallback () {
    this.initSlider()
  }

  initSlider () {
    this.swiper = new Swiper(this.$slider, {
      centeredSlides: true,
      loop: true,
      navigation: {
        nextEl: this.$buttonNext,
        prevEl: this.$buttonPrev
      },
      pagination: {
        el: this.$pagination,
        clickable: true,
      },
      slidesPerView: 3,
      spaceBetween: 40
    })
  }
}

window.customElements.define('flynt-slider-images-centered', SliderImagesCentered, { extends: 'div' })
