/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/categories.js ***!
  \************************************/
jQuery(document).ready(function () {
  var $registerForm = $('#sheen_value_form');
  var _method = $('input[name="_method"]').val();
  var imageRequired = _method !== 'PUT';
  if ($registerForm.length) {
    $registerForm.validate({
      rules: {
        'name:en': {
          required: true
        },
        sort_order: {
          required: true
        },
        icon: {
          required: false
        },
        parent_category: {
          required: true
        },
        is_active: {
          required: true
        },
        // image: {
        //   required: imageRequired
        // },
        'attributes[]': {
          required: false,
          validUrl: false,
          url: false
        }
      },
      messages: {
        'name:en': {
          required: 'please enter name'
        },
        sort_order: {
          required: 'please enter sort order'
        },
        parent_category: {
          required: 'please select service category'
        },
        is_active: {
          required: 'please select status'
        }
      }
    });
    var nameAr = $('input[name="name:ar"]');
    $registerForm.on('submit', function (e) {
      if (nameAr.val() === '') {
        e.preventDefault();
        $('#ar-tab-1').trigger('click');
        nameAr.addClass('is-invalid');
        nameAr.parent().append('<div class="invalid-feedback text-right">name is required</div>');
        return false;
      }
    });
  }
  var parentCategory = $('#parent_category');
  var attrs = $('#attributes');
  var type = $('input[name="type"]');
  if (parentCategory.val() == 0) {
    attrs.parent().parent().hide();
  } else {
    type.parent().parent().parent().parent().hide();
  }
  parentCategory.on("select2:select", function (event) {
    var value = $(event.currentTarget).find("option:selected").val();
    if (value == 0) {
      type.parent().parent().parent().parent().fadeIn();
      attrs.parent().parent().fadeOut();
    } else {
      type.parent().parent().parent().parent().fadeOut();
      attrs.parent().parent().fadeIn();
    }
  });
});
/******/ })()
;