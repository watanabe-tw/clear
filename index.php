<?php include('./header.php'); ?>
<div id="popup_profile">
	<div class="popup-wrapper">
		<div class="close">
			<button id="popup-close">
				<div class="me-button">
					<span class="ka">(</span>
					<span class="bu">close</span>
					<span class="ka">)</span>
				</div>
			</button>
		</div>
		<div class="profile">
			<div class="popImgOpen">
				<img src="" alt="">
			</div>
			<div class="profile-text">
				<div class="popup-name"></div>
				<div class="profile-tag">
					<ul></ul>
				</div>
				<!-- <div class="profile-history">
					<p>ITエンジニア歴<span></span></p>
				</div> -->
			</div>
		</div>
		<div class="discription">
			<div class="discription-1">
				<h3>これまでの経歴を踏まえた自己紹介</h3>
				<p></p>
			</div>
			<div class="discription-2">
				<h3>現在の業務内容</h3>
				<p></p>
			</div>
			<div class="discription-3">
				<h3>趣味や休日の過ごし方</h3>
				<p></p>
			</div>
		</div>
	</div>
</div>
<main>
	<?php include('./loading.php'); ?>
	<div class="main_top_slide">
		<div class="slider-area">
			<div class="loopslider_wrap_top">
				<ul>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/1.svg" width="100%"></li>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/2.svg" width="100%"></li>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/3.svg" width="100%"></li>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/4.svg" width="100%"></li>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/5.svg" width="100%"></li>
				</ul>
				<ul>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/1.svg" width="100%"></li>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/2.svg" width="100%"></li>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/3.svg" width="100%"></li>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/4.svg" width="100%"></li>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/5.svg" width="100%"></li>
				</ul>
			</div>
			<div class="loopslider_wrap_bottom">
				<ul>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/6.svg" width="100%"></li>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/7.svg" width="100%"></li>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/8.svg" width="100%"></li>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/9.svg" width="100%"></li>
				</ul>
				<ul>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/6.svg" width="100%"></li>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/7.svg" width="100%"></li>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/8.svg" width="100%"></li>
					<li><img src="<?= $newURL ?>/assets/img/main_visual/9.svg" width="100%"></li>
				</ul>
			</div>
    </div>
		<div class="main_top_slide_ja">
			<img src="<?= $newURL ?>/assets/img/main_visual/freelance.png" alt="">
		</div>
		</p>
	</div>
	<div class="s-top_main-contents-mainghost"></div>
	<section id="mission">
		<div class="container">
			<h1 class="title">
				<span class="en sl-txt" data-dire="top">Mission</span>
				<span class="jp sl-txt" data-dire="top">ミッション</span>
			</h1>
			<div class="mission_wrapper">
				<h3><span class="sl-txt" data-dire="top">フリーランス</span>のような正社員</h3>
				<div class="mission_discription">
					<div class="item sl-txt">給料単価制</div>
					<div class="batsu">×</div>
					<div class="item sl-txt">案件選択制</div>
					<div class="batsu">×</div>
					<div class="item sl-txt">充実の福利厚生</div>
				</div>
				<p>フリーランスの自由と正社員の安定をお約束致します。<br>正社員でありながら、フリーランスのように働ける会社です。</p>
				<div class="viewmore">
					<a href="<?= $newURL ?>/style/">クリアの制度について →</a>
				</div>	
			</div>
		</div>
	</section>
	<section id="description">
		<div class="container">
			<h1 class="title">
				<span class="en sl-txt" data-dire="top">Description</span>
				<span class="jp sl-txt" data-dire="top">事業内容</span>
			</h1>
			<h3>システムエンジニアリングサービス</h3>
			<div class="en-wrap">
				<div class="en-images-wrapper">
					<div class="en-big service-op service-active">
						<img src="https://x-z.jp/assets/images/big-circle.png" alt="">
					</div>
					<div class="en-logo service-op service-active">
						<p>SESを主軸に<br>下記3つの業務を承っております。</p>
					</div>
					<div class="en-small">
						<img src="https://x-z.jp/assets/images/circle.png" alt="" class="service-op service-active">
						<img src="https://x-z.jp/assets/images/circle_sports.png" alt="" class="service-op service-active">
						<img src="https://x-z.jp/assets/images/circle.png" alt="" class="service-op service-active">
					</div>
					<div class="en-text-wrapper">
						<div class="en-text service-op service-active">
							<p class="state">
								業務系システムの<br>設計・開発・運営
							</p>
						</div>
						<div class="en-text service-op service-active">
							<p class="state">
								ネットワークインフラの<br>設計・構築・保守
							</p>
						</div>
						<div class="en-text service-op service-active">
							<p class="state">
								Webサイト・Webシステムの<br>企画・開発・保守
							</p>
						</div>
					</div>
				</div>
			</div>
			<p class="des_text">優秀な人材が必要な時は弊社にお声掛けしてください。<br>お客様のニーズに合致するエンジニアを提案させて頂き、 プロジェクトを円滑に成功へと導きます。</p>
		</div>
	</section>
	<section id="member">
		<div class="container">
			<h1 class="title">
				<span class="en sl-txt" data-dire="top">Member</span>
				<span class="jp sl-txt" data-dire="top">社員紹介</span>
			</h1>
			<div class="member_wrap">
				<ul class="member_contents">
				</ul>
				<div class="toggle-class">
					<button class="toggle-btn">全てのメンバーを見る↓</button>
				</div>
			</div>
		</div>
	</section>
	<section id="member_information">
		<div class="container">
			<h1 class="title">
				<span class="en sl-txt" data-dire="top">Member-Information</span>
				<span class="jp sl-txt" data-dire="top">数字で見るクリア</span>
			</h1>
			<?php include('./parts/member_info_wrap.php'); ?>
		</div>
	</section>
	<section id="b_n">
		<div class="container">
			<h1 class="title">
				<span class="en sl-txt" data-dire="top">News</span>
				<span class="jp sl-txt" data-dire="top">ニュース</span>
			</h1>
			<div class="news_wrapper">
				<div id="news">
					<div class="news_content"></div>
					<div class="viewmore">
						<a href="<?= $newURL ?>/news/">View more →</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="group">
		<div class="container">
			<h1 class="title">
				<span class="en sl-txt" data-dire="top">Group</span>
				<span class="jp sl-txt" data-dire="top">グループ</span>
			</h1>
			<div class="flex">
				<div class="clear">
					<img src="<?= $newURL ?>/assets/img/clear-group.png" alt="">
					<h4>株式会社クリア</h4>
					<p>フリーランスのような正社員として<br>働くことを目的として設立した会社です</p>
				</div>
				<div class="flat">
				<img src="<?= $newURL ?>/assets/img/flat-group.png" alt="">
					<h4>株式会社フラット</h4>
					<p>SES業界いちばんゆる〜く<br>働く事を目的に設立された会社です</p>
				</div>
				<div class="rich">
				<img src="<?= $newURL ?>/assets/img/rich-group.png" alt="">
					<h4>株式会社リッチ</h4>
					<p>全国のSESエンジニアを「りっち」<br>にする事を目的に設立された会社です</p>
				</div>
			</div>
			<div class="viewmore">
				<a href="<?= $newURL ?>/group/">View more →</a>
			</div>
		</div>
	</section>
	<section id="b_n">
		<div class="container">
			<h1 class="title">
				<span class="en sl-txt" data-dire="top">Blog</span>
				<span class="jp sl-txt" data-dire="top">ブログ</span>
			</h1>
			<div class="blogs">
				<ul>
				</ul>
			</div>
			<div class="viewmore">
				<a href="<?= $newURL ?>/blog/">View more →</a>
			</div>
		</div>
	</section>
</main>
<?php include('./footer.php'); ?>