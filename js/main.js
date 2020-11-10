function prikazi() {
    var x = document.getElementById("pregled");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
}

$('#btn-izbrisi').click( function(){
 
    const checked = $('input[type=radio]:checked');
    request = $.ajax({
      url:'handler/delete.php',
      type: 'post',
      data: {'teniserID': checked.val()}
    });
    request.done(function (response, textStatus, jqXHR) {
      if (response === 'Success') {
          checked.closest("tr").remove();
          console.log('Teniser je obrisan ');
          alert('Teniser je obrisan');
          //$('#izmeniForm').reset;
      } else {
          console.log('Teniser nije obrisan ' + response);
          alert('Teniser nije obrisan');
      }
  });
});

  $('#btnDodaj').submit(function() {
    $('#myModal').modal('toggle');
    return false;
  });

  $('#dodajForm').submit(function() {
    event.preventDefault();
    console.log("Ovde");
    const $form = $(this);
    const $inputs = $form.find('input, select, button');
    const serialzedData = $form.serialize();
    console.log(serialzedData);
    $inputs.prop('disabled', true);

    request = $.ajax ({
      url: 'handler/add.php',
      type: 'post',
      data: serialzedData
    });

    request.done(function(response, textStatus, jqXHR) {
      if(response === 'Success') {
        alert('Teniser je dodat');
        location.reload(true);
      }
      else console.log('Teniser nije dodat' + response);
      console.log(response);
    });
    request.fail(function(jqXHR, textStatus, errorThrown) {
      console.error('The following error occured: ' + textStatus, errorThrown);
    });
  });

