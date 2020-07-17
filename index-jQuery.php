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

    <!-- Wrapper generale -->
    <div class="wrapper">

      <!-- Header -->
      <header>

        <!-- Logo -->
        <div class="logo">
          <h1>Spotify</h1>
        </div>
        <!-- Fine logo -->

        <!-- Selezione artista -->
        <div class="selezione">
          <select class="selectAuthor" name="">
            <option value="all">Seleziona artista</option>
          </select>
        </div>
        <!-- Fine selezione artista -->

      </header>
      <!-- Fine header -->

      <!-- Main -->
      <main>

        <!-- Wrapper main -->
        <div class="wrapperMain">

          <!-- Lista dischi -->
          <ul class="discList">

          </ul>
          <!-- Fine lista dischi -->

        </div>
        <!-- Fine wrapper main -->

      </main>
      <!-- Fine main -->

    </div>
    <!-- Fine wrapper generale -->

    <!-- Javascript -->
    <script type="text/javascript" src="dist/app.js"></script>

    <!-- Handlebars -->
    <script id="cd-template" type="text/x-handlebars-template">

      <!-- Disco singolo -->
      <li>

        <!-- Info cd -->
        <div class="cd">
          <img src="{{poster}}" alt="{{title}}">
          <h4>{{title}}</h4>
          <span>{{author}}</span>
          <span>{{year}}</span>
        </div>
        <!-- Fine info cd -->

      </li>
      <!-- Fine disco singolo -->

    </script>

    <script id="select-template" type="text/x-handlebars-template">

      <option value="{{author}}">{{author}}</option>

    </script>
    <!-- Fine Handlebars -->

  </body>
</html>
