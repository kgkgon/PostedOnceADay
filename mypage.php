<?php

//共通変数・関数ファイルを読込み
require('function.php');

debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「　ユーザーページ　');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debugLogStart();

// ログイン認証
require('auth.php');
// 現在マイページか判断するためのフラグ
$mypage_flg = (!empty($_SESSION['user_id'])) ? false : true;

?>
<?php
$siteTitle = (!empty($_SESSION['user_id'])) ? 'マイページ' : 'ユーザーページ';
require('head.php');
?>

<body>
	<!-- ヘッダー -->
	<?php require('header.php'); ?>

	<!-- メインコンテンツ -->
	<main>
		<div class="post-info">
			<span style="padding-left: 22%; margin-right: 24px;">投稿：90</span><span>いいね：120</span>
		</div>

		<div class="mypage-wrap">
			<!-- サイドバー -->
			<?php require('sidebar.php'); ?>

			<section class="my-contents">
				<?php 
					if(empty($_GET['menu'])){
						//投稿一覧
						require('postList.php');
					}elseif($_GET['menu'] === 'profEdit'){
						//プロフィール編集
						require('profEdit.php');
					}elseif($_GET['menu'] === 'passEdit'){
						//パスワード変更フォーム
						require('passEdit.php');
					}elseif($_GET['menu'] === 'withdraw'){
						//退会ポップアップ
						require('withdraw.php');
					}else{
						header("Location:mypage.php"); //マイページへ
					}
				?>
			</section>
		</div>
	</main>

	<!-- フッター -->
	<?php require('footer.php'); ?>