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

$('#btnIzmeni').click(function () {
  const checked = $('input[name=checked]:checked');

  request = $.ajax({
      url: 'handler/get.php',
      type: 'post',
      data: {'teniserID': checked.val()},
      dataType: 'json'
  });

  request.done(function (response, textStatus, jqXHR) {
      console.log('Popunjena');
      $('#imePr').val(response[0]['imePrezime']);
      console.log(response[0]['imePrezime']);

      $('#datRodj').val(response[0]['datumRodjenja'].trim());
      console.log(response[0]['datumRodjenja'].trim());

      $('#drzava').val(response[0]['drzavaPorekla'].trim());
      console.log(response[0]['drzavaPorekla'].trim());

      $('#brTitula').val(response[0]['brojTitula'].trim());
      console.log(response[0]['brojTitula'].trim());

      $('#teniserid').val(checked.val());

      console.log(response);
  });

  request.fail(function (jqXHR, textStatus, errorThrown) {
      console.error('The following error occurred: ' + textStatus, errorThrown);
  });

});

$('#izmeniForm').submit(function () {
  event.preventDefault();
  console.log("Izmene");
  const $form = $(this);
  const $inputs = $form.find('input, select, button');
  const serializedData = $form.serialize();
  console.log(serializedData);
  $inputs.prop('disabled', true);

  request = $.ajax({
      url: 'handler/update.php',
      type: 'post',
      data: serializedData
  });

  request.done(function (response, textStatus, jqXHR) {
      if (response === 'Success') {
          console.log('Teniser je izmenjen');
          location.reload(true);
          //$('#izmeniForm').reset;
      }
      else console.log('Teniser nije izmenjen ' + response);
      console.log(response);
  });

  request.fail(function (jqXHR, textStatus, errorThrown) {
      console.error('The following error occurred: ' + textStatus, errorThrown);
  });
});

  $('#btnDodaj').submit(function() {
    $('#myModal').modal('toggle');
    return false;
  });

  
  $('#btnIzmeni').submit(function() {
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
