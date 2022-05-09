/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/common.js ***!
  \********************************/
$(function () {
  var searchParams = new URLSearchParams(window.location.search);
  $('#input-search').val(searchParams.get('search'));
  $('#input-search').keypress(function (e) {
    var key = e.which;

    if (key == 13) {
      $('#search').submit();
    }
  });
});
/******/ })()
;