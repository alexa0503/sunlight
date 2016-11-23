
		var tl2 = JTL.create();
		tl2.add('l1', 0.5);
 
		//创建背景场景

		var Y = [{
			url: "1.png"
		}, {
			url: "2.png"
		}, {
			url: "3.png"
		}, {
			url: "4.png"
		}, {
			url: "5.png"
		}, {
			url: "6.png"
		}, {
			url: "7.png"
		}, {
			url: "8.png"
		}, {
			url: "9.png"
		}, {
			url: "10.png"
		}, {
			url: "11.png"
		}, {
			url: "12.png"
		}, {
			url: "13.png"
		}, {
			url: "14.png"
		}, {
			url: "15.png"
		}, {
			url: "16.png"
		}, {
			url: "17.png"
		}, {
			url: "18.png"
		}, {
			url: "19.png"
		}, {
			url: "20.png"
		}];

		var panoBg = new C3D.Sprite();
		var d = {
			lat: 0,
			lon: 0
		},
		f = {
			lon: 0,
			lat: 0
		};
		var c = {
			lon: 25,
			lat: 0
		};
		function createPanoBg(){
			//panoBg.name("panoBg").position(0, 0, -700).update();// costa -700
			panoBg.name("panoBg").position(0, 0, -250).update();// costa -700
			spMain.addChild(panoBg);

			for (var R = 0; R < bg_num; R++) {
				var F = new C3D.Plane,
					H = -360 / bg_num * R,
					J = H / 180 * Math.PI,
					U = h;
				F.size(M, o.h).position(Math.sin(J) * U, 0, Math.cos(J) * U).rotation(0, H + 180, 0).visibility({
					alpha: 0
				}).material({
					image:  "images/bg/"+Y[R].url,
					bothsides: !1
				}).update();
				panoBg.addChild(F);
			}

		}
		createPanoBg()