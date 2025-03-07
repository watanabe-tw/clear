<?php include('../header.php'); ?>
<main>
	<section id="project" class="dis">
		<div class="container">
			<div class="projects_wrap">
				<div class="project_title">
					<h1 class="title"></h1>
				</div>
				<div class="projects_contents">
					<div class="development_type projects_content">
						<h2>開発種別</h2>
					</div>
					<div class="participation_system projects_content">
						<h2>参画体制</h2>
					</div>
					<div class="business_content projects_content">
						<h2>事業内容</h2>
					</div>
					<div class="development_env projects_content">
						<h2>開発環境</h2>
					</div>
					<div class="process projects_content">
						<h2>工程</h2>
					</div>
					<div class="location projects_content">
						<h2>作業場所</h2>
					</div>
				</div>
				<div class="link">
					<a href="<?= $base_url ?>/projects">一覧へ戻る →</a>
				</div>
			</div>
		</div>
		<?php include('other_parts.php'); ?>
	</section>
</main>
<?php include('../footer.php'); ?>

<script>
	// microcmsのブログ一覧API
	$(window).on("load", function () {
		fetch("https://rich.microcms.io/api/v1/projects?limit=100", {
			headers: {
				"X-API-KEY": "973755fdf4b84988984f7af0eb187120cd59",
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
				
				// ファイル名-1
				var target = dis[6];

				// タイトル
				var title = target.title;
				$(".title").append(title);

				// 開発種別
				var development_type = target.development_type;
				$(".development_type").append(`<p>${development_type}</p>`);

				// 事業内容
				var content = target.business_content;
				$(".business_content").append(`<p>${content}</p>`);

				// 開発環境
				var development_env = target.development_env;
				$(".development_env").append(`<p>${development_env}</p>`);

				// 工程
				var process = target.process;
				$(".process").append(`<p>${process}</p>`);

				// 作業場所
				var location = target.location;
				$(".location").append(`<p>${location}</p>`);

				// 参画体制
				var participation_system = target.participation_system;
				$(".participation_system").append(`<p>${participation_system}</p>`);

				setTimeout(function() {
					$(".projects_wrap").addClass("fade-in");
				}, 100);
			})
			.catch((e) => {
				console.log(e.message);
				$(".projects_wrap").addClass("fade-in");
			});
	});
</script>