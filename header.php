<?php
  $url = htmlspecialchars($_SERVER['HTTP_HOST'], ENT_QUOTES, 'UTF-8');
  $REQUEST_URI = htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8');
  if (strstr($url,'localhost')==true || (strstr($url,'192.168.11.25')==true )) {
    $newURL = "/clear";
  } else if (strstr($url,'watakuma21.xsrv.jp')==true) {
    $newURL = "/clear";
  } else {
    $newURL = "https://clear-inc.site";
  }

  $titles = array(
    "/" => "株式会社クリア | フリーランスのような正社員",
    "/contact/" => "お問い合わせ | 株式会社クリア",
    "/company/" => "会社情報 | 株式会社クリア",
    "/history/" => "沿革 | 株式会社クリア",
    "/style/" => "クリアとは | 株式会社クリア",
    "/recruit/" => "採用情報 | 株式会社クリア",
    "/welfare/" => "福利厚生 | 株式会社クリア",
    "/member/" => "メンバー情報 | 株式会社クリア",
    "/news/" => "ニュース | 株式会社クリア",
    "/blog/" => "ブログ | 株式会社クリア",
    "/group/" => "グループ会社 | 株式会社クリア",
    "/ir/" => "IR情報 | 株式会社クリア",
    "/ir-library/" => "IRライブラリ | 株式会社クリア",
    "/sdgs/" => "SDGsへの取り組み | 株式会社クリア",
  );

	$kangenritsu = '77%～82%';
?>

<html lang="ja" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- URL取得 -->
  <title><?php echo $titles[$REQUEST_URI]; ?></title>
  <link rel="canonical" href="<?= $newURL ?>">
  <meta name="description" content="株式会社クリア。フリーランスのような正社員。コンサルタント・マネジメント系の人材から、開発系・インフラ系のエンジニアまで多種多彩な人材やチームでのご提案等、多岐にわたり人材のご支援が可能です。">
  <meta name="author" content="clear-inc. 株式会社クリア">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="株式会社クリア">
  <meta property="og:title" content="株式会社クリア">
  <meta property="og:description" content="株式会社クリア。フリーランスのような正社員。コンサルタント・マネジメント系の人材から、開発系・インフラ系のエンジニアまで多種多彩な人材やチームでのご提案等、多岐にわたり人材のご支援が可能です。">
  <meta property="og:url" content="<?= $newURL ?>">
  <meta property="og:image" content="<?= $newURL ?>/assets/img/favicon.png">
  <meta name="twitter:site" content="<?= $newURL ?>">
  <meta name="twitter:creator" content="">
  <meta name="twitter:url" content="<?= $newURL ?>">
  <meta name="twitter:description" content="株式会社クリア">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:image" content="<?= $newURL ?>/assets/img/favicon.png">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="株式会社クリア">
  <link rel="shortcut icon" href="<?= $newURL ?>/assets/img/favicon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
  <link href="<?= $newURL ?>/assets/css/reset.css" media="all" rel="stylesheet">
  <link href="<?= $newURL ?>/assets/css/loading.css" media="all" rel="stylesheet">
  <link href="<?= $newURL ?>/assets/css/common.css" media="all" rel="stylesheet">
  <link href="<?= $newURL ?>/assets/css/header.css" media="all" rel="stylesheet">
  <link href="<?= $newURL ?>/assets/css/footer.css" media="all" rel="stylesheet">
  <link href="<?= $newURL ?>/assets/css/home.css" media="all" rel="stylesheet">
  <link href="<?= $newURL ?>/assets/css/menu.css" media="all" rel="stylesheet">
  <link href="<?= $newURL ?>/assets/css/simulation.css" media="all" rel="stylesheet">
  <?php if(strstr($REQUEST_URI,'company')==true){ ?>
    <link href="<?= $newURL ?>/assets/css/company.css" media="all" rel="stylesheet">
  <?php } ?>
  <?php if(strstr($REQUEST_URI,'history')==true){ ?>
    <link href="<?= $newURL ?>/assets/css/history.css" media="all" rel="stylesheet">
  <?php } ?>
  <?php if(strstr($REQUEST_URI,'ir')==true){ ?>
    <link href="<?= $newURL ?>/assets/css/ir.css" media="all" rel="stylesheet">
  <?php } ?>
  <?php if(strstr($REQUEST_URI,'recruit')==true){ ?>
    <link href="<?= $newURL ?>/assets/css/recruit.css" media="all" rel="stylesheet">
  <?php } ?>
  <?php if(strstr($REQUEST_URI,'style')==true){ ?>
    <link href="<?= $newURL ?>/assets/css/style.css" media="all" rel="stylesheet">
  <?php } ?>
  <?php if(strstr($REQUEST_URI,'welfare')==true){ ?>
    <link href="<?= $newURL ?>/assets/css/welfare.css" media="all" rel="stylesheet">
  <?php } ?>
  <link href="<?= $newURL ?>/assets/css/news.css" media="all" rel="stylesheet">
  <?php if(strstr($REQUEST_URI,'contact')==true){ ?>
    <link href="<?= $newURL ?>/assets/css/contact.css" media="all" rel="stylesheet">
  <?php } ?>
  <?php if(strstr($REQUEST_URI,'mail')==true){ ?>
    <link href="<?= $newURL ?>/assets/css/mail.css" media="all" rel="stylesheet">
  <?php } ?>
  <?php if(strstr($REQUEST_URI,'blog')==true){ ?>
    <link href="<?= $newURL ?>/assets/css/blog.css" media="all" rel="stylesheet">
  <?php } ?>
  <?php if(strstr($REQUEST_URI,'group')==true){ ?>
    <link href="<?= $newURL ?>/assets/css/group.css" media="all" rel="stylesheet">
  <?php } ?>
	<?php if(strstr($REQUEST_URI,'sdgs')==true){ ?>
    <link href="<?= $newURL ?>/assets/css/sdgs.css" media="all" rel="stylesheet">
  <?php } ?>
	<?php if(strstr($REQUEST_URI,'annual-income')==true){ ?>
    <link href="<?= $newURL ?>/assets/css/annual_income.css" media="all" rel="stylesheet">
  <?php } ?>
	<?php if(strstr($REQUEST_URI,'projects')==true){ ?>
    <link href="<?= $newURL ?>/assets/css/projects.scss" media="all" rel="stylesheet">
  <?php } ?>
  <meta name="google-site-verification" content="PWljpwHI125Et0ak168hz_8xIOAQFF2Fyvb9ftn60MI" />
