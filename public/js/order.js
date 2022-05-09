/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/order.js ***!
  \*******************************/
$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.add-to-cart').click(function (e) {
    e.preventDefault();
    var productId = $(this).data('product_id');
    var currentCartNumber = parseInt($('.cart-number').text());
    currentCartNumber++;
    $('.cart-number').text(currentCartNumber).show(); // Call Ajax update product to DB
    // Tao orders va tao product_order

    var url = '/orders';
    var data = {
      'product_id': productId
    };
    $.ajax({
      url: url,
      data: data,
      type: 'POST',
      success: function success(result) {
        console.log(result);
        console.log('ajax success');
      },
      error: function error() {
        console.log('ajax error');
      }
    });
    alert('Add product to cart success!');
  });
});
/******/ })()
;