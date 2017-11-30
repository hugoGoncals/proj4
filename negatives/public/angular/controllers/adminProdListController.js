app.controller('adminProdListController', function($scope, $http, API_URL) {
    //retrieve employees listing from API
    
    $http.get(API_URL + "product/productList/1")
            .success(function(response) {
                $scope.productos = response;
           });

    $http.get(API_URL + "categorie")
            .success(function(response) {
                $scope.categorie = response;
           });

    $http.get(API_URL + "product")
            .success(function(response) {
                $scope.products = response;
           });

    $http.get(API_URL + "provider")
            .success(function(response) {
                $scope.providers = response;
           });

    //filtros
    $scope.reverse = true;
    $scope.sortBy = function(propertyName) {
        $http.get(API_URL + "product/productList/1")
            .success(function(response) {
                $scope.productos = response;
           });
        
        $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
        $scope.propertyName = propertyName;
    };

    $scope.reloadRoute = function() {
       location.reload();
    }
    

    // end filtros


    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add new product";

                break;
            case 'edit':
                $scope.form_title = "Product details";
                $scope.id = id;
                
                $http.get(API_URL + 'product/' + id)
                    .success(function(response) {
                        $scope.product = response;
                    });          
                break;
            default:
                break;
        }


        $('#myModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "product";
        
        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }

        console.log($scope.product);
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.product),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('Fogo! Não consegui registar este produto');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'product/' + id
            }).
                    success(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Unable to delete');
                    });
        } else {
            return false;
        }
    }
});