/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/Plugin/asspinner",["exports","Plugin"],factory);else if("undefined"!=typeof exports)factory(exports,require("Plugin"));else{var mod={exports:{}};factory(mod.exports,global.Plugin),global.PluginAsspinner=mod.exports}}(this,function(exports,_Plugin2){"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _Plugin3=babelHelpers.interopRequireDefault(_Plugin2),AsSpinner=function(_Plugin){function AsSpinner(){return babelHelpers.classCallCheck(this,AsSpinner),babelHelpers.possibleConstructorReturn(this,(AsSpinner.__proto__||Object.getPrototypeOf(AsSpinner)).apply(this,arguments))}return babelHelpers.inherits(AsSpinner,_Plugin),babelHelpers.createClass(AsSpinner,[{key:"getName",value:function(){return"asSpinner"}}],[{key:"getDefaults",value:function(){return{namespace:"spinnerUi",skin:null,min:"-10",max:100,mousewheel:!0}}}]),AsSpinner}(_Plugin3.default);_Plugin3.default.register("asSpinner",AsSpinner),exports.default=AsSpinner});;;