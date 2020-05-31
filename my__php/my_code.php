<?php include '../include/header.php'; ?>


<div class="linear" id="use_strict">
    <h1>Выводить по 3 статьи в блоке, в цикле</h1>

    <pre class="brush: php;">
		
		$num=0;
		$arr = [1,2,3,4,5,6,7,8,9,10];
		foreach  ($arr as $elem) {
			if($num % 3 == 0) { echo '<div id="r_block">'; }
				echo $elem;
				//разметка

			if($num % 3 == 2) { echo '</div>'; }
				$num++;
			}
			if($num % 3 != 0) { echo '<\/div>'; // закрывающий div}
		
    </pre>

</div>




<!--

    <div class="linear" id="use_strict">
        <h1>11111111111111111</h1>

        <h2>2222222222222222</h2>


        <p>3333333333333333333</p>

        <pre class="brush: js;">

        </pre>

        <ul class="ul_num">
            <li>44444444444444444444</li>

        </ul>

    </div>

-->



<?php include '../include/footer.php'; ?>
