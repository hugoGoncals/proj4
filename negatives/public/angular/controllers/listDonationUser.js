app.controller('listDonationUser', function($scope, $http, API_URL) {
    //retrieve employees listing from API

    $http.get(API_URL + "donation/listDonationsMadeByUser/5")
            .success(function(response) {
                $scope.donations = response;
            });

});