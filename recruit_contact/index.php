<?php
/**
 * 入力画面
 */

// 設定ファイルの読み込み
require_once('config.php');

// 初期処理
$errors = [];
$form_data = [];

// セッションからフォームデータを取得（存在する場合）
if (isset($_SESSION['form_data'])) {
    $form_data = $_SESSION['form_data'];
}

// フォームが送信された場合の処理
if (!empty($_POST['submit']) && $_POST['submit'] === '確認画面へ') {
    // POSTされたデータをサニタイズしてセッションに保存
    $_POST = array_map('trim', $_POST);
    $_SESSION['form_data'] = $_POST;
    $form_data = $_SESSION['form_data'];
    
    // バリデーション実行
    $errors = validate_form($_POST);
    
    // エラーがなければ確認画面へリダイレクト
    if (empty($errors)) {
        header('Location: confirm.php');
        exit;
    }
}

// ヘッダーを読み込み
include('../header.php');
?>

<main>
	<section id="con">
		<div class="container">
			<div class="contact_wrap">
				<div class="line_contact">
					<h1 class="title">
						<span class="en sl-txt" data-dire="top">LINE</span>
						<span class="jp sl-txt" data-dire="top">ラインで応募する</span>
					</h1>
					<p>
						以下のボタンを押していただき、<br class="br_sp">「採用担当」宛に、お問い合わせください。
					</p>
					<a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=518tkejr" class="line_btn"
						target="_blank">
						<span>LINEでエントリー</span>
						<img src="<?= $base_url ?>/assets/img/line.svg" alt="">
					</a>
				</div>
				<div class="form_contact">
					<h1 class="title">
						<span class="en sl-txt" data-dire="top">Form</span>
						<span class="jp sl-txt" data-dire="top">エントリーフォーム</span>
					</h1>
					<form method="post" action="" enctype="multipart/form-data">
						<div class="form_contents">
							<dl>
								<dt>応募種別 <span>*</span></dt>
								<dd>
									<div class="radio_flex">
										<label for="select_radio1" class="form_radio">
											<input type="radio" name="type" value="casual" id="select_radio1" <?php if
												(isset($form_data['type']) && $form_data['type']==='casual' ) echo 'checked' ; ?>>
											<span>カジュアル面談</span>
										</label>
										<label for="select_radio2" class="form_radio">
											<input type="radio" name="type" value="recruit" id="select_radio2" <?php if
												(isset($form_data['type']) && $form_data['type']==='recruit' ) echo 'checked' ; ?>>
											<span>採用面談</span>
										</label>
									</div>
									<?php if (isset($errors['type'])): ?>
									<div class="error">
										<?php echo $errors['type']; ?>
									</div>
									<?php endif; ?>
								</dd>
							</dl>
							<dl>
								<dt>お名前 <span>*</span></dt>
								<dd>
									<input type="text" id="name" name="name" class="form_name" placeholder="山田太郎"
										value="<?php echo isset($form_data['name']) ? h($form_data['name']) : ''; ?>">
									<?php if (isset($errors['name'])): ?>
									<div class="error">
										<?php echo $errors['name']; ?>
									</div>
									<?php endif; ?>
								</dd>
							</dl>
							<dl>
								<dt>ふりがな <span>*</span></dt>
								<dd>
									<input type="text" id="kana" name="kana" placeholder="やまだたろう" class="form_name"
										value="<?php echo isset($form_data['kana']) ? h($form_data['kana']) : ''; ?>">
									<?php if (isset($errors['kana'])): ?>
									<div class="error">
										<?php echo $errors['kana']; ?>
									</div>
									<?php endif; ?>
								</dd>
							</dl>
							<dl>
								<dt>郵便番号 <span>*</span></dt>
								<dd>
									<div class="zip-container">
										<input type="text" id="zip" name="zip" placeholder="123-4567"
											value="<?php echo isset($form_data['zip']) ? h($form_data['zip']) : ''; ?>">
										<button type="button" id="zip-search" class="btn btn-zip-search">住所検索</button>
									</div>
									<?php if (isset($errors['zip'])): ?>
									<div class="error">
										<?php echo $errors['zip']; ?>
									</div>
									<?php endif; ?>
								</dd>
							</dl>
							<dl>
								<dt>住所 <span>*</span></dt>
								<dd>
									<input type="text" id="address" name="address" placeholder="東京都千代田区丸の内二丁目6番1号"
										value="<?php echo isset($form_data['address']) ? h($form_data['address']) : ''; ?>">
									<?php if (isset($errors['address'])): ?>
									<div class="error">
										<?php echo $errors['address']; ?>
									</div>
									<?php endif; ?>
								</dd>
							</dl>
							<dl>
								<dt>電話番号 <span>*</span></dt>
								<dd>
									<input type="text" id="tel" name="tel" placeholder="00000000000"
										value="<?php echo isset($form_data['tel']) ? h($form_data['tel']) : ''; ?>">
									<?php if (isset($errors['tel'])): ?>
									<div class="error">
										<?php echo $errors['tel']; ?>
									</div>
									<?php endif; ?>
								</dd>
							</dl>
							<dl>
								<dt>メールアドレス <span>*</span></dt>
								<dd>
									<input type="email" id="email" name="email" placeholder="sample_address＠icloud.com"
										value="<?php echo isset($form_data['email']) ? h($form_data['email']) : ''; ?>">
									<?php if (isset($errors['email'])): ?>
									<div class="error">
										<?php echo $errors['email']; ?>
									</div>
									<?php endif; ?>
								</dd>
							</dl>
							<dl>
								<dt>お問い合わせ内容 <span>*</span></dt>
								<dd>
									<textarea id="message" name="message"
										placeholder="お問い合わせ内容をご記入ください"><?php echo isset($form_data['message']) ? h($form_data['message']) : ''; ?></textarea>
									<?php if (isset($errors['message'])): ?>
									<div class="error">
										<?php echo $errors['message']; ?>
									</div>
									<?php endif; ?>
								</dd>
							</dl>
							<p class="privacy_link">
								<a href="<?= $base_url ?>/privacy_policy.php" target="_blank">プライバシーポリシー</a> <br>に同意の上送信するボタンをクリックしてください
							</p>
							<div class="submit_form_button">
								<input type="submit" name="submit" value="確認画面へ">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="faq">
				<h1 class="title">
					<span class="en sl-txt" data-dire="top">FAQ</span>
					<span class="jp sl-txt" data-dire="top">よくある質問</span>
				</h1>
				<div class="qa-container">
					<dl class="qa-list">
						<dt class="question-title js-title">案件はエンジニアの選択制ってホント？</dt>
						<dd class="answer-text">
							<p>
								案件の選択権は100%エンジニアさんにございます。<a href="<?= $base_url ?>/style">詳細はこちら</a> <br>
								面接の中でご希望を「必須の営業条件」として擦り合わせを行い、ご希望にマッチした案件のみで面談を組んでまいります。<br>
								面談を受けた後に、参画したい！参画したくない！という所感を教えてください！
							</p>
						</dd>
					</dl>
					<dl class="qa-list">
						<dt class="question-title js-title">エンジニアに案件の詳細条件が公開されてるってホント？</dt>
						<dd class="answer-text">
							<p>
								完全公開をしています！<a href="<?= $base_url ?>/style">詳細はこちら</a> <br>
								弊社では独自の社内システムから、案件詳細や単価、ボーナス額などなど、すべて個人へ公開しています。<br>
								納得できる環境だからこそ、安心してお仕事していただけるという考えです。
							</p>
						</dd>
					</dl>
					<dl class="qa-list">
						<dt class="question-title js-title">高還元（
							<?php echo $site_config['kangenritsu'] ?>）を実現できる理由は？
						</dt>
						<dd class="answer-text">
							<p>
								弊社では経験者採用のみ行っております。<br>
								そのため、新卒や未経験の方に対するOJT費用が発生しないため、<br>
								その分、エンジニアさんへの還元にあてることが出来ています。
							</p>
						</dd>
					</dl>
					<dl class="qa-list">
						<dt class="question-title js-title">待機中のお給料が心配</dt>
						<dd class="answer-text">
							<p>
								弊社では待機中に関しても、基本給は満額お支払いさせて頂いております。<br>
								また現在、待機者は0名となっております。
							</p>
						</dd>
					</dl>
					<dl class="qa-list">
						<dt class="question-title js-title">リモートワークの割合を教えてください！</dt>
						<dd class="answer-text">
							<p>
								弊社では案件全体の約92％がリモートを取り入れている案件になっています！<br>
								おおよそ月に1500件～2000件の案件が弊社に入ってまいりますので、<br>
								リモート頻度や理想の働き方をご相談していただければと思います！
							</p>
						</dd>
					</dl>
					<dl class="qa-list">
						<dt class="question-title js-title">フォロー体制や相談窓口はありますか？</dt>
						<dd class="answer-text">
							<p>
								もちろんございます。<br>
								コミュニケーションツールとして「Slack」を採用しており、<br>
								お悩みメッセージをいただければ、バックヤード全体で即時対応をしております。<br>
								また、独自の社内システムにて、「〇、×、△」のステータス変更機能があり、そちらも毎日バックヤードで確認し、<br>
								「×、△」の方にはヒアリングを行います！<a href="<?= $base_url ?>/style">詳細はこちら</a>
							</p>
						</dd>
					</dl>
					<dl class="qa-list">
						<dt class="question-title js-title">1ヵ月以上の長期休暇OKってホントですか？</dt>
						<dd class="answer-text">
							<p>
								案件の切れ目で長期休暇OKです！<br>
								過去には1ヵ月のお休みで海外旅行へ行かれたり、リフレッシュのために2か月の間お休みされる方もおられます。<br>
								もともと海外旅行が好きな方が多かったので、出来上がった制度になります！
							</p>
						</dd>
					</dl>
					<dl class="qa-list">
						<dt class="question-title js-title">副業/兼業に何か制限はありますか？</dt>
						<dd class="answer-text">
							<p>
								特段ございません！（本職に支障が出ない範囲にはなりますが、、、）<br>
								弊社では、申請もなければ審査もありませんので、自由に活用していただければと思います！<br>
								現在ですと【音楽関係のWEBライター】や、【HP制作運用の請負】などをしている方もおられます！
							</p>
						</dd>
					</dl>
					<dl class="qa-list">
						<dt class="question-title js-title">関東以外の案件はありますか？</dt>
						<dd class="answer-text">
							<p>
								もちろんございます！<br>
								弊社の拠点は関東をはじめ、大阪、名古屋、福岡、札幌といった全国展開をしております。<br>
								そのため、各拠点の案件をご紹介する事が可能ですし、遠方から関東の案件にリモートで参画する事も可能です！
							</p>
						</dd>
					</dl>
				</div>
			</div>
		</div>
	</section>
</main>

<?php include('../footer.php'); ?>