var canvas1 = document.getElementById("myCanvas1");
var ctx1 = canvas1.getContext("2d");


var Pencil = function(options) {

    this.options = {
        lineWidth: 60
    };
    this.init = function(canvas, ctx) {
        var grd = ctx.createLinearGradient(0, 0, 424, 196);
        grd.addColorStop(0, "#d5a13e");
        grd.addColorStop(1, "#d5a13e");
        grd.addColorStop(0.8, "#f6e8d2");
        ctx.fillStyle = grd;

        this.canvas = canvas;
        this.canvasPos = $(this.canvas).offset();
        this.ctx = ctx;
        this.ctx.fillStyle = this.options.fillStyle;
        this.ctx.fillRect(0, 0, canvas.width, canvas.height);
        this.ctx.strokeStyle = this.options.stroke_color;
        this.ctx.lineWidth = this.options.lineWidth;
        this.ctx.lineCap = "round";
        this.ctx.globalCompositeOperation = "destination-out";
        this.drawing = false;
        this.addCanvasEvents();
    };

    this.addCanvasEvents = function() {
        var c = $(this.canvas);
        c.on("mousedown", this, this.start);
        c.on("mousemove", this, this.stroke);
        c.on("mouseup", this, this.stop);
        this.bindMobile(c);
    };
    this.start = function(event) {

        var pen = event.data;
        var x = event.pageX - pen.canvasPos.left;
        var y = event.pageY - pen.canvasPos.top;

        pen.ctx.beginPath();
        pen.ctx.moveTo(x, y);
        pen.drawing = true;
    };
    this.stroke = function(event) {
        var pen = event.data
        if (pen.drawing) {

            var x = event.pageX - pen.canvasPos.left;
            var y = event.pageY - pen.canvasPos.top;
            pen.ctx.lineTo(x, y);
            pen.ctx.stroke();
        }
    };

    this.stop = function(event) {
        var pen = event.data;
        pen.drawing = false;
        var imageData;
        var lineNum = 0,
            lineHei = 10,
            den = 10,
            pixel,
            drawnCounter = 0,
            sumCounter = 0;
        imageData = pen.ctx.getImageData(0, 0, pen.canvas.width, pen.canvas.height);
        for (h = 0; h < pen.canvas.height; h += lineHei) {
            for (w = 0; w < pen.canvas.width; w += den) {
                sumCounter++;
                pixel = imageData.data[((w + (h * pen.canvas.width)) * 4) - 1];
                if (pixel != 0 && pixel) {
                    drawnCounter++;
                }
            }
        }

        event.preventDefault();
        mousedown = false;

        // 跳中獎框1
        var num = 0;
        var datas = ctx1.getImageData(50, 25, w - 110, h - 50);
        for (var i = 0; i < datas.data.length; i++) {
            if (datas.data[i] == 0) {
                num++;
            };
        };

        if (num >= datas.data.length * 0.80) {
            $('#giftModal').modal().css('display', 'flex');
            $('#cardBox').hide();
        }

    };


    this.clear = function(canvas, ctx) {
        canvas.width = canvas.width;
        ctx.save();
        var grd = ctx.createLinearGradient(0, 0, 424, 196);
        grd.addColorStop(0, "#d5a13e");
        grd.addColorStop(1, "#d5a13e");
        grd.addColorStop(0.8, "#f6e8d2");
        ctx.fillStyle = grd;
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        ctx.restore();
        this.init(canvas, ctx);
    };

    this.bindMobile = function(obj) {
        obj.bind("touchstart touchmove touchend touchcancel", function() {
            var e = event.changedTouches,
                t = e[0],
                n = "";
            switch (event.type) {
                case "touchstart":
                    n = "mousedown";
                    break;
                case "touchmove":
                    n = "mousemove";
                    break;
                case "touchend":
                    n = "mouseup";
                    break;
                default:
                    return
            }
            var r = document.createEvent("MouseEvent");
            r.initMouseEvent(n, true, true, window, 1, t.screenX, t.screenY, t.clientX, t.clientY, false, false, false, false, 0, null);
            t.target.dispatchEvent(r);
            event.preventDefault()
        })
    };

};

var p1 = new Pencil();
p1.init(canvas1, ctx1);


// 設定獎品
document.getElementById('myCanvas1').insertAdjacentHTML('afterend', '<div class="gifttext"><h1>iPhone X</h1></div>');