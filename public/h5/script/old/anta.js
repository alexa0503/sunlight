

	//Curve3D 
	//创建场景
	var anta = new C3D.Stage({
					el: $("#three")[0]
				});
	anta.size(window.innerWidth, window.innerHeight).update();
	//容器
	var spMain = new C3D.Sprite();
	//spMain.position(0, 0, -600).update();
	spMain.position(0, 0, -600).update();
	anta.addChild(spMain);

	/*

	JT.fromTo($(".loading-anm"), 1.5, {rotationY: 0}, {
			rotationY: 360, yoyo: false,
						repeat: -1
		});*/

		//-----------------------------------------------------------------------------------------------------------------------------------------------timeline
//转img，转as

		//3个场景完全没有用
		//spMain.addChild(scene1);
		//spMain.addChild(scene3);
		//spMain.addChild(scene4);

		var p = true;
		var h = 406;
		var bg_num = 20;
		var o = {
			w: 2580,
			h: 1170//1170
		}
		var M = o.w / bg_num;


	var browser = {
		versions: function () {
			var u = navigator.userAgent, app = navigator.appVersion;
			return {         //移动终端浏览器版本信息
				trident: u.indexOf('Trident') > -1, //IE内核
				presto: u.indexOf('Presto') > -1, //opera内核
				webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
				gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
				mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
				ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
				android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或uc浏览器
				iPhone: u.indexOf('iPhone') > -1, //是否为iPhone或者QQHD浏览器
				iPad: u.indexOf('iPad') > -1, //是否iPad
				webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部
			};
		}(),
		language: (navigator.browserLanguage || navigator.language).toLowerCase()
	}
	//gotoIndex();

	//以前是视频按钮，音乐按钮
//}