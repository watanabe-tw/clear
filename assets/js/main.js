// スクロールイベント
function sl_txt(className) {
  if (document.getElementsByClassName(className).length > 0) {
    const targets = document.getElementsByClassName(className);
    const options = { rootMargin: "0px 0px -25% 0px" };
    const setAnimationClass = (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add(className + "--active");
        }
        // else {
        // 	entry.target.classList.remove(className + "--active");
        // }
      });
    };
    for (let i = 0; i < targets.length; i++) {
      const directionData = targets[i].getAttribute("data-dire");
      const directionArray = ["top", "bottom", "left", "right"];
      let directionClass = "";
      if (directionArray.includes(directionData)) {
        directionClass = " sl-txtInr--" + directionData;
      }
      const text = targets[i].innerHTML.replace(/<br>/g, "*");
      let array = text.split("");
      targets[i].innerHTML = "";
      let tag = "";
      for (let n = 0; n < array.length; n++) {
        if (array[n] !== "*") {
          tag +=
            '<span class="sl-txtInr' +
            directionClass +
            '">' +
            array[n] +
            "</span>";
        } else {
          tag += "<br />";
        }
      }
      targets[i].innerHTML = tag;
      const observer = new IntersectionObserver(setAnimationClass, options);
      observer.observe(targets[i]);
    }
  } else {
  }
}
sl_txt("sl-txt");

window.onload = function () {
  openingAnimation();
};

$(function () {
  // 最初の8件のみ表示
  $(".member_contents .member:gt(7)").hide();

  // 続きを読むボタンクリック時
  $(".toggle-btn").click(function () {
    // 続きを読むボタンのテキスト変更
    $(this).text(
      $(this).text() === "全てのメンバーを見る↓"
        ? "閉じる↑"
        : "全てのメンバーを見る↓"
    );

    // 8件以降のコンテンツの表示・非表示を切り替え
    $(".member_contents .member:gt(7)").slideToggle();
  });
});

// safari
$(document).ready(function () {
  // ブラウザのUAを取得
  var userAgent = navigator.userAgent;

  // safariかどうかを判定
  var isSafari =
    userAgent.indexOf("Safari") !== -1 && userAgent.indexOf("Chrome") === -1;

  // video要素を取得
  var else_safari = $(".mv .else-safari");
  var safari = $(".mv .safari");

  // safariの場合
  if (isSafari) {
    else_safari.css("display", "none");
  } else {
    safari.css("display", "none");
  }
});

// オープニングアニメーション
function openingAnimation() {
  $("#loading").addClass("is-init");
  $(".main_top_slide_ja").css("display", "none");
  setTimeout(function () {
    $(".main_top_slide_ja").fadeIn();
  }, 1500);
}

// よくあるご質問
$(".qa-list dd").hide();
$(".qa-list dl").on("click", function (e) {
  $("dd", this).slideToggle("fast");
  if ($(this).hasClass("open")) {
    $(this).removeClass("open");
  } else {
    $(this).addClass("open");
  }
});

// 採用情報タブ切り替え
jQuery(function ($) {
  $(".category_tab").click(function () {
    $(".is-active").removeClass("is-active");
    $(this).addClass("is-active");
    $(".is-show").removeClass("is-show");
    // クリックしたタブからインデックス番号を取得
    const index = $(this).index();
    // クリックしたタブと同じインデックス番号をもつコンテンツを表示
    $(".panel").eq(index).addClass("is-show");
  });
});



$(document).ready(function() {
	// タブをクリックしたときの処理
	$('.news_category_tab').click(function() {
			// すべてのタブのactiveクラスを削除
			$('.news_category_tab').removeClass('is-active');

			// クリックされたタブにactiveクラスを追加
			$(this).addClass('is-active');

			// すべてのnews-item要素を非表示にする
			$('.news-item').hide();

			// クリックされたタブのdata-target属性の値を取得し、
			// 該当するクラスを持つnews-item要素を表示する
			var target = $(this).data('target');
			if (target === 'all') {
					$('.news-item').show();
			} else {
					$('.' + target).show();
			}
	});
});

