<footer>

<?php
/**
 * サイトフッター
 * 
 * サイト共通のフッター部分を提供します。
 * 共通リンク、お問い合わせセクション、コピーライトを含みます。
 */

// contactページか確認（headerから関数を使用）
$is_contact_page = path_matches('contact', $current_path);

// contactページ以外で表示するコンテンツ
if (!$is_contact_page): ?>
<!-- コンタクトコンテンツ -->
<div class="footer_contact_wrap">
    <div class="footer_contact_contents">
        <div class="footer_contact_contents_title">
            <h2>
                <span class="footer_contact_contents_title_en">Contact</span>
                <span class="footer_contact_contents_title_jp">お問い合わせはメールフォームにて受け付けています。<br>お気軽にご連絡ください。</span>
            </h2>
        </div>
        <ul class="footer_contact_contents_link">
            <li>
                <a href="<?= $base_url ?>/recruit_contact" class="footer_contact_contents_link_a">
                    <span class="footer_contact_contents_link_img">
                        <img src="<?= $base_url ?>/assets/img/mail_icon.svg">
                    </span>
                    <p class="footer_contact_contents_link_text">求職者の方
                    </p>
                </a>
            </li>
            <li>
                <a href="<?= $base_url ?>/contact" class="footer_contact_contents_link_a">
                    <span class="footer_contact_contents_link_img">
                        <img src="<?= $base_url ?>/assets/img/mail_icon.svg">
                    </span>
                    <span class="footer_contact_contents_link_text">企業or求職者以外の方</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- 会社情報＆採用情報 -->
<div class="footer_company_wrap">
    <div class="footer_company_contents">
        <div class="footer_company_recruit">
            <ul class="footer_company_link">
                <li>
                    <a href="<?= $base_url ?>/recruit/">
                        <p>CLEARの採用情報</p>
                    </a>
                </li>
                <li>
                    <a href="<?= $base_url ?>/welfare/">
                        <p>福利厚生</p>
                    </a>
                </li>
            </ul>
            <div class="sns_link pc_only">
                <a href="https://twitter.com/clear_0129" target="_blank">
                    <img src="<?= $base_url ?>/assets/img/x.png" alt="">
                </a>
            </div>
        </div>
        <div class="footer_company_info">
            <object type="image/svg+xml" width="80" height="50" data="<?= $base_url ?>/assets/img/logo.svg"></object>
            <address>
                <span>
                    【本社】<br>東京都千代田区丸の内二丁目6番1号 丸の内パークビルディング6F
                </span>
                <span>
                    【大阪オフィス】<br>大阪府大阪市阿倍野区阿倍野筋1-1-43 あべのハルカス31F
                </span>
                <span>
                    【名古屋オフィス】<br>愛知県名古屋市中村区名駅1丁目1-1 JPタワー名古屋21F
                </span>
                <span>
                    【福岡オフィス】<br>福岡県福岡市博多区博多駅中央街8-1 JRJP博多ビル3F
                </span>
                <span>
                    【札幌オフィス】<br>北海道札幌市中央区大通西一丁目14-2 桂和大通ビル50 9F
                </span>
            </address>
        </div>
        <div class="sns_link sp_only">
                <a href="https://twitter.com/clear_0129" target="_blank">
                    <img src="<?= $base_url ?>/assets/img/x.png" alt="">
                </a>
        </div>
    </div>
    <p class="footer_company">
        ©
        <?php echo date('Y'); ?> CLEAR CO., LTD.
    </p>
</div>
<?php else: ?>
    <p class="footer_company">
        ©
        <?php echo date('Y'); ?> CLEAR CO., LTD.
    </p>
<?php endif; ?>
</footer>

<!-- 共通JavaScriptファイル -->
<script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/gsap@3.7.0/dist/gsap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/gsap@3.7.0/dist/ScrollTrigger.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<?php if ($is_contact_page): ?>
<script src="https://cdn.jsdelivr.net/npm/jquery.autokana@1.0.0/jquery.autoKana.min.js"></script>
<script src="<?= $base_url ?>/assets/js/contact.js"></script>
<?php endif; ?>
<script src="<?= $base_url ?>/assets/js/main.js"></script>
<script src="<?= $base_url ?>/assets/js/simulation.js"></script>

</body>
</html>