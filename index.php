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

    <!-- Includo il database -->
    <?php include __DIR__ . '/database.php'; ?>

    <!-- Wrapper generale -->
    <div class="wrapper">

      <!-- Header -->
      <header>

        <!-- Logo -->
        <div class="logo">
          <h1>Spotify</h1>
        </div>
        <!-- Fine logo -->

      </header>
      <!-- Fine header -->

      <!-- Main -->
      <main>

        <!-- Wrapper main -->
        <div class="wrapperMain">

          <!-- Lista dischi -->
          <ul class="discList">

            <!-- Ciclo l'array del database con php e stampo i risultati -->
            <?php for ($i=0; $i < count($database); $i++) { ?>
              <?php $thisDisc = $database[$i]; ?>

              <!-- Disco singolo -->
              <li>

                <!-- Info cd -->
                <div class="cd">
                  <img src="<?php echo $thisDisc['poster']; ?>" alt="<?php echo $thisDisc['title']; ?>">
                  <h4><?php echo $thisDisc['title']; ?></h4>
                  <span><?php echo $thisDisc['author']; ?></span>
                  <span><?php echo $thisDisc['year']; ?></span>
                </div>
                <!-- Fine info cd -->

              </li>
              <!-- Fine disco singolo -->

            <?php } ?>
            <!-- Fine php -->

          </ul>
          <!-- Fine lista dischi -->

        </div>
        <!-- Fine wrapper main -->

      </main>
      <!-- Fine main -->

    </div>
    <!-- Fine wrapper generale -->

  </body>
</html>