$(window).on("load", function () {
  // APIリクエスト処理の共通関数
  function fetchMicroCMS(url, apiKey, callback) {
    fetch(url, {
      headers: { "X-API-KEY": apiKey },
    })
      .then((response) => response.ok ? response.json() : Promise.reject("something wrong"))
      .then((json) => callback(json.contents))
      .catch((e) => console.log(e));
  }

  // ホストURLの取得関数
  function getHost() {
    const hosts = {
      "localhost": "/clear",
      "192.168.11.25": "/clear",
      "watakuma21.xsrv.jp": "https://watakuma21.xsrv.jp/clear",
      "clear-inc.site": "https://clear-inc.site"
    };
    return hosts[window.location.hostname] || "";
  }

  // お知らせ一覧
  fetchMicroCMS("https://clear.microcms.io/api/v1/news?limit=100", "3a61ebc3-caa3-41d8-8628-65a5960a9316", (contents) => {
    contents.forEach((item) => {
      const linkHtml = item.link ? `<a target="_blank" href="${item.link}">${item.title}</a>` : item.title;
      const arrowHtml = item.link ? `<a target="_blank" href="${item.link}"><span class="ka">(</span> <span class="yaji">→</span> <span class="ka">)</span></a>` : '';
      const className = { "お知らせ": "oshirase", "求人": "kyujin", "IR": "ir" }[item.category[0]] || '';
      $(".news_content").append(`
        <dl class="${className} news-item">
          <dt>${item.date}</dt>
          <div class="content">
            <dd>${linkHtml}</dd>
            <dd>${arrowHtml}</dd>
          </div>
        </dl>
      `);
    });
  });

  // 採用情報
  fetchMicroCMS("https://flat.microcms.io/api/v1/news-recruit?limit=100", "c1908ad5-e67c-45a8-8bed-0135746f5424", (contents) => {
    contents.filter(item => item.company[0] === "clear").forEach((item) => {
      const img = `${item.img.url}?fit=max&w=1000&h=1000`;
      $(".recruit-other-link-content ul").append(`
        <li>
          <a href="${item.link}" target="_blank" rel="noopener noreferrer">
            <div class="recruit-media-link__image"><img src="${img}" decoding="async"></div>
          </a>
        </li>
      `);
    });
  });

  // インタビュー一覧
  fetchMicroCMS("https://flat.microcms.io/api/v1/interview?limit=100", "c1908ad5-e67c-45a8-8bed-0135746f5424", (contents) => {
    const host = getHost();
    contents.forEach((item, index) => {
      const img = `${item.img.url}?fit=max&w=1000&h=1000`;
      $(".annual_income_list ul").prepend(`
        <li>
          <a href="${host}/annual-income/${index + 1}">
            <div class="text">
              <div class="annual_income_img">
                <img src="${img}" alt=''>
                <div class="annual_income_text">${item.annual_income}</div>
              </div>
              <p class="name">${item.name}</p>
              ${item.title}
            </div>
          </a>
        </li>
      `);
    });
  });

  // ブログ一覧
  fetchMicroCMS("https://clear.microcms.io/api/v1/blog?limit=100", "3a61ebc3-caa3-41d8-8628-65a5960a9316", (contents) => {
    const host = getHost();
    contents.forEach((item, index) => {
      const img = `${item.top_img.url}?fit=max&w=1000&h=1000`;
      $(".blogs ul").prepend(`
        <li>
          <a href="${host}/blog/${index + 1}">
            <img src="${img}" alt=''>
            <div class="text">
              <p class="title">${item.title}</p>
              <p class="date">${item.date}</p>
            </div>
          </a>
        </li>
      `);
    });
    if (window.location.pathname == "/") {
      $(".blogs ul li").slice($(window).width() <= 820 ? 4 : 3).hide();
    }
  });

  // メンバー一覧
  fetchMicroCMS("https://clear.microcms.io/api/v1/member?limit=100", "3a61ebc3-caa3-41d8-8628-65a5960a9316", (contents) => {
    contents.forEach((item) => {
      const img1 = `${item.img.url}?fit=max&w=1000&h=1000`;
      const img2 = `${item.img2.url}?fit=max&w=1000&h=1000`;
      $(".member_contents").append(`
        <li class='member'>
          <div class="img-box">
            <img src="${img1}" alt=''>
            <img src="${img2}" alt=''>
          </div>
          <p>
            <span class='member-name'>${item.name}</span>
            <span class='member-job'>詳細を見る➡</span>
          </p>
          <div class="hidden_pop">
            ${item.tag}
            <p class="hidden_history">${item.history}</p>
            <p class="hidden_discription-1">${item.discription1}</p>
            <p class="hidden_discription-2">${item.discription2}</p>
            <p class="hidden_discription-3">${item.discription3}</p>
          </div>
        </li>
      `);
    });
    popUp();
    $(".member_contents .member").slice(8).hide();
  });

	// 体制参画案件一覧
	fetchMicroCMS("https://rich.microcms.io/api/v1/projects?limit=100", "973755fdf4b84988984f7af0eb187120cd59", (contents) => {
		const host = getHost();
		contents.forEach((item, index) => {
			const img = `${item.img.url}?fit=max&w=1000&h=1000`;
			$(".projects ul").prepend(`
				<li>
					<a href="${host}/project/${index + 1}">
						<div class="text">
							<h4>${item.title}</h4>
							<div class="description">
								<div class="description_flex">
									<p>業務内容</p>
									<p>${item.business_content}</p>
								</div>
								<div class="description_flex">
									<p>開発環境</p>
									<p>${item.development_env}</p>
								</div>
								<div class="description_flex">
									<p>工程</p>
									<p>${item.process}</p>
								</div>
								<div class="description_flex">
									<p>稼働場所</p>
									<p>${item.location}</p>
								</div>
							</div>
						</div>
					</a>
				</li>
			`);
		});
	});
});

function popUp() {
  // ポップアップ画像
  function openImg(
    name,
    tag,
    img,
    history,
    description1,
    description2,
    description3
  ) {
    // コンテンツ
    $("#popup_profile .popImgOpen img").attr("src", img);
    $("#popup_profile .popup-name").text(name);
    $("#popup_profile .profile-tag ul").html(tag);
    $("#popup_profile .profile-history p span").text(history);
    $("#popup_profile .discription-1 p").text(description1);
    $("#popup_profile .discription-2 p").text(description2);
    $("#popup_profile .discription-3 p").text(description3);
    // その他
    $("html").css("overflow", "hidden");
    $("#popup_profile").fadeIn();
  }

  // MEMBERクリック
  $(".member_contents .member").click(function () {
    // データ取得
    var content = $(this);
    var name = content.find("p .member-name").text();
    var tag = content.find(".hidden_pop ul").html();
    var img = content.find("img").attr("src");
    var history = content.find(".hidden_history").text();
    var description1 = content.find(".hidden_discription-1").html();
    var description2 = content.find(".hidden_discription-2").html();
    var description3 = content.find(".hidden_discription-3").html();

    // ポップアップ表示
    openImg(name, tag, img, history, description1, description2, description3);
  });

  // ポップアップクローズ
  $("#popup_profile #popup-close").click(function () {
    // コンテンツを空にする
    $("#popup_profile .popImgOpen img").attr("src", "");
    $("#popup_profile .popup-name").empty();
    $("#popup_profile .discription p").empty();

    // ポップアップを閉じる
    $("html").css("overflow", "auto");
    $("#popup_profile").fadeOut();
  });
}

// $(function () {
//   // タイトルをクリックすると
//   $(".js-accordion-title").on("click", function () {
//     // クリックした次の要素を開閉
//     $(this).next().slideToggle(300);
//     // タイトルにopenクラスを付け外しして矢印の向きを変更
//     $(this).toggleClass("open", 300);
//   });
// });
$(function () {
  // タイトルをクリックすると
  $(".js-accordion-title").on("click", function () {
    // クリックした要素が閉じてたら開く
    if (!$(this).next().hasClass("open")) {
      // クリックした次の要素を開く
      $(this).next().slideToggle(300);
      // クリックしたタイトルにopenクラスを付ける
      $(this).toggleClass("open", 300);
      // 他のコンテンツを閉じる
      $(".accordion-content").not($(this).next()).slideUp(300);
      // 他のタイトルからopenクラスを削除する
      $(".js-accordion-title").not($(this)).removeClass("open", 300);
    } else {
      // クリックしたタイトルにopenクラスを削除する
      $(this).removeClass("open", 300);
      // クリックした次の要素を閉じる
      $(this).next().slideUp(300);
    }
  });
});

$(".accordion-content a").click(function () {
  const hash = location.hash;
  if (hash) {
    $("#nav-toggle, #nav-overlay, #nav-fullscreen").removeClass("open");
  }
});

// navメニュー
function resizeNav() {
  $("#nav-fullscreen").css({ height: window.innerHeight });
  var radius = Math.sqrt(
    Math.pow(window.innerHeight, 2) + Math.pow(window.innerWidth, 2)
  );
  var diameter = radius * 2;
  $("#nav-overlay").width(diameter);
  $("#nav-overlay").height(diameter);
  $("#nav-overlay").css({ marginTop: -radius, marginLeft: -radius });
}
$(document).ready(function () {
  $("#nav-toggle").click(function () {
    $("#nav-toggle, #nav-overlay, #nav-fullscreen").toggleClass("open");
  });
  $(window).resize(resizeNav);
  resizeNav();
});
$(".nnn").click(function (e) {
  if ($(this).children("ul").css("display") == "none") {
    $(".nnn a span").text("-");
  } else {
    $(".nnn a span").text("+");
  }
  // メニュー表示/非表示
  $(this).children("ul").slideToggle("fast");
  e.stopPropagation();
});

$(function () {
  $('#page-link a[href*="#"]').click(function () {
    var speed = 500;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? "html" : href);
    var position = target.offset().top;
    $("html, body").animate({ scrollTop: position }, speed, "swing");
    return false;
  });
});

$(function () {
  $(".js-title").on("click", function () {
    $(this).next().slideToggle(200);
    $(this).toggleClass("open", 200);
  });
});
