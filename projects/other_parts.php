<!-- other_parts.php - jQuery版スライダー -->
<div class="slider_section">
	<h2>関連プロジェクト</h2>
	<div class="slider_container">
		<div class="slider">
			<!-- スライダーの内容はjQueryで動的に生成されます -->
		</div>
		<div class="slider_nav">
			<button class="slider_prev" disabled>&lsaquo;</button>
			<div class="slider_dots">
				<!-- ドットナビゲーションはjQueryで生成 -->
			</div>
			<button class="slider_next">&rsaquo;</button>
		</div>
	</div>
</div>

<style>
	/* スライダー用スタイル - 最適化版 */
	.slider_section {
		margin: 0 0 4rem;
		padding: 0 2rem;
	}

	.slider_section h2 {
		font-size: 2.6rem;
		margin-bottom: 5rem;
		position: relative;
		text-align: center;
		font-weight: 700;
		letter-spacing: 0.05em;
	}

	.slider_section h2:after {
		content: '';
		position: absolute;
		bottom: -1.5rem;
		left: 50%;
		transform: translateX(-50%);
		width: 5rem;
		height: 0.3rem;
		background: linear-gradient(90deg, var(--blue), var(--gray));
		border-radius: 0.15rem;
	}

	.slider_container {
		position: relative;
		overflow: hidden;
		margin: 0 auto 0;
		max-width: 1280px;
	}

	.slider {
		display: flex;
		transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1);
		padding-top: 1rem;
	}

	.slider_item {
		min-width: 33.333%;
		/* 3つ表示 */
		padding: 0 1.5rem;
		box-sizing: border-box;
		transition: all 0.4s ease;
	}

	.slider_item:hover {
		transform: translateY(-8px);
	}

	.slider_item_inner {
		background-color: var(--white);
		border-radius: 1.2rem;
		padding: 2.8rem;
		height: max-content;
		box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
		border: 1px solid rgba(0, 0, 0, 0.4);
		transition: all 0.4s ease;
		cursor: pointer;
	}

	.slider_item_inner .description {
		margin-top: 2rem;
	}

	.slider_item_inner .description .description_flex {
		border-top: 1px solid rgba(193, 214, 216, 0.5);
		padding: 1.2rem 0;
		display: flex;
		align-items: flex-start;
	}

	.slider_item_inner .description .description_flex:first-child {
		border-top: none;
	}

	.slider_item_inner .description .description_flex p:first-child {
		width: 35%;
		font-weight: 600;
		color: #555;
		font-size: 1.3rem;
	}

	.slider_item_inner .description .description_flex p:last-child {
		width: 65%;
		font-size: 1.3rem;
		line-height: 1.6;
		color: #666;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		overflow: hidden;
		text-overflow: ellipsis;
		max-height: 4.2rem;
		/* line-height 1.6 × 2行分 + 少し余裕 */
	}

	.slider_item:hover .slider_item_inner {
		box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1);
	}

	.slider_item h3 {
		font-size: 1.8rem;
		margin-bottom: 1.8rem;
		font-weight: bold;
		color: var(--black);
		position: relative;
		padding-bottom: 1.5rem;
		line-height: 1.4;
	}

	.slider_item h3:after {
		content: '';
		position: absolute;
		bottom: 0;
		left: 0;
		width: 3.5rem;
		height: 3px;
		background-color: var(--blue);
		border-radius: 1.5px;
	}

	.slider_nav {
		display: flex;
		justify-content: center;
		align-items: center;
		margin-top: 4rem;
		padding-bottom: 1rem;
	}

	.slider_prev,
	.slider_next {
		background: var(--white);
		color: var(--black);
		border: none;
		width: 5rem;
		height: 5rem;
		border-radius: 50%;
		margin: 0 1.5rem;
		cursor: pointer;
		font-size: 3rem;
		transition: all 0.3s ease;
		box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
		display: flex;
		align-items: center;
		justify-content: center;
		outline: none;
	}

	.slider_prev:hover,
	.slider_next:hover {
		background: #f8f8f8;
		transform: translateY(-3px);
		box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
	}

	.slider_prev:disabled,
	.slider_next:disabled {
		opacity: 0.3;
		cursor: not-allowed;
		transform: none;
		box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
	}

	.slider_dots {
		display: flex;
		justify-content: center;
		margin: 0 2rem;
	}

	.slider_dot {
		width: 1rem;
		height: 1rem;
		border-radius: 50%;
		background: #ddd;
		margin: 0 0.6rem;
		cursor: pointer;
		transition: all 0.3s ease;
	}

	.slider_dot.active {
		background: var(--blue);
		transform: scale(1.3);
	}

	/* レスポンシブ対応の改善 */
	@media (max-width: 1200px) {
		.slider_item {
			min-width: 50%;
			/* 2つ表示 */
		}

		.slider_section h2 {
			font-size: 2.4rem;
		}
	}

	@media (max-width: 768px) {
		.slider_item {
			min-width: 70%;
			/* 1.5つ表示 - 次のスライドが少し見える */
		}

		.slider_item_inner {
			padding: 2.2rem;
		}

		.slider_section {
			margin: 0rem 0 3rem;
		}

		.slider_section h2 {
			font-size: 2.2rem;
			margin-bottom: 4rem;
		}

		.slider_prev,
		.slider_next {
			width: 3rem;
			height: 3rem;
			font-size: 1.6rem;
			margin: auto;
		}

		.slider_dots {
			margin: 0 .5rem;
		}
	}

	@media (max-width: 480px) {
		.slider_item {
			min-width: 90%;
			/* 中央に表示し、より広く表示 */
			padding: 0 1rem;
		}

		.slider_item_inner {
			padding: 2rem;
		}

		.slider_section h2 {
			font-size: 2rem;
		}

		.slider_dot {
			width: 1rem;
			/* ドットをまん丸に */
			height: 1rem;
			border-radius: 50%;
		}
	}
