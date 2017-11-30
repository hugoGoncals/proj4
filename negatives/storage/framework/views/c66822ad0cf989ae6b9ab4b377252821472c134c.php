 

   <?php $__env->startSection('content'); ?>

      <div id="page-wrapper" ng-controller="adminProductsController as vm">
        <h1>Create basket</h1>
        <hr>
        <div class="row">
          <div class="col-lg-6" >
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o"></i> Produts</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                <table class="table table-bordered table-hover tablesorter">
                  <thead>
                    <tr>
                      <th>Product <i class="fa fa-sort"></i></th>
                      <th>Quantity <i class="fa fa-sort"></i></th>
                      <th colspan="2">Price <i class="fa fa-sort"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                   <tr ng-repeat="product in vm.listProduts">
                      <td class="col-sm-4">
                        {{ product.description }}
                      </td>
                      <td class="col-sm-1"><input type="number" class="form-control" value="{{product.quantity}}"></td>
                      <td class="col-sm-1"><strong>{{ product.price }}</strong> € </td>
                      <td class="col-sm-1">
                        <button type="button" class="btn btn-default" ng-click="vm.addCar(product)">add</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o"></i> Create Baskets</h3>
              </div>
              <div class="panel-body">
                <h3>Basket Name: </h3>
                <input class="form-control" type="text" ng-model="vm.car.name">
                <br>
                <div class="list-group">
                  <table class="table table-bordered table-hover tablesorter">
                    <thead>
                      <tr>
                        <th>Product <i class="fa fa-sort"></i></th>
                        <th>Quantity <i class="fa fa-sort"></i></th>
                        <th>Price <i class="fa fa-sort"></i></th>
                        <th colspan="2">Total <i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-if="!vm.listProdsCar.length">
                        <td colspan="5" class="text-center"> Sem elementos</td>
                      </tr>
                      <tr ng-repeat="product in vm.listProdsCar">
                        <td class="col-sm-4">{{ product.description }}</td>
                        <td class="col-sm-1">{{ product.quantity }}</td>
                        <td class="col-sm-1"><strong>{{ product.price | currency:'€'}}</strong></td>
                        <td class="col-sm-1 text-right"><strong>{{ product.quantity * product.price || 0 | currency:'€'}}</strong></td>
                        <td class="col-sm-1">
                          <button type="button" class="btn btn-xs btn-danger" ng-click="vm.removeFromCar($index)">
                              <span class="glyphicon glyphicon-remove"></span> Remove
                          </button>
                        </td>
                      </tr>
                    </tbody>
                    <tfoot ng-if="vm.listProdsCar.length">
                      <td colspan="3" class="text-right">Total</td>
                      <td class="text-right col-sm-1">
                            {{ vm.getTotalCar() | currency:'€'}}
                      </td>
                      <td class="text-right col-sm-1"></td>
                    </tfoot>
                  </table>
                </div>
                <div class="text-right">
                  <button type="button" class="btn btn-default" ng-click="vm.saveCar()" ng-if="vm.listProdsCar.length">Save card</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /#wrapper -->
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>