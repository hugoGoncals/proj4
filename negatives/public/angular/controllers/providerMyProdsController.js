app.controller('providerMyProdsController', function($scope, $http, API_URL) {

    $http.get(API_URL + "product/listProductByProvider/3")
    .success(function(response) {
        $scope.products = response;
    }); 

    $http.get(API_URL + "product/listProductstatus/3")
    .success(function(response) {
        $scope.produtos = response;
    }); 


	$scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Suggest new product";
                break;
            default:
                break;
        }

        console.log(id);

        $('#SuggestProduct').modal('show');
    }

    $scope.save = function(request,id) {
        var url = API_URL + "product";
        request.idprovider=id;
        request.quantity=0;

        //append employee id to the URL if the form is in edit mode
        $http({
            method: 'POST',
            url: API_URL + "product/",
            data: $.param(request),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details.');
        });
    }

	$http.get(API_URL + "categorie")
        .success(function(response) {
            $scope.categories = response;
        });
});
