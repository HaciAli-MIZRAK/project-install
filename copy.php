<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico" />
		<title>veriTakip Bilişim Proje Kurulum Sayfası</title>
		<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet" />
	</head>
	<body>
		<div class="container">
		  <div class="jumbotron mt-3">
			<h1>veriTakip Bilişim Proje Oluşturma Paneli</h1>
			<p class="lead">Bu sayfa Yardımı ile Hızlı ve Basitçe Projenizi Oluşturabilirisiniz!</p>
			<a class="btn btn-lg btn-primary" href="?d=copy" role="button">Proje Dosyalarını Kopyala &raquo;</a>
			<a class="btn btn-lg btn-primary" href="?d=unzip" role="button">Proje Dosyalarını Çıkar &raquo;</a>
			<a class="btn btn-lg btn-primary" href="?d=move" role="button">Proje Dosyalarını Ana Dizine Taşı &raquo;</a>
		  </div>
		</div>
  </body>
</html>



<?php
$file = '<zipli proje yolu>';

if(@$_GET['d'] == 'copy'):
	if(copy($file, 'proje.zip')) {
		echo "<h1>Proje Kopyalandı!</h1>";	
	}else{
		echo "<h1>Hata Oluştu.</h1>";
	}
endif;
if(@$_GET['d'] == 'unzip'):
	$zip = new ZipArchive;
	$res = $zip->open('proje.zip');
	if ($res === TRUE) {
		$zip->extractTo('./');
		$zip->close();
		echo '<h1>Proje Arşivden Çıkarıldı</h1>';
	} else {
		echo '<h1>Hata Oluştu</h1>';
	}
endif;
if(@$_GET['d'] == 'move'):
	$files = scandir("proje");
	$oldfolder = "proje/";
	$newfolder = "./";
	foreach($files as $fname) {
		if($fname != '.' && $fname != '..') {
			rename($oldfolder.$fname, $newfolder.$fname);
		}
	}
	echo '<h1>Proje Dosyaları Taşındı</h1>';
endif;
?>