</style>

<script>
	$(document).ready(function() {
		// APIからデータを取得してスライダーを構築
		$.ajax({
				url: "https://rich.microcms.io/api/v1/projects?limit=100",
				headers: {
					"X-API-KEY": "973755fdf4b84988984f7af0eb187120cd59"
				},
				method: "GET",
				dataType: "json"
			})
			.done(function(json) {
				var projects = json.contents;

				// フィルタリングなしでプロジェクトをそのまま使用する
				var sliderProjects = projects;

				// プロジェクトが少ない場合は繰り返す
				if (sliderProjects.length < 8) {
					var repeats = Math.ceil(8 / sliderProjects.length);
					var originalLength = sliderProjects.length;

					for (var i = 1; i < repeats; i++) {
						for (var j = 0; j < originalLength && sliderProjects.length < 8; j++) {
							sliderProjects.push({
								...sliderProjects[j]
							});
						}
					}
				}

				// スライダーにプロジェクトを追加
				$.each(sliderProjects, function(index, project) {
					// テキストを2行までに制限する関数
					function limitTextToTwoLines(text, maxLength = 50) {
						if (!text) return '-';
						if (text.length <= maxLength) return text;
						return text.substring(0, maxLength) + '...';
					}

					// タイトルが長い場合は省略
					let displayTitle = limitTextToTwoLines(project.title, 30);

					// 各項目も2行までに制限
					let participation = limitTextToTwoLines(project.participation_system);
					let environment = limitTextToTwoLines(project.development_env);
					let process = limitTextToTwoLines(project.process);
					let location = limitTextToTwoLines(project.location);

					// プロジェクトのHTMLを構築
					var itemHtml = `
                <div class="slider_item">
                    <div class="slider_item_inner">
                        <a href="<?= $base_url ?>/projects/${index + 1}">
                            <h3>${displayTitle}</h3>
                            <div class="description">
                              <div class="description_flex">
                                <p>参画体制</p>
                                <p>${participation}</p>
                              </div>
                              <div class="description_flex">
                                <p>開発環境</p>
                                <p>${environment}</p>
                              </div>
                              <div class="description_flex">
                                <p>工程</p>
                                <p>${process}</p>
                              </div>
                              <div class="description_flex">
                                <p>作業場所</p>
                                <p>${location}</p>
                              </div>
                            </div>
                        </a>
                    </div>
                </div>
            `;

					$('.slider').append(itemHtml);
				});

				// スライダーの動作を初期化
				initSlider();
			})
			.fail(function(e) {
				console.error('データ取得エラー:', e.statusText);
			});

		function initSlider() {
			const $slider = $('.slider');
			const $prevButton = $('.slider_prev');
			const $nextButton = $('.slider_next');
			const $dotsContainer = $('.slider_dots');
			const $items = $('.slider_item');

			// レスポンシブ対応の設定
			let itemWidth, visibleItems, slideOffset;

			function updateSliderConfig() {
				const windowWidth = $(window).width();

				if (windowWidth > 1200) {
					visibleItems = 3;
					itemWidth = 33.333;
					slideOffset = 0; // 左端に揃える
				} else if (windowWidth > 768) {
					visibleItems = 2;
					itemWidth = 50;
					slideOffset = 0; // 左端に揃える
				} else if (windowWidth > 480) {
					visibleItems = 1.5; // 次のスライドが少し見える
					itemWidth = 70;
					slideOffset = 0; // 左端に揃える
				} else {
					visibleItems = 1;
					itemWidth = 90; // より広く表示する（80%から90%に変更）
					slideOffset = 5; // 中央に配置するための調整（10から5に変更）
				}

				// スライダー項目の幅を更新
				$items.css('min-width', itemWidth + '%');

				// ドットナビゲーションを再設定
				setupDots();

				// スライダーの位置を更新
				updateSliderPosition();
				updateButtonStates();
			}

			let currentIndex = 0;
			const totalItems = $items.length;
			let maxIndex;

			function updateMaxIndex() {
				maxIndex = Math.max(0, totalItems - Math.floor(visibleItems));
			}

			// ドットナビゲーションをセットアップ
			function setupDots() {
				// 既存のドットをクリア
				$dotsContainer.empty();

				// ドット数を計算
				updateMaxIndex();
				const dotsCount = Math.ceil(totalItems / Math.floor(visibleItems));

				// ドットを作成
				for (let i = 0; i < dotsCount; i++) {
					const dotClass = i === Math.floor(currentIndex / Math.floor(visibleItems)) ? 'slider_dot active' : 'slider_dot';
					const $dot = $('<div></div>').addClass(dotClass);

					$dot.on('click', function() {
						goToSlide(i * Math.floor(visibleItems));
					});

					$dotsContainer.append($dot);
				}
			}

			// ボタンの状態を更新
			function updateButtonStates() {
				$prevButton.prop('disabled', currentIndex <= 0);
				$nextButton.prop('disabled', currentIndex >= maxIndex);
			}

			// スライダーの位置を更新
			function updateSliderPosition() {
				const translateX = -(currentIndex * itemWidth) + slideOffset;
				$slider.css('transform', `translateX(${translateX}%)`);
			}

			// 前へボタンのクリックイベント
			$prevButton.on('click', function() {
				goToSlide(currentIndex - Math.ceil(visibleItems));
			});

			// 次へボタンのクリックイベント
			$nextButton.on('click', function() {
				goToSlide(currentIndex + Math.ceil(visibleItems));
			});

			// 特定のスライドに移動する関数
			function goToSlide(index) {
				updateMaxIndex();
				currentIndex = Math.max(0, Math.min(index, maxIndex));
				updateSliderPosition();
				updateButtonStates();
				updateActiveDot();
			}

			// アクティブなドットを更新
			function updateActiveDot() {
				const $dots = $('.slider_dot');
				const totalDots = $dots.length;

				// 最後のスライドに達したら最後のドットをアクティブにする
				let activeDotIndex;
				if (currentIndex >= maxIndex) {
					activeDotIndex = totalDots - 1; // 最後のドット
				} else {
					activeDotIndex = Math.min(
						Math.floor(currentIndex / Math.floor(visibleItems)),
						totalDots - 1
					);
				}

				$dots.removeClass('active');
				$dots.eq(activeDotIndex).addClass('active');
			}

			// タッチデバイス対応
			let touchStartX = 0;
			let touchEndX = 0;

			$slider.on('touchstart', function(e) {
				touchStartX = e.originalEvent.changedTouches[0].screenX;
			});

			$slider.on('touchend', function(e) {
				touchEndX = e.originalEvent.changedTouches[0].screenX;
				handleSwipe();
			});

			function handleSwipe() {
				const swipeDistance = Math.abs(touchEndX - touchStartX);
				const threshold = 50;

				if (swipeDistance > threshold) {
					if (touchEndX < touchStartX) {
						// 左スワイプ
						goToSlide(currentIndex + Math.ceil(visibleItems));
					} else {
						// 右スワイプ
						goToSlide(currentIndex - Math.ceil(visibleItems));
					}
				}
			}

			// 初期設定を適用
			updateSliderConfig();

			// ウィンドウリサイズ時に設定を更新
			$(window).resize($.debounce(200, updateSliderConfig));
		}

		// debounce関数の実装
		// jQueryに$.debounceがない場合の対策
		if (!$.debounce) {
			$.debounce = function(wait, func) {
				let timeout;
				return function() {
					const context = this;
					const args = arguments;
					clearTimeout(timeout);
					timeout = setTimeout(function() {
						func.apply(context, args);
					}, wait);
				};
			};
		}
	});
</script>