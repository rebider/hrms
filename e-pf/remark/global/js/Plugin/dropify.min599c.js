/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/Plugin/dropify",["exports","Plugin"],factory);else if("undefined"!=typeof exports)factory(exports,require("Plugin"));else{var mod={exports:{}};factory(mod.exports,global.Plugin),global.PluginDropify=mod.exports}}(this,function(exports,_Plugin2){"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _Plugin3=babelHelpers.interopRequireDefault(_Plugin2),Dropify=function(_Plugin){function Dropify(){return babelHelpers.classCallCheck(this,Dropify),babelHelpers.possibleConstructorReturn(this,(Dropify.__proto__||Object.getPrototypeOf(Dropify)).apply(this,arguments))}return babelHelpers.inherits(Dropify,_Plugin),babelHelpers.createClass(Dropify,[{key:"getName",value:function(){return"dropify"}}],[{key:"getDefaults",value:function(){return{}}}]),Dropify}(_Plugin3.default);_Plugin3.default.register("dropify",Dropify),exports.default=Dropify});;;