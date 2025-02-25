<?php include('../header.php'); ?>
<main>
	<section id="annual_income">
		<div class="container">
			<div class="flex">
				<h1 class="title"></h1>
				<div class="flex-right">
					<div class="name"></div>
					<div class="annual_income"></div>
				</div>
			</div>
			<div class="content_img"></div>
			<div class="interview"></div>
			<div class="link"><a href="<?= $newURL ?>/annual-income">年収アップ実績一覧に戻る →</a></div>
		</div>
	</section>
</main>
<?php include('../footer.php'); ?>

<script>
	// microcmsのブログ一覧API
	$(window).on("load", function () {
		fetch("https://flat.microcms.io/api/v1/interview?limit=100", {
			headers: {
				"X-API-KEY": "c1908ad5-e67c-45a8-8bed-0135746f5424",
			},
		})
			.then((response) => {
				if (response.ok) {
					return response.json();
				} else {
					return Promise.reject(new Error("something wrong"));
				}
			})
			.then((json) => {
				var dis = json.contents;
				// 1番目の要素だけを取り出す
				var target = dis[2];

				// 画像
				var img = target.img2.url + "?fit=max&w=1000&h=1000";
				var img_html =  `<img src="${img}" alt=''>`
				$(".content_img").append(img_html);

				// 年収
				var annual_income = target.annual_income;
				var annual_income_html =  `<div>${annual_income}</div>`
				$(".annual_income").append(annual_income_html);

				// 名前
				var name = target.name;
				var name_html =  `<p>${name}</p>`
				$(".name").append(name_html);

				// タイトル
				var title = target.title;
				var title_html =  `<span>${title}</span>`
				$(".title").append(title_html);

				// インタビュー
				var interview = target.interview;
				$(".interview").append(interview);

			})
			.catch((e) => {
				console.log(e.message);
			});
	});
</script>