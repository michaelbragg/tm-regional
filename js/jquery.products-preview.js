/*!
 *  jQuery Products Preview - v0.2.0
 *  Load images into placeholder from data-attribute
 *  http://michaelbragg.net
 *
 *  Made by Michael Bragg <michael@michaelbragg.net>
 *  Under MIT License
 */

var productPreview = productPreview || {};

(function($) {

  /**
   * Default config settings
   */

  productPreview.config = {
    debug: true,
    list: '.js-advert--list',
    button: '.js-products--button',
    placeholder: '.js-advert--preview',
    container: '.js-advert'
  };

  /**
   * Setup debug check
   * To turn debug on supply { debug: true } to the `init` function
   */

  productPreview.debug = function() {

    return productPreview.config.debug;

  };

  /**
   *
   */

  productPreview.init = function(config) {

    // provide for custom configuration via init()
    if (config && typeof(config) === 'object') {
      $.extend(productPreview.config, config);
    }

    // Setup default images
    var _lists = $(productPreview.config.list).each( function(){

      var _button = $(this).children('li').first().children( productPreview.config.button ),
          _parent = $(this).parents( productPreview.config.container );

      if( productPreview.debug() ){
        console.log( 'init', _parent, _button );
      }

      productPreview.pushData( _parent, _button );

    });

    // Add event listerner
    var _clicked = $(productPreview.config.button).on('click', productPreview.getData);

  };

  /**
   * Get data from the DOM to update the page
   */

  productPreview.getData = function() {
event.preventDefault();
    var _button = $(this),
        _parent = $(this).parents( productPreview.config.container );

    if( productPreview.debug() ) {
      console.log( 'getData', _parent, _button );
    }

    productPreview.pushData( _parent, _button );

  };

  /**
   * Push data to create or update the image
   */

  productPreview.pushData = function( _parent, _button ) {

    var _url = _button.data('advert-preview');

    productPreview.toggleCurrent( _parent, _button );

    // Check for `img` tag already in place
    if( !_parent.find( productPreview.config.placeholder ).children('img').length ) {

      // Add `img` tag, with contents, to DOM
      _parent.find( productPreview.config.placeholder ).append('<img src="' + _url + '" alt="">');
      return;

    }

    // Update `img` source attribute
    _parent.find( productPreview.config.placeholder + ' img' ).attr('src', _url);

  };

  /**
   * Toggle `.current-product` class
   */

  productPreview.toggleCurrent = function( _parent, _button ) {

    if( productPreview.debug() ){
      console.log( 'toggleCurrent', _parent, _button );
    };

    // Find out if the current-product class has not been set
    if( !_parent.find('.current-product').length ) {
      // Set the current toggle to the first item in the list
      _button.addClass('current-product');
      return;
    }

    // else remove current-product class
    _parent.find('.current-product').removeClass('current-product')
    // add current-product class to clicked button
    _button.addClass('current-product');
  };

  /**
   * Initialise the product preview script
   */

  $(document).ready(function() {

    productPreview.init();

  });

})(jQuery);

