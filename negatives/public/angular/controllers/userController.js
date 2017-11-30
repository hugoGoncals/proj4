app.controller('userController', function($scope, $http, API_URL) {
    //retrieve employees listing from API
    
    $http.get(API_URL + "badget")
    .success(function(response) {
    	$scope.badgets = response;
    });


    $http.get(API_URL + "donation/sumDonations/5")
    .success(function(response) {
    	$scope.donations = response[0].sdon;
    });

    $http.get(API_URL + "donation/sumDonations/5")
    .success(function(response) {
    	$scope.don = response;
    });


});

