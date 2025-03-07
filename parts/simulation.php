<div class="modal-overlay">
	<div class="modal-content">
		<div class="modal-content-wrapper">
			<span class="close-button">&times;</span>
			<h2>これまでの経験を入力してみましょう</h2>

			<!-- ステップバー -->
			<div class="step-bar">
				<div class="step-bar-progress"></div>
				<div class="step active" data-step="1">
					1
					<span class="step-label">スキル</span>
				</div>
				<div class="step" data-step="2">
					2
					<span class="step-label">コミュニケーション</span>
				</div>
				<div class="step" data-step="3">
					3
					<span class="step-label">結果</span>
				</div>
			</div>

			<!-- ステップ1: スキル選択 -->
			<div class="step-content active" id="step1">
				<div class="step-content-flex">
					<div class="form-group">
						<label for="language">スキル</label>
						<select id="language">
							<option value="">選択してください</option>
							<option value="JAVA">JAVA</option>
							<option value="C#/C#.NET">C#/C#.NET</option>
							<option value="GO/Kotlin">GO/Kotlin</option>
							<option value="Ruby">Ruby</option>
							<option value="Python">Python</option>
							<option value="Typescript">Typescript</option>
							<option value="React">React</option>
							<option value="Swift">Swift</option>
							<option value="Javascript">Javascript</option>
							<option value="PHP">PHP</option>
							<option value="VB.NET">VB.NET</option>
							<option value="C/C++">C/C++</option>
							<option value="COBOL">COBOL</option>
							<option value="物理/仮想サーバ">物理/仮想サーバ</option>
							<option value="クラウド">クラウド</option>
							<option value="ネットワーク">ネットワーク</option>
						</select>
					</div>

					<div class="form-group">
						<label for="experience">経験年数</label>
						<select id="experience">
							<option value="1年～2年">1年～2年</option>
							<option value="2年～3年">2年～3年</option>
							<option value="3年～4年">3年～4年</option>
							<option value="4年～5年">4年～5年</option>
							<option value="5年～6年">5年～6年</option>
							<option value="6年～7年">6年～7年</option>
							<option value="7年～8年">7年～8年</option>
							<option value="8年～9年">8年～9年</option>
							<option value="9年～10年">9年～10年</option>
							<option value="10年以上">10年以上</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="positions">ポジション/工程（複数選択可）</label>
					<div class="checkbox-group">
						<div class="checkbox-item">
							<input type="checkbox" id="pm" name="positions" value="プロジェクトマネージャー">
							<label for="pm">プロジェクトマネージャー</label>
						</div>
						<div class="checkbox-item">
							<input type="checkbox" id="pl" name="positions" value="プロジェクトリーダー">
							<label for="pl">プロジェクトリーダー</label>
						</div>
						<div class="checkbox-item">
							<input type="checkbox" id="rd" name="positions" value="要件定義">
							<label for="rd">要件定義</label>
						</div>
						<div class="checkbox-item">
							<input type="checkbox" id="bd" name="positions" value="基本設計">
							<label for="bd">基本設計</label>
						</div>
						<div class="checkbox-item">
							<input type="checkbox" id="dd" name="positions" value="詳細設計">
							<label for="dd">詳細設計</label>
						</div>
						<div class="checkbox-item">
							<input type="checkbox" id="impl" name="positions" value="実装/インフラ構築">
							<label for="impl">実装/インフラ構築</label>
						</div>
						<div class="checkbox-item">
							<input type="checkbox" id="maintenance" name="positions" value="運用保守">
							<label for="maintenance">運用保守</label>
						</div>
						<div class="checkbox-item">
							<input type="checkbox" id="test" name="positions" value="テスト">
							<label for="test">テスト</label>
						</div>
					</div>
				</div>

				<div class="button-group">
					<button class="next-button">次へ進む</button>
				</div>
			</div>

			<!-- ステップ2: コミュニケーションスキル -->
			<div class="step-content" id="step2">

				<div class="step-content-flex">
					<div class="form-group">
						<label for="communication">コミュニケーション</label>
						<select id="communication">
							<option value="普通">普通</option>
							<option value="苦手">苦手</option>
						</select>
					</div>
				</div>

				<div class="button-group">
					<button class="prev-button">前へ戻る</button>
					<button class="calculate-button">結果を見る</button>
				</div>
			</div>

			<!-- ステップ3: 結果 -->
			<div class="step-content" id="step3">
				<div class="result">
					<p>あなたのスキルと<br>経験に基づいた予想年収は</p>
					<div class="salary"><span id="salary-amount">0</span><span>です</span></div>
					<div id="selected-position" class="selected-info"></div>
				</div>

				<div class="button-group">
					<button class="restart-button">やり直す</button>
					<a href="<?= $base_url ?>/recruit_contact/">カジュアル面談へ進む</a>
				</div>
			</div>
		</div>
	</div>
</div>