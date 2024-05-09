/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/banners.js ***!
  \*********************************/
jQuery(document).ready(function () {
  var $registerForm = $('#sheen_value_form');
  var _method = $('input[name="_method"]').val();
  var imageRequired = _method !== 'PUT';
  $.validator.addMethod("notEqualToValue", function (value, element, param) {
    return value != param;
  }, "Please enter a different value, values must not be the same.");
  if ($registerForm.length) {
    $registerForm.validate({
      rules: {
        applies_to: {
          required: true,
          validUrl: false,
          url: false,
          notEqualToValue: 0
        },
        'vendors': {
          validUrl: false,
          url: false
        },
        'products': {
          validUrl: false,
          url: false
        },
        'categories': {
          validUrl: false,
          url: false
        },
        'vendors[]': {
          validUrl: false,
          url: false
        },
        'categories[]': {
          validUrl: false,
          url: false
        },
        'products[]': {
          validUrl: false,
          url: false
        },
        image: {
          required: imageRequired
        },
        sort_order: {
          required: true
        },
        title: {
          required: true
        },
        brief: {
          required: true
        }
      },
      messages: {
        sort_order: {
          required: 'please enter sort order'
        },
        applies_to: {
          notEqualToValue: 'please choose type of related item'
        }
      }
    });
  }
});
$('document').ready(function () {
  var appliesTo = $('#applies_to');
  switch (appliesTo.val()) {
    case 'AppliesToProducts':
      selectType('products');
      break;
    case 'AppliesToCategory':
      selectType('categories');
      break;
    default:
      $('#applies_to_option').empty();
  }
  appliesTo.change(function () {
    switch (this.value) {
      case 'AppliesToCategories':
        renderAppliesSelect('categories', '/admin/banners/getModels?model=App\\Models\\Category&displayColumn=name&searchColumns=a%3A1%3A%7Bi%3A0%3Ba%3A2%3A%7Bs%3A10%3A%22columnName%22%3Bs%3A4%3A%22name%22%3Bs%3A11%3A%22isTranslate%22%3Bb%3A1%3B%7D%7D', 'categories');
        break;
      case 'AppliesToProducts':
        renderAppliesSelect('products', '/admin/banners/getModels?model=App\\Models\\Product&displayColumn=name&searchColumns=a%3A3%3A%7Bi%3A0%3Ba%3A2%3A%7Bs%3A10%3A"columnName"%3Bs%3A4%3A"name"%3Bs%3A11%3A"isTranslate"%3Bb%3A1%3B%7Di%3A1%3Ba%3A2%3A%7Bs%3A10%3A"columnName"%3Bs%3A11%3A"description"%3Bs%3A11%3A"isTranslate"%3Bb%3A1%3B%7Di%3A2%3Ba%3A2%3A%7Bs%3A10%3A"columnName"%3Bs%3A3%3A"sku"%3Bs%3A11%3A"isTranslate"%3Bb%3A0%3B%7D%7D', 'products');
        break;
      default:
        $('#applies_to_option').empty();
    }
  });
});
function selectType(id) {
  var url;
  var element = $('#' + id);
  url = element.attr('url');
  element.select2({
    placeholder: "search for " + id,
    ajax: {
      url: url,
      dataType: 'json',
      data: function data(params) {
        // Query parameters will be ?search=[term]
        return {
          search: params.term
        };
      }
    },
    minimumInputLength: 1
  });
}
function renderAppliesSelect(id, url, label) {
  var htmlFormGroup = "\n            <div class=\"form-group row text-right\" dir=\"ltr\">\n                <label class=\"col-xl-2 col-lg-2 col-form-label \" for=\"" + id + "\">\n                    " + label + "\n                </label>\n                <div class=\"col-lg-9 col-xl-9\">\n\n                <select class=\"form-control form-control-lg form-control-solid select2\"\n                    id=\"" + id + "\" name=\"" + id + "\"\n                    url='" + url + "'\n                    required\n                    dir=auto\n                    style=\"width: 100% !important; opacity: 1 !important;\">\n                </select>\n            </div>\n            </div>\n";
  $('#applies_to_option').html(htmlFormGroup);
  selectType(id);
}
/******/ })()
;