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
/******/ 	return __webpack_require__(__webpack_require__.s = 50);
/******/ })
/************************************************************************/
/******/ ({

/***/ 50:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(51);


/***/ }),

/***/ 51:
/***/ (function(module, exports) {

$(document).ready(function () {
  $(function () {
    $(".datepicker").datepicker({ autoSize: true, dateFormat: "yy-mm-dd" });
  });
  //--------------------------------------paises
  $("#paises").change(function (event) {
    $.get("departamentos/" + event.target.value + "", function (response, state) {
      $("#departamentos").empty();
      for (i = 0; i < response.length; i++) {
        $("#departamentos").append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
      }
    });
  });
  //-----------------------------------------departamentos
  $("#departamentos").change(function (event) {
    $.get("/ciudades/" + event.target.value + "", function (response, state) {
      $("#ciudad_id").empty();
      $("#ciudades_id").empty();
      for (i = 0; i < response.length; i++) {
        $("#ciudad_id").append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
        $("#ciudades_id").append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
      }
    });
  });

  //-----------------------------------Buscar asesores----------------------------------------
  $("#Buscarcontratistas").autocomplete({
    source: "/buscar/contratistas",
    minLength: 1,
    select: function select(event, ui) {
      $('#Buscarcontratistas').val(ui.item.value);
      $('#contratistas_id').val(ui.item.id);
    }
  });

  $("#Buscarcontratistas").click(function () {
    $("#Buscarcontratistas").val("");
    $("#contratistas_id").val("0");
  });

  //-----------------------------------Buscar Servicios----------------------------------------
  $("#serviciosContratistas").keyup(function (event) {
    $.get('/buscar/servicioscontratistas?term=' + $("#serviciosContratistas").val(), function (data) {
      $("#tablaServicios").empty().html(data);
    });
  });
  $("#serviciosContratistas").click(function () {
    $("#serviciosContratistas").val("");
    $("#servicioscontratistas_id").val("0");
  });
  //-------------------------------Seleccionar solicitudes-------------------------------------
  $(".SolicitudId").click(function (event) {
    console.log('Hola mundo');
  });

  $(".SolicitudId").keyup(function (event) {
    console.log('Hola mundo');
  });
});

/***/ })

/******/ });