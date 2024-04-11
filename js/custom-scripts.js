var mybookingClient = mybookingClient || {};

/**
 * Rent Engine integration => Delegate
 */
mybookingClient.rentEngineDelegate = {

  /**
   * Init
   */
  init: function() {
    this.setupDelegate();
  },

  /**
   * Setup the events
   */
  setupDelegate: function() {
    if (typeof mybookingJsEngine !== 'undefined') {
      // Choose Product or complete
      if ($('body').hasClass('choose_product') || $('body').hasClass('complete')) {
        var rentEngineMediator = mybookingJsEngine.default.rent.rentEngineMediator;
        rentEngineMediator.setupDelegate({
          showModal: this.showModal
        });
      }
    }
  },

  showModal: function(event, modal) {
    if ('parentIFrame' in window) {
      parentIFrame.getPageInfo(function(pageInfo) {
        
        // Calculate the top margin between the modal and the top of the iframe

        // 1. Calculate
        var windowHeight = pageInfo.windowHeight; // Height of the window (viewport)
        var offsetTop = pageInfo.offsetTop; // Offset top of the iframe
        if (pageInfo.scrollTop == 0) { // Because only the iframe content is shown in the viewport
          offsetTop = 0;
        }
        var modalHeight = modal.$elm.height(); // Modal height
        // ======================== viewport start
        // offset
        // ------------------------ iframe start
        // ???? We are calculating this position
        // ************************ modal start
        //
        // 
        // ***********************  modal end
        // 
        // ======================== viewport end
        //
        //
        // ------------------------ iframe end
        var topAdjust = (windowHeight - offsetTop - modalHeight) / 2;
        if (topAdjust > 40) {
         topAdjust -= 40; // magic number for modal margin
        }

        // 2. Get the scroll position
        var scrollTop = pageInfo.scrollTop;
        var topModalPosition = scrollTop;
        topModalPosition += topAdjust; // Adjust the top position with top of the modal

        modal.$elm.css('vertical-align', 'top');
        modal.$elm.css('top', topModalPosition);
        // Disable to avoid events on scroll
        parentIFrame.getPageInfo(false);
      });
    }
    else {
      //console.log('No has parentIFrame');
    }
  }

}


jQuery(document).on('ready', function(){
  mybookingClient.rentEngineDelegate.init();
});