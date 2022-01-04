/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/modules/churchProfileScripts.js":
/*!*********************************************!*\
  !*** ./src/modules/churchProfileScripts.js ***!
  \*********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
class ChurchProfile {
  constructor() {
    console.log(`I'm from churchProfileScripts.js`);
  }

}

/* harmony default export */ __webpack_exports__["default"] = (ChurchProfile);

/***/ }),

/***/ "./src/modules/copyright.js":
/*!**********************************!*\
  !*** ./src/modules/copyright.js ***!
  \**********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "sparkCopyrightInjection": function() { return /* binding */ sparkCopyrightInjection; }
/* harmony export */ });
function sparkCopyrightInjection() {
  const copyright = document.getElementById('copyright');
  const thisYear = new Date().getFullYear();
  const brand = 'Kingdom One';
  const kjLink = '<a href="https://kj.roelke.info" target ="_blank">K.J. Roelke</a>';
  copyright.innerHTML = `<p>&copy; ${thisYear} ${brand} All Rights Reserved.<br/>spark* staffing is a product by Kingdom One.<br> Learn more at <a href="https://kingdomone.co" target="_blank">kingdomone.co</a></p>`;
}

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_churchProfileScripts__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/churchProfileScripts */ "./src/modules/churchProfileScripts.js");
/* harmony import */ var _modules_copyright__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/copyright */ "./src/modules/copyright.js");


const churchProfile = new _modules_churchProfileScripts__WEBPACK_IMPORTED_MODULE_0__["default"]();
(0,_modules_copyright__WEBPACK_IMPORTED_MODULE_1__.sparkCopyrightInjection)();
}();
/******/ })()
;
//# sourceMappingURL=index.js.map