/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

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

/***/ }),

/***/ "./src/modules/featuredJob.js":
/*!************************************!*\
  !*** ./src/modules/featuredJob.js ***!
  \************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "sparkFeaturedJob": function() { return /* binding */ sparkFeaturedJob; }
/* harmony export */ });
function sparkFeaturedJob() {
  const featured = document.querySelectorAll('.job_position_featured');
  const feature = 'Featured Job';
  const sparkle = `<span class="spark__job-feature">${feature}</span>`;
  featured.forEach(el => {
    const jobSummary = el.querySelector('.job_listing__summary');
    jobSummary.insertAdjacentHTML('afterbegin', sparkle);
  });
}

/***/ }),

/***/ "./scss/bp-spark.scss":
/*!****************************!*\
  !*** ./scss/bp-spark.scss ***!
  \****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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
/* harmony import */ var _scss_bp_spark_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../scss/bp-spark.scss */ "./scss/bp-spark.scss");
/* harmony import */ var _modules_copyright__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/copyright */ "./src/modules/copyright.js");
/* harmony import */ var _modules_featuredJob__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/featuredJob */ "./src/modules/featuredJob.js");
 // import ChurchProfile from './modules/churchProfileScripts';


 // const churchProfile = new ChurchProfile();

(0,_modules_copyright__WEBPACK_IMPORTED_MODULE_1__.sparkCopyrightInjection)(); // sparkFeaturedJob();

setTimeout(_modules_featuredJob__WEBPACK_IMPORTED_MODULE_2__.sparkFeaturedJob, 7000);
}();
/******/ })()
;
//# sourceMappingURL=index.js.map