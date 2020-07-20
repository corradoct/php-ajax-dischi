// Inizializzo jQuery
var $ = require( "jquery" );

// Inizializzo Handlebars
var Handlebars = require( "handlebars" );

// Inizializzo il document ready
$(document).ready(
  function() {

    // Creo la variabile dell'URL base
    var urlBase = window.location.protocol + '//' + window.location.host;

    // Invoco la funzione per stampare  dischi senza un filtro
    printCds(urlBase, '');

    // Invoco la funzione per stampare le opzioni della select
    printSelect(urlBase);

    // Recupero la scelta dell'utente
    $('.selectAuthor').on('change',
      function() {
        var selectedAuthor = $(this).val();

        // Invoco la funzione per stampare la lista dei dischi filtrati dalla scelta dell'utente
        printCds(urlBase, selectedAuthor);
      }
    );
  }
);


// ****************************  FUNZIONI  ************************  //

// Funzione che effettua una chiamata Ajax ad un API
// Argomenti:
//          => authorFilter: Filtro scelto dall'utente
// Non ritorna nulla
function printCds(url, authorFilter) {

  // Resetto la lista dei dischi
  $('.discList').html('');

  // Effettuo la chiamata Ajax
  $.ajax(
    {
      url: url + '/php-ajax-dischi/server.php',
      method: 'GET',
      data: {
					author: authorFilter
				},
      success: function(dataResponse) {
        // Invoco la funzione per stampare i risultati
        printList(dataResponse);
      },
      error: function() {
        // Stampo un messaggio di errore
        $('.discList').append('Si sono verificati dei problemi, riprova più tardi');
      }
    }
  );
}

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

// Funzione che effettua una chiamata Ajax ad un API e stampa gli artisti nella select tramite Handlebars
// Non ritorna nulla
function printSelect(url) {
  $.ajax(
    {
      url: url + '/php-ajax-dischi/server.php',
      method: 'GET',
      data: {
        'author-list': 'true'
      },
      success: function(dataResponse) {
        var source = $('#select-template').html();
        var template = Handlebars.compile(source);
        if (dataResponse != null) {
          for (var i in dataResponse) {
            var thisAuthor = dataResponse[i];
            var context = {
              author: thisAuthor
            }
            var html = template(context);
            $('.selectAuthor').append(html);
          }
        }
      },
      error: function() {
        // Stampo un messaggio di errore
        $('.discList').append('Non ho trovato risultati');
      }
    }
  );
}
