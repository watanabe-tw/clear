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
						<span class="jp sl-txt" data-dire="top">ラインでお問い合わせ</span>
					</h1>
					<p>
						以下のボタンを押していただき、<br class="br_sp">「採用担当」宛に、お問い合わせください。
					</p>
					<a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=518tkejr" class="line_btn"
						target="_blank">
						<span>LINEでお問い合わせ</span>
						<img src="<?= $base_url ?>/assets/img/line.svg" alt="">
					</a>
				</div>
				<div class="form_contact">
					<h1 class="title">
						<span class="en sl-txt" data-dire="top">Form</span>
						<span class="jp sl-txt" data-dire="top">お問い合わせフォーム</span>
					</h1>
					<form method="post" action="" enctype="multipart/form-data">
						<div class="form_contents">
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
		</div>
	</section>
</main>

<?php include('../footer.php'); ?>