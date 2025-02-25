// $(document).ready(function(){
// 	const salaryData = {
// 			"Java": { base: 400, increment: 50 },
// 			"Python": { base: 420, increment: 55 },
// 			"JavaScript": { base: 380, increment: 45 }
// 	};

// 	$("#nextStep").click(function() {
// 			$("#step1").removeClass("active");
// 			$("#step2").addClass("active");
// 	});

// 	$("#calculate").click(function() {
// 			let language = $("#language").val();
// 			let experience = parseInt($("#experience").val());
// 			let communication = parseInt($("#communication").val());

// 			if (language in salaryData) {
// 					let baseSalary = salaryData[language].base;
// 					let increment = salaryData[language].increment * experience;
// 					let communicationBonus = communication * 10;
// 					let estimatedSalary = baseSalary + increment + communicationBonus;

// 					$("#result").text(`推定年収: ${estimatedSalary}万円`);
// 			} else {
// 					$("#result").text("データがありません");
// 			}
// 	});
// });

$(function () {
  // 変数に要素を入れる
  var open = $(".modal-open"),
    close = $(".modal-close"),
    container = $(".modal-container");

  //開くボタンをクリックしたらモーダルを表示する
  open.on("click", function () {
    container.addClass("active");
    return false;
  });

  //閉じるボタンをクリックしたらモーダルを閉じる
  close.on("click", function () {
    container.removeClass("active");
  });
});

$(function () {
  var count = $(".step").length; // 各ステップの数を取得
  var i = 0;

  function updateStep(index) {
    $(".active").removeClass("active");
    $(".step").eq(index).addClass("active");
  }

  // NEXTボタン
  $("#next").on("click", function () {
    if (i < count - 1) updateStep(++i);
  });

  // PREVボタン
  $("#prev").on("click", function () {
    if (i > 0) updateStep(--i);
  });
});
