<?php include('../header.php'); ?>
<main>
	<section class="con">
		<div class="container">
			<h1 class="title">
				<span class="en sl-txt" data-dire="top">Confirm</span>
				<span class="jp sl-txt" data-dire="top">確認画面</span>
			</h1>
			<div class="contact_wrap">
				<?php if($empty_flag == 1){ ?>
					<div>
						<h4>入力にエラーがあります。<br class="br_sp">ご確認の上「戻る」ボタンにて修正をお願い致します。</h4>
						<div class="error_message_contents">
							<?php echo $errm; ?>
						</div>
						<input class="back_contact_check_form" type="button" value=" 前画面に戻る " onClick="history.back()">
					</div>
				<?php }else{ ?>
					<div class="confirm_contents">
						<p>以下の内容で間違いがなければ、<br class="br_sp">「送信する」ボタンを押してください。</p>
						<form action="<?php echo h($_SERVER['SCRIPT_NAME']); ?>" method="POST">
							<table class="formTable">
								<?php echo confirmOutput($_POST);//入力内容を表示?>
							</table>
							<p class="submit_send_button"><input type="hidden" name="mail_set" value="confirm_submit">
								<input type="hidden" name="httpReferer" value="<?php echo h($_SERVER['HTTP_REFERER']);?>">
								<input type="submit" value="　送信する　" id="submit">
								<input type="button" value="前画面に戻る" onClick="history.back()" id="submit"></p>
						</form>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
</main>
<?php include('../footer.php'); ?>
