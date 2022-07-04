/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 43);
/******/ })
/************************************************************************/
/******/ ({

/***/ 43:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(44);


/***/ }),

/***/ 44:
/***/ (function(module, exports) {

$(function () {
  n = $(".tdnums").length;
  $(".tdr").attr('rowspan', n + 1);
  $(".tdr").css('vertical-align', 'middle');

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    type: 'GET',
    url: '/get_schedule',
    success: function success(data) {
      $(".cdbox").remove('ht40');
      if (data.status == false) {
        $(".cdbox-text").html(data.text);

        $("#greward").hide();
        if (data.close == true) {
          $(".cdbox").addClass('ht40');
        } else {
          chts(data.date);
          $("input[name='status']").val('false');
        }
      } else if (data.status == true) {
        $("input[name='status']").val('true');
        $(".cdbox-text").html(data.text);
        chts(data.date);
        $(".inp-user").show();
      }
    }
  });

  function chts(time) {
    $('#getting-started').countdown(time, function (event) {
      $(this).html(event.strftime('倒数剩馀 : ' + '<span class="r-t">%D</span>天' + '<span class="r-t">%H</span>时' + '<span class="r-t">%M</span>分' + '<span class="r-t">%S</span>秒'));
    });
  }

  $("#greward").on('click', function () {
    if ($("input[name='status']").val() == 'false') {
      swal('', '还未到抢红包时间，请耐心等待', 'error');return false;
    }
    $.ajax({
      type: 'POST',
      url: '/get_reward',
      dataType: 'json',
      data: { username: $("input[name='username']").val() },
      success: function success(data) {
        if (data.status == false) {
          swal('', data.text, 'error');
        } else if (data.status == true) {
          reward = $("#pop_reward");
          $(reward).find('.user').html(data.username);
          $(reward).find('.fee').html(data.fee);
          $(reward).find('.count').html(data.count);
          $("#pop_reward").modal();
        }
      }
    });
  });

  $("#pop_reward").on('show.bs.modal', function (e) {
    $(this).css('display', 'block');
    var modalHeight = $(window).height() / 2 - $("#pop_reward .modal-dialog").height() / 2;
    $(this).find('.modal-dialog').css({ 'margin-top': modalHeight });
  });

  $("#reward_query").on('show.bs.modal', function (e) {
    $(this).css('display', 'block');
    var modalHeight = $(window).height() / 2 - $("#reward_query .modal-dialog").height() / 2;
    $(this).find('.modal-dialog').css({ 'margin-top': modalHeight });
  });
});

/***/ })

/******/ });