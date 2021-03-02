app.config(function($routeProvider) {
	$routeProvider
	
	.when("/", {
    templateUrl : "view/letovi.html",
	controller: 'myCtrl'
  })
	
	.when("/letovi", {
    templateUrl : "view/letovi.html",
	controller: 'myCtrl'
  })
  
  .when("/patnici", {
    templateUrl : "view/patnici.html",
	controller: 'myCtrl'
  })
  
  .when("/rezervacii", {
    templateUrl : "view/rezervacii.html",
	controller: 'myCtrl'
  })
  
  .otherwise("/", {
    templateUrl : "view/index.html",
	controller: 'myCtrl'
  })
	
	
});