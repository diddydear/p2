<?php
require 'helper.php';
require 'logic.php';
?>
<!doctype html>
<html lang="en">
<head>

    <title>Friend Finder</title>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href='style.css' rel='stylesheet'>

</head>

<body>


<h1>Friend Finder</h1>
<form method="POST" action="index.php">
    <div>
        <label> Search for Friends close by - Abuja, Benue, Lagos, Niger, Rivers<br>
            <input type="text" name="searchMe" value="<?= sanitize($searchMe); ?>">
        </label>
    </div>
    <div>
        <label> Load Location Map
            <input type="checkbox" name="loadMap" value="1" <?= $loadMap ? 'checked' : '' ?>>
        </label>
    </div>
    <div>
        <label>Friend's Info </label>

        <select name='showData' id='showData'>
            <option value='' <?php if ($showData == '') echo 'selected' ?>>I just want a summary</option>
            <option value='true' <?php if ($showData == 'true') echo 'selected' ?>>Show Me Friend's Info</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Search Now">
    </div>

</form>

<?php if ($searchMe): ?>
    <div>You search for a friend around <em><?= sanitize($searchMe); ?></em></div>
<?php else: ?>
    <div>Welcome to Friend Finder, Enter a location to search for a friend close to you.</div>
<?php endif; ?>

<div>
    <?php if ($haveResults): ?>
        <?php foreach ($friends as $location => $friend): ?>

            <div class="friend pad">
                <h3><?= $friend ['name'] ?></h3> <br> Location: <?= $location ?> - <?= $friend ['area'] ?><br>
                <?php if ($showData == true): ?>
                    <b> ME IN 30seconds</b> <p> <?= $friend ['about'] ?></p>
                <?php endif; ?><br>
                <img src='<?= $friend ['display_pic'] ?>' class="img-left" width="450"
                     alt='Friend from around <?= $location ?>'>

                <?php if (isset ($_POST ['loadMap'])): ?>
                    <iframe src="https://maps.google.com/maps?q=<?= $friend ['long'] ?>,<?= $friend ['lat'] ?>&hl=es;z=14&amp;output=embed"
                            class="map" width="600" height="600" style="border:0"></iframe>
                <?php endif; ?>

            </div>

        <?php endforeach ?>
    <?php elseif ($searchMe): ?>
        No Friend Found
    <?php endif; ?>
</div>

</body>
</html>