import $ from 'jquery';

class ChealeySlideshow {
  constructor() {
    this.els = $(".hero-slider");
    this.initSlider();
  }

  initSlider() {
    
    this.els.slick({
      autoplay: true,
      arrows: false,
      dots: true
    });
  }
}

export default ChealeySlideshow;