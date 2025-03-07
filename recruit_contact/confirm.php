<?php
/**
 * 確認画面
 */

// 設定ファイルの読み込み
require_once('config.php');

// セッションデータがない場合は入力画面にリダイレクト
if (!isset($_SESSION['form_data'])) {
    header('Location: index.php');
    exit;
}

// セッションからフォームデータを取得
$form_data = $_SESSION['form_data'];

// フォームが送信された場合の処理（送信処理）
if (!empty($_POST['submit']) && $_POST['submit'] === '送信する') {
    // CSRF対策のトークン確認
    if (empty($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        die('不正な操作が行われました');
    }
    
    // メール送信処理
    $mail_result = send_mail($form_data);
    
    // セッションのクリア
    $_SESSION = array();
    session_destroy();
    
    // 完了画面へリダイレクト
    header('Location: complete.php');
    exit;
}

// ヘッダーを読み込み
include('../header.php');
?>

<main>
	<section>
			<div class="confirm_contents">
				<p>以下の内容で間違いがなければ、<br class="br_sp">「送信する」ボタンを押してください。</p>
				<form action="" method="POST">
					<input type="hidden" name="token" value="<?php echo $token; ?>">
					<table class="formTable">
						<tbody>
							<tr>
								<th>応募種別</th>
								<td>
									<?php echo $form_data['type'] === 'casual' ? 'カジュアル面談' : '採用面談'; ?>
								</td>
							</tr>
							<tr>
								<th>お名前</th>
								<td>
									<?php echo h($form_data['name']); ?>
								</td>
							</tr>
							<tr>
								<th>ふりがな</th>
								<td>
									<?php echo h($form_data['kana']); ?>
								</td>
							</tr>
							<tr>
								<th>郵便番号</th>
								<td>
									<?php echo h($form_data['zip']); ?>
								</td>
							</tr>
							<tr>
								<th>住所</th>
								<td>
									<?php echo h($form_data['address']); ?>
								</td>
							</tr>
							<tr>
								<th>電話番号</th>
								<td>
									<?php echo h($form_data['tel']); ?>
								</td>
							</tr>
							<tr>
								<th>メールアドレス</th>
								<td>
									<?php echo h($form_data['email']); ?>
								</td>
							</tr>
							<tr>
								<th>お問い合わせ内容</th>
								<td>
									<?php echo nl2br(h($form_data['message'])); ?>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="btn-container">
						<a href="index.php" class="confirm_btn btn-back">戻る</a>
						<input type="submit" name="submit" value="送信する" class="confirm_btn">
					</div>
				</form>
		</div>
	</section>
</main>

<?php include('../footer.php'); ?>