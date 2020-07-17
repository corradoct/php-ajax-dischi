// Inizializzo jQuery
var $ = require( "jquery" );

// Inizializzo Handlebars
var Handlebars = require( "handlebars" );

// Inizializzo il document ready
$(document).ready(
  function() {

    // Creo la chiamata ajax
    $.ajax(
      {
        url: 'http://localhost:8888/php-ajax-dischi/server.php',
        method: 'GET',
        success: function(dataResponse) {
          // Invoco la funzione per stampare i risultati
          printList(dataResponse);
          // Invoco la funzione per stampare gli artisti nella select
          printSelect(dataResponse);
        },
        error: function() {
          // Stampo un messaggio di errore
          $('.discList').append('Si sono verificati dei problemi, riprova più tardi');
        }
      }
    );

    $('.selectAuthor').on('change',
      function() {
        var selectedAuthor = $(this).val();
        console.log(selectedAuthor);
        if (selectedAuthor === 'all') {
          $('.discList').children('li').show();
        } else {
          $.ajax(
            {
              url: 'http://localhost:8888/php-ajax-dischi/server.php',
              method: 'GET',
              data: {
                
              },
              success: function(dataResponse) {
                console.log(dataResponse);
                $('.discList').html('');
                // Invoco la funzione per stampare i risultati
                printList(dataResponse);
              },
              error: function() {
                // Stampo un messaggio di errore
                $('.discList').append('Non ho trovato risultati');
              }
            }
          );
        }
      }
    );
  }
);


// ****************************  FUNZIONI  ************************  //

// Funzione per stampare i risultati tramite Handlebars
// Argomenti:
//          => results: Array contenente i risultati da stampare
// Non ritorna nulla
function printList(results) {

  // Se sono presenti risultati li stampo
  if (results != null) {
    var source = $('#cd-template').html();
    var template = Handlebars.compile(source);

    for (var i in results) {
      $thisDisc = results[i];
      var html = template($thisDisc);
      $('.discList').append(html);
    }
  } else {  //Altrimenti stampo un messaggio di errore
    $('.discList').append('Non ho trovato risultati');
  }
}

// Funzione per stampare gli artisti nella select tramite Handlebars
// Argomenti:
//          => results: Array contenente i risultati da stampare
// Non ritorna nulla
function printSelect(results) {

  // Se sono presenti risultati li stampo
  if (results != null) {
    var source = $('#select-template').html();
    var template = Handlebars.compile(source);

    for (var i in results) {
      $thisDisc = results[i];
      var html = template($thisDisc);
      $('.selectAuthor').append(html);
    }
  } else {  //Altrimenti stampo un messaggio di errore
    $('.selectAuthor').append('Non ho trovato risultati');
  }
}
