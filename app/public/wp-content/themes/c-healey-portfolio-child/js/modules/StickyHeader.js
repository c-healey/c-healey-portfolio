import $ from 'jquery';
import waypoints from '../../../../../node_modules/waypoints/lib/noframework.waypoints';
import smoothScroll from 'jquery-smooth-scroll';

class StickyHeader {
	constructor () {
		this.lazyImages = $(".lazyload");
		this.siteHeader = $(".site-branding");
		this.headerTriggerElement = $(".entry-title");
		this.createHeaderWaypoint();
		this.pageSections = $(".site-content");
		this.headerLinks = $(".main-navigation a");
		this.createPageSectionWaypoints();
		this.addSmoothScrolling();
		this.refreshWaypoints();
	}

	refreshWaypoints (){
		this.lazyImages.on('load', function (){
			Waypoint.refreshAll();

		});
	}

	addSmoothScrolling (){
		this.headerLinks.smoothScroll();
	}

	createHeaderWaypoint(){
		var that = this;
		new Waypoint ({
			element: this.headerTriggerElement[0],
			handler: function (direction){
				if (direction == "down") {
					that.siteHeader.addClass ("site-branding--dark");
				} else {
					that.siteHeader.removeClass ("site-branding--dark");
				}
			},
			offset: "10%"
		});
	}

	createPageSectionWaypoints(){
		var that = this;

		this.pageSections.each(function(){
			var currentPageSection = this;
			new Waypoint({
				element: currentPageSection,
				handler: function(direction){
					if (direction == "down"){
						var matchingHeaderLink = currentPageSection.getAttribute("data-matching-link");
						that.headerLinks.removeClass("is-current-link");
						$(matchingHeaderLink).addClass("is-current-link");
					}					
				},
				offset: "18%"
			});

			new Waypoint({
				element: currentPageSection,
				handler: function(direction){
					if (direction == "up"){
						var matchingHeaderLink = currentPageSection.getAttribute("data-matching-link");
						that.headerLinks.removeClass("is-current-link");
						$(matchingHeaderLink).addClass("is-current-link");
					}					
				},
				offset: "-40%"
			});

		});
	}
	

}
export default StickyHeader;