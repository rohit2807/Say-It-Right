/**
 * Canuck WordPress Theme doc ready script
 *
 * Used for search trigger.
 *
 * @link    http://kevinsspace.ca
 * @license Copyright (C) 2017-2018  kevinhaig Licensed GPLv2 or later
 * @package Canuck WordPress Theme
 */
jQuery(document).ready(function(e){e("span.canuck-show-search-trigger").click(function(){return e(".canuck-search").hasClass("search-on")?(e(".canuck-search").removeClass("search-on"),!1):(e(".canuck-search").addClass("search-on"),!1)})}),function(e){!function(o){var n=e("<button />",{class:"dropdown-toggle","aria-expanded":!1});o.find(".menu-item-has-children > a, .page_item_has_children > a").after(n),e(".dropdown-toggle").each(function(o){e(this).addClass("toggle-"+(o+1))}),e(".dropdown-toggle").each(function(o){e(this).next().addClass("toggle-ul-"+(o+1))})}(e(".nav-container")),e(".menu-1-toggle").click(function(){e(".main-nav").hasClass("toggle-on")?(e(".main-nav").removeClass("toggle-on"),e(".menu-1-toggle").attr("aria-expanded","false")):(e(".main-nav").addClass("toggle-on"),e(".menu-1-toggle").attr("aria-expanded","true"))}),e(".dropdown-toggle").each(function(o){e(".toggle-"+(o+1)).click(function(){e(".toggle-"+(o+1)).toggleClass("toggle-button-on"),e("ul.toggle-ul-"+(o+1)).toggleClass("toggle-ul-on")})}),e(".toggle-sb-a").length&&(e(".sidebar-a-toggle").hasClass("toggle-on")||e(".sidebar-a-toggle").addClass("toggle-on")),e(".sidebar-a-toggle").click(function(){e(".toggle-sb-a").hasClass("toggle-on")?e(".toggle-sb-a").removeClass("toggle-on"):(e(".toggle-sb-b").removeClass("toggle-on"),e(".toggle-sb-a").addClass("toggle-on"))}),e(".toggle-sb-b").length&&(e(".sidebar-b-toggle").hasClass("toggle-on")||e(".sidebar-b-toggle").addClass("toggle-on")),e(".sidebar-b-toggle").click(function(){e(".toggle-sb-b").hasClass("toggle-on")?e(".toggle-sb-b").removeClass("toggle-on"):(e(".toggle-sb-a").removeClass("toggle-on"),e(".toggle-sb-b").addClass("toggle-on"))})}(jQuery),jQuery(document).ready(function(e){window.requestAnimationFrame=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.msRequestAnimationFrame||function(e){return setTimeout(e,1e3/60)},e(function(o){function n(){var e=o(document).scrollTop(),n=o(document.body);e>=75?n.hasClass(t)||n.addClass(t):n.hasClass(t)&&n.removeClass(t)}var a,t="sticky";e(window).scrollTop()>10&&o(document.body).addClass(t),o(window).on("load",function(){o(window).on("scroll",function(){requestAnimationFrame(n)}),o(window).on("resize",function(){clearTimeout(a),a=setTimeout(function(){n()},50)})})})});