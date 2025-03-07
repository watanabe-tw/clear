<?php include('../header.php'); ?>
<main>
	<section id="qualification-support">
		<div class="container">
			<h1 class="title">
				<span class="en sl-txt" data-dire="top">Qualification</span>
				<span class="jp sl-txt" data-dire="top">資格取得支援制度</span>
			</h1>
			<!-- 検索・絞り込み機能 -->
			<div class="filter-section">
				<h2 class="filter-section-title">検索・絞り込み</h2>
				<div class="filter-container">
					<div class="filter-item">
						<label for="vendor-filter">認定団体で絞り込み:</label>
						<select id="vendor-filter">
							<option value="">すべて表示</option>
							<!-- JSで動的に追加 -->
						</select>
					</div>
					<div class="filter-item">
						<label for="cert-search">資格名称で検索:</label>
						<input type="text" id="cert-search" placeholder="キーワードを入力">
					</div>
				</div>
			</div>

			<div class="filter-results-section">
				<h2 class="filter-results-title">資格一覧</h2>
				<div class="qualification-support-pdf">
					<div class="filter-results">
						<span id="result-count"></span>
					</div>

					<table class="cert-table">
						<tr class="cert-header">
							<th class="vendor-col">認定団体</th>
							<th>資格名称</th>
						</tr>

						<!-- AWS -->
						<tr class="cert-row">
							<td class="vendor-col first">AWS (Amazon)</td>
							<td>
								<div class="cert-item">Solutions Architect – Professional</div>
								<div class="cert-item">DevOps Engineer – Professional</div>
								<div class="cert-item">Advanced Networking – Specialty</div>
								<div class="cert-item">Machine Learning – Specialty</div>
								<div class="cert-item">Security -Specialty</div>
								<div class="cert-item">Solutions Architect – Associate</div>
								<div class="cert-item">Developer – Associate</div>
								<div class="cert-item">SysOps Administrator – Associate</div>
								<div class="cert-item">Cloud Practitioner</div>
								<div class="cert-item">AWS Certified Data Engineer – Associate</div>
							</td>
						</tr>

						<!-- Azure -->
						<tr class="cert-row">
							<td class="vendor-col">Azure (Microsoft)</td>
							<td>
								<div class="cert-item">Azure Solutions Architect Expert</div>
								<div class="cert-item">DevOps Engineer Expert</div>
								<div class="cert-item">Power Platform Solution Architect Expert</div>
								<div class="cert-item">Azure for SAP Workloads Specialty</div>
								<div class="cert-item">Azure Cosmos DB Developer Specialty</div>
								<div class="cert-item">Azure Virtual Desktop Specialty</div>
								<div class="cert-item">Azure Security Engineer Associate</div>
								<div class="cert-item">Security Operations Analyst Associate</div>
								<div class="cert-item">Azure Developer Associate</div>
								<div class="cert-item">Azure AI Engineer Associate</div>
								<div class="cert-item">Azure Data Engineer Associate</div>
								<div class="cert-item">Azure Network Engineer Associate</div>
								<div class="cert-item">Identity and Access Administrator Associate</div>
								<div class="cert-item">Azure Database Administrator Associate</div>
								<div class="cert-item">Windows Server Hybrid Administrator Associate</div>
								<div class="cert-item">Azure Administrator Associate</div>
								<div class="cert-item">Azure Data Scientist Associate</div>
								<div class="cert-item">Azure AI Fundamentals</div>
								<div class="cert-item">Azure Data Fundamentals</div>
								<div class="cert-item">Azure Fundamentals</div>
								<div class="cert-item">Security, Compliance, and Identity Fundamentals</div>
							</td>
						</tr>

						<!-- Google Cloud -->
						<tr class="cert-row">
							<td class="vendor-col">Google Cloud</td>
							<td>
								<div class="cert-item">Professional Cloud Architect</div>
								<div class="cert-item">Professional Cloud Database Engineer</div>
								<div class="cert-item">Professional Cloud Developer</div>
								<div class="cert-item">Professional Data Engineer</div>
								<div class="cert-item">Professional Cloud DevOps Engineer</div>
								<div class="cert-item">Professional Cloud Security Engineer</div>
								<div class="cert-item">Professional Cloud Network Engineer</div>
								<div class="cert-item">Professional Google Workspace Administrator</div>
								<div class="cert-item">Professional Machine Learning Engineer</div>
								<div class="cert-item">Associate Cloud Engineer</div>
								<div class="cert-item">Cloud Digital Leader</div>
							</td>
						</tr>

						<!-- Cisco -->
						<tr class="cert-row">
							<td class="vendor-col">Cisco</td>
							<td>
								<div class="cert-item">CCNA (Cisco Certified Network Associate)</div>
								<div class="cert-item">DEVASC (Cisco Certified DevNet Associate)</div>
								<div class="cert-item">CCT (Cisco Certified CyberOps Associate)</div>
								<div class="cert-item">CCT (Cisco Certified Technician)</div>
							</td>
						</tr>

						<!-- Linux -->
						<tr class="cert-row">
							<td class="vendor-col">Linux</td>
							<td>
								<div class="cert-item">LPIC-3</div>
								<div class="cert-item">LPIC-2</div>
								<div class="cert-item">LPIC-1</div>
							</td>
						</tr>

						<!-- LPI-JAPAN -->
						<tr class="cert-row">
							<td class="vendor-col">LPI-JAPAN</td>
							<td>
								<div class="cert-item">LinuC-3</div>
								<div class="cert-item">LinuC-2</div>
								<div class="cert-item">LinuC-1</div>
							</td>
						</tr>

						<!-- OSS-DBシリーズ -->
						<tr class="cert-row">
							<td class="vendor-col">OSS-DBシリーズ：LPI-JAPAN</td>
							<td>
								<div class="cert-item">資格名称：OSS-DB Gold<br>試験名称：OSS-DB Exam Gold</div>
								<div class="cert-item">資格名称：OSS-DB Silver<br>試験名称：OSS-DB Exam Silver</div>
							</td>
						</tr>

						<!-- html5シリーズ -->
						<tr class="cert-row">
							<td class="vendor-col">html5シリーズ：LPI-JAPAN</td>
							<td>
								<div class="cert-item">HTML5プロフェッショナル認定 レベル2</div>
								<div class="cert-item">HTML5プロフェッショナル認定 レベル1</div>
							</td>
						</tr>

						<!-- VMware -->
						<tr class="cert-row">
							<td class="vendor-col">Vmware</td>
							<td>
								<div class="cert-item">
									資格名称：VCP (VMware Certified Professional)<br>
									試験名称<br>
									　①VCP-DCV (Data Center Virtualization)</br>
									　②VCP-NV (Network Virtualization)</br>
									　③VCP-DTM (Desktop and Mobility)</br>
									　④VCP-CMA (Cloud Management and Automation)
								</div>
							</td>
						</tr>

						<!-- 日立 JP1 -->
						<tr class="cert-row">
							<td class="vendor-col">日立 JP1</td>
							<td>
								<div class="cert-item">日立 JP1 認定エンジニア</div>
							</td>
						</tr>

						<!-- Palo Alto Networks -->
						<tr class="cert-row">
							<td class="vendor-col">Palo Alto Networks</td>
							<td>
								<div class="cert-item">Palo Alto Networks Certified Network Security Engineer (PCNSE)</div>
								<div class="cert-item">Prisma Certified Cloud Security Engineer (PCCSE)</div>
							</td>
						</tr>

						<!-- HPE -->
						<tr class="cert-row">
							<td class="vendor-col">HPE</td>
							<td>
								<div class="cert-item">HPE Accredited Solutions Expert (HPE ASE)</div>
								<div class="cert-item">HPE Accredited Technical Professional (HPE ATP)</div>
								<div class="cert-item">HPE Product Certified</div>
							</td>
						</tr>

						<!-- Zabbix -->
						<tr class="cert-row">
							<td class="vendor-col">Zabbix</td>
							<td>
								<div class="cert-item">Zabbix認定エキスパート</div>
								<div class="cert-item">Zabbix認定プロフェッショナル</div>
								<div class="cert-item">Zabbix認定スペシャリスト</div>
								<div class="cert-item">Zabbix認定ユーザー</div>
							</td>
						</tr>

						<!-- Javaシリーズ -->
						<tr class="cert-row">
							<td class="vendor-col">Javaシリーズ：ORACLE</td>
							<td>
								<div class="cert-category">Gold</div>
								<div class="cert-item">資格名称：Oracle Certified Java Programmer, Gold SE 11<br>試験名称：1Z0-816-JPN (Java SE 11
									Programmer II)</div>
								<div class="cert-item">資格名称：Oracle Certified Java Programmer, Gold SE 17<br>試験名称：1Z0-826-JPN (Java SE 17
									Programmer II)</div>
								<div class="cert-category">Silver</div>
								<div class="cert-item">資格名称：Oracle Certified Java Programmer, Silver SE<br>試験名称：1Z0-815-JPN (Java SE 11
									Programmer I)</div>
								<div class="cert-item">資格名称：Oracle Certified Java Programmer, Silver SE<br>試験名称：171Z0-825-JPN (Java SE
									17
									Programmer I)</div>
								<div class="cert-category">Bronze</div>
								<div class="cert-item">資格名称：Oracle Certified Java Programmer, Bronze SE<br>試験名称：1Z0-818-JPN (Java SE
									Bronze)</div>
							</td>
						</tr>

						<!-- Oracle Master -->
						<tr class="cert-row">
							<td class="vendor-col">Oracle (Oracle Master)</td>
							<td>
								<div class="cert-category">Gold</div>
								<div class="cert-item">資格名称：ORACLE MASTER Gold DBA 2019<br>試験名称：1Z0-083-JPN (Oracle Database
									Administration II)</div>
								<div class="cert-item">資格名称：ORACLE MASTER Gold DBA 2019<br>試験名称：1Z0-083-JPN (Oracle Database
									Administration II)</div>

								<div class="cert-category">Silver</div>
								<div class="cert-item">資格名称：ORACLE MASTER Silver DBA 2019<br>試験名称：1Z0-082-JPN (Oracle Database
									Administration I)</div>
								<div class="cert-item">資格名称：ORACLE MASTER Silver SQL 2019<br>試験名称：1Z0-071-JPN (SQL)</div>

								<div class="cert-category">Bronze</div>
								<div class="cert-item">資格名称：ORACLE MASTER Bronze DBA 2019<br>試験名称：1Z0-085-JPN (Bronze DBA Oracle
									Database
									Fundamentals)</div>
							</td>
						</tr>

						<!-- CompTIA -->
						<tr class="cert-row">
							<td class="vendor-col">CompTIA</td>
							<td>
								<div class="cert-item">ADDITIONAL PROFESSIONAL CompTIA<br>Project+</div>
								<div class="cert-item">CYBERSECURITY CompTIA<br>CySA+</div>
								<div class="cert-item">INFRASTRUCTURE CompTIA<br>Cloud+</div>
								<div class="cert-item">INFRASTRUCTURE CompTIA<br>Server+</div>
								<div class="cert-item">INFRASTRUCTURE CompTIA<br>Security+</div>
								<div class="cert-item">INFRASTRUCTURE CompTIA<br>Linux+</div>
							</td>
						</tr>

						<!-- Citrix -->
						<tr class="cert-row">
							<td class="vendor-col">Citrix</td>
							<td>
								<div class="cert-item">CCE-V (Citrix Certified Expert-Virtualization)</div>
								<div class="cert-item">CCP-V (Citrix Certified Professional-Virtualization)</div>
								<div class="cert-item">CCA-V (Associate-Virtualization)</div>
								<div class="cert-item">CCA-AppDS (Associate-Networking)</div>
							</td>
						</tr>

						<!-- サーティファイ -->
						<tr class="cert-row">
							<td class="vendor-col">サーティファイ情報処理能力認定委員会</td>
							<td>
								<div class="cert-item">C言語プログラミング能力認定試験 (2級)</div>
							</td>
						</tr>

						<!-- PHP -->
						<tr class="cert-row">
							<td class="vendor-col">PHP技術者認定機構</td>
							<td>
								<div class="cert-item">PHP8技術者認定試験 (上級)<br>PHP5技術者認定試験 (上級)</div>
								<div class="cert-item">PHP8技術者認定試験 (初級)<br>PHP7技術者認定試験 (初級)<br>PHP5技術者認定試験 (初級)</div>
							</td>
						</tr>

						<!-- Python -->
						<tr class="cert-row">
							<td class="vendor-col">一般社団法人Pythonエンジニア育成推進協会</td>
							<td>
								<div class="cert-item">Pythonエンジニア資格<br>Python 3 エンジニア認定実践試験</div>
								<div class="cert-item">Pythonエンジニア資格<br>Python 3 エンジニア認定基礎試験</div>
							</td>
						</tr>

						<!-- UMTP -->
						<tr class="cert-row">
							<td class="vendor-col">UMTP UMLモデリング推進協議会</td>
							<td>
								<div class="cert-item">UMTP-L3 (UMTP UML System Architect)</div>
								<div class="cert-item">UMTP-L2 (UMTP UML Advanced Modeler)</div>
								<div class="cert-item">UMTP-L1 (UMTP UML Fundamental Modeler)</div>
							</td>
						</tr>

						<!-- XML -->
						<tr class="cert-row">
							<td class="vendor-col">XML技術者育成推進委員会</td>
							<td>
								<div class="cert-item">XMLマスター (プロフェッショナル (データベース) )</div>
								<div class="cert-item">XMLマスター (プロフェッショナル (アプリケーション開発) )</div>
								<div class="cert-item">XMLマスター (ベーシック V2)</div>
							</td>
						</tr>

						<!-- 情報処理技術者試験 -->
						<tr class="cert-row">
							<td class="vendor-col">情報処理技術者試験</td>
							<td>
								<div class="cert-item">ITストラテジスト試験 (ST)</div>
								<div class="cert-item">システム監査技術者試験 (AU)</div>
								<div class="cert-item">プロジェクトマネージャ試験 (PM)</div>
								<div class="cert-item">システムアーキテクト試験 (SA)</div>
								<div class="cert-item">ITサービスマネージャ試験 (SM)</div>
								<div class="cert-item">ネットワークスペシャリスト試験 (NW)</div>
								<div class="cert-item">エンベデッドシステムスペシャリスト試験 (ES)</div>
								<div class="cert-item">情報処理安全確保支援士試験 (SC)</div>
								<div class="cert-item">データベーススペシャリスト試験 (DB)</div>
								<div class="cert-item">応用情報技術者試験 (AP)</div>
								<div class="cert-item">情報セキュリティマネジメント試験 (SG)</div>
								<div class="cert-item">基本情報技術者試験 (FE)</div>
							</td>
						</tr>

						<!-- ソフトウェア品質技術者 -->
						<tr class="cert-row">
							<td class="vendor-col">ソフトウェア品質技術者資格認定<br>(一般財団法人日本科学技術連盟)</td>
							<td>
								<div class="cert-item">JCSQE中級</div>
								<div class="cert-item">JCSQE初級</div>
							</td>
						</tr>

						<!-- IT検証 -->
						<tr class="cert-row">
							<td class="vendor-col">IT検証委委員会IVIA (IVEC)</td>
							<td>
								<div class="cert-item">アーキテクト (旧IT検証技術者レベル5相当)</div>
								<div class="cert-item">デザイナー (旧IT検証技術者レベル3、4統合)</div>
								<div class="cert-item">テスター (旧IT検証技術者レベル1、2統合)</div>
							</td>
						</tr>

						<!-- SEA/J -->
						<tr class="cert-row">
							<td class="vendor-col">SEA/J情報セキュリティ技術認定</td>
							<td>
								<div class="cert-item">CSPM of Technical</div>
								<div class="cert-item">CSPM of Management</div>
							</td>
						</tr>

						<!-- OMG -->
						<tr class="cert-row">
							<td class="vendor-col">OMG (Object Management Group)</td>
							<td>
								<div class="cert-item">OCUP2-Advanced (上級)</div>
								<div class="cert-item">OCUP2-Intermediate (中級)</div>
								<div class="cert-item">OCUP2-Fundamental (初級)</div>
							</td>
						</tr>

						<!-- ドットコムマスター -->
						<tr class="cert-row">
							<td class="vendor-col">ドットコムマスター：NTT com</td>
							<td>
								<div class="cert-item">ドットコムマスター アドバンス ダブルスター</div>
								<div class="cert-item">ドットコムマスター アドバンス シングルスター</div>
							</td>
						</tr>

						<!-- インターネットスキル -->
						<tr class="cert-row">
							<td class="vendor-col">インターネットスキル認定普及協会</td>
							<td>
								<div class="cert-item">ウェブデザイン技能検定 1級</div>
								<div class="cert-item">ウェブデザイン技能検定 2級</div>
								<div class="cert-item">ウェブデザイン技能検定 3級</div>
							</td>
						</tr>

						<!-- キャリアコンサルティング -->
						<tr class="cert-row">
							<td class="vendor-col">キャリアコンサルティング協会・日本キャリア開発協会</td>
							<td>
								<div class="cert-item">キャリアコンサルタント試験</div>
							</td>
						</tr>

						<!-- 日本ディープラーニング -->
						<tr class="cert-row">
							<td class="vendor-col">日本ディープラーニング協会</td>
							<td>
								<div class="cert-item">E資格</div>
								<div class="cert-item">G検定</div>
							</td>
						</tr>

						<!-- モバイルコンピューティング -->
						<tr class="cert-row">
							<td class="vendor-col">モバイルコンピューティング推進コンソーシアム</td>
							<td>
								<div class="cert-item">モバイルシステム技術検定 1級</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
	</section>
