

		//重力感应
		var o2 = new Orienter();
		//方向
		o2.handler = function (t) {
			d.lon = -t.lon,
			d.lat = t.lat
			if(p){
				f.lat = -d.lat,
				f.lon = -d.lon
			}
		};
		o2.init();
		
		
		//直接显示背景
		JT.to($("#bg"), 0, {
			opacity: 1
		});
		
		
		//执行主场景入场动画
		function gotoIndex(){
			JT.fromTo(spMain, 4, {
				//从远处
				z: -2200
			}, {
				//到近处
				z: -150,
				ease: JT.Quad.Out,
				onUpdate: function() {
					this.target.updateT().updateV()
				},onEnd:function(){
					p = false
					actiondh();
					//JT.to($("#bg"), 1, {
							//opacity: 1
						//});
					$(".govr").show();
				}
			});
			
			
			JT.fromTo(panoBg, 4, {
				//从
				rotationY: -720
			}, {
				//到
				rotationY: 25,
				ease: JT.Quad.Out,
				onUpdate: function() {
					this.target.updateT().updateV()
				},onEnd:function(){

				}
			});
			
			//创建背景
			for (var A = 0, B = panoBg.children.length; B > A; A++){
				JT.from(panoBg.children[A], 0.5, {
					x: 0,
					z: 0,
					scaleX: 0,
					scaleY: 0,
					delay: .05 * A,
					ease: JT.Quad.Out,
					onUpdate: function() {
						this.target.updateT()
					},
					onStart: function() {
						this.target.visibility({
							alpha: 1
						}).updateV()
					}

				});
			}
			//创建元素
			for (var g = 0, C = panoItems.children.length; C > g; g++){
				JT.from(panoItems.children[g], 2, {
					x: 0,
					z: 0,
					scaleX: .01,
					scaleY: .01,
					scaleZ: .01,
					delay: Math.random() + 2,
					ease: JT.Quad.Out,
					onUpdate: function() {
						this.target.updateT()
					},
					onStart: function() {
						this.target.visibility({
							alpha: 1
						}).updateV()
					}
				});
			}
			//元素
			JT.fromTo(panoItems, 4, {
				rotationY: -720
			}, {
				rotationY: 25,
				ease: JT.Quad.Out,
				onUpdate: function() {
					this.target.updateT().updateV()
				}
			})
			//标签按钮
			 JT.fromTo(panoDots, 2, {
				rotationY: -360,
				alpha: 0
			}, {
				rotationY: 25,
				alpha: 1,
				delay: 2,
				ease: JT.Quad.Out,
				onUpdate: function() {
					this.target.updateT().updateV()
				},
				onStart: function() {
					this.target.visibility({
						alpha: 1
					}).updateV()
				}
			})

		}
		//延迟0.5秒调整屏幕大小
		var resize =function() {
			setTimeout(function() {
				anta.size(window.innerWidth, window.innerHeight).update()
			}, 500)
		}
		$(window).on("resize",function(){resize()})
		
		//对话框？？？？ 
		//以前是弹出框，全部删除
	var audioEl = document.getElementById('bgm');
	function ready(){
		if(isWeiXin()){
			//forceSafariPlayAudio();
		}
	}
/*
	audioEl.addEventListener('play', function() {
		$('.music').removeClass("pause");
	}, false);

	function forceSafariPlayAudio() {
		audioEl.load();
		audioEl.play();
	}*/