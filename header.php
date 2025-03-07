<?php

/**
 * サイトヘッダー
 * 
 * サイト共通のヘッダー部分を提供します。
 * メタ情報、CSS読み込み、ナビゲーションメニューを含みます。
 */

// サイトの基本設定
$site_config = [
	'site_name' => '株式会社クリア',
	'site_description' => '株式会社クリア。フリーランスのような正社員。コンサルタント・マネジメント系の人材から、開発系・インフラ系のエンジニアまで多種多彩な人材やチームでのご提案等、多岐にわたり人材のご支援が可能です。',
	'site_author' => 'clear-inc. 株式会社クリア',
	'site_favicon' => '/assets/img/favicon.png',
	'kangenritsu' => '77%～82%', // 還元率
];

// 環境に応じたベースURLの設定
$url = htmlspecialchars($_SERVER['HTTP_HOST'], ENT_QUOTES, 'UTF-8');
$request_uri = htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8');

if (strstr($url, 'localhost') || strstr($url, '192.168.3.34')) {
	$base_url = "/clear";
} else if (strstr($url, 'watakuma21.xsrv.jp')) {
	$base_url = "/clear";
} else {
	$base_url = "https://clear-inc.site";
}

// 現在のページのパスを取得
$current_path = parse_url($request_uri, PHP_URL_PATH);
$current_path = preg_replace('/\/clear/', '', $current_path); // ローカル環境対応

// ページごとのタイトル設定
$page_titles = [
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
	"/projects/" => "体制参画案件 | 株式会社クリア",
	"/qualification-support/" => "資格取得支援制度 | 株式会社クリア",
];

// 現在のページのタイトルを取得（デフォルト値も設定）
$page_title = isset($page_titles[$current_path]) ? $page_titles[$current_path] : "株式会社クリア | フリーランスのような正社員";

/**
 * CSSファイルを読み込む関数
 * @param string $filename ファイル名
 * @param string $base_url ベースURL
 * @return string HTML link タグ
 */
function get_css_link($filename, $base_url)
{
	return '<link href="' . $base_url . '/assets/css/' . $filename . '" media="all" rel="stylesheet">' . PHP_EOL;
}

/**
 * 特定のパスにマッチするか確認する関数
 * @param string $path 確認するパス
 * @param string $current_path 現在のパス
 * @return bool マッチすればtrue
 */
