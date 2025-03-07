<?php

/**
 * 設定ファイル
 */

// セッション開始
session_start();

// 文字コード設定
mb_language("Japanese");
mb_internal_encoding("UTF-8");

// エラー表示設定（本番環境ではoffに設定）
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

// 管理者のメールアドレス設定
$admin_email = "recruit@group-inc.site, sales@clear-inc.site"; // 実際のメールアドレスに変更してください
// $admin_email = "crossclub.t21@gmail.com, watanabetakuma21@gmail.com";

// 自動返信メールの件名
$auto_reply_subject = "株式会社クリア |【自動返信】お問い合わせ頂きありがとうございました";

// フォームの必須項目
$required_items = ['name', 'kana', 'zip', 'address', 'tel', 'email', 'message'];

// CSRF対策のトークン生成
if (!isset($_SESSION['token'])) {
	$_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

/**
 * XSS対策のサニタイズ関数
 */
function h($str)
{
	return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/**
 * 入力値のバリデーションを行う関数
 */
function validate_form($post)
{
	global $required_items;
	$errors = [];

	// 必須項目のバリデーション
	foreach ($required_items as $item) {
		if (empty($post[$item])) {
			$errors[$item] = '必須項目です';
		}
	}

	// 郵便番号のバリデーション（ハイフンありなしどちらも許容）
	if (!empty($post['zip'])) {
		// ハイフンなしの場合は7桁の数字かチェック
		if (preg_match('/^\d{7}$/', $post['zip'])) {
			// ハイフンを追加する形式に変換（送信データの統一化のため）
			$post['zip'] = substr($post['zip'], 0, 3) . '-' . substr($post['zip'], 3);
			$_SESSION['form_data']['zip'] = $post['zip'];
		}
		// ハイフンありの場合は123-4567の形式かチェック
		else if (!preg_match('/^\d{3}-\d{4}$/', $post['zip'])) {
			$errors['zip'] = '郵便番号は「123-4567」または「1234567」の形式で入力してください';
		}
	}

	// 電話番号のバリデーション
	if (!empty($post['tel']) && !preg_match('/^[0-9\-]+$/', $post['tel'])) {
		$errors['tel'] = '電話番号は半角数字とハイフンのみで入力してください';
	}

	// メールアドレスのバリデーション
	if (!empty($post['email']) && !filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = '有効なメールアドレスを入力してください';
	}

	return $errors;
}

/**
 * メール送信処理の関数
 */
function send_mail($form_data)
{
	global $admin_email, $auto_reply_subject;

	// メール本文の作成
	$mail_body = "お問い合わせの内容は以下の通りです。\n\n";
	$mail_body .= "お名前: " . $form_data['name'] . "\n";
	$mail_body .= "ふりがな: " . $form_data['kana'] . "\n";
	$mail_body .= "郵便番号: " . $form_data['zip'] . "\n";
	$mail_body .= "住所: " . $form_data['address'] . "\n";
	$mail_body .= "電話番号: " . $form_data['tel'] . "\n";
	$mail_body .= "メールアドレス: " . $form_data['email'] . "\n";
	$mail_body .= "お問い合わせ内容:\n" . $form_data['message'] . "\n";

	// メール送信設定
	$user_email = $form_data['email']; // ユーザーのメールアドレス
	$subject = "株式会社クリア | メールフォームからのお問い合わせ";
	$headers = "From: " . mb_encode_mimeheader("株式会社クリア") . " <" . $admin_email . ">\n";
	$headers .= "Reply-To: " . $admin_email . "\n";
	$headers .= "X-Mailer: PHP/" . phpversion();

	// 管理者へのメール送信
	$admin_result = mb_send_mail($admin_email, $subject, $mail_body, $headers);

	// ユーザーへの自動返信メール送信
	$auto_reply_message = $form_data['name'] . " 様\n\n";
	$auto_reply_message .= "この度はお問い合わせを頂き、重ねてお礼申し上げます。\n";
	$auto_reply_message .= "折り返し担当者から返信が行きますので、しばらくお待ちください。\n";
	$auto_reply_message .= $mail_body;
	$auto_reply_message .= "\n\nこの度はお問い合わせを頂き、重ねてお礼申し上げます。\n";
	$auto_reply_message .= "-----------------------------------------------------------------------------------\n";
	$auto_reply_message .= "株式会社クリア\n";
	$auto_reply_message .= "東京都千代田区丸の内二丁目6番1号丸の内パークビルディング6F\n";
	$auto_reply_message .= "HP: https://clear-inc.site/\n";
	$auto_reply_message .= "-----------------------------------------------------------------------------------\n";
	$auto_reply_headers = "From: " . mb_encode_mimeheader("株式会社クリア") . " <" . $admin_email . ">\n";
	$auto_reply_headers .= "Reply-To: " . $admin_email . "\n";
	$auto_reply_headers .= "X-Mailer: PHP/" . phpversion();

	$user_result = mb_send_mail($user_email, $auto_reply_subject, $auto_reply_message, $auto_reply_headers);

	return $admin_result && $user_result;
}
