/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/attributes.js ***!
  \************************************/
jQuery(document).ready(function () {
  var $registerForm = $('#sheen_value_form');
  if ($registerForm.length) {
    $registerForm.validate({
      rules: {
        'name:en': {
          required: true
        },
        type: {
          required: true
        },
        use_as_filter: {
          required: false
        }
      },
      messages: {
        'name:en': {
          required: 'please enter name'
        },
        type: {
          required: 'please choose type'
        }
      }
    });
  }
});
/******/ })()
;