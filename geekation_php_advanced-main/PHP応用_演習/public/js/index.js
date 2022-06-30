$(function () {
    $('.ac-parent').on('click', function () {
    $(this).next().slideToggle();
  });

  $(window).scroll(function() {
    $(".scroll-block").each(function() {
      var scroll = $(window).scrollTop();
      var blockPosition = $(this).offset().top;
      var windowHeihgt = $(window).height();
      if (scroll > blockPosition - windowHeihgt + 300) {
        $(this).addClass("blockIn");
      }
    });
  });

  var mySwiper = new Swiper ('.swiper-container', {
	// オプションパラメータ(一部のみ抜粋)
	loop: true, // 最後のスライドまで到達した場合、最初に戻らずに続けてスライド可能にするか。
	speed: 600, // スライドが切り替わるトランジション時間(ミリ秒)。
	slidesPerView: 2,
	breakpoints: {
		767: {
		slidesPerView: 1,
		spaceBetween: 0
		}
	},
	direction: 'horizontal', // スライド方向。 'horizontal'(水平) か 'vertical'(垂直)。effectオプションが 'slide' 以外は無効。
	effect: 'slide', // "slide", "fade"(フェード), "cube"(キューブ回転), "coverflow"(カバーフロー) または "flip"(平面回転)

	// スライダーの自動再生
	// autoplay: true 　のみなら既定値での自動再生
	autoplay: {
	delay: 3000, // スライドが切り替わるまでの表示時間(ミリ秒)
	stopOnLast: false, // 最後のスライドまで表示されたら自動再生を中止するか
	disableOnInteraction: true, // ユーザーのスワイプ操作を検出したら自動再生を中止するか
	adaptiveHeight:true
	},

	// ページネーションを表示する場合
	pagination: {
	el: '.swiper-pagination', // ページネーションを表示するセレクタ
	},

	// 前後スライドへのナビゲーションを表示する場合
	navigation: {
	nextEl: '.swiper-button-next', // 次のスライドボタンのセレクタ
	prevEl: '.swiper-button-prev', // 前のスライドボタンのセレクタ
	},

	// スクロールバーを表示する場合
	scrollbar: {
	el: '.swiper-scrollbar', // スクロールバーを表示するセレクタ
	}
});

});


$(function() {

    // スクロールトップリンク
    function PageTopAnime() {
        let scroll = $(window).scrollTop();
        if (scroll >= 200) {
            $('.page_top').removeClass('DownMove');
            $('.page_top').addClass('UpMove');
        } else {
            if ($('.page_top').hasClass('UpMove')) {
                $('.page_top').removeClass('UpMove');
                $('.page_top').addClass('DownMove');
            }
        }
    }

    $(window).scroll(function() {
        PageTopAnime();
    });

    $(window).on('load', function() {
        PageTopAnime();
    });

    $('.page_top').click(function() {
        $('body, html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });


    // headerスクロール
    $(window).scroll(function() {
        const pos = $('#header').offset();
        if ($(window).scrollTop() >= pos.top) {
            $('.header').addClass('headerTop');
        } else {
            $('.header').removeClass('headerTop');
        }
    });

    // スムーズスクロール
    $('a[href^="#"]').click(function() {
        let href = $(this).attr("href");
        let target = $(href == "#" || href == "" ? 'html' : href);
        let position = target.offset().top;
        $("html, body").animate({ scrollTop: position }, 600, "swing");
        return false;
    });


    // モーダル
    $('.btn a').click(function() {
        $('.modal').fadeIn();
    });
    $('.modal_over').click(function() {
        $('.modal').fadeOut();
    });

});

// バリデーション
$(function(){
  $("#button").on("click", function(){
    var message = [];
    if($("#fullname").val() == "" || $("#fullname").val().length > 10){
      message.push("氏名は必須入力です。10文字以内でご入力ください。");
    }
    if($("#furigana").val() == "" || $("#furigana").val().length > 10 ){
      message.push("フリガナは必須入力です。10文字以内でご入力ください。");
    }
    if($("#tel").val() == ""){
    } else if (!$("#tel").val().match(/^[0-9]+$/)){
      message.push("電話番号は0-9の数字のみでご入力ください。");
    }
    if($("#mail").val() == "" || !$("#mail").val().match(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/)) {
      message.push("メールアドレスは正しくご入力ください。");
    }
    if($("#body").val() == ""){
      message.push("お問い合わせは必須入力です。")
    }
    if(message.length){
      var error = message.join('\n');
      alert(error);
    }
  });
});
