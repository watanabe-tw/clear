<?php include('../header.php'); ?>
<main>
	<section id="con">
		<div class="container">
			<h1 class="title">
				<span class="en sl-txt" data-dire="top">Contact</span>
				<span class="jp sl-txt" data-dire="top">お問い合わせ</span>
			</h1>
			<div class="contact_wrap">
				<p class="contatct_text">
					お問い合わせは、LINEまたは当ページのコンタクトフォームより受け付けております。<br>
					お客様のプライバシーは厳守し、目的以外の使用は致しません。
				</p>
				<div class="line_contact">
					<h1 class="title">
						<span class="en sl-txt" data-dire="top">LINE</span>
						<span class="jp sl-txt" data-dire="top">ライン</span>
					</h1>
					<p>
						以下のボタンを押していただき、<br class="br_sp">「採用担当」宛に、お問い合わせください。
					</p>
					<a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=518tkejr" class="line_btn" target="_blank">LINEでお問い合わせ</a>
				</div>
				<div class="form_contact">
					<h1 class="title">
						<span class="en sl-txt" data-dire="top">Form</span>
						<span class="jp sl-txt" data-dire="top">フォーム</span>
					</h1>
					<form method="post" action="mail.php" enctype="multipart/form-data" id="form_1">
						<div class="form_contents">
							<dl>
								<dt>お名前 <span>必須</span></dt>
								<dd>
									<input type="text" name="お名前" size="60" value="" placeholder="山田太郎"
										class="form_name validate[required]" data-prompt-position="bottomLeft">
								</dd>
							</dl>
							<dl>
								<dt>ふりがな <span>必須</span></dt>
								<dd>
									<input type="text" name="ふりがな" size="60" value="" placeholder="やまだたろう"
										class="form_name validate[required]" data-prompt-position="bottomLeft">
								</dd>
							</dl>
							<dl>
								<dt>郵便番号 <span>必須</span></dt>
								<dd>
									<input type="text" name="郵便番号" size="8" maxlength="8" value="" placeholder="000-0000"
										onKeyUp="AjaxZip3.zip2addr(this,'','住所','住所');" class="validate[required,maxSize[12]]"
										data-prompt-position="bottomLeft">
								</dd>
							</dl>
							<dl>
								<dt>住所 <span>必須</span></dt>
								<dd>
									<input type="text" name="住所" size="60" value="" placeholder="東京都千代田区丸の内二丁目6番1号"
										class="validate[required]" data-prompt-position="bottomLeft">
								</dd>
							</dl>
							<dl>
								<dt>電話番号 <span>必須</span></dt>
								<dd>
									<input type="text" name="電話番号" size="15" value="" placeholder="00000000000"
										class="validate[required,custom[phone]]" data-prompt-position="bottomLeft">
								</dd>
							</dl>
							<dl>
								<dt>メールアドレス <span>必須</span></dt>
								<dd>
									<input type="text" name="メールアドレス" size="15" value="" placeholder="sample_address＠icloud.com"
										class="validate[required,custom[email]]" data-prompt-position="bottomLeft">
								</dd>
							</dl>
							<dl>
								<dt>お問い合わせ内容 <span>必須</span></dt>
								<dd>
									<textarea name="お問い合わせ内容" cols="50" rows="6" placeholder="お問い合わせ内容をご記入ください" class="validate[required]"
										data-prompt-position="bottomLeft"></textarea>
								</dd>
							</dl>
							<p class="privacy_link">
								<a href="<?= $newURL ?>/privacy_policy.php" target="_blank">プライバシーポリシー</a> に同意の上送信するボタンをクリックしてください
							</p>
							<div class="submit_form_button">
								<input type="submit" value="入力内容を確認する" id="submit">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</main>
<?php include('../footer.php'); ?>