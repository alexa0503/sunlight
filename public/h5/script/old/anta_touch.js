		var originTouchPos = {
					x: 0,
					y: 0
				},
				oldTouchPos = {
					x: 0,
					y: 0
				},
				newTouchPos = {
					x: 0,
					y: 0
				},
				firstDir= "",
				originTime= 0,
				oldTime= 0,
				newTime= 0,
				dx= 0,
				dy= 0,
				ax= 0,
				ay= 0,
				time= 0;
		var onTouchStart = function(t) {
			firstDir = "",
			t = t.changedTouches[0];

			originTouchPos.x = oldTouchPos.x = newTouchPos.x = t.clientX ;
			originTouchPos.y = oldTouchPos.y = newTouchPos.y = t.clientY ;
			originTime = oldTime = newTime = Date.now();
			dx = dy = ax = ay = 0,
			anta.on("touchmove", onTouchMove),
			anta.on("touchend", onTouchEnd)
		};
		anta.on("touchstart", onTouchStart);
	    var onTouchMove = function(t) {
			return t = t.changedTouches[0],
			newTouchPos.x = t.clientX,
			newTouchPos.y = t.clientY,
			newTime = Date.now(),
			checkGesture(),
			oldTouchPos.x = newTouchPos.x,
			oldTouchPos.y = newTouchPos.y,
			oldTime = newTime, !1
		};
		var onTouchEnd = function() {
			newTime = Date.now();
			var t = (newTime - oldTime) / 1e3;

			anta.off("touchmove", onTouchMove),
			anta.off("touchend", onTouchEnd)
		}

		function checkGesture(){
			dx = fixed2(newTouchPos.x - originTouchPos.x),
			dy = fixed2(newTouchPos.y - originTouchPos.y),
			ax = fixed2(newTouchPos.x - oldTouchPos.x),
			ay = fixed2(newTouchPos.y - oldTouchPos.y),
			time = (newTime - oldTime) / 1e3,
			"" == firstDir && (Math.abs(ax) > Math.abs(ay) ? firstDir = "x" : Math.abs(ax) < Math.abs(ay) && (firstDir = "y"));

			if(!p){
				c.lon = (c.lon - .2 * ax) % 360,
				c.lat = Math.max(-90, Math.min(90, c.lat + .2 * ay))
			}


		}
		function fixed2(t) {
			return Math.floor(100 * t) / 100
		}
		requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame || window.oRequestAnimationFrame ||
		function (callback) {
			setTimeout(callback, 1000 / 60);
		};

		//执行move动画
		function actiondh() {
			//手指动，就到这里
			var t = (d.lon + f.lon + c.lon) % 360,
				i = .35 * (d.lat + f.lat + c.lat);
			t - panoBg.rotationY > 180 && (panoBg.rotationY += 360),
			t - panoBg.rotationY < -180 && (panoBg.rotationY -= 360);
			var n = t - panoBg.rotationY,
				a = i - panoBg.rotationX;
			Math.abs(n) < .1 ? panoBg.rotationY = t : panoBg.rotationY += .3 * n,
			Math.abs(a) < .1 ? panoBg.rotationX = i : panoBg.rotationX += .15 * a,
			panoBg.updateT();
			panoDots.rotationY = panoBg.rotationY,
			panoDots.rotationX = panoBg.rotationX,
			panoDots.updateT(),
			t - panoItems.rotationY > 180 && (panoItems.rotationY += 360),
			t - panoItems.rotationY < -180 && (panoItems.rotationY -= 360);
			var o = t - panoItems.rotationY,
				r = i - panoItems.rotationX;
			Math.abs(o) < .1 ? panoItems.rotationY = t : panoItems.rotationY += .25 * o, Math.abs(r) < .1 ? panoItems.rotationX = i : panoItems.rotationX += .15 * r, panoItems.updateT();


			var s12 = -150 - 20 * Math.abs(n);
			//更新z轴
			spMain.z += .1 * (s12 - spMain.z),
			//限制z轴，不然会露边露馅，不过在电脑看，还是有问题，这是为什么？？？
			spMain.z = Math.max( -350, spMain.z);//王俊 2016-11-09
			spMain.updateT(),
			//这里？？？
			panoDots_show(panoDots.rotationY);
			//动画
			//console.log("好像没有调用！！！");
			var A = requestAnimationFrame(actiondh);
		}

		//打开lable 
		function  panoDots_show(t)
		{
			console.log('打开lable--panoDots_show');
			var i = (-180 - t) % 360;
			i = i > 0 ? i - 360 : i;
			for (var e = 0, a = panoDots.children.length; a > e; e++) {
				var o = panoDots.children[e];
				o.r0 > i - 5 && o.r0 < i + 25 ? 0 == o.label.width && (JT.kill(o.label), JT.to(o.label, .3, {
					width: o.w0,
					ease: JT.Quad.Out,
					onUpdate: function() {
						this.target.updateS()
					}
				})) : o.label.width == o.w0 && (JT.kill(o.label), JT.to(o.label, .3, {
					width: 0,
					ease: JT.Quad.Out,
					onUpdate: function() {
						this.target.updateS()
					}
				}))
			}
		}
		window.ontouchmove = function(e) {e.preventDefault(); };