// 3rd party packages from NPM
import $ from 'jquery';
import slick from 'slick-carousel';
import 'lazysizes';
import 'picturefill';

// Our modules / classes
import MobileMenu from './modules/MobileMenu';
//import RevealOnScroll from './modules/RevealOnScroll';
import StickyHeader from './modules/StickyHeader';
import Modal from './modules/Modal';
import ChealeySlideshow from './modules/ChealeySlideshow';
import Contact from './modules/Contact';

var mobileMenu = new MobileMenu();
//new RevealOnScroll($(".feature-item"), "85%");
//new RevealOnScroll($(".testimonial"), "60%");
var stickyHeader = new StickyHeader();
var modal = new Modal();
var chealeySlideshow = new ChealeySlideshow();
var contact = new Contact();