</head>

<body>
  <div class='main-tool-bar'>
    <div class="header">
      <div class="header_logo">
        <h1 class="header_title">
          <a href="<?= $newURL ?>" class="header_title_link">
            <img src="<?= $newURL ?>/assets/img/logo_font.png" alt="">
          </a>
        </h1>
      </div>
      <div class="flex-menu pc_only">
        <ul class="menu">
          <li class="ho">
            <a>会社情報</a>
            <ul class="m_ireko">
              <li><a href="<?= $newURL ?>/company/#company_message">代表メッセージ　></a></li>
              <li><a href="<?= $newURL ?>/company/">会社概要　></a></li>
              <li><a href="<?= $newURL ?>/history/">沿革　></a></li>
            </ul>
          </li>
          <li class="ho">
            <a>事業紹介</a>
            <ul class="m_ireko">
              <li><a href="<?= $newURL ?>/#description">事業内容　></a></li>
              <li><a href="<?= $newURL ?>/group/">グループ会社　></a></li>
            </ul>
          </li>
          <li class="ho">
            <a>採用情報</a>
            <ul class="m_ireko">
              <li><a href="<?= $newURL ?>/style/">クリアの制度　></a></li>
              <li><a href="<?= $newURL ?>/recruit/">募集要項　></a></li>
              <li><a href="<?= $newURL ?>/welfare">福利厚生　></a></li>
            </ul>
          </li>
					<li class="ho">
            <a>クリアとは</a>
            <ul class="m_ireko">
              <li><a href="<?= $newURL ?>/#member">社員紹介　></a></li>
              <li><a href="<?= $newURL ?>/annual-income/">年収アップ実績　></a></li>
							<li><a href="<?= $newURL ?>/member">数字で見るクリア　></a></li>
            </ul>
          </li>
          <li class="ho">
            <a>IR情報</a>
            <ul class="m_ireko">
              <li><a href="<?= $newURL ?>/ir/">業績ハイライト　></a></li>
              <li><a href="<?= $newURL ?>/ir-library">IRライブラリ　></a></li>
            </ul>
          </li>
          <li><a href="<?= $newURL ?>/news/">NEWS</a></li>
					<li><a href="<?= $newURL ?>/sdgs/">SDGsへの取り組み</a></li>
          <li><a href="<?= $newURL ?>/blog/">ブログ</a></li>
        </ul>
        <ul class="contact">
          <li class="ho">
            <a class="c">お問い合わせ</a>
            <ul class="m_ireko">
              <li><a href="<?= $newURL ?>/recruit_contact/">求職者の方　></a></li>
              <li><a href="<?= $newURL ?>/contact">企業or求職者以外の方　></a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div id="nav-container">
        <nav id="nav-fullscreen">
          <ul class="nav-ul">
            <div class="nav-div">
              <div class="accordion">
                <div class="accordion-container">
                  <div class="accordion-item">
                    <h3 class="accordion-title js-accordion-title">
                      COMPANY | 会社情報
                    </h3>
                    <div class="accordion-content">
											<div class="accordion-content-flex">
												<a href="<?= $newURL ?>/company/#company_message">-　代表メッセージ</a>
												<a href="<?= $newURL ?>/company/">-　会社概要</a>
												<a href="<?= $newURL ?>/history/">-　沿革</a>
											</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h3 class="accordion-title js-accordion-title">
                      SERVICE | 事業紹介
                    </h3>
                    <div class="accordion-content">
											<div class="accordion-content-flex">
                      	<a href="<?= $newURL ?>/#description">-　事業内容</a>
                      	<a href="<?= $newURL ?>/group/">-　グループ会社</a>
											</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h3 class="accordion-title js-accordion-title">
                      RECRUIT | 採用情報
                    </h3>
                    <div class="accordion-content">
											<div class="accordion-content-flex">
												<a href="<?= $newURL ?>/style/">-　クリアの制度</a>
												<a href="<?= $newURL ?>/recruit/">-　募集要項</a>
												<a href="<?= $newURL ?>/welfare">-　福利厚生</a>
											</div>
                    </div>
                  </div>
									<div class="accordion-item">
                    <h3 class="accordion-title js-accordion-title">
                      ABOUT | クリアとは
                    </h3>
                    <div class="accordion-content">
											<div class="accordion-content-flex">
                      	<a href="<?= $newURL ?>/#member">-　社員紹介</a>
												<a href="<?= $newURL ?>/annual-income/">-　年収アップ実績</a>
												<a href="<?= $newURL ?>/member">-　数字で見るクリア</a>
											</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h3 class="accordion-title js-accordion-title">
                      IR | IR情報
                    </h3>
                    <div class="accordion-content">
											<div class="accordion-content-flex">
                      	<a href="<?= $newURL ?>/ir/">-　業績ハイライト</a>
                      	<a href="<?= $newURL ?>/ir-library">-　IRライブラリ</a>
											</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <a href="<?= $newURL ?>/news/">NEWS | ニュース</a>
                  </div>
									<div class="accordion-item">
										<a href="<?= $newURL ?>/sdgs/">SDGS | SDGsへの取り組み</a>
                  </div>
									<div class="accordion-item">
										<a href="<?= $newURL ?>/blog/">BLOG | ブログ</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="sp_only">
              <li class="nav-contact ma">
                <a href="<?= $newURL ?>/recruit_contact" class="footer_contact_contents_link_a">
                  <span class="footer_contact_contents_link_img">
                    <img src="<?= $newURL ?>/assets/img/mail_icon.svg">
                  </span>
                  <p class="footer_contact_contents_link_text">求職者の方
                  </p>
                </a>
              </li>
              <li class="nav-contact">
                <a href="<?= $newURL ?>/contact" class="footer_contact_contents_link_a">
                  <span class="footer_contact_contents_link_img">
                    <img src="<?= $newURL ?>/assets/img/mail_icon.svg">
                  </span>
                  <p class="footer_contact_contents_link_text">企業or求職者以外の方</p>
                </a>
              </li>
              <p class="menu_company sp_only">
                ©
                <?php echo date('Y'); ?> CLEAR CO., LTD.
              </p>
            </div>
          </ul>
          <ul class="pc_only nav-contact-pc">
            <li>
              <a href="<?= $newURL ?>/recruit_contact" class="footer_contact_contents_link_a">
                <span>
                  <img src="<?= $newURL ?>/assets/img/mail_icon.svg">
                </span>
                <p class="footer_contact_contents_link_text">求職者の方
                </p>
              </a>
            </li>
            <li>
              <a href="<?= $newURL ?>/contact" class="footer_contact_contents_link_a">
                <span>
                  <img src="<?= $newURL ?>/assets/img/mail_icon.svg">
                </span>
                <p class="footer_contact_contents_link_text">企業or求職者以外の方</p>
              </a>
            </li>
          </ul>
          <p class="menu_company pc_only">
            ©
            <?php echo date('Y'); ?> CLEAR CO., LTD.
          </p>
        </nav>
        <div class="n">
          <div id="nav-overlay"></div>
          <a id="nav-toggle">
            <span></span>
            <span></span>
            <span></span>
          </a>
        </div>
      </div>
    </div>
  </div>
