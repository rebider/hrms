/*!
 * jQuery twitter bootstrap wizard plugin
 * Examples and documentation at: http://github.com/VinceG/twitter-bootstrap-wizard
 * version 1.0
 * Requires jQuery v1.3.2 or later
 * Supports Bootstrap 2.2.x, 2.3.x, 3.0
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 * Authors: Vadim Vincent Gabriel (http://vadimg.com), Jason Gill (www.gilluminate.com)
 */
(function (e) {
    var k = function (d, g) {
        d = e(d);
        var a = this,
            b = e.extend({}, e.fn.bootstrapWizard.defaults, g),
            f = null,
            c = null;
        this.rebindClick = function (b, a) {
            b.unbind("click", a).bind("click", a)
        };
        this.fixNavigationButtons = function () {
            f.length || (c.find("a:first").tab("show"), f = c.find('li:has([data-toggle="tab"]):first'));
            e(b.previousSelector, d).toggleClass("disabled", a.firstIndex() >= a.currentIndex());
            e(b.nextSelector, d).toggleClass("disabled", a.currentIndex() >= a.navigationLength());
            a.rebindClick(e(b.nextSelector, d),
                a.next);
            a.rebindClick(e(b.previousSelector, d), a.previous);
            a.rebindClick(e(b.lastSelector, d), a.last);
            a.rebindClick(e(b.firstSelector, d), a.first);
            if (b.onTabShow && "function" === typeof b.onTabShow && !1 === b.onTabShow(f, c, a.currentIndex())) return !1
        };
        this.next = function (h) {
            if (d.hasClass("last") || b.onNext && "function" === typeof b.onNext && !1 === b.onNext(f, c, a.nextIndex())) return !1;
            $index = a.nextIndex();
            $index > a.navigationLength() || c.find('li:has([data-toggle="tab"]):eq(' + $index + ") a").tab("show")
        };
        this.previous =
            function (h) {
                if (d.hasClass("first") || b.onPrevious && "function" === typeof b.onPrevious && !1 === b.onPrevious(f, c, a.previousIndex())) return !1;
                $index = a.previousIndex();
                0 > $index || c.find('li:has([data-toggle="tab"]):eq(' + $index + ") a").tab("show")
        };
        this.first = function (h) {
            if (b.onFirst && "function" === typeof b.onFirst && !1 === b.onFirst(f, c, a.firstIndex()) || d.hasClass("disabled")) return !1;
            c.find('li:has([data-toggle="tab"]):eq(0) a').tab("show")
        };
        this.last = function (h) {
            if (b.onLast && "function" === typeof b.onLast && !1 ===
                b.onLast(f, c, a.lastIndex()) || d.hasClass("disabled")) return !1;
            c.find('li:has([data-toggle="tab"]):eq(' + a.navigationLength() + ") a").tab("show")
        };
        this.currentIndex = function () {
            return c.find('li:has([data-toggle="tab"])').index(f)
        };
        this.firstIndex = function () {
            return 0
        };
        this.lastIndex = function () {
            return a.navigationLength()
        };
        this.getIndex = function (a) {
            return c.find('li:has([data-toggle="tab"])').index(a)
        };
        this.nextIndex = function () {
            return c.find('li:has([data-toggle="tab"])').index(f) + 1
        };
        this.previousIndex =
            function () {
                return c.find('li:has([data-toggle="tab"])').index(f) - 1
        };
        this.navigationLength = function () {
            return c.find('li:has([data-toggle="tab"])').length - 1
        };
        this.activeTab = function () {
            return f
        };
        this.nextTab = function () {
            return c.find('li:has([data-toggle="tab"]):eq(' + (a.currentIndex() + 1) + ")").length ? c.find('li:has([data-toggle="tab"]):eq(' + (a.currentIndex() + 1) + ")") : null
        };
        this.previousTab = function () {
            return 0 >= a.currentIndex() ? null : c.find('li:has([data-toggle="tab"]):eq(' + parseInt(a.currentIndex() - 1) + ")")
        };
        this.show = function (a) {
            return d.find('li:has([data-toggle="tab"]):eq(' + a + ") a").tab("show")
        };
        this.disable = function (a) {
            c.find('li:has([data-toggle="tab"]):eq(' + a + ")").addClass("disabled")
        };
        this.enable = function (a) {
            c.find('li:has([data-toggle="tab"]):eq(' + a + ")").removeClass("disabled")
        };
        this.hide = function (a) {
            c.find('li:has([data-toggle="tab"]):eq(' + a + ")").hide()
        };
        this.display = function (a) {
            c.find('li:has([data-toggle="tab"]):eq(' + a + ")").show()
        };
        this.remove = function (a) {
            var b = "undefined" != typeof a[1] ? a[1] :
                !1;
            a = c.find('li:has([data-toggle="tab"]):eq(' + a[0] + ")");
            b && (b = a.find("a").attr("href"), e(b).remove());
            a.remove()
        };
        c = d.find("ul:first", d);
        f = c.find('li:has([data-toggle="tab"]).active', d);
        c.hasClass(b.tabClass) || c.addClass(b.tabClass);
        if (b.onInit && "function" === typeof b.onInit) b.onInit(f, c, 0);
        if (b.onShow && "function" === typeof b.onShow) b.onShow(f, c, a.nextIndex());
        a.fixNavigationButtons();
        e('a[data-toggle="tab"]', c).on("click", function (d) {
            d = c.find('li:has([data-toggle="tab"])').index(e(d.currentTarget).parent('li:has([data-toggle="tab"])'));
            if (b.onTabClick && "function" === typeof b.onTabClick && !1 === b.onTabClick(f, c, a.currentIndex(), d)) return !1
        });
        e('a[data-toggle="tab"]', c).on("shown shown.bs.tab", function (d) {
            $element = e(d.target).parent();
            d = c.find('li:has([data-toggle="tab"])').index($element);
            if ($element.hasClass("disabled") || b.onTabChange && "function" === typeof b.onTabChange && !1 === b.onTabChange(f, c, a.currentIndex(), d)) return !1;
            f = $element;
            a.fixNavigationButtons()
        })
    };
    e.fn.bootstrapWizard = function (d) {
        if ("string" == typeof d) {
            var g = Array.prototype.slice.call(arguments,
                1);
            1 === g.length && g.toString();
            return this.data("bootstrapWizard")[d](g)
        }
        return this.each(function (a) {
            a = e(this);
            if (!a.data("bootstrapWizard")) {
                var b = new k(a, d);
                a.data("bootstrapWizard", b)
            }
        })
    };
    e.fn.bootstrapWizard.defaults = {
        tabClass: "nav nav-pills",
        nextSelector: ".wizard li.next",
        previousSelector: ".wizard li.previous",
        firstSelector: ".wizard li.first",
        lastSelector: ".wizard li.last",
        onShow: null,
        onInit: null,
        onNext: null,
        onPrevious: null,
        onLast: null,
        onFirst: null,
        onTabChange: null,
        onTabClick: null,
        onTabShow: null
    }
})(jQuery);;