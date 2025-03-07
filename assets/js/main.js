// スクロールアニメーション関数の最適化
function sl_txt(className) {
  const targets = document.getElementsByClassName(className);
  if (!targets.length) return;

  const options = { rootMargin: "0px 0px -25% 0px" };
  const setAnimationClass = (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add(className + "--active");
      }
    });
  };

  const directionArray = ["top", "bottom", "left", "right"];

  for (let i = 0; i < targets.length; i++) {
    const target = targets[i];
    const directionData = target.getAttribute("data-dire");
    const directionClass = directionArray.includes(directionData)
      ? ` sl-txtInr--${directionData}`
      : "";

    const text = target.innerHTML.replace(/<br>/g, "*");
    const array = text.split("");

    let tag = "";
    for (let n = 0; n < array.length; n++) {
      if (array[n] !== "*") {
        tag += `<span class="sl-txtInr${directionClass}">${array[n]}</span>`;
      } else {
        tag += "<br />";
      }
    }

    target.innerHTML = tag;
    const observer = new IntersectionObserver(setAnimationClass, options);
    observer.observe(target);
  }
}

// 即時関数で一括管理
$(function () {
  // モバイルメニューエンハンス - オーバーレイ追加
  $("body").append('<div class="mobile-menu-overlay"></div>');

  // メニュー項目にインデックス属性を追加（スタガードアニメーション用）
  $(".nav-item").each(function (index) {
    $(this).css("--item-index", index);
  });

  // ドロップダウンアイテムにインデックス属性を追加
  $(".dropdown-item").each(function (index) {
    $(this).css("--item-index", index);
  });

  // 初期化処理
  sl_txt("sl-txt");

  // 開始アニメーション
  $(window).on("load", function () {
    openingAnimation();
  });

  // メンバー表示の切り替え
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

  // Safari検出
  const isSafari =
    navigator.userAgent.indexOf("Safari") !== -1 &&
    navigator.userAgent.indexOf("Chrome") === -1;

  if (isSafari) {
    $(".mv .else-safari").hide();
  } else {
    $(".mv .safari").hide();
  }

  // ハンバーガーメニュー切り替え - オーバーレイクリックでも閉じるように
  $(".menu-toggle, .mobile-menu-overlay").click(function () {
    $("body").toggleClass("menu-open");

    // トップダウンメニュー用アニメーション調整
    if ($("body").hasClass("menu-open")) {
      // メニューを開く時のアニメーション
      $(".nav-item").each(function (index) {
        const $item = $(this);
        setTimeout(function () {
          $item.css({
            opacity: "1",
            transform: "translateY(0)",
          });
        }, 50 * index);
      });
    } else {
      // メニューを閉じる時のアニメーション
      $(".nav-item").css({
        opacity: "0",
        transform: "translateY(-20px)",
      });
    }
  });

  // スマホサイズでのドロップダウンメニュー操作
  $(".nav-link.dropdown-toggle").click(function (e) {
    // モバイルビューの場合のみ動作
    if (window.innerWidth <= 1350) {
      e.preventDefault();
      e.stopPropagation(); // イベントの伝播を止める

      // クリックアニメーション
      $(this).addClass("menu-item-clicked");
      setTimeout(() => {
        $(this).removeClass("menu-item-clicked");
      }, 300);

      $(this).toggleClass("active");

      // 親のli要素にactiveクラスをトグル
      $(this).parent(".nav-item").toggleClass("active");

      // 他のドロップダウンを閉じる
      if ($(this).parent(".nav-item").hasClass("active")) {
        $(".nav-item").not($(this).parent()).removeClass("active");
        $(".nav-link.dropdown-toggle").not($(this)).removeClass("active");

        // ドロップダウン項目のアニメーション
        const $dropdownItems = $(this).parent().find(".dropdown-item");
        $dropdownItems.each(function (index) {
          const $item = $(this);
          setTimeout(function () {
            $item.css({
              opacity: "1",
              transform: "translateY(0)",
            });
          }, 50 * index);
        });
      }
    }
  });

  // モバイルメニュー内のリンククリック時にメニューを閉じる
  $(".nav-menu .nav-link.simple, .dropdown-link").click(function () {
    if (window.innerWidth <= 1350) {
      setTimeout(function () {
        $("body").removeClass("menu-open");
        // メニュー項目のアニメーションをリセット
        $(".nav-item").css({
          opacity: "0",
          transform: "translateY(-20px)",
        });
      }, 300); // リンクのクリックエフェクトが見えるよう少し遅延
    }
  });

  // スクロール時のヘッダー調整
  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $(".header").css({
        "box-shadow": "0 5px 15px rgba(0, 0, 0, 0.1)",
        padding: "5px 0",
      });
    } else {
      $(".header").css({
        "box-shadow": "0 2px 10px rgba(0, 0, 0, 0.1)",
        padding: "0",
      });
    }
  });

  // タッチスワイプ（上方向スワイプでメニューを閉じる）
  let touchStartY = 0;
  let touchEndY = 0;

  $(".nav-menu").on("touchstart", function (e) {
    touchStartY = e.originalEvent.touches[0].clientY;
  });

  $(".nav-menu").on("touchend", function (e) {
    touchEndY = e.originalEvent.changedTouches[0].clientY;
    if (window.innerWidth <= 1350 && touchStartY - touchEndY > 70) {
      // 上スワイプでメニューを閉じる
      $("body").removeClass("menu-open");
      // メニュー項目のアニメーションをリセット
      $(".nav-item").css({
        opacity: "0",
        transform: "translateY(-20px)",
      });
    }
  });

  // PCサイズに戻った時にモバイルメニューの状態をリセット
  $(window).resize(function () {
    if (window.innerWidth > 1350) {
      $("body").removeClass("menu-open");
      $(".nav-item").removeClass("active");
      $(".nav-link.dropdown-toggle").removeClass("active");
      // モバイルビュー用のスタイルをリセット
      $(".nav-item, .dropdown-item").css({
        opacity: "",
        transform: "",
      });
    }
  });

  // よくあるご質問アコーディオン
  $(".qa-list dd").hide();
  $(".qa-list dl").on("click", function () {
    $("dd", this).slideToggle("fast");
    $(this).toggleClass("open");
  });

  // 採用情報タブ切り替え
  $(".category_tab").on("click", function () {
    $(".is-active").removeClass("is-active");
    $(this).addClass("is-active");
    $(".is-show").removeClass("is-show");
    $(".panel").eq($(this).index()).addClass("is-show");
  });

  // ニュースカテゴリタブ
  $(".news_category_tab").on("click", function () {
    $(".news_category_tab").removeClass("is-active");
    $(this).addClass("is-active");

    const target = $(this).data("target");
    $(".news-item").hide();

    if (target === "all") {
      $(".news-item").show();
    } else {
      $("." + target).show();
    }
  });

  // 体制参画案件カテゴリタブ
  $(".project_category_tab").on("click", function () {
    $(".project_category_tab").removeClass("is-active");
    $(this).addClass("is-active");

    const target = $(this).data("target");
    $(".projects ul li").hide();

    if (target === "all") {
      $(".projects ul li").show();
    } else {
      $("." + target).show();
    }

    $(".projects ul li").addClass("fade-in-item");
    setTimeout(function () {
      $(".projects ul li").removeClass("fade-in-item");
    }, 600);
  });

  // プロジェクトホバーエフェクト
  $(".projects ul li").hover(
    function () {
      $(this).find(".projects_link a").addClass("pulse");
    },
    function () {
      $(this).find(".projects_link a").removeClass("pulse");
    }
  );

  // スムーススクロール
  $('#page-link a[href*="#"]').on("click", function () {
    const speed = 500;
    const href = $(this).attr("href");
    const target = $(href === "#" || href === "" ? "html" : href);
    const position = target.offset().top - 100; // ヘッダー分の調整
    $("html, body").animate({ scrollTop: position }, speed, "swing");
    return false;
  });
});

