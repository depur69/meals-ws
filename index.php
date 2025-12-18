<?php
include_once 'config.php';
$meals = [];
$s = '';

if(isset($_GET['f'])) {
  $f = $_GET['f'];
  $url = $api_url . 'search.php?f=' . $f;
  $data = fetch_data($url);
  $meals = $data['meals'];
} else if(isset($_GET['s'])) {
  $s = $_GET['s'];
  $url = $api_url . 'search.php?s=' . $s;
  $data = fetch_data($url);
  $meals = $data['meals'];
}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meal Receipts</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Meal Receipts</h1>
  </header>
  <main>
    <section id="meal-index">
      <div class="meal-letters">
<?php
for ($i=65;$i<=90;$i++) {
  echo '<a href="?f=' . chr($i+32) . '">' . chr($i) . '</a> ';
}
?>
      </div>
      <div class="meal-search">
        <form action="">
          <input type="text" name="s" placeholder="Type something here ..." value="<?= $s ?>" required>
          <button type="submit">Submit</button>
        </form>
      </div>
    </section>
    <section id="meal-list">
<?php

if($meals) {
  echo '<div class="meal-container">';
  foreach ($meals as $meal) {
    echo '<div class="meal-card">';
    echo '<div class="meal-card-image">';
    echo '<img src="'.$meal['strMealThumb'].'" alt="'.$meal['strMeal'].'">';
    echo '</div>';
    echo '<div class="meal-card-title">';
    echo '<a href="detail.php?i='.$meal['idMeal'].'">'.$meal['strMeal'].'</a>';
    echo '</div>';
    echo '</div>';
  }
  echo '</div>';
} else {
  echo '<p class="meal-empty">Cari resep berdasarkan huruf awal atau kata kunci.</p>';
}

?>
    </section>
  </main>
</body>
</html>