(function(a, b) {
    function m(c, d, e) { var f = 0;
        c.find(".creative_layer div").each(function(c) { var e = a(this); if (e.data("_top") == b) e.data("_top", parseInt(e.css("top"), 0)); if (e.data("_left") == b) e.data("_left", parseInt(e.css("left"), 0)); if (e.data("_op") == b) { e.data("_op", e.css("opacity")) }
            e.css({ "z-index": 1200 }); if (e.hasClass("fadeup")) { e.animate({ top: e.data("_top") + 20 + "px", opacity: 0 }, { duration: 0, queue: false }).delay(d + (f + 1) * 200).animate({ top: e.data("_top") + "px", opacity: e.data("_op") }, { duration: 300, queue: true });
                f++ } if (e.hasClass("faderight")) { e.animate({ left: e.data("_left") - 20 + "px", opacity: 0 }, { duration: 0, queue: false }).delay(d + (f + 1) * 200).animate({ left: e.data("_left") + "px", opacity: e.data("_op") }, { duration: 300, queue: true });
                f++ } if (e.hasClass("fadedown")) { e.animate({ top: e.data("_top") - 20 + "px", opacity: 0 }, { duration: 0, queue: false }).delay(d + (f + 1) * 200).animate({ top: e.data("_top") + "px", opacity: e.data("_op") }, { duration: 300, queue: true });
                f++ } if (e.hasClass("fadeleft")) { e.animate({ left: e.data("_left") + 20 + "px", opacity: 0 }, { duration: 0, queue: false }).delay(d + (f + 1) * 200).animate({ left: e.data("_left") + "px", opacity: e.data("_op") }, { duration: 300, queue: true });
                f++ } if (e.hasClass("fade")) { e.animate({ opacity: 0 }, { duration: 0, queue: false }).delay(d + (f + 1) * 200).animate({ opacity: e.data("_op") }, { duration: 300, queue: true });
                f++ } }) }

    function l(c, d) { d.cd = 0;
        d.timer = d.timer * 10; if (d.thumbStyle == "image" || d.thumbStyle == "both" || d.thumbStyle == "thumb") { if (a.browser.msie) c.find(".paradigm_thumb_container #thumbmask .thumbsslide").cssAnimate({ left: "0px" }, { duration: 300, queue: false });
            else c.find(".paradigm_thumb_container #thumbmask .thumbsslide").animate({ left: "0px" }, { duration: 300, queue: false }); var e = c.find(".paradigm_thumb_container #thumbmask"); var f = e.find(".thumbsslide"); var g = c.find(".slide_mainmask");
            setInterval(function() { if (d.loaded == 1) { var b = c.data("currentSlide"); var h = c.data("currentThumb"); if (!e.hasClass("overme") && !g.hasClass("overme") && !g.hasClass("videoon")) { d.cd = d.cd + 1; var i = Math.floor(d.thumbWidth * (d.cd / d.timer)); if (a.browser.msie) { h.find("img").animate({ left: 0 - i + "px" }, { duration: 10, queue: false });
                            h.animate({ left: i + "px" }, { duration: 10, queue: false }) } else { h.find("img").cssAnimate({ left: 0 - i + "px" }, { duration: 10, queue: false });
                            h.cssAnimate({ left: i + "px" }, { duration: 10, queue: false }) } if (d.cd == d.timer) { d.cd = 0;
                            f.find(".paradigm-thumbs").each(function() { var b = a(this); if (a.browser.msie) { b.stop();
                                    b.find("img").stop(true, true) } else { b.cssStop(true, true);
                                    b.find("img").cssStop(true, true) }
                                b.find("img").css({ left: "0px" });
                                f.css({ left: "0px" }) }); if (b.index() < d.maxitem - 1) { var j = c.find("ul li:eq(" + (b.index() + 1) + ")");
                                k(b, j, c, d); var l = 0 - parseInt(h.parent().css("left"), 0);
                                f.css({ position: "absolute" }); if (Math.abs(l) <= c.data("thumbnailmaxdif")) { if (a.browser.msie) f.animate({ left: l + "px" }, { duration: 300, queue: false });
                                    else f.cssAnimate({ left: l + "px" }, { duration: 300, queue: false }) } else { l = 0 - c.data("thumbnailmaxdif"); if (a.browser.msie) f.animate({ left: l + "px" }, { duration: 300, queue: false });
                                    else f.cssAnimate({ left: l + "px" }, { duration: 300, queue: false }) } } else { k(b, c.find("ul li:first"), c, d); if (a.browser.msie) f.animate({ left: "0px" }, { duration: 300, queue: false });
                                else f.cssAnimate({ left: "0px" }, { duration: 300, queue: false }) } } } } }, 100) } else { var g = c.find(".slide_mainmask");
            setInterval(function() { if (d.loaded == 1) { var e = c.data("currentSlide"); var h = c.data("currentThumb"); if (!g.hasClass("overme") && !g.hasClass("videoon")) { d.cd = d.cd + 1; if (d.cd == d.timer) { d.cd = 0; if (e.index() < d.maxitem - 1) { var i = c.find("ul li:eq(" + (e.index() + 1) + ")");
                                k(e, i, c, d); if (d.thumbStyle != "none") { var j = 0 - parseInt(h.parent().css("left"), 0); if (f != null && f != b) { f.css({ position: "absolute" }); if (Math.abs(j) <= c.data("thumbnailmaxdif")) { if (a.browser.msie) f.animate({ left: j + "px" }, { duration: 300, queue: false });
                                            else f.cssAnimate({ left: j + "px" }, { duration: 300, queue: false }) } else { j = 0 - c.data("thumbnailmaxdif"); if (a.browser.msie) f.animate({ left: j + "px" }, { duration: 300, queue: false });
                                            else f.cssAnimate({ left: j + "px" }, { duration: 300, queue: false }) } } } } else { k(e, c.find("ul li:first"), c, d); if (f != null && f != b) { if (a.browser.msie) f.animate({ left: "0px" }, { duration: 300, queue: false });
                                    else f.cssAnimate({ left: "0px" }, { duration: 300, queue: false }) } } } } } }, 100) } }

    function k(b, c, d, e) { var f = false;
        d.find("ul >li").each(function(d) { var e = a(this); if (e.index() != b.index() && e.index() != c.index()) { e.css({ display: "none", position: "absolute", left: "0px", "z-index": "994" }) } }); var g = d.find(".slide_mainmask .video_container");
        setTimeout(function() { g.remove() }, 600); var h = d.find(".slide_mainmask");
        h.removeClass("videoon");
        b.css({ position: "absolute", top: "0px", left: "0px", "z-index": "900" });
        c.css({ position: "absolute", top: "0px", left: "0px", "z-index": "1000" });
        c.css({ display: "block" }); var i = c.find("img").width(); var j = c.find("img").height(); if (c.find("img").width() > 0 && c.find("img").width() < e.width) { var k = e.width / i;
            i = i * k;
            j = j * k } if (c.find("img").height() > 0 && c.find("img").height() < e.height) { var k = e.height / j;
            i = i * k;
            j = j * k } if (i > e.width) c.find("img:first").css({ position: "absolute", left: e.width / 2 - i / 2 + "px", width: i + "px", height: j + "px" }); if (j > e.height) c.find("img:first").css({ position: "absolute", top: e.height / 2 - j / 2 + "px", width: i + "px", height: j + "px" }); if (c.data("transition") == "slide") { if (f == false) { var l = true; if (b.index() > c.index()) l = false; if (l) { g.animate({ left: 0 - e.width + "px" }, { duration: 600, queue: false });
                    c.find(".slide_container").stop(true, true);
                    c.find(".slide_container").css({ opacity: "1.0", left: e.width + "px" });
                    b.find(".slide_container").animate({ left: 0 - e.width + "px" }, { duration: 600, queue: false });
                    c.find(".slide_container").animate({ left: "0px", top: "0px", opacity: "1.0" }, { duration: 600, queue: false }) } else { g.animate({ left: e.width + "px" }, { duration: 600, queue: false });
                    c.find(".slide_container").stop(true, true);
                    c.find(".slide_container").css({ opacity: "1.0", position: "absolute", top: "0px", left: 0 - e.width + "px" });
                    b.find(".slide_container").animate({ left: e.width + "px" }, { duration: 600, queue: false });
                    c.find(".slide_container").animate({ left: "0px", top: "0px", opacity: "1.0" }, { duration: 600, queue: false }) } } } else { b.find(".slide_container").stop(true, true);
            b.find(".slide_container").animate({ opacity: "0" }, { duration: 600, queue: false });
            g.animate({ opacity: "0.0" }, { duration: 600, queue: false });
            c.find(".slide_container").stop(true, true);
            c.find(".slide_container").css({ opacity: "0.0", left: "0px", top: "0px" });
            c.find(".slide_container").animate({ opacity: "1.0" }, { duration: 600, queue: false }) } if (d.find(".paradigm_thumb_container").length > 0) { var n = d.find(".paradigm_thumb_container #thumbmask .thumbsslide #thumb" + c.index() + " #over");
            d.find(".paradigm_thumb_container #thumbmask .thumbsslide #thumb" + b.index()).each(function(b) { var d = a(this); if (d.attr("id") != "thumb" + c.index()) { d.removeClass("selected"); var f = d.find("#over");
                    f.stop();
                    f.css({ position: "absolute", opacity: "0.0" });
                    setTimeout(function() { f.find("img").css({ position: "absolute", left: "0px" }) }, 30); if (a.browser.msie) { f.animate({ left: "0px", height: e.thumbHeight + "px", width: e.thumbWidth + "px" }, { duration: 1, queue: false }) } else { f.cssAnimate({ left: "0px", height: e.thumbHeight + "px", width: e.thumbWidth + "px" }, { duration: 1, queue: false }) } if (a.browser.msie && a.browser.version > 7 && a.browser.version < 9) f.css({ display: "none" }) } });
            n.parent().addClass("selected");
            n.animate({ opacity: "1.0" }, { duration: 300, queue: false }); if (a.browser.msie && a.browser.version > 7 && a.browser.version < 9) n.css({ display: "block" });
            d.data("currentThumb", n) } if (d.find(".minithumb").length > 0) { var n = d.find("#minithumb" + c.index());
            d.find(".minithumb").removeClass("selected");
            n.addClass("selected"); if (e.thumbStyle != "both") d.data("currentThumb", n) }
        d.data("currentSlide", c);
        m(c, 100, d);
        e.cd = 0 }

    function j(a, b, c) { var d = c; var e = d.data("opt"); var f = d; var g = d.parent().data("currentSlide"); var h = a - d.offset().left; var i = d.data("maxwidth"); var j = h / i; if (j > 1) j = 1; if (j < -1) j = -1; var k = b - d.offset().top; var l = d.data("maxheight"); var m = k / l; if (m > 1) m = 1; if (m < -1) m = -1; var n = d.data("pdistance"); var o = d.data("pdistancey"); var p = d.data("cdistance"); var q = d.data("cdistancey"); var r = g.find(".parallax_container .kb_container img:first"); var s = r.width() - i; var t = r.height() - l; if (n > s) n = s; if (o > t) o = t; if (n < 0) { n = 0;
            p = 0 } if (o < 0) { o = 0;
            q = 0 } var u = {};
        j = j - .5;
        m = m - .5;
        u.slideFactorX = n * j;
        u.slideFactorCX = p * j;
        u.slideFactorY = o * m;
        u.slideFactorCY = q * m;
        u.x = h;
        u.y = k; return u }

    function i(b, c) { var d = b.find(".slide_mainmask");
        d.data("maxwidth", c.width + c.padleft + c.padright);
        d.data("maxheight", c.height + c.padtop + c.padbottom);
        d.data("pdistance", c.parallaxX);
        d.data("pdistancey", c.parallaxY);
        d.data("cdistance", c.captionParallaxX);
        d.data("cdistancey", c.captionParallaxY);
        d.data("opt", c);
        a("body").append('<div id="mpinfo" style="z-index:1000000;background-color:#fff;position:absolute;top:10px;left:10px;font-size:15px"></div>');
        d.mouseenter(function(b) { var c = a(this); var d = c.parent().find(".paradigm_thumb_container #thumbmask"); var e = c.parent().data("currentSlide"); var f = e.find(".parallax_container"); var g = e.find(".layer_container"); var h = j(b.pageX, b.pageY, c);
            f.stop();
            g.stop();
            c.addClass("overon");
            f.css({ left: parseInt(f.css("left"), 0) + "px", top: parseInt(f.css("top"), 0) + "px" }); if (a.browser.msie) { f.animate({ left: 0 - h.slideFactorX + "px", top: 0 - h.slideFactorY + "px" }, { duration: 200, queue: false });
                g.animate({ left: 0 - h.slideFactorCX + "px", top: 0 - h.slideFactorCY + "px" }, { duration: 200, queue: false }) } else { f.cssAnimate({ left: 0 - h.slideFactorX + "px", top: 0 - h.slideFactorY + "px" }, { duration: 200, queue: false });
                g.cssAnimate({ left: 0 - h.slideFactorCX + "px", top: 0 - h.slideFactorCY + "px" }, { duration: 200, queue: false }) } });
        d.mouseleave(function(b) { var c = a(this); var d = c.parent().data("currentSlide"); var e = d.find(".parallax_container"); var f = d.find(".layer_container");
            c.removeClass("overme"); var g = j(a(window).width() / 2, a(window).height / 2, c);
            c.addClass("overon");
            e.stop();
            f.stop(); if (a.browser.msie) { e.animate({ left: 0 - g.slideFactorX + "px", top: 0 - g.slideFactorY + "px" }, { duration: 200, queue: false });
                f.animate({ left: 0 - g.slideFactorCX + "px", top: 0 - g.slideFactorCY + "px" }, { duration: 200, queue: false }) } else { e.cssAnimate({ left: 0 - g.slideFactorX + "px", top: 0 - g.slideFactorY + "px" }, { duration: 200, queue: false });
                f.cssAnimate({ left: 0 - g.slideFactorCX + "px", top: 0 - g.slideFactorCY + "px" }, { duration: 200, queue: false }) } });
        d.mousemove(function(b) { var c = a(this);
            c.addClass("overme"); var d = c.parent().find(".paradigm_thumb_container #thumbmask"); if (!d.hasClass("overme") && !c.hasClass("overon")) { var e = c.parent().data("currentSlide"); var f = e.find(".parallax_container"); var g = e.find(".layer_container"); var h = j(b.pageX, b.pageY, c); if (h.y < c.data("maxheight")) { f.stop();
                    g.stop(); if (a.browser.msie) { f.css({ left: 0 - h.slideFactorX + "px", top: 0 - h.slideFactorY + "px" });
                        g.css({ left: 0 - h.slideFactorCX + "px", top: 0 - h.slideFactorCY + "px" }) } else { f.cssAnimate({ left: 0 - h.slideFactorX + "px", top: 0 - h.slideFactorY + "px" }, { duration: 0, queue: false });
                        g.cssAnimate({ left: 0 - h.slideFactorCX + "px", top: 0 - h.slideFactorCY + "px" }, { duration: 0, queue: false }) } } } else { setTimeout(function() { c.removeClass("overon") }, 100) } }) }

    function h(b, c) { if (a.browser.msie) { b.find(".paradigm-preloader").animate({ opacity: "0.0" }, { duration: 300, queue: false }) } else { b.find(".paradigm-preloader").cssAnimate({ opacity: "0.0" }, { duration: 300, queue: false }) }
        setTimeout(function() { b.find(".paradigm-preloader").remove() }, 300); var d = b.find("ul li:first");
        k(d, d, b, c);
        i(b, c);
        c.loaded = 1 }

    function g(b, c) { var d = b.find("ul >li").length; var e = c.width + c.padleft + c.padright;
        b.append('<div class="thumbbuttons"><div class="grainme"><div class="leftarrow"></div><div class="thumbs"></div><div class="rightarrow"></div></div></div>'); var f = b.find(".leftarrow"); var g = b.find(".rightarrow");
        g.click(function() { var a = b.data("currentSlide"); if (a.index() < c.maxitem - 1) { var d = b.find("ul li:eq(" + (a.index() + 1) + ")") } else { var d = b.find("ul li:first") }
            k(a, d, b, c) });
        f.click(function() { var a = b.data("currentSlide"); if (a.index() > 0) { var d = b.find("ul li:eq(" + (a.index() - 1) + ")") } else { var d = b.find("ul li:eq(" + (c.maxitem - 1) + ")") }
            k(a, d, b, c) }); var h = b.find(".thumbs");
        b.find("ul >li").each(function(d) { var e = a(this); var f = a('<div class="minithumb" id="minithumb' + d + '"></div>');
            f.data("id", d);
            h.append(f);
            f.click(function() { var d = a(this); if (!d.hasClass("selected")) { var e = b.find("ul li:eq(" + d.data("id") + ")");
                    k(b.data("currentSlide"), e, b, c) } }) });
        h.waitForImages(function() { var a = parseInt(h.parent().parent().css("top"), 0);
            h.parent().parent().css({ top: a + c.bulletYOffset + "px", left: e / 2 - parseInt(h.parent().width(), 0) / 2 + c.bulletXOffset + "px" }) }) }

    function f(b, c) { var d = b.find("ul >li").length; if (d < c.thumbAmount) c.thumbAmount = d; var e = c.thumbAmount * c.thumbWidth + (c.thumbAmount - 1) * c.thumbSpaces; var f = c.thumbHeight; var g = e - c.thumbSpaces + 2 * c.thumbPadding; var h = f + 2 * c.thumbPadding; var i = c.width + c.padleft + c.padright; var j = Math.round(i / 2 - g / 2); var l = d * c.thumbWidth + (d - 1) * c.thumbSpaces;
        b.append('<div class="paradigm_thumb_container" style="position:absolute;left:' + j + "px;top:" + (c.height + c.padtop + c.padbottom - c.thumbPadding) + "px;width:" + (g + 2) + "px;height:" + (h + 2) + 'px;overflow:hidden"></div>'); var m = b.find(".paradigm_thumb_container"); if (c.thumbAmount == 0) m.css({ visibility: "hidden" });
        m.append('<div class="paradigm_thumb_container_bg" style="position:absolute;left:1px;top:1px;width:' + g + "px;height:" + h + 'px;overflow:hidden"></div>');
        m.append('<div id="thumbmask" style="overflow:hidden;position:absolute;top:' + (c.thumbPadding + 1) + "px;left:" + (c.thumbPadding + 1) + "px; width:" + (e - c.thumbSpaces) + "px;\theight:" + c.thumbHeight + 'px"></div>'); var n = m.find("#thumbmask");
        n.append('<div class="thumbsslide" style="width:' + l + 'px"></div>'); var o = n.find(".thumbsslide");
        b.find("ul >li").each(function(e) { var f = a(this); var g = f.find("img:first"); var h = g.data("thumb_bw"); var i = g.data("thumb"); var j = f.find(".slide_container").data("video") == 1; var l = a('<div class="paradigm-thumbs" id="thumb' + e + '" style="cursor:pointer;position:absolute;top:0px;left:' + (e * c.thumbWidth + (e - 1) * c.thumbSpaces) + "px;width:" + c.thumbWidth + "px;height:" + c.thumbHeight + "px;background:url(" + h + ');"></div>');
            l.data("id", e); if (e == d) l.css({ "margin-right": "0px" });
            o.append(l); var m = a('<div id="over" style="cursor:pointer"><img id="over_img" src="' + i + '"></div>');
            l.append(m); var n = l.find("#over");
            n.css({ opacity: "0.0" }); if (a.browser.msie && a.browser.version > 7 && a.browser.version < 9) { n.css({ display: "none" }) }
            n.css({ overflow: "hidden", position: "absolute", left: "0px", opacity: "0.0", height: c.thumbHeight + "px", width: c.thumbWidth + "px" });
            n.find("img").css({ position: "absolute", left: "0px" }); if (a.browser.msie) { n.animate({ left: "0px", opacity: "0.0", height: c.thumbHeight + "px", width: c.thumbWidth + "px" }, { duration: 50, queue: false });
                n.find("img").animate({ left: "0px" }, { duration: 50, queue: false }) } else { n.cssAnimate({ left: "0px", opacity: "0.0", height: c.thumbHeight + "px", width: c.thumbWidth + "px" }, { duration: 50, queue: false });
                n.find("img").cssAnimate({ left: "0px" }, { duration: 50, queue: false }) } if (j && c.thumbVideoIcon === "on") { var p = a('<div class="video"></div>');
                l.append(p);
                l.find(".video").css({ position: "absolute", top: c.thumbHeight / 2 + "px", left: c.thumbWidth / 2 + "px", "z-index": "1000" }) } if (c.shadow == "true" || c.shadow == true || c.shadow == "on") { var q = a('<div class="paradigm-repeatshadow" style="position:absoluet;margin-left:0px;margin-top:0px;width:' + c.thumbWidth + 'px"></div>');
                l.append(q) } var r = o.find("#thumb" + e);
            r.hover(function() { var b = a(this).find("#over"); if (!b.parent().hasClass("selected")) { if (a.browser.msie) { if (a.browser.msie && a.browser.version > 7 && a.browser.version < 9) b.css({ display: "block" });
                        else b.animate({ opacity: "1.0" }, { duration: 300, queue: false }) } else { b.css({ left: "0px", display: "block" });
                        b.find("img").css({ display: "block", opacity: "1.0", left: "0px" });
                        b.cssAnimate({ opacity: "1.0" }, { duration: 300, queue: false }) } } }, function() { var b = a(this).find("#over"); if (!b.parent().hasClass("selected")) { if (a.browser.msie) { if (a.browser.msie && a.browser.version > 7 && a.browser.version < 9) b.css({ display: "none" });
                        else b.animate({ opacity: "0" }, { duration: 300, queue: false }) } else { b.cssAnimate({ opacity: "0.0" }, { duration: 300, queue: false }) } } });
            r.click(function() { var d = a(this); if (!d.hasClass("selected")) { var e = b.find("ul li:eq(" + d.data("id") + ")");
                    k(b.data("currentSlide"), e, b, c) } }) });
        b.data("thumbnailmaxdif", 0); if (e < l) { a(document).mousemove(function(b) { a("body").data("mousex", b.pageX) }); var p = l - e;
            b.data("thumbnailmaxdif", p); var q = p / (e - c.thumbWidth);
            n.data("steps", q);
            n.data("thw", c.thumbWidth);
            n.data("maxw", p);
            n.mouseenter(function() { var b = a(this); if (c.pauseOnRollOverThumbs != "off") b.addClass("overme"); var d = b.offset(); var e = a("body").data("mousex") - d.left;
                e = e - b.data("thw") / 2; var f = b.data("steps"); var g = 0 - f * e; if (g > 0) g = 0; if (g < 0 - p) g = 0 - p; if (c.pauseOnRollOverMain != "off") b.addClass("overon");
                b.find(".thumbsslide").css({ position: "absolute" }); if (a.browser.msie) b.find(".thumbsslide").animate({ left: g + "px" }, { duration: 200, queue: false });
                else b.find(".thumbsslide").cssAnimate({ left: g + "px" }, { duration: 200, queue: false }) });
            n.mousemove(function() { var b = a(this); if (c.pauseOnRollOverThumbs != "off") b.addClass("overme"); var d = b.offset(); var e = a("body").data("mousex") - d.left;
                e = e - b.data("thw") / 2; var f = b.data("steps"); var g = 0 - f * e; if (g > 0) g = 0; if (g < 0 - p) g = 0 - p; if (!b.hasClass("overon")) { b.find(".thumbsslide").css({ position: "absolute" }); if (a.browser.msie) b.find(".thumbsslide").animate({ left: g + "px" }, { duration: 0, queue: false });
                    else b.find(".thumbsslide").cssAnimate({ left: g + "px" }, { duration: 0, queue: false }) } else { setTimeout(function() { b.removeClass("overon") }, 100) } });
            n.mouseout(function() { var b = a(this);
                b.removeClass("overme") }) } if (c.thumbAmount == 0 || c.thumbStyle == "none") { m.css({ visibility: "hidden" });
            b.css({ width: i + "px" }) } else { b.css({ width: i + "px", height: c.height + h + "px" }) } }

    function e(b, c) { if (c.shadow == "true" || c.shadow == true || c.shadow == "on") { var d = c.width + c.padleft + c.padright; var e = d / 2; if (e > 187) e = 187;
            d = d - 2 * e; var f = a('<div class="paradigm-leftshadow" style="top:' + (c.height + c.padtop + c.padbottom) + "px;left:0px;width:" + e + 'px"></div>'); var g = a('<div class="paradigm-rightshadow" style="top:' + (c.height + c.padtop + c.padbottom) + 'px;"></div>'); if (c.thumbStyle === "bullet") var g = a('<div class="paradigm-rightshadow-bullet" style="top:' + (c.height + c.padtop + c.padbottom) + 'px;"></div>'); var h = a('<div class="paradigm-repeatshadow" style="top:' + (c.height + c.padtop + c.padbottom) + "px;left:" + e + "px;width:" + d + 'px"></div>');
            b.append(f);
            b.append(h);
            b.append(g) } else { var i = b.find(".paradigm_thumb_container") } }

    function d(a, b) { a.append('<div class="paradigm-bg" style="z-index:7;position:absolute;top:0px;left:0px;width:' + b.width + "px;height:" + b.height + 'px;overflow:hidden"></div>'); var c = a.find(".paradigm-bg");
        b.padtop = parseInt(c.css("paddingTop"), 0);
        b.padleft = parseInt(c.css("paddingLeft"), 0);
        b.padright = parseInt(c.css("paddingRight"), 0);
        b.padbottom = parseInt(c.css("paddingBottom"), 0) }

    function c(b, c) { b.find("ul").wrap('<div class="slide_mainmask" style="z-index:10;position:absolute;top:' + (c.padtop + 1) + "px;left:" + (c.padleft + 1) + "px;width:" + c.width + "px;height:" + c.height + 'px;overflow:hidden"></div>');
        b.find("ul .slide_mainmask").css({ opacity: "0.0" });
        c.maxitem = 0;
        b.find("ul >li").each(function(d) { c.maxitem = c.maxitem + 1; var e = a(this);
            e.find(".creative_layer").wrap('<div class="layer_container" style="position:absolute;left:0px;top:0px;width:' + c.width + "px;height:" + c.height + 'px"></div>');
            e.wrapInner('<div class="slide_container" style="z-index:10;position:absolute;top:0px;left:0px;width:' + c.width + "px;height:" + c.height + 'px;overflow:hidden"><div class="parallax_container" style="position:absolute;top:0pxleft:0px"><div class="kb_container"></div></div></div>');
            e.find(".slide_container").css({ opacity: "0.0" });
            e.find(".slide_container .parallax_container .kb_container .video_container").each(function() { var d = a(this);
                d.closest(".slide_container").append('<div class="paradigm-video-overlay"></div>');
                d.closest(".slide_container").append('<div class="paradigm-video-button"></div>');
                d.closest(".slide_container").data("video", 1); var e = d.closest(".slide_container").parent().find(".paradigm-video-button"); var f = d.closest(".slide_container").parent().find(".paradigm-video-overlay"); var g = parseInt(e.css("width"), 0); var h = parseInt(e.css("height"), 0); var i = parseInt(d.closest(".slide_container").css("width"), 0); var j = parseInt(d.closest(".slide_container").css("height"), 0);
                e.css({ left: i / 2 - g / 2 + "px", top: j / 2 - h / 2 + "px" });
                e.data("top", b);
                e.data("url", d.html());
                d.remove();
                f.data("origopa", f.css("opacity"));
                e.hover(function() { var b = a(this); var c = b.parent().find(".paradigm-video-overlay"); if (a.browser.msie) c.animate({ opacity: "0.5" }, { duration: 100 });
                    else c.cssAnimate({ opacity: "0.5" }, { duration: 100 }); if (a.browser.version > 7 && a.browser.version < 9) { c.css({ display: "block" }) } }, function() { var b = a(this); var c = b.parent().find(".paradigm-video-overlay"); if (a.browser.msie) c.animate({ opacity: c.data("origopa") }, { duration: 100 });
                    else c.cssAnimate({ opacity: c.data("origopa") }, { duration: 100 }); if (a.browser.msie && a.browser.version > 7 && a.browser.version < 9) { c.css({ display: "none" }) } });
                e.click(function() { var b = a(this); var d = b.data("top"); var e = d.find(".slide_mainmask");
                    e.addClass("videoon");
                    d.data("currentSlide").animate({ top: c.height + "px" }, { duration: 500, queue: false });
                    d.find(".slide_mainmask").append('<div class="video_container" style="z-index:9999;width:' + c.width + "px;height:" + c.height + 'px">' + b.data("url") + "</div>"); var f = d.find(".slide_mainmask .video_container");
                    f.css({ top: 0 - c.height + "px" });
                    f.animate({ top: "0px" }, { duration: 500, queue: false });
                    f.find("* #close").click(function() { var a = d.find(".slide_mainmask");
                        a.removeClass("videoon");
                        d.data("currentSlide").animate({ top: "0px" }, { duration: 600, queue: false });
                        f.animate({ top: 0 - c.height + "px" }, { duration: 600, queue: false });
                        setTimeout(function() { f.remove() }, 600) }) }) }) }) }
    a.fn.extend({ paradigm: function(i) { var j = { width: 876, height: 300, thumbWidth: 90, thumbHeight: 50, thumbAmount: 6, thumbSpaces: 4, thumbPadding: 4, thumbVideoIcon: "off", thumbStyle: "bullet", bulletXOffset: 0, bulletYOffset: 0, shadow: "true", parallaxX: 200, parallaxY: 50, captionParallaxX: 50, captionParallaxY: 25, timer: 2e3, touchenabled: "on" };
            i = a.extend({}, a.fn.paradigm.defaults, i); return this.each(function() { var j = i; if (j.bulletXOffset == b) j.bulletXOffset = 0; if (j.bulletYOffset == b) j.bulletYOffset = 0; var m = a(this);
                m.find(".video_pradigm").each(function() { a(this).addClass("video_container") });
                m.find(".video_paradigm_wrap").each(function() { a(this).addClass("video_container_wrap") });
                m.css({ width: j.width + "px", height: j.height + "px" });
                m.append('<div class="paradigm-preloader"></div>');
                d(m, j);
                c(m, j);
                e(m, j); if (j.thumbStyle == "image" || j.thumbStyle == "both" || j.thumbStyle == "thumb") f(m, j); if (j.thumbStyle == "bullet" || j.thumbStyle == "both") g(m, j);
                m.waitForImages(function() { h(m, j) }); if (j.timer > 0) l(m, j); if (j.touchenabled == "on") m.swipe({ data: m, swipeLeft: function() { var a = m.data("currentSlide"); if (a.index() < j.maxitem - 1) { var b = m.find("ul li:eq(" + (a.index() + 1) + ")") } else { var b = m.find("ul li:first") }
                        k(a, b, m, j) }, swipeRight: function() { var a = m.data("currentSlide"); if (a.index() > 0) { var b = m.find("ul li:eq(" + (a.index() - 1) + ")") } else { var b = m.find("ul li:eq(" + (j.maxitem - 1) + ")") }
                        k(a, b, m, j) }, allowPageScroll: "auto" }) }) } }) })(jQuery)