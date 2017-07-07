<!doctype html>
<html> 
 <head>
 	<meta charset="utf-8">
 	<title> ngDictionary | <?= $this->data['title'] ?> </title>
 	<link rel="stylesheet" href="public/css/style1.css">
 </head>
 <body>
 	<h1> GenchevDictionary </h1>
 	<h3> Welcome to my personal dictionary </h3>
 	<nav>
		<a href="./index.php?page=home">Начало</a> | 
		<a href="./?page=words&action=index">Всички думи</a> | 
		<a href="./?page=words&action=add">Добави дума</a>
	</nav>
	<section>
		<?= $this->data['html'] ?>
	</section>
	<footer>
	<div class='contacts'>
		GSM: +359 876 777 343 | E-mail: thewinner10000001@gmail.com | Skype: just0nlin3_
	</div>

	Copyright &copy <?= date('Y') != 2017 ? "2017-".date('Y') : "2017" ?> All Rights Reserved. Code by NGenchev
	</footer>
	</body>
</html>
			