// 3rd party packages from NPM
import $ from 'jquery';
import slick from 'slick-carousel';
import 'lazysizes';
import 'picturefill';

// Our modules / classes
import MobileMenu from './modules/MobileMenu';
import StickyHeader from './modules/StickyHeader';
import ChealeySlideshow from './modules/ChealeySlideshow';
//import RevealOnScroll from './modules/RevealOnScroll';
//import Contact from './modules/Contact';
//import Modal from './modules/Modal';

var mobileMenu = new MobileMenu();
var stickyHeader = new StickyHeader();
var chealeySlideshow = new ChealeySlideshow();
//new RevealOnScroll($(".feature-item"), "85%");
//new RevealOnScroll($(".testimonial"), "60%");
//var modal = new Modal();
//var contact = new Contact();