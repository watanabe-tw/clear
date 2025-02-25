<?php include('../header.php'); ?>
<main>
	<section id="recruit">
		<div class="container">
			<h1 class="title">
				<span class="en sl-txt" data-dire="top">Jobs</span>
				<span class="jp sl-txt" data-dire="top">募集要項</span>
			</h1>
			<div class="recruit_wrap">
				<div class="recruit_title">
					<ul>
						<li class="category_tab is-active" id="button1">
							<p>フロントエンドエンジニア</p>
						</li>
						<li class="category_tab" id="button2">
							<p>システムエンジニア</p>
						</li>
						<li class="category_tab" id="button3">
							<p>サーバーサイドエンジニア</p>
						</li>
						<li class="category_tab" id="button4">
							<p>インフラエンジニア</p>
						</li>
						<li class="category_tab" id="button5">
							<p>営業職</p>
						</li>
						<li class="category_tab" id="button6">
							<p>管理部</p>
						</li>
						<li class="category_tab" id="button7">
							<p>総務部</p>
						</li>
					</ul>
				</div>
				<div class="recruit_info">
					<div class="panel is-show" id="recruit1">
						<?php include('./job/frontend_engineer.php'); ?>
					</div>
					<div class="panel" id="recruit2">
						<?php include('./job/system_engineer.php'); ?>
					</div>
					<div class="panel" id="recruit3">
						<?php include('./job/serverside_engineer.php'); ?>
					</div>
					<div class="panel" id="recruit4">
						<?php include('./job/infrastructure_engineer.php'); ?>
					</div>
					<div class="panel" id="recruit5">
						<?php include('./job/sales.php'); ?>
					</div>
					<div class="panel" id="recruit6">
						<?php include('./job/management.php'); ?>
					</div>
					<div class="panel" id="recruit7">
						<?php include('./job/general_affairs.php'); ?>
					</div>
				</div>
				<div class="recruit-other-link">
					<div class="recruit-other-link-content">
						<h3>求人メディア経由の方はこちら</h3>
						<ul></ul>
					</div>
				</div>
			</div>
			<div class="recruit_other_link">
				<h3>その他</h3>
				<ul>
					<li>
						<a href="<?= $newURL ?>/welfare/">福利厚生</a>
					</li>
					<li>
						<a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=518tkejr" target="_blank"><span class="line">LINE</span>でエントリー</a>
					</li>
					<li>
						<a href="<?= $newURL ?>/recruit_contact">メールでエントリー</a>
					</li>
				</ul>
			</div>
		</div>
	</section>
</main>
<?php include('../footer.php'); ?>