</main>
<!-- フィルタリング用の JavaScript -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const table = document.querySelector('.cert-table');
		const rows = Array.from(table.querySelectorAll('.cert-row'));
		const vendorFilter = document.getElementById('vendor-filter');
		const certSearch = document.getElementById('cert-search');
		const resultCount = document.getElementById('result-count');

		// 認定団体リストを動的に生成
		const vendors = new Set();
		rows.forEach(row => {
			const vendorName = row.querySelector('.vendor-col').textContent.trim();
			vendors.add(vendorName);
		});

		// 認定団体をアルファベット順にソート
		const sortedVendors = Array.from(vendors).sort((a, b) => a.localeCompare(b, 'ja'));

		// セレクトボックスに認定団体を追加
		sortedVendors.forEach(vendor => {
			const option = document.createElement('option');
			option.value = vendor;
			option.textContent = vendor;
			vendorFilter.appendChild(option);
		});

		// フィルタリング関数
		function filterTable() {
			const selectedVendor = vendorFilter.value;
			const searchText = certSearch.value.toLowerCase();
			let visibleCount = 0;

			rows.forEach(row => {
				const vendor = row.querySelector('.vendor-col').textContent.trim();
				const certItems = Array.from(row.querySelectorAll('.cert-item'));
				const certTexts = certItems.map(item => item.textContent.toLowerCase());

				// 認定団体フィルタと検索テキストの両方に一致するか確認
				const vendorMatch = !selectedVendor || vendor === selectedVendor;
				const textMatch = !searchText || certTexts.some(text => text.includes(searchText));

				if (vendorMatch && textMatch) {
					row.style.display = '';

					// 検索テキストがある場合、一致する資格名だけを表示
					if (searchText) {
						certItems.forEach(item => {
							if (item.textContent.toLowerCase().includes(searchText)) {
								item.style.display = '';
								item.classList.add('highlight');
							} else {
								item.style.display = 'none';
							}
						});
					} else {
						// 検索テキストがない場合、すべての資格名を表示
						certItems.forEach(item => {
							item.style.display = '';
							item.classList.remove('highlight');
						});
					}

					visibleCount++;
				} else {
					row.style.display = 'none';
				}
			});

			// 結果数を表示
			resultCount.textContent = `${visibleCount}件の認定団体が見つかりました`;
		}

		// イベントリスナーを追加
		vendorFilter.addEventListener('change', filterTable);
		certSearch.addEventListener('input', filterTable);

		// 初期表示時の結果数を設定
		resultCount.textContent = `${rows.length}件の認定団体が表示されています`;
	});
</script>
<?php include('../footer.php'); ?>