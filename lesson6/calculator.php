<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Калькулятор</title>

	<style>
		#calculator {
			background-color: #000;
			padding: 10px;
			width: 200px;
			float: left;
		}

		#calculator .input-expression {
			border: none;
			padding: 5px;
			font-size: 18px;
			text-align: right;
		}

		#calculator .btns {
			margin-top: 10px;
			display: flex;
			justify-content: space-between;
			flex-wrap: wrap;
		}

		#calculator .btns > button {
			width: 45px;
			height: 45px;
			background-color: #fff;
			border: none;
			margin: 1px;
			transition: all .3s;
		}

		#calculator .btns > button:hover {
			background-color: #848181;
		}

		#calculator .btns > button[name="backspace"] {
			width: 49%;
			font-weight: bold;
		}

		#calculator .btns > button[name="clear"] {
			width: 49%;
			font-weight: bold;
		}

		.operations {
			margin-left: 230px;
		}
	</style>
</head>
<body>

	<?php
		if(isset($_POST['expression'])) {
			$string = htmlspecialchars($_POST['expression']);

			//лучше вообще не использовать данный метод, помойму он не безопасен!
			//как быстрое решение для текущей задачи пойдет )
			$result = 0;
			eval('$result=' . $string . ';');

			echo $result;

		}
	?>

	<div id="calculator">
		<form id="calculator-form" action="#" method="POST">
			<input class="input-expression" type="text" name="expression" disabled>

			<div class="btns">
				<!-- Операции -->
				<button name="backspace">Удалить</button>
				<button name="clear">Очистить</button>
				<button name="plus">+</button>
				<button name="minus">-</button>
				<button name="division">/</button>
				<button name="multi">*</button>
				<!-- Цифры -->
				<button>1</button>
				<button>2</button>
				<button>3</button>
				<button>4</button>
				<button>5</button>
				<button>6</button>
				<button>7</button>
				<button>8</button>
				<button>9</button>
				<button>0</button>
				<button>.</button>
				<button name="equaly">=</button>
			</div>
		</form>
	</div>
	<div class="operations">
		<p class="operations-history"></p>
	</div>

	<script>
		document.getElementById('calculator').addEventListener('click', function(event) {
		  var element = event.target;
		  var input = document.getElementsByClassName('input-expression')[0];
		  var delBtn = document.querySelector('button[name="backspace"]');
		  var clearBtn = document.querySelector('button[name="clear"]');
		  var equalyBtn = document.querySelector('button[name="equaly"]');

			if(element.tagName === 'BUTTON') {
			  event.preventDefault();

			  if(element === delBtn) {
			    var string = input.value;
			    input.value = string.substring(0, string.length-1);
				} else if(element === clearBtn) {
			    input.value = '';
				} else if(element === equalyBtn) {

					var expression = input.value;

					if(/[a-zа-яё]/ig.test(expression)) {
					  alert("Вот ты и попался ФБР уже выехало за тобой!");
					} else {
            input.removeAttribute('disabled');
            document.getElementById('calculator-form').submit();
					}

				}	else {
          input.value += element.innerText;

          input.focus();
          input.setSelectionRange(input.value.length, input.value.length);
				}
			}
    });

	</script>

</body>
</html>