// オープニングアニメーション関数
function openingAnimation() {
  $("#loading").addClass("is-init");
  const $mainSlide = $(".main_top_slide_ja");
  $mainSlide.hide();
  setTimeout(function () {
    $mainSlide.fadeIn();
  }, 1500);
}

// データ取得・表示の共通処理
$(window).on("load", function () {
  // APIリクエスト処理の共通関数
  function fetchMicroCMS(url, apiKey, callback) {
    fetch(url, {
      headers: { "X-API-KEY": apiKey },
    })
      .then((response) =>
        response.ok ? response.json() : Promise.reject("API request failed")
      )
      .then((json) => callback(json.contents))
      .catch((error) => console.error("API Error:", error));
  }

  // ホストURLの取得関数
  function getHost() {
    const hosts = {
      localhost: "/clear",
      "192.168.3.34": "/clear",
      "watakuma21.xsrv.jp": "https://watakuma21.xsrv.jp/clear",
      "clear-inc.site": "https://clear-inc.site",
    };
    return hosts[window.location.hostname] || "";
  }

  // 採用情報
  if (window.location.pathname.indexOf("/recruit") !== -1) {
    fetchMicroCMS(
      "https://flat.microcms.io/api/v1/news-recruit?limit=100",
      "c1908ad5-e67c-45a8-8bed-0135746f5424",
      function (contents) {
        contents
          .filter((item) => item.company[0] === "clear")
          .forEach(function (item) {
            const img = `${item.img.url}?fit=max&w=1000&h=1000`;
            $(".recruit-other-link-content ul").append(`
							<li>
								<a href="${item.link}" target="_blank" rel="noopener noreferrer">
									<div class="recruit-media-link__image">
										<img src="${img}" decoding="async">
									</div>
								</a>
							</li>
						`);
          });
      }
    );
  }

  // インタビュー一覧
  fetchMicroCMS(
    "https://flat.microcms.io/api/v1/interview?limit=100",
    "c1908ad5-e67c-45a8-8bed-0135746f5424",
    function (contents) {
      const host = getHost();
      contents.forEach(function (item, index) {
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
    }
  );

  // ブログ一覧
  fetchMicroCMS(
    "https://clear.microcms.io/api/v1/blog?limit=100",
    "3a61ebc3-caa3-41d8-8628-65a5960a9316",
    function (contents) {
      const host = getHost();
      contents.forEach(function (item, index) {
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

      if (window.location.pathname === "/") {
        $(".blogs ul li")
          .slice($(window).width() <= 820 ? 4 : 3)
          .hide();
      }
    }
  );

  // メンバー一覧
  fetchMicroCMS(
    "https://clear.microcms.io/api/v1/member?limit=100",
    "3a61ebc3-caa3-41d8-8628-65a5960a9316",
    function (contents) {
      contents.forEach(function (item) {
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
              <span class='member-job'>詳細を見る</span>
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

      setupMemberPopups();
      $(".member_contents .member").slice(8).hide();
    }
  );

  // お知らせ一覧
  fetchMicroCMS(
    "https://clear.microcms.io/api/v1/news?limit=100",
    "3a61ebc3-caa3-41d8-8628-65a5960a9316",
    function (contents) {
      const categoryClasses = {
        お知らせ: "oshirase",
        求人: "kyujin",
        IR: "ir",
      };

      contents.forEach(function (item) {
        const linkHtml = item.link
          ? `<a target="_blank" href="${item.link}">${item.title}</a>`
          : item.title;

        const arrowHtml = item.link
          ? `<a target="_blank" href="${item.link}"><span class="ka">(</span> <span class="yaji">→</span> <span class="ka">)</span></a>`
          : "";

        const className = categoryClasses[item.category[0]] || "";

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
    }
  );

  // 体制参画案件一覧
  if (window.location.pathname.indexOf("/projects") !== -1) {
    fetchMicroCMS(
      "https://rich.microcms.io/api/v1/projects?limit=100",
      "973755fdf4b84988984f7af0eb187120cd59",
      function (contents) {
        const host = getHost();
        const categoryClasses = {
          開発: "development",
          インフラ: "infrastructure",
        };

        contents.forEach(function (item, index) {
          const className = categoryClasses[item.development_type[0]] || "";

          $(".projects ul").prepend(`
          <li class="${className}">
            <div>
              <div class="text">
                <h4>${item.title}</h4>
                <div class="description">
                  <div class="description_flex">
                    <p>参画体制</p>
                    <p>${item.participation_system}</p>
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
                    <p>作業場所</p>
                    <p>${item.location}</p>
                  </div>
                </div>
                <div class="projects_link">
                  <a href="${host}/projects/${index + 1}">詳しく見る</a>
                </div>
              </div>
            </div>
          </li>
        `);
        });
      }
    );
  }
});

// メンバーポップアップ設定
function setupMemberPopups() {
  // ポップアップ表示
  $(".member_contents .member").on("click", function () {
    const $content = $(this);
    const name = $content.find("p .member-name").text();
    const tag = $content.find(".hidden_pop ul").html();
    const img = $content.find("img").attr("src");
    const history = $content.find(".hidden_history").text();
    const description1 = $content.find(".hidden_discription-1").html();
    const description2 = $content.find(".hidden_discription-2").html();
    const description3 = $content.find(".hidden_discription-3").html();

    // コンテンツ設定
    const $popup = $("#popup_profile");
    $popup.find(".popImgOpen img").attr("src", img);
    $popup.find(".popup-name").text(name);
    $popup.find(".profile-tag ul").html(tag);
    $popup.find(".profile-history p span").text(history);
    $popup.find(".discription-1 p").text(description1);
    $popup.find(".discription-2 p").text(description2);
    $popup.find(".discription-3 p").text(description3);

    // 表示 - アニメーション追加
    $("html").css("overflow", "hidden");
    $popup
      .css({
        display: "block",
        opacity: 0,
        transform: "scale(0.9)",
      })
      .animate(
        {
          opacity: 1,
          transform: "scale(1)",
        },
        300,
        function () {
          $(this).removeAttr("style").css("display", "block");
        }
      );
  });

  // ポップアップクローズ - アニメーション追加
  $("#popup_profile #popup-close").on("click", function () {
    // コンテンツをクリア
    const $popup = $("#popup_profile");

    $popup.animate(
      {
        opacity: 0,
        transform: "scale(0.9)",
      },
      200,
      function () {
        // コンテンツをクリア
        $("#popup_profile .popImgOpen img").attr("src", "");
        $("#popup_profile .popup-name").empty();
        $("#popup_profile .discription p").empty();

        // 閉じる
        $("html").css("overflow", "auto");
        $popup.hide().removeAttr("style");
      }
    );
  });
}
