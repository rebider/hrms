/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/Plugin/jquery-knob",["exports","Plugin"],factory);else if("undefined"!=typeof exports)factory(exports,require("Plugin"));else{var mod={exports:{}};factory(mod.exports,global.Plugin),global.PluginJqueryKnob=mod.exports}}(this,function(exports,_Plugin2){"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _Plugin3=babelHelpers.interopRequireDefault(_Plugin2),Knob=function(_Plugin){function Knob(){return babelHelpers.classCallCheck(this,Knob),babelHelpers.possibleConstructorReturn(this,(Knob.__proto__||Object.getPrototypeOf(Knob)).apply(this,arguments))}return babelHelpers.inherits(Knob,_Plugin),babelHelpers.createClass(Knob,[{key:"getName",value:function(){return"knob"}}],[{key:"getDefaults",value:function(){return{min:-50,max:50,width:120,height:120,thickness:".1"}}}]),Knob}(_Plugin3.default);_Plugin3.default.register("knob",Knob),exports.default=Knob});;;