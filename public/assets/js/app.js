let app = {
    apiUrl: location.href.replace(/[^/]*$/, ''),

    init: function() {
        console.log('init');
        // Variable
        let hiveID;

        //Bind events
        $('#add-hive-new').click(app.eventAddHive);
        $('.update-hive').click(app.eventEditHive);
        $('.delete-hive').click(app.eventDeleteHive);
        $('#update-hive').click(app.updateHive);
    },
    eventAddHive : function(evt) {
        console.log('lancement add hive');

        let $formElement = $('.form-add-hive');

        let $inputElementName = $formElement.find('input[name="nameHive"]');
        let inputValueName = $inputElementName.val();

        let $inputElementLat = $formElement.find('input[name="lat"]');
        let inputValueLat = $inputElementLat.val();

        let $inputElementLong = $formElement.find('input[name="long"]');
        let inputValueLong = $inputElementLong.val();

        console.log('NAME:'+ inputValueName);
        console.log('LAT:'+ inputValueLat);
        console.log('LONG:'+ inputValueLong);

    // On envoie la requête Ajax pour ajouter la nouvelle ruche avec l'API
    $.ajax(
        {
          url: app.apiUrl + 'hive/new', // URL sur laquelle faire l'appel Ajax
          method: 'POST', // La méthode HTTP souhaité pour l'appel Ajax (GET ou POST)
          dataType: 'json', // Le type de données attendu en réponse (text, html, xml, json),
          data: { // (optionnel) Tableau contenant les données à envoyer avec la requête
            nameHive: inputValueName,
            latitude: inputValueLat,
            longitude: inputValueLong
          }
        }
      ).done(
        function(response) {
          console.log(response);
  
          if (response.success) {
            console.log('success');
            location.reload();
            return response;
          } else {
            alert(response.errorMessage);
          }
        }
      ).fail(
        function() {
          alert('Réponse ajax incorrecte');
        }
      );
  
      console.log(inputValueName);
    },
    eventEditHive : function(evt) {
        console.log('lancement edit hive');
        let hiveObj = $(evt.target).closest("tr");
        app.hiveID = hiveObj.find('.id').attr('id');
        let hiveName = hiveObj.find(".hive-name").html();
        let hiveLatitude = hiveObj.find(".hive-latitude").html();
        let hiveLongitude = hiveObj.find(".hive-longitude").html();

        // Update valeurs fenêtre modale
        $('body').find('#updateNameHive').val(hiveName);
        $('body').find('#updateLong').val(hiveLongitude);
        $('body').find('#updateLat').val(hiveLatitude);
        $('#updateHive').modal('show');

    },
    updateHive : function() {

        let $formElement = $('.form-update-hive');

        let $inputElementName = $formElement.find('input[name="nameHive"]');
        let inputValueName = $inputElementName.val();

        let $inputElementLat = $formElement.find('input[name="lat"]');
        let inputValueLat = $inputElementLat.val();

        let $inputElementLong = $formElement.find('input[name="long"]');
        let inputValueLong = $inputElementLong.val();

    // On envoie la requête Ajax pour mettre à jour la ruche avec l'API
    $.ajax(
        {
          url: app.apiUrl + 'hives/'+ app.hiveID +'/update', // URL sur laquelle faire l'appel Ajax
          method: 'POST', // La méthode HTTP souhaité pour l'appel Ajax (GET ou POST)
          dataType: 'json', // Le type de données attendu en réponse (text, html, xml, json),
          data: { // (optionnel) Tableau contenant les données à envoyer avec la requête
            nameHive: inputValueName,
            latitude: inputValueLat,
            longitude: inputValueLong
          }
        }
      ).done(
        function(response) {
          console.log(response);
  
          if (response.success) {
            console.log('success');
            location.reload();
            return response;

          } else {
            alert(response.errorMessage);
          }
        }
      ).fail(
        function() {
          alert('Réponse ajax incorrecte');
        }
      );

    },
    eventDeleteHive : function() {
        let hiveObj = $(this);
        let hiveID = hiveObj.attr("id");
        console.log(hiveID);
        console.log('lancement delete hive');

        $.ajax(
          {
            url: app.apiUrl + 'hives/'+hiveID+'/delete' , // URL sur laquelle faire l'appel Ajax
            method: 'POST', // La méthode HTTP souhaité pour l'appel Ajax (GET ou POST)
            dataType: 'json', // Le type de données attendu en réponse (text, html, xml, json),
            data: { // (optionnel) Tableau contenant les données à envoyer avec la requête
              id: hiveID
            }
          }
        ).done(
          function(response) {
            console.log(response);

            if (response.success) {
              
              console.log('success');
              location.reload();  
              return response;
  
            } else {
              alert(response.errorMessage);
            }
          }
        ).fail(
          function() {
            alert('Réponse ajax incorrecte');
          }
        );

    },
  // #######################################################################
  // closeAddListModal function
  // #######################################################################
  closeAddListModal: function() {
    let $modal = $('#exampleModal');
    $modal.attr("data-dismiss","modal");
  }

};

$(app.init);