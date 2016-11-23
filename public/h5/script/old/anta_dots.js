
		var dots1 = "images/btn/btn_aminate_icon.png";
		//点击
		/*
首页://sunlight.jim-studio.net/index#index
品牌历史://sunlight.jim-studio.net/index#about 
阳光秘籍://sunlight.jim-studio.net/index#article
		 */ 
		var dot_animateType = "2";//这个集中起来，    
		var c_dots = [{
					name: "1",
					animateType:dot_animateType,
					x: 300,
					y: 250,//costa 404
					dot: dots1,
					w: 230,
					h: 72,
					label: "images/btn/btn_1.png"
				}, {
					name: "2",
					animateType: dot_animateType,
					x: 1800,
					y: 470, 
					dot: dots1,
					w: 250,
					h: 72,
					label: "images/btn/btn_2.png"
				}, {
					name: "3",
					animateType: dot_animateType,
					x: 1400,
					y: 820,
					dot: dots1,
					w: 230,
					h: 72,
					label: "images/btn/btn_3.png"
				}, {
					name: "4",
					animateType: dot_animateType,
					x: 300,
					y: 740,//costa 404 
					dot: dots1,
					w: 230,
					h: 72,
					label: "images/btn/btn_4.png"
				},{
					name: "5",
					animateType: dot_animateType,
					x: 2250,
					y: 670,
					dot: dots1,
					w: 230,
					h: 72,
					label: "images/btn/btn_5.png"
				}, {
					name: "6",
					animateType: dot_animateType,
					x: 2550,
					y: 1080,
					dot: dots1,
					w: 230,
					h: 72,
					label: "images/btn/btn_6.png"
				}
				];
				var	panoDots = new C3D.Sprite;
				panoDots.name("panoDots").visibility({
					alpha: 0
				}).position(0, 0, -190).update();//0，190 王俊 2016-11-09
				
				var s33 = [12, 13, 0, 2, 3, 1, 4, 5, 6, 7, 8, 9, 10, 11];
				$.each(c_dots, function(A, B) {
					var g = B,
						Q = -360 * (g.x - 80) / o.w,
						G = 90 * (g.y - o.h / 2) / o.h,
						M = Q / 180 * Math.PI,
						Y = h - 80;
						var i = C3D.create({
							type: "sprite",
							name: g.name,
							//bothsides: false,//我加的，没什么用
							scale: [0.9],//.6 王俊 2016-11-09
							children: [{
								type: "plane",
								name: "dot",
								size: [128, 127],
								position: [0, 2, 2],
								rotation: [G, 0, 0],
								material: [{
									image: g.dot
								}],
								//material: [g.dot],
								//第2个，是这里设置没有作用，
								bothsides: false
							}, {
								type: "plane",
								name: "label",
								size: [0, g.h],
								rotation: [G, 0, 0],
								origin: [-18, 33],
								material: [{
									image: g.label
								}],
								bothsides: false
							}
							]
						}); 
					i.position(Math.sin(M) * Y, .9 * (g.y - o.h / 2), Math.cos(M) * Y).rotation(0, Q + 180 - 5, 0).updateT(),
					i.on("touchend", function() {
						
						//点击小点点按钮
				
switch (g.name) 
{
	case "1":
_czc.push(["_trackEvent","sunlight-H5","720-品牌历史"]);
		
	break;
	case "2":
_czc.push(["_trackEvent","sunlight-H5","720-天然精粹洗洁精"]);
		
	break;
	case "3":
_czc.push(["_trackEvent","sunlight-H5","720-柠檬味洗洁精"]);
		
	break;
	case "4":
_czc.push(["_trackEvent","sunlight-H5","720-青柠味洗洁精"]);
		
	break;
	case "5":
_czc.push(["_trackEvent","sunlight-H5","720-香橙味洗洁精"]);
		
	break;
	case "6":
_czc.push(["_trackEvent","sunlight-H5","720-阳光秘籍"])
		
	break;
	default:
}

						//costa 点击dots
						window.location.href= window.linkArr[g.name];

					}),
					i.r0 = Q,
					i.w0 = g.w,
					JT.to(i.dot, .4, {
						scaleX: 1.1,
						scaleY: 1.1,
						yoyo: !0,
						repeat: -1,
						ease: JT.Quad.InOut,
						onUpdate: function() {
							this.target.updateT()
						}
					}), panoDots.addChild(i)
				});

		spMain.addChild(panoDots);