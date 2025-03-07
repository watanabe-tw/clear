<?php include('../header.php'); ?>
<main>
	<section id="blog" class="dis">
		<div class="container">
			<div class="content_img">
			</div>
			<div class="content_date">
			</div>
			<h1 class="title">
			</h1>
			<div class="content">
			</div>
			<div class="link">
				<a href="<?= $base_url ?>/blog">ブログ一覧に戻る →</a>
			</div>
		</div>
	</section>
</main>
<?php include('../footer.php'); ?>

<script>
	// microcmsのブログ一覧API
	$(window).on("load", function () {
		fetch("https://clear.microcms.io/api/v1/blog?limit=100", {
			headers: {
				"X-API-KEY": "3a61ebc3-caa3-41d8-8628-65a5960a9316",
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
				var target = dis[7];

				var img = target.img.url + "?fit=max&w=1000&h=1000";
				var img_html =  `<img src="${img}" alt=''>`
				$(".content_img").append(img_html);

				var date = target.date;
				var date_html =  `<p class="date">${date}</p>`
				$(".content_date").append(date_html);

				var title = target.title;
				var title_html =  `<span>${title}</span>`
				$(".title").append(title_html);

				var content = target.content;
				$(".content").append(content);

				// 横並びにしたい場合。条件はfigureが2連続になる事
				var figures = $('.content figure');
				figures.each(function(index, figure) {
					var nextFigure = $(figure).next('.content figure');
					if (nextFigure.length) {
						// 次の要素も`figure.figure-item`の場合
						$(figure).add(nextFigure).wrapAll('<div class="flex-img"></div>');
					}
				});
			})
			.catch((e) => {
				console.log(e.message);
			});
	});
</script>