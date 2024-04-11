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
    console.log('showModal', event, modal);
    if ('parentIFrame' in window) {
      console.log('Has parentIFrame');
      parentIFrame.getPageInfo(function(pageInfo) {
        console.log('pageInfo', pageInfo);
        var scrollTop = pageInfo.scrollTop;
        var topModalPosition = scrollTop; // - modalHeight + margin;
        if (scrollTop == 0) {
          topModalPosition += 30;
        }
        modal.$elm.css('vertical-align', 'top');
        modal.$elm.css('top', topModalPosition);
        // Disable to avoid events on scroll
        parentIFrame.getPageInfo(false);
      });
    }
    else {
      console.log('No has parentIFrame');
    }
  }

}


jQuery(document).on('ready', function(){
  mybookingClient.rentEngineDelegate.init();
});