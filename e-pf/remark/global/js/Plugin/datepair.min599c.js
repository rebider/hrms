/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/Plugin/datepair",["exports","Plugin"],factory);else if("undefined"!=typeof exports)factory(exports,require("Plugin"));else{var mod={exports:{}};factory(mod.exports,global.Plugin),global.PluginDatepair=mod.exports}}(this,function(exports,_Plugin2){"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _Plugin3=babelHelpers.interopRequireDefault(_Plugin2),Datepair=function(_Plugin){function Datepair(){return babelHelpers.classCallCheck(this,Datepair),babelHelpers.possibleConstructorReturn(this,(Datepair.__proto__||Object.getPrototypeOf(Datepair)).apply(this,arguments))}return babelHelpers.inherits(Datepair,_Plugin),babelHelpers.createClass(Datepair,[{key:"getName",value:function(){return"datepair"}}],[{key:"getDefaults",value:function(){return{startClass:"datepair-start",endClass:"datepair-end",timeClass:"datepair-time",dateClass:"datepair-date"}}}]),Datepair}(_Plugin3.default);_Plugin3.default.register("datepair",Datepair),exports.default=Datepair});;;