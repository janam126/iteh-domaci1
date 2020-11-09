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
  //$('input[type=radio]:checed').closest.remove();
  });