function path_matches($path, $current_path)
{
	return strstr($current_path, $path) !== false;
}
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">

	<title><?php echo $page_title; ?></title>

	<link rel="canonical" href="<?= $base_url ?>">
	<meta name="description" content="<?= $site_config['site_description'] ?>">
	<meta name="author" content="<?= $site_config['site_author'] ?>">

	<!-- OGP設定 -->
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="<?= $site_config['site_name'] ?>">
	<meta property="og:title" content="<?= $site_config['site_name'] ?>">
	<meta property="og:description" content="<?= $site_config['site_description'] ?>">
	<meta property="og:url" content="<?= $base_url ?>">
	<meta property="og:image" content="<?= $base_url . $site_config['site_favicon'] ?>">

	<!-- Twitter Card設定 -->
	<meta name="twitter:site" content="<?= $base_url ?>">
	<meta name="twitter:url" content="<?= $base_url ?>">
	<meta name="twitter:description" content="<?= $site_config['site_name'] ?>">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:image" content="<?= $base_url . $site_config['site_favicon'] ?>">

	<!-- その他のメタ情報 -->
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="<?= $site_config['site_name'] ?>">

	<!-- ファビコン設定 -->
	<link rel="shortcut icon" href="<?= $base_url . $site_config['site_favicon'] ?>">

	<!-- 共通CSSファイル -->
	<?= get_css_link('reset.css', $base_url) ?>
	<?= get_css_link('loading.css', $base_url) ?>
	<?= get_css_link('common.css', $base_url) ?>
	<?= get_css_link('header.css', $base_url) ?>
	<?= get_css_link('footer.css', $base_url) ?>
	<?= get_css_link('home.css', $base_url) ?>
	<?= get_css_link('simulation.css', $base_url) ?>
	<?= get_css_link('news.css', $base_url) ?>

	<!-- ページ固有のCSSファイル -->
	<?php if (path_matches('company', $current_path)): ?>
		<?= get_css_link('company.css', $base_url) ?>
	<?php endif; ?>

	<?php if (path_matches('history', $current_path)): ?>
		<?= get_css_link('history.css', $base_url) ?>
	<?php endif; ?>

	<?php if (path_matches('ir', $current_path)): ?>
		<?= get_css_link('ir.css', $base_url) ?>
	<?php endif; ?>

	<?php if (path_matches('annual-income', $current_path)): ?>
		<?= get_css_link('annual_income.css', $base_url) ?>
	<?php endif; ?>

	<?php if (path_matches('recruit', $current_path)): ?>
		<?= get_css_link('recruit.css', $base_url) ?>
	<?php endif; ?>

	<?php if (path_matches('style', $current_path)): ?>
		<?= get_css_link('style.css', $base_url) ?>
	<?php endif; ?>

	<?php if (path_matches('welfare', $current_path)): ?>
		<?= get_css_link('welfare.css', $base_url) ?>
	<?php endif; ?>

	<?php if (path_matches('contact', $current_path)): ?>
		<?= get_css_link('contact.css', $base_url) ?>
	<?php endif; ?>

	<?php if (path_matches('blog', $current_path)): ?>
		<?= get_css_link('blog.css', $base_url) ?>
	<?php endif; ?>

	<?php if (path_matches('group', $current_path)): ?>
		<?= get_css_link('group.css', $base_url) ?>
	<?php endif; ?>

	<?php if (path_matches('sdgs', $current_path)): ?>
		<?= get_css_link('sdgs.css', $base_url) ?>
	<?php endif; ?>

	<?php if (path_matches('projects', $current_path)): ?>
		<?= get_css_link('projects.css', $base_url) ?>
	<?php endif; ?>

	<?php if (path_matches('qualification-support', $current_path)): ?>
		<?= get_css_link('qualification-support.css', $base_url) ?>
	<?php endif; ?>

	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
	<?php include('parts/simulation.php'); ?>
	<header class="header">
		<div class="header-container">
			<div class="logo">
				<a href="<?= $base_url ?>" class="header_title_link">
					<img src="<?= $base_url ?>/assets/img/logo_font.png" alt="<?= $site_config['site_name'] ?>">
				</a>
			</div>

			<div class="nav">
				<ul class="nav-menu">
					<!-- 会社情報 -->
					<li class="nav-item has-dropdown">
						<a href="#" class="nav-link dropdown-toggle">会社情報<span class="toggle-btn"></span></a>
						<ul class="dropdown">
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/company/#company_message" class="dropdown-link">代表メッセージ</a>
							</li>
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/company/" class="dropdown-link">会社概要</a>
							</li>
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/history/" class="dropdown-link">沿革</a>
							</li>
						</ul>
					</li>

					<!-- 事業紹介 -->
					<li class="nav-item has-dropdown">
						<a href="#" class="nav-link dropdown-toggle">事業紹介<span class="toggle-btn"></span></a>
						<ul class="dropdown">
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/#description" class="dropdown-link">事業内容</a>
							</li>
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/group/" class="dropdown-link">グループ会社</a>
							</li>
						</ul>
					</li>

					<!-- 採用情報 -->
					<li class="nav-item has-dropdown">
						<a href="#" class="nav-link dropdown-toggle">採用情報<span class="toggle-btn"></span></a>
						<ul class="dropdown">
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/style/" class="dropdown-link">クリアの制度</a>
							</li>
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/recruit/" class="dropdown-link">募集要項</a>
							</li>
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/welfare" class="dropdown-link">福利厚生</a>
							</li>
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/projects" class="dropdown-link">体制参画案件</a>
							</li>
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/qualification-support" class="dropdown-link">資格取得支援制度</a>
							</li>
						</ul>
					</li>

					<!-- クリアとは -->
					<li class="nav-item has-dropdown">
						<a href="#" class="nav-link dropdown-toggle">クリアとは<span class="toggle-btn"></span></a>
						<ul class="dropdown">
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/#member" class="dropdown-link">社員紹介</a>
							</li>
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/annual-income/" class="dropdown-link">年収アップ実績</a>
							</li>
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/member" class="dropdown-link">数字で見るクリア</a>
							</li>
						</ul>
					</li>

					<!-- IR情報 -->
					<li class="nav-item has-dropdown">
						<a href="#" class="nav-link dropdown-toggle">IR情報<span class="toggle-btn"></span></a>
						<ul class="dropdown">
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/ir/" class="dropdown-link">業績ハイライト</a>
							</li>
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/ir-library" class="dropdown-link">IRライブラリ</a>
							</li>
						</ul>
					</li>

					<!-- NEWS -->
					<li class="nav-item">
						<a href="<?= $base_url ?>/news/" class="nav-link simple">NEWS</a>
					</li>

					<!-- ブログ -->
					<li class="nav-item">
						<a href="<?= $base_url ?>/blog/" class="nav-link simple">ブログ</a>
					</li>

					<!-- SDGs -->
					<li class="nav-item">
						<a href="<?= $base_url ?>/sdgs/" class="nav-link simple">SDGsへの取り組み</a>
					</li>

					<!-- お問い合わせ -->
					<li class="nav-item has-dropdown">
						<a href="#" class="nav-link dropdown-toggle">お問い合わせ<span class="toggle-btn"></span></a>
						<ul class="dropdown">
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/recruit_contact/" class="dropdown-link">求職者の方</a>
							</li>
							<li class="dropdown-item">
								<a href="<?= $base_url ?>/contact" class="dropdown-link">企業or求職者以外の方</a>
							</li>
						</ul>
					</li>
				</ul>

				<div class="header-cta">
					<a class="casual-btn" href="<?= $base_url ?>/recruit_contact/">
						<span>カジュアル面談</span>
						<img class="icon default" src="<?= $base_url ?>/assets/img/chat_blue.svg" alt="">
						<img class="icon hover" src="<?= $base_url ?>/assets/img/chat.svg" alt="">
					</a>
					<a id="open-simulator">
						<span>年収シミュレーター</span>
						<img class="icon default" src="<?= $base_url ?>/assets/img/financial-profit.svg" alt="">
						<img class="icon hover" src="<?= $base_url ?>/assets/img/financial-profit_blue.svg" alt="">
					</a>
				</div>

				<div class="menu-toggle">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
		</div>
	</header>