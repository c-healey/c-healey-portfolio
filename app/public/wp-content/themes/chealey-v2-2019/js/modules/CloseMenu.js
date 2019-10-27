import $ from 'jquery';

class CloseMenu {
  constructor() {
    this.menuButton = $(".navigation__checkbox"); 
    this.activeItem = $(".mmo-item a");// mobile menu overlay item
    this.events();
  }

  events() {
    this.activeItem.on("click", this.hideMenu.bind(this));
  }

  hideMenu() {
    
    this.menuButton.click();
  }
}

export default CloseMenu;



