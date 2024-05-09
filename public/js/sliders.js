/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/sliders.js ***!
  \*********************************/
jQuery(document).ready(function () {
  var $registerForm = $('#sheen_value_form');
  var _method = $('input[name="_method"]').val();
  var imageRequired = _method !== 'PUT';
  if ($registerForm.length) {
    $registerForm.validate({
      rules: {
        'heading:en': {
          required: true
        },
        'main_heading:en': {
          required: true
        },
        sort_order: {
          required: true
        },
        background_image: {
          required: imageRequired
        },
        responsive_image: {
          required: imageRequired
        },
        product_id: {
          url: false,
          required: false,
          validUrl: false
        }
      },
      messages: {
        'heading:en': {
          required: 'please enter heading'
        },
        'main_heading:en': {
          required: 'please enter main heading'
        },
        display_order: {
          required: 'please enter display order'
        }
      }
    });
  }
});
/******/ })()
;