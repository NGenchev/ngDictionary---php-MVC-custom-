<?php $params = $this->data['params']; ?>
<!doctype html>
<html> 
 <head>
 	<meta charset="utf-8">
 	<title> ngDictionary | <?= $this->data['title'] ?> </title>
 	<link rel="stylesheet" href="public/css/style1.css">
 	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
	 <div class='form'>	
		<form action='' method='POST'>
			<div class='headForm'>
			<?php if($this->data['msg']!=null): ?>
			<div class='msg'>
				<?= $this->data['msg'] ?>
			</div>
			<?php endif; ?>
			<input type='hidden' name='id' value='<?= $params['id'] ?? "" ?>' />
			Дума: 
			<input type='text' name='word' value='<?= $params['original'] ?? "" ?>' placeholder='Дума на български' />
			<BR> Превод: 
			<input type='text' name='translate' value='<?= $params['translate'] ?? "" ?>' placeholder='Превод на англисйки' />
			<BR> Транскрипция: 
			<input type='text' name='transcription' value='<?= $params['transcription'] ?? "" ?>' placeholder='Транскрипция' />
		</div>
		<div class='meanings'>
		<BR><strong>Значения: </strong> 
				<!-- <span id='addField' class='addMean'>    &nbsp;&nbsp;&nbsp;    </span> -->
				<span class='testMean' id='addField'>+</span>
			<BR><BR>
		<?php if(!empty($params['meaning'])): ?>
		  <?php foreach(json_decode($params['meaning']) as $k=>$v): ?>
			<input type='text' value='<?= $k ?>' name='meaning[]' placeholder='Общо значение' />
			<input type='text' name='subMeaning[]' value='<?= isset($v) ? substr($v.", ", 0, -2) : "" ?>' placeholder='Обяснения разделени със запетаи Пр.: едно, две, три' /> <BR>
		  <?php endforeach; ?>
		  	</div>
		 	<input type='submit' name='editWord' value='Редактирай дума!' />
		<?php else: ?>
		  <?php for($i = 1; $i <= 5; $i++): ?>
			<input type='text' name='meaning[]' placeholder='Общо значение' />
			<input type='text' name='subMeaning[]' placeholder='Обяснения разделени със запетаи Пр.: едно, две, три' />
			<BR>
		  <?php endfor; ?>
		  	</div>
			<input type='submit' name='addWord' value='Добави дума!' />
		<?php endif; ?>
		
		
		<script type='text/javascript'>
			$( document ).ready(function() {
			    $("#addField").click(function(){
			    	console.log("test");
					var minify = "<input type='text' name='meaning[]' placeholder='Общо значение' /><input type='text' name='subMeaning[]' placeholder='Обяснения разделени със запетаи Пр.: едно, две, три' /><BR>";
			    	$(minify).appendTo(".meanings");
			    	return false;
			    });	
			});
		</script>
		</form>
	  </div>
	</section>
	<footer>
	<div class='contacts'>
		GSM: +359 876 777 343 | E-mail: thewinner10000001@gmail.com | Skype: just0nlin3_
	</div>

	Copyright &copy <?= date('Y') != 2017 ? "2017-".date('Y') : "2017" ?> All Rights Reserved. Code by NGenchev
	</footer>

	
	</body>
</html>
			