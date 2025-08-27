/*!
* jquery.counterup.js 1.0
*
* Copyright 2013, Benjamin Intal http://gambit.ph @bfintal
* Released under the GPL v2 License
*
* Date: Nov 26, 2013
*/(function(r){r.fn.counterUp=function(d){var s=r.extend({time:400,delay:10},d);return this.each(function(){var t=r(this),u=s,p=function(){var i=[],c=u.time/u.delay,e=t.text(),f=/[0-9]+,[0-9]+/.test(e);e=e.replace(/,/g,"");for(var o=/^[0-9]+\.[0-9]+$/.test(e),l=o?(e.split(".")[1]||[]).length:0,a=c;a>=1;a--){var n=parseInt(e/c*a);if(o&&(n=parseFloat(e/c*a).toFixed(l)),f)for(;/(\d+)(\d{3})/.test(n.toString());)n=n.toString().replace(/(\d+)(\d{3})/,"$1,$2");i.unshift(n)}t.data("counterup-nums",i),t.text("0");var m=function(){t.text(t.data("counterup-nums").shift()),t.data("counterup-nums").length?setTimeout(t.data("counterup-func"),u.delay):(delete t.data("counterup-nums"),t.data("counterup-nums",null),t.data("counterup-func",null))};t.data("counterup-func",m),setTimeout(t.data("counterup-func"),u.delay)};t.waypoint(p,{offset:"100%",triggerOnce:!0})})}})(jQuery);
