/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/Plugin/jstree",["exports","Plugin"],factory);else if("undefined"!=typeof exports)factory(exports,require("Plugin"));else{var mod={exports:{}};factory(mod.exports,global.Plugin),global.PluginJstree=mod.exports}}(this,function(exports,_Plugin2){"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _Plugin3=babelHelpers.interopRequireDefault(_Plugin2),Jstree=function(_Plugin){function Jstree(){return babelHelpers.classCallCheck(this,Jstree),babelHelpers.possibleConstructorReturn(this,(Jstree.__proto__||Object.getPrototypeOf(Jstree)).apply(this,arguments))}return babelHelpers.inherits(Jstree,_Plugin),babelHelpers.createClass(Jstree,[{key:"getName",value:function(){return"jstree"}}]),Jstree}(_Plugin3.default);_Plugin3.default.register("jstree",Jstree),exports.default=Jstree});;;