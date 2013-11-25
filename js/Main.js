var dbApp = angular.module('dbApp', []).
controller('dbConnectCtrl', ['$scope', '$http', function ($scope, $http) {
    console.log($scope);
    $scope.getResults = function () {
        console.log('get results');
        $http.post('/php/data.php')
        .success(function (data, status, headers, config) {
            console.log(data);
            $scope.result       = data;
        }).error(function (data, status) {
            $scope.errors.push(status);
            console.log('error');
        });
    }
}]);
