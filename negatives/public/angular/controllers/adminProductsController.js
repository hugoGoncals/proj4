app.controller('adminProductsController', function($scope, $http, API_URL, $filter) {



	var vm = this;

	vm.listProdsCar = [];


	vm.car = {
		name : "",
		total: 0
	}

	function activate(){

		 	//retrieve employees listing from API
    		$http.get(API_URL + "product")
            .success(function(response) {
                vm.listProduts = response;
            });
    
	}

	vm.addCar = function(product){
		var l = $filter('filter')(vm.listProdsCar, {id: product.id});	
		if(!l.length){
			vm.listProdsCar.push(angular.copy(product));
		}else{
			alert("O produto ja esta no carrinho");
		}
	}

	vm.removeFromCar = function(index){
		vm.listProdsCar.splice(index,1);
	};


	vm.getTotalCar = function(){
		var total = 0;

		if(vm.listProdsCar.length){
			
			angular.forEach(vm.listProdsCar, function(prod, c) {
			  		total += prod.quantity * prod.price;
			});
			
		}

		vm.car.price = total;

		return total;

	}


	vm.saveCar = function(){

		console.log(vm.car);

		vm.car.priority = 1;//depois ve la o que é isto.

		if(!vm.car.name){
			alert(" preenche o nome do carrinho faz favor!")
			return
		}

		var haveProdsWithoutQtd = false;
		angular.forEach(vm.listProdsCar, function(prod, c) {
			haveProdsWithoutQtd = haveProdsWithoutQtd ? true : (prod.quantity == null || prod.quantity == undefined);
		});

		if(haveProdsWithoutQtd){
			alert(" oh boy existem prods sem quantiddes!");
			return
		}

		var url = API_URL + "productsbasket";
        
        $http({
            method: 'POST',
            url: url,
            data: $.param(vm.car),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
           
            vm.car.id = response;

        	SaveProdsCar();

        }).error(function(response) {
            console.log(response);
            alert('This shit is going down');
        });	

	}


	function SaveProdsCar(){

		var url = API_URL + "productsline";

		angular.forEach(vm.listProdsCar, function(prod, c) {


				var obj = {
					idbasket : vm.car.id,
					idproduct : prod.id,
					quantity : prod.quantity,
					totalline: prod.price * prod.quantity
				}
			  		
				$http({
		            method: 'POST',
		            url: url,
		            data: $.param(obj),
		            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		        }).success(function(response) {
		           
		        		if((c + 1) == vm.listProdsCar.length){

		        			alert("carrinho guardado com sucesso")

		        		}

		        }).error(function(response) {
		            console.log(response);
		            alert('This is embarassing. An error has occured. Please check the log for details');
		        });	

		});

	}
   

	activate();

});
