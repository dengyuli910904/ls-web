$(function () {
	var p = {
		index: function () {
			// menu
			$('.menu-list ul').fadeOut();
			
			$('.menu-list li').off('mouseenter').on('mouseenter', function () {
				$(this).find('ul').fadeIn();
			});
			$('.menu-list li').off('mouseleave').on('mouseleave', function () {
				$(this).find('ul').fadeOut();
			});
			// 头部微信图标
			$('.icon-wx').off('mouseenter').on('mouseenter', function () {
				$('.erweima').fadeIn();
			});
			$('.icon-wx').off('mouseleave').on('mouseleave', function () {
				$('.erweima').fadeOut();
			});
			// banner
			$('.banner').slide({
				titCell: '.hd ul',
				mainCell: '.bd ul',
				effect: 'fold',
				autoPlay: true,
				autoPage: true,
				trigger: 'click'
			});
			
			var stimer = null;
			// 运动图标
			$('.sports-icons li').off('mouseenter').on('mouseenter', function () {
				$('.sports-icons li').removeClass('clicked');
				$(this).addClass('clicked');
				if (stimer) {
					clearInterval(stimer);
					stimer = null;
				}
			});
			$('.sports-icons li').off('mouseleave').on('mouseleave', function () {
				if (stimer) {
					clearInterval(stimer);
					stimer = null;
				}
				stimer = setInterval(function () {
					$('.sports-icons li').first().addClass('clicked');
				}, 500);
				$('.sports-icons li').removeClass('clicked');
			});
			
			// 精彩赛事
			$('.play-list').slide({
				mainCell: '.bd ul',
				autoPlay: true,
				effect: 'leftMarquee',
				interTime: 50,
				vis: 6,
				trigger: 'click'
			});
			// 新闻最多8个 超过显示更多
			$('.listInfo li').each(function (index) {
				if (index > 9) {
					$(this).hide();
					$('.moreNews').removeClass('hide');
				}
			});
			// 视频，进度条
			$('video').each(function () {
				var video = $(this)[0];
				video.addEventListener('ended', function () {
					video.controls = false;
					$(this).parent().addClass('imgHref');
				});
			});
			$('.videos a').off('click').on('click', function () {
				$(this).removeClass('imgHref');
				var video = $(this).find('video')[0];
				video.play();
				video.controls = true;
			});
			
		}
	};
	p.index();
});