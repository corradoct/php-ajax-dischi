<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="dist/app.css">
    <title>Dischi</title>
  </head>
  <body>

    <?php include __DIR__ . '/database.php'; ?>

    <div class="wrapper">

      <header>

        <div class="logo">
          <h1>Spotify</h1>
        </div>

      </header>

      <main>

        <div class="wrapperMain">

          <ul class="discList">

          <?php for ($i=0; $i < count($database); $i++) { ?>
            <?php $thisDisc = $database[$i]; ?>
            <li>
              <img src="<?php echo $thisDisc['poster']; ?>" alt="">
              <h4><?php echo $thisDisc['title']; ?></h4>
              <span><?php echo $thisDisc['author']; ?></span>
              <span><?php echo $thisDisc['year']; ?></span>
            </li>
          <?php } ?>

          </ul>

        </div>

      </main>

    </div>

  </body>
</html>
