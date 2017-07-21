app.controller('MainController', ['$scope', function($scope) { 
  $scope.title = 'SOUTH PARK CHARACTERS';  
  $scope.characters = [ {
    name: 'Eric Cartman',
    cover: 'images/cartman_cutout.png',
	grade: '4th Grade',
	gender: 'Male'
  },
    {
    name: 'Stan Marsh',
    cover: 'images/stan_cutout.png',
	grade: '4th Grade',
	gender: 'Male'
  	},
    {
    name: 'Kyle Broflowski',
    cover: 'images/kyle_cutout.png',
	grade: '4th Grade',
	gender: 'Male'
    },
    {
    name: 'Kenny McCormick',
    cover: 'images/kenny_cutout.png',
	grade: '4th Grade',
	gender: 'Male'
    },
    {
    name: 'Butters Stotch',
    cover: 'images/butters_cutout.png',
	grade: '4th Grade',
	gender: 'Male'
    }, 
    {
    name: 'Craig Tucker',
    cover: 'images/craig_cutout.png',
	grade: '4th Grade',
	gender: 'Male'
    }, 
    {
    name: 'Wendy Testaburger',
    cover: 'images/wendy_cutout.png',
	grade: '4th Grade',
	gender: 'Female'
    },
    {
    name: 'Bebe Stevens',
    cover: 'images/bebe_cutout.png',
	grade: '4th Grade',
	gender: 'Female'
    }, 
    {
    name: 'Jimmy Valmer',
    cover: 'images/jimmy_cutout.png',
	grade: '4th Grade',
	gender: 'Male'
    },
    {
    name: 'Towlie',
    cover: 'images/towlie_cutout.png',
	grade: 'Not In School',
	gender: 'Towel' 
    },   
    {
    name: 'Tweek Tweak',
    cover: 'images/tweak_cutout.png',
	grade: '4th Grade',
	gender: 'Male'
    },
    {
    name: 'Token Black',
    cover: 'images/token_cutout.png',
	grade: '4th Grade',
	gender: 'Male'
    },
    {
    name: 'Red',
    cover: 'images/1_cutout.png',
	grade: '4th Grade',
	gender: 'Female'
    }, 
    {
    name: 'Clyde Donovan',
    cover: 'images/2_cutout.png',
	grade: '4th Grade',
	gender: 'Male'
    }, 
    {
    name: 'Heidi Turner',
    cover: 'images/3_cutout.png',
	grade: '4th Grade',
	gender: 'Female'
    }, 
    {
    name: 'Annie Knitts',
    cover: 'images/4_cutout.png',
	grade: '4th Grade',
	gender: 'Female'
    } 	
  ]
  $scope.plusOne = function(index){
    $scope.products[index].likes += 1;
  };
}]);