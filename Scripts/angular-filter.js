var app = angular.module('ngFilters', [])
   
    .filter('DGDate', function ($filter) {
        var angularDateFilter = $filter('date');
        return function (theDate) {
            if (theDate != null)
                return angularDateFilter(theDate, 'dd/MM/yyyy').replace("01/01/0001", "");
        }
    });