/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/Plugin/ascolorpicker",["exports","Plugin"],factory);else if("undefined"!=typeof exports)factory(exports,require("Plugin"));else{var mod={exports:{}};factory(mod.exports,global.Plugin),global.PluginAscolorpicker=mod.exports}}(this,function(exports,_Plugin2){"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _Plugin3=babelHelpers.interopRequireDefault(_Plugin2),NAME="asColorPicker",AsColorPicker=function(_Plugin){function AsColorPicker(){return babelHelpers.classCallCheck(this,AsColorPicker),babelHelpers.possibleConstructorReturn(this,(AsColorPicker.__proto__||Object.getPrototypeOf(AsColorPicker)).apply(this,arguments))}return babelHelpers.inherits(AsColorPicker,_Plugin),babelHelpers.createClass(AsColorPicker,[{key:"getName",value:function(){return NAME}}],[{key:"getDefaults",value:function(){return{namespace:"colorInputUi"}}}]),AsColorPicker}(_Plugin3.default);_Plugin3.default.register(NAME,AsColorPicker),exports.default=AsColorPicker});;;