$(document).ready(function () {
  // ホストURLの取得関数
  function getHost() {
    const hosts = {
      localhost: "/clear",
      "192.168.3.34": "/clear",
      "watakuma21.xsrv.jp": "https://watakuma21.xsrv.jp/clear",
      "clear-inc.site": "https://clear-inc.site",
    };
    return hosts[window.location.hostname] || "";
  }

  // 年収データを保持する変数
  let salaryData = null;

  // JSONファイルを読み込む
  const host = getHost();
  $.getJSON(`${host}/assets/js/salary_simulation.json`, function (data) {
    salaryData = data;
  }).fail(function () {
    console.error("JSONデータの読み込みに失敗しました");
  });

  // 現在のステップ
  let currentStep = 1;

  // モーダルを開く
  $("#open-simulator").click(function () {
    $(".modal-overlay").css("display", "flex");
    setTimeout(function () {
      $(".modal-content").addClass("show");
    }, 10);
    updateStepBar();
  });

  // モーダルを閉じる
  $(".close-button").click(closeModal);

  // モーダルを閉じる関数
  function closeModal() {
    $(".modal-content").removeClass("show");
    setTimeout(function () {
      $(".modal-overlay").css("display", "none");
      resetSimulator();
    }, 500);
  }

  // シミュレーターをリセット
  function resetSimulator() {
    currentStep = 1;
    $("#language").val("");
    $("#experience").val("1年～2年");
    $("#communication").val("普通");

    // チェックボックスをリセット
    $('input[name="positions"]').prop("checked", false);

    // ステップ表示を更新
    $(".step-content").removeClass("active");
    $("#step1").addClass("active");
    $(".step").removeClass("active complete");
    $('.step[data-step="1"]').addClass("active");

    updateStepBar();
  }

  // ステップバーの更新
  function updateStepBar() {
    const progressPercentage = ((currentStep - 1) / 2) * 100;
    $(".step-bar-progress").css("width", progressPercentage + "%");

    $(".step").each(function () {
      const stepNum = $(this).data("step");
      if (stepNum < currentStep) {
        $(this).removeClass("active").addClass("complete");
      } else if (stepNum === currentStep) {
        $(this).addClass("active").removeClass("complete");
      } else {
        $(this).removeClass("active complete");
      }
    });
  }

  // 次へボタン
  $(".next-button").click(function () {
    // 入力チェック
    if (currentStep === 1 && $("#language").val() === "") {
      alert("プログラミング言語・スキルを選択してください");
      return;
    }

    // 選択されたポジション/工程を取得（複数選択可）
    const selectedPositions = [];
    $('input[name="positions"]:checked').each(function () {
      selectedPositions.push($(this).val());
    });

    // 入力チェック
    if (selectedPositions.length === 0) {
      alert("少なくとも1つのポジション/工程を選択してください");
      return;
    }

    currentStep++;
    $(".step-content").removeClass("active");
    $("#step" + currentStep).addClass("active");
    updateStepBar();
  });

  // 前へボタン
  $(".prev-button").click(function () {
    currentStep--;
    $(".step-content").removeClass("active");
    $("#step" + currentStep).addClass("active");
    updateStepBar();
  });

  // やり直しボタン
  $(".restart-button").click(function () {
    resetSimulator();
  });

  // 年収計算
  $(".calculate-button").click(function () {
    // 選択された値を取得
    const selectedLanguage = $("#language").val();
    const selectedExperience = $("#experience").val();
    const selectedCommunication = $("#communication").val();

    // 選択されたポジション/工程を取得（複数選択可）
    const selectedPositionsValue = [];
    $('input[name="positions"]:checked').each(function () {
      selectedPositionsValue.push($(this).val());
    });

    // 優先順位の高いポジションを取得
    const topPosition = getTopPosition(selectedPositionsValue);

    // JSONデータから年収を取得
    if (salaryData) {
      try {
        // 該当する年収範囲を取得
        const salaryRange =
          salaryData[selectedExperience][selectedLanguage][
            selectedCommunication
          ][topPosition];

        // 年収を表示
        $("#salary-amount").text(salaryRange);
      } catch (error) {
        console.error("年収データの取得に失敗しました", error);
        $("#salary-amount").text("データなし");
      }
    } else {
      $("#salary-amount").text("データ読込エラー");
      $("#selected-position").text("年収データの読み込みに失敗しました");
    }

    // 次のステップに進む
    currentStep++;
    $(".step-content").removeClass("active");
    $("#step" + currentStep).addClass("active");

    // 結果表示時は全てのステップをcompleteに
    if (currentStep === 3) {
      $(".step").removeClass("active").addClass("complete");
      $(".step-bar-progress").css("width", "100%");
    } else {
      updateStepBar();
    }
  });

  // 優先順位の高いポジションを取得する関数
  function getTopPosition(positions) {
    // ポジションの優先順位
    const positionPriority = [
      "プロジェクトマネージャー",
      "プロジェクトリーダー",
      "要件定義",
      "基本設計",
      "詳細設計",
      "実装/インフラ構築",
      "テスト",
      "運用保守",
    ];

    // 優先順位が最も高いポジションを探す
    let highestPriorityPosition = null;
    let highestPriorityIndex = Infinity;

    positions.forEach((position) => {
      const index = positionPriority.indexOf(position);
      if (index !== -1 && index < highestPriorityIndex) {
        highestPriorityIndex = index;
        highestPriorityPosition = position;
      }
    });

    return highestPriorityPosition;
  }
});
