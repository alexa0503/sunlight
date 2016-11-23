
		//漂浮的物件
		var panoItemsImg = [{
				x: 967,
				y: 513,
				w: 387,
				h: 546,
				url: "images/pano/p0.png",
				imgs: ["images/pano/p1-1.png","images/pano/p1-2.png","images/pano/p1-3.png"],
				l: 40//这个地方的l是什么意思
			}, {
				x: 967,
				y: 513,
				w: 1290,
				h: 546,
				url: "images/pano/p1.png",
				imgs: ["images/pano/p1-4.png","images/pano/p1-4.png","images/pano/p1-4.png","images/pano/p1-4.png","images/pano/p1-5.png","images/pano/p1-6.png","images/pano/p1-7.png","images/pano/p1-8.png","images/pano/p1-9.png","images/pano/p1-10.png"],
				l: 15
			}, {
				x: 257,
				y: 678,
				w: 774,
				h: 335,
				url: "images/pano/p2.png",
				imgs: ["images/pano/p2-1.png","images/pano/p2-2.png","images/pano/p2-3.png","images/pano/p2-4.png","images/pano/p2-5.png","images/pano/p2-6.png"],
				l: 50
			}, {
				x: 543,
				y: 95,
				w: 258,
				h: 214,
				url: "images/pano/p3.png",
				imgs: ["images/pano/p3-1.png","images/pano/p3-2.png"],
				l: 25
			}, {
				x: 2254,
				y: 167,
				w: 516,
				h: 478,
				url: "images/pano/p4.png",
				imgs: ["images/pano/p4-1.png","images/pano/p4-2.png","images/pano/p4-3.png","images/pano/p4-4.png"],
				l: 10
			}, {
				x: 304,
				y: 99,
				w: 516,
				h: 712,
				url: "images/pano/p5.png",
				imgs: ["images/pano/p5-1.png","images/pano/p5-2.png","images/pano/p5-3.png","images/pano/p5-4.png"],
				l: 30
			}, {
				x: 2166,
				y: 250,
				w: 387,
				h: 702,
				url: "images/pano/p7.png",
				imgs: ["images/pano/p7-1.png","images/pano/p7-2.png","images/pano/p7-3.png"],
				l: 15
			}, {
				x: 907,
				y: 68,
				w: 645,
				h: 954,
				url: "images/pano/p8.png",
				imgs: ["images/pano/p8-1.png","images/pano/p8-2.png","images/pano/p8-3.png","images/pano/p8-4.png","images/pano/p8-5.png"],
				l: 20
			}, {
				x: 1695,
				y: 5,
				w: 645,
				h: 555,
				url: "images/pano/p9.png",
				imgs: ["images/pano/p9-1.png","images/pano/p9-2.png","images/pano/p9-3.png","images/pano/p9-4.png","images/pano/p9-5.png"],
				l: 10
			}, {
				x: 1960,
				y: 715,
				w: 774,
				h: 436,
				url: "images/pano/p10.png",
				imgs: ["images/pano/p10-1.png","images/pano/p10-2.png","images/pano/p10-3.png","images/pano/p10-4.png","images/pano/p10-5.png","images/pano/p10-6.png"],
				l: 60
			}, {
				x: 93,
				y: 306,
				w: 516,
				h: 666,
				url: "images/pano/p6.png",
				imgs: ["images/pano/p6-1.png","images/pano/p6-2.png","images/pano/p6-3.png","images/pano/p6-4.png"],
				l: 30
			}, {
				x: 1973,
				y: 216,
				w: 258,
				h: 317,
				url: "images/pano/p11.png",
				imgs: ["images/pano/p11-1.png","images/pano/p11-2.png"],
				l: 25
			}],
		panoItems = new C3D.Sprite;
		//panoItems.name("panoItems").position(0, 0, -350).update(),// costa -350
		//panoItems.name("panoItems").position(0, 0, -240).update(),// costa -350
		panoItems.name("panoItems").position(0, 0, -210).update(),// costa -350
		$.each(panoItemsImg, function(A, B) {
			var g = B,
				E = Math.floor(g.x / M),
				Q = Math.floor((g.x + g.w) / M),
				I = (g.x % M, new C3D.Sprite);
			I.visibility({
				alpha: 0
			}).updateV();
			for (var w = E; Q >= w; w++) {
				//console.log("g.imgs[w - E]",g.imgs[w - E])
				var D = new C3D.Plane,
					Y = -360 / bg_num * w,
					i = Y / 180 * Math.PI,w
					R = h;
				D.size(M, g.h).position((Math.sin(i) * R).toFixed(5), g.y + g.h / 2 - o.h / 2, (Math.cos(i) * R).toFixed(5)).rotation(0, Y + 180, 0).material({
					image: g.imgs[w - E],
					bothsides: false
				}).update(), I.addChild(D)
			}
			var F = -360 / bg_num * (Q + E) / 2 + 180,
				H = F / 180 * Math.PI,
				J = g.l;
			I.position(Math.sin(H) * J, 0, Math.cos(H) * J).updateT(),
			panoItems.addChild(I)
		});
		spMain.addChild(panoItems);