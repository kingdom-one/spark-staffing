/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/modules/abstracts.js":
/*!**********************************!*\
  !*** ./src/modules/abstracts.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "ACCESS_RESTRICTED": () => (/* binding */ ACCESS_RESTRICTED),
/* harmony export */   "SITE_URL": () => (/* binding */ SITE_URL),
/* harmony export */   "socialIcons": () => (/* binding */ socialIcons)
/* harmony export */ });
const socialIcons = [{
  platform: 'Facebook',
  brand: '#1877F2',
  icon: `<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" /></svg>`
}, {
  platform: 'Twitter',
  brand: '#1DA1F2',
  icon: `<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Twitter</title><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>`
}, {
  platform: 'Instagram',
  brand: '#E4405F',
  icon: `<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>`
}, {
  platform: 'Linkedin',
  brand: '#0A66C2',
  icon: `<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>LinkedIn</title><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>`
}, {
  platform: 'TikTok',
  brand: '#000000',
  icon: `<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>TikTok</title><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>`
}, {
  platform: 'Pinterest',
  brand: '#BD081C',
  icon: `<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Pinterest</title><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z"/></svg>`
}, {
  platform: 'Youtube',
  brand: '#FF0000',
  icon: `<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>YouTube</title><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>`
}, {
  platform: 'Vimeo',
  brand: '#1AB7EA',
  icon: `<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Vimeo</title><path d="M23.9765 6.4168c-.105 2.338-1.739 5.5429-4.894 9.6088-3.2679 4.247-6.0258 6.3699-8.2898 6.3699-1.409 0-2.578-1.294-3.553-3.881l-1.9179-7.1138c-.719-2.584-1.488-3.878-2.312-3.878-.179 0-.806.378-1.8809 1.132l-1.129-1.457a315.06 315.06 0 003.501-3.1279c1.579-1.368 2.765-2.085 3.5539-2.159 1.867-.18 3.016 1.1 3.447 3.838.465 2.953.789 4.789.971 5.5069.5389 2.45 1.1309 3.674 1.7759 3.674.502 0 1.256-.796 2.265-2.385 1.004-1.589 1.54-2.797 1.612-3.628.144-1.371-.395-2.061-1.614-2.061-.574 0-1.167.121-1.777.391 1.186-3.8679 3.434-5.7568 6.7619-5.6368 2.4729.06 3.6279 1.664 3.4929 4.7969z"/></svg>`
}];
const SITE_URL = sparkData.root_url;
const ACCESS_RESTRICTED = `<div class="access-restricted">You must have a premium membership to view this content.<span class="access-restricted--links"><a href="/product-category/membership" class="upsell">Get yours now!</a><a class="dismissThis">Dismiss this notice.</a></span></div>`;

/***/ }),

/***/ "./src/modules/dismissThis.js":
/*!************************************!*\
  !*** ./src/modules/dismissThis.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ dismissals)
/* harmony export */ });
function dismissals() {
  const restricted = document.querySelectorAll('.access-restricted');
  restricted.forEach(el => {
    el.addEventListener('click', dismissThis);
  });
  function dismissThis(e) {
    e.target.closest('.access-restricted').style.opacity = 0;
    e.target.closest('.access-restricted').style.bottom = 0;
    setTimeout(() => e.target.closest('.access-restricted').style.display = 'none', 100);
  }
}

/***/ }),

/***/ "./src/modules/footerScripts.js":
/*!**************************************!*\
  !*** ./src/modules/footerScripts.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class Footer {
  constructor() {
    this.sparkCopyrightInjection();
    this.homepageCredits();
  }
  sparkCopyrightInjection() {
    const copyright = document.getElementById('copyright');
    const thisYear = new Date().getFullYear();
    const brand = 'Kingdom One';
    const kjLink = '<a href="https://kj.roelke.info" target ="_blank">K.J. Roelke</a>';
    copyright.innerHTML = `<p>&copy; ${thisYear} ${brand} All Rights Reserved.<br/>spark* staffing is a product by Kingdom One.<br> Learn more at <a href="https://kingdomone.co" target="_blank">kingdomone.co</a></p>`;
  }
  homepageCredits() {
    if (window.location.pathname != '/') return;
    const copyright = document.getElementById('copyright');
    const iconCredits = `<span>The icons on this page came from some incredible designers. <br>See where <a href="/credits">here.</a></span>`;
    copyright.insertAdjacentHTML('afterend', iconCredits);
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (new Footer());

/***/ }),

/***/ "./src/modules/headers.js":
/*!********************************!*\
  !*** ./src/modules/headers.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class Header {
  constructor() {
    this.preventPageReload();
  }
  preventPageReload() {
    const topLinks = document.querySelectorAll('.prevent-default');
    topLinks.forEach(el => {
      const link = el.querySelector('a');
      link.addEventListener('click', e => e.preventDefault());
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (new Header());

/***/ }),

/***/ "./src/modules/jobApplications.js":
/*!****************************************!*\
  !*** ./src/modules/jobApplications.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ highlightApplications)
/* harmony export */ });
function highlightApplications() {
  const applications = document.querySelectorAll('.job-manager__job--applications');
  applications.forEach(app => {
    if (app.innerText === '–') return;
    const link = app.querySelector('a');
    const number = app.innerText;
    link.innerText = `${number} application${+number > 1 ? 's' : ''}!`;
    link.style.fontWeight = '700';
  });
}

/***/ }),

/***/ "./src/modules/postAJob.js":
/*!*********************************!*\
  !*** ./src/modules/postAJob.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "packageSelector": () => (/* binding */ packageSelector)
/* harmony export */ });
function packageSelector() {
  const jobPackages = document.querySelectorAll('.job-package'),
    jobPackageContainer = document.querySelector('.job_packages'),
    userJobPackages = document.querySelectorAll('.user-job-package'),
    userJobPackageContainer = document.querySelector('.user-job_packages'),
    userRadioButtons = userJobPackageContainer.querySelectorAll('input'),
    radioButtons = jobPackageContainer.querySelectorAll('input');
  jobPackages.forEach((job, i) => job.addEventListener('click', () => {
    radioButtons[i].checked = true;
  }));
  userJobPackages.forEach((job, i) => job.addEventListener('click', () => {
    userRadioButtons[i].checked = true;
  }));
}

/***/ }),

/***/ "./src/modules/profileScripts.js":
/*!***************************************!*\
  !*** ./src/modules/profileScripts.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "ProfileScripts": () => (/* binding */ ProfileScripts)
/* harmony export */ });
/* harmony import */ var _abstracts_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./abstracts.js */ "./src/modules/abstracts.js");

class ProfileScripts {
  constructor() {
    this.nav = document.querySelector('nav.bp-profile__subnav.item-list-tabs.no-ajax');
    this.socialContainer = document.querySelectorAll('.social__container');
    this.socialMediaSection = document.querySelector('.social-media');
    this.restricted = document.querySelectorAll('.restricted');
  }
  /** Swap URLs for branded Icons */
  socials() {
    // Step 1: Grab Elements
    this.socialContainer.forEach(el => {
      const anchor = el.querySelector('a'); // full anchor element
      const link = anchor.innerHTML; // url
      el.innerHTML = '';
      // Step 3:  Create HTML
      if (anchor.innerText.includes('facebook')) this._swapHTML(link, el, 'Facebook');
      if (anchor.innerText.includes('twitter')) this._swapHTML(link, el, 'Twitter');
      if (anchor.innerText.includes('instagram')) this._swapHTML(link, el, 'Instagram');
      if (anchor.innerText.includes('tiktok')) this._swapHTML(link, el, 'TikTok');
      if (anchor.innerText.includes('pinterest')) this._swapHTML(link, el, 'Pinterest');
      if (anchor.innerText.includes('vimeo')) this._swapHTML(link, el, 'Vimeo');
      if (anchor.innerText.includes('youtube')) this._swapHTML(link, el, 'Youtube');
      if (anchor.innerText.includes('linkedin')) this._swapHTML(link, el, 'Linkedin');

      // Step 4: Apply Styles
      this.socialMediaSection.querySelector('.bp-profile__section--content').style.display = 'flex';
      this.socialMediaSection.querySelector('.bp-profile__section--content').style.flexWrap = 'wrap';
    });
  }
  hideWooNav() {
    this.nav.style.display = 'none';
  }
  /** Generate HTML with branded SVG
   * @param {string} link - the link to href
   * @param {Node} el - the `div` to rewrite in
   * @param {string} platform - the name of the platform (must be capitalized to match `socialIcons` object key)
   */
  _swapHTML(link, el, platform) {
    const icon = _abstracts_js__WEBPACK_IMPORTED_MODULE_0__.socialIcons.findIndex(el => el.platform === platform);
    el.innerHTML = `<a href="${link}" target="_blank" class="social--link" >${_abstracts_js__WEBPACK_IMPORTED_MODULE_0__.socialIcons[icon].icon}</a>`;
    const svg = el.querySelector('svg');
    svg.style.fill = `${_abstracts_js__WEBPACK_IMPORTED_MODULE_0__.socialIcons[icon].brand}`;
  }
  restrictAccess() {
    this.restricted.forEach(el => {
      if (el.classList.contains('church-info') || el.classList.contains('next-level-info')) {
        el.style.border = '3px solid #68cad7';
        const e = el.querySelector('.profile-fields');
        e.innerHTML = _abstracts_js__WEBPACK_IMPORTED_MODULE_0__.ACCESS_RESTRICTED;
      }
    });
  }
}

/***/ }),

/***/ "./src/modules/requiredFields.js":
/*!***************************************!*\
  !*** ./src/modules/requiredFields.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "controlAsterisk": () => (/* binding */ controlAsterisk),
/* harmony export */   "replacedRequiredTag": () => (/* binding */ replacedRequiredTag)
/* harmony export */ });
/* harmony import */ var _abstracts__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./abstracts */ "./src/modules/abstracts.js");
/** This file was originally created to edit the BuddyPress Registration Page. That page is now being bypasesed by PM Pro's Memberships page. */


// BUDDYPRESS OR WOOCOMMERCE
/** Replace asterisk with spark brand on BuddyPress or WooCommerce pages */
function replacedRequiredTag() {
  const requiredTag = document.querySelectorAll('.required');
  const sparkAsterisk = `<img src="${_abstracts__WEBPACK_IMPORTED_MODULE_0__.SITE_URL}/wp-content/uploads/2021/11/Icon-Simple.png" class="required--icon" style="width:18px;height=18px">`;
  if (requiredTag) {
    requiredTag.forEach(el => {
      el.textContent = '';
      el.insertAdjacentHTML('beforeend', sparkAsterisk);
    });
  } else return;
}

// PAID MEMBERSHIPS PRO
const required = document.querySelectorAll('.pmpro_required'),
  allAsterisks = document.querySelectorAll('.pmpro_asterisk'),
  asterisk = ` <span class="pmpro_asterisk"></span>`;
function addAsterisk(nodeList) {
  nodeList.forEach(item => {
    const owner = item.closest('.pmpro_checkout-field');
    const label = owner.querySelector('label');
    if (label.childElementCount === 0) owner.firstElementChild.insertAdjacentHTML('beforeend', asterisk);
  });
}

/** Replace asterisk with spark brand on Paid Memberships Pro Checkout pages */
function controlAsterisk() {
  required.forEach(el => {
    const parent = el.closest('div');
    const sibling = parent.querySelector('.pmpro_asterisk');
    sibling.remove();
  });
  addAsterisk(required);
}

/***/ }),

/***/ "./scss/bp-spark.scss":
/*!****************************!*\
  !*** ./scss/bp-spark.scss ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

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
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scss_bp_spark_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../scss/bp-spark.scss */ "./scss/bp-spark.scss");
/* harmony import */ var _modules_footerScripts__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/footerScripts */ "./src/modules/footerScripts.js");
/* harmony import */ var _modules_headers__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/headers */ "./src/modules/headers.js");
/* harmony import */ var _modules_postAJob__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./modules/postAJob */ "./src/modules/postAJob.js");
/* harmony import */ var _modules_requiredFields__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./modules/requiredFields */ "./src/modules/requiredFields.js");
/* harmony import */ var _modules_jobApplications__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./modules/jobApplications */ "./src/modules/jobApplications.js");
/* harmony import */ var _modules_profileScripts__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./modules/profileScripts */ "./src/modules/profileScripts.js");
/* harmony import */ var _modules_dismissThis__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./modules/dismissThis */ "./src/modules/dismissThis.js");








function init() {
  const profileScipts = new _modules_profileScripts__WEBPACK_IMPORTED_MODULE_6__.ProfileScripts();
  let URL = window.location.href;
  (0,_modules_requiredFields__WEBPACK_IMPORTED_MODULE_4__.replacedRequiredTag)();
  (0,_modules_dismissThis__WEBPACK_IMPORTED_MODULE_7__["default"])();
  if (URL.includes('checkout')) setTimeout(_modules_requiredFields__WEBPACK_IMPORTED_MODULE_4__.controlAsterisk, 500);
  if (URL.includes('profile')) {
    profileScipts.socials();
    profileScipts.restrictAccess();
  }
  if (URL.includes('profile') && URL.includes('shop')) profileScipts.hideWooNav();
  if (URL.includes('post-a-job')) (0,_modules_postAJob__WEBPACK_IMPORTED_MODULE_3__.packageSelector)();
  if (URL.includes('job-dashboard')) (0,_modules_jobApplications__WEBPACK_IMPORTED_MODULE_5__["default"])();
}
init();
})();

/******/ })()
;
//# sourceMappingURL=index.js.map