$(document).ready(function () {
  // 自動かな入力の設定
  $.fn.autoKana("#name", "#kana", {
    katakana: false, // ひらがなで出力
  });

  // 郵便番号検索ボタンのクリックイベント
  $("#zip-search").on("click", function () {
    searchAddressByZipcode();
  });

  // 郵便番号入力欄でEnterキーを押したときにも住所検索を実行
  $("#zip").on("keydown", function (e) {
    if (e.key === "Enter") {
      e.preventDefault(); // フォーム送信を防止
      searchAddressByZipcode();
    }
  });

  // 郵便番号から住所を検索する関数
  function searchAddressByZipcode() {
    let zipcode = $("#zip").val();

    // 入力値がない場合は処理しない
    if (!zipcode) return;

    // ハイフンを削除して7桁の数字かどうかチェック
    zipcode = zipcode.replace(/-/g, "");
    if (!/^\d{7}$/.test(zipcode)) {
      alert("郵便番号は7桁の数字で入力してください");
      return;
    }

    // 住所入力欄を読み込み中の状態に
    $("#address").val("住所を検索中...");
    $("#address").addClass("address-loading");
    $("#address").prop("disabled", true);

    // 3桁-4桁の形式に変換
    const formattedZipcode =
      zipcode.substring(0, 3) + "-" + zipcode.substring(3);
    $("#zip").val(formattedZipcode);

    // 郵便番号APIを使用して住所を取得
    $.ajax({
      url: "https://zipcloud.ibsnet.co.jp/api/search",
      type: "GET",
      dataType: "jsonp",
      data: {
        zipcode: zipcode,
      },
      success: function (data) {
        // 住所入力欄を通常の状態に戻す
        $("#address").prop("disabled", false);
        $("#address").removeClass("address-loading");

        if (data.status === 200 && data.results) {
          // 取得した住所を結合して表示
          const address = data.results[0];
          $("#address").val(
            address.address1 + address.address2 + address.address3
          );
        } else {
          // エラーメッセージを表示
          $("#address").val("");
          alert(
            "郵便番号から住所を取得できませんでした。正しい郵便番号を入力してください。"
          );
        }
      },
      error: function (xhr, status, error) {
        // エラー時の処理
        $("#address").prop("disabled", false);
        $("#address").removeClass("address-loading");
        $("#address").val("");
        alert("通信エラーが発生しました。時間をおいて再度お試しください。");
        console.error("Error:", error);
      },
    });
  }
});