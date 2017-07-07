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
	  <div class='words'>
		<?= $this->data['msg'] ?? "" ?>
		  <table>
			<thead>
			  <tr>
				  <th>№</th>
				  <th>Дума</th>
				  <th>Превод</th>
				  <th>Транскрипция</th>
				  <th>Значения</th>
				  <th>Инструменти</th>
				</tr>
			</thead>
			<tbody>
   			<?php foreach($this->data['words'] as $word): ?>
			<tr>
				<td> <?= $word['id'] ?> </td>
				<td> <?= $word['original'] ?> </td>
				<td> <?= $word['translate'] ?> </td>
				<td> <?= $word['transcription'] ?> </td>
				<td> <?= "\n\t\t\t\t\t\t\t" ?>
				<?php $i = 0; ?>
				<?php foreach(json_decode($word['meaning']) as $k=>$v): ?>
					<?php $i++ ?>
					<?= $i.'.'.$k ?> <?= isset($v) && $v != NULL && strlen($v)>2 ? "(". $v .")" : "<span> - без подзначения</span>" ?> <BR>
				<?php endforeach; ?>
				</td>
				<td> 
				<a href='./?page=words&action=edit&id=<?= $word['id'] ?>'>Редакция</a>
				|
				<a href='./?page=words&action=delete&id=<?= $word['id'] ?>'>Изтрий</a>
				</td>
		  	</tr>
			<?php endforeach; ?>
			</tbody>
		  </table>
		</div>
	</section>
	<footer>
	<div class='contacts'>
		GSM: +359 876 777 343 | E-mail: thewinner10000001@gmail.com | Skype: just0nlin3_
	</div>

	Copyright &copy; <?= date('Y') != 2017 ? "2017-".date('Y') : "2017" ?> All Rights Reserved. Code by NGenchev
	</footer>
	</body>
</html>