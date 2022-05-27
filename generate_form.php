<form class="p-3 pt-0 bg-light border fs-5" method="post" action="solve.php">
<?php for ($i = 1; $i <= $_SESSION['number']; $i++) : ?>
    <?php for ($j = 1; $j <= $_SESSION['number']; $j++) : ?>
        <input class="mt-3" style="font-size:16px; width: 75px;" required type="number" name="x<?=($j + ($i - 1) * $_SESSION['number'])?>" id="x<?=($j + ($i - 1) * $_SESSION['number'])?>"> ⋅ X<sub><?=$j?></sub>
        <?php if ($j == $_SESSION['number']) : ?>
            = <input class="mt-3" style="font-size:16px; width: 75px;" required type="number" name="y<?=$i?>" id="y<?=$i?>">
        <?php else : ?>+<?php endif ?>
    <?php endfor ?>
    <br>
<?php endfor ?>
<button class="mt-3 me-2 btn btn-outline-primary" type="submit" name="solve">Solve</button>
<a class="mt-3 btn btn-outline-secondary" href="input_number_of_unknowns.php">Back</a>
</form>