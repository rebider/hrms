/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/Plugin/select2",["exports","Plugin"],factory);else if("undefined"!=typeof exports)factory(exports,require("Plugin"));else{var mod={exports:{}};factory(mod.exports,global.Plugin),global.PluginSelect2=mod.exports}}(this,function(exports,_Plugin2){"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _Plugin3=babelHelpers.interopRequireDefault(_Plugin2),Select2=function(_Plugin){function Select2(){return babelHelpers.classCallCheck(this,Select2),babelHelpers.possibleConstructorReturn(this,(Select2.__proto__||Object.getPrototypeOf(Select2)).apply(this,arguments))}return babelHelpers.inherits(Select2,_Plugin),babelHelpers.createClass(Select2,[{key:"getName",value:function(){return"select2"}}],[{key:"getDefaults",value:function(){return{width:"style"}}}]),Select2}(_Plugin3.default);_Plugin3.default.register("select2",Select2),exports.default=Select2});;;