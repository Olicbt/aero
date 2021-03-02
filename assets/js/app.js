var app = angular.module('myApp', ["ngRoute"]);

app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {
	
	
	//**************//
	//   JSON       //
	//**************//
	
//table_name:letovi

/*$scope.letovi=[
{"let_id":1,"let_od":"Skopje","let_preku":"Belgrad","let_do":"Milano","klasa":"Economy"},
{"let_id":2,"let_od":"Ohrid","let_preku":"Solun, Dubai","let_do":"Molbourne","klasa":"Comfort"}
];
*/


   // SELECT

//table_name:letovi

$scope.letovi=[];
$http.get("model/select.php?table_name=letovi")
.then(function(response){$scope.letovi = response.data.records;});

//table_name:patnici

$scope.patnici=[];
$http.get("model/select.php?table_name=patnici")
.then(function (response){$scope.patnici = response.data.records;});

//table_name:rezervacii

$scope.rezervacii=[];
$http.get("model/select.php?table_name=rezervacii")
.then(function(response){$scope.rezervacii = response.data.records;});


     // INSERT

function postData(dataJson){
	$http(
	{
		method : "post",
		url : 'model/insert.php',
		data : dataJson,
		headers : {'Content-Type': 'application/x-www-form-urlencoded'}
	}).then(function mySuccess(response){
		//alert ("Success");
		window.location.reload(); // refresh
		$scope.success=true; // za uspesen vnes
	});
}


$scope.details_letovi_fun = function (let_od, let_preku, let_do, klasa){
	alert(let_od+" "+let_preku+" "+let_do+" "+klasa);
	$scope.letoviJson=[
	{"let_od":let_od,"let_preku":let_preku,"let_do":let_do,"klasa":klasa, "table_name":"letovi"}
	];
	postData($scope.letoviJson);
	$scope.success=true;  // za uspesen vnes
}


$scope.details_patnici_fun = function (ime, adresa, vozrast, email){
	alert(ime+" "+adresa+" "+vozrast+" "+email);
	$scope.patniciJson=[
	{"ime":ime,"adresa":adresa,"vozrast":vozrast,"email":email, "table_name":"patnici"}
	];
	postData($scope.patniciJson);
	$scope.success=true;  // za uspesen vnes
}


$scope.details_rezervacii_fun = function (let_id, patnik_id, broj_patnici, data){
	alert(let_id+" "+patnik_id+" "+broj_patnici+" "+data);
	$scope.rezervaciiJson=[
	{"let_id":let_id,"patnik_id":patnik_id,"broj_patnici":broj_patnici,"data":data, "table_name":"rezervacii"}
	];
	postData($scope.rezervaciiJson);
	$scope.success=true;  // za uspesen vnes
}
	
	
	// DELETE
	
	
	$scope.deleteRow = function (table_name,pk_value){
		$scope.deleteJson = [{"table_name":table_name, "pk_value":pk_value}]
	$http(
	{
		method : "post",
		url : 'model/delete.php',
		data : $scope.deleteJson,
		headers : {'Content-Type': 'application/x-www-form-urlencoded'}
	}).then(function mySuccess(response){
		//alert ("Success");
		window.location.reload(); // refresh
		$scope.success=true; // za uspesen vnes
	});
}

	
}
]);