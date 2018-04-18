(function (){
	app.controller('CommentListingCtrl', ['$scope', '$timeout', '$mdSidenav',
		'$mdUtil', '$log', 'MockService', '$location', '$mdDialog', '$rootScope', 'CoResource',
		'$mdToast', 'filterFilter', '$routeParams', function($scope, $timeout, $mdSidenav,
		$mdUtil, $log, MockService, $location, $mdDialog, $rootScope, CoResource,
		$mdToast, filterFilter, $routeParams){

	 	$scope.items = [];
	 	$scope.type_name = $rootScope.type_names[$routeParams.type];
	 	$scope.selected = [];
	 	// Report.listCustomer
	 	$scope.search = '';
	    
		$scope.toastPosition = {
	    	bottom: false,
	    	top: true,
	    	left: false,
	    	right: true
	  	};

	  	$scope.getToastPosition = function() {
	    	return Object.keys($scope.toastPosition)
	      		.filter(function(pos) { return $scope.toastPosition[pos]; })
	      		.join(' ');
	  	};
	    
	    // Pagination
	    $scope.pagination = {
	    	limit: 15,
	    	offset: $location.search().offset || 1,
	    	current: 1
	    };

	    $scope.changePage = function(current){
	    	$scope.pagination.current = current;
	    };

	    $scope.preparePagination = function (){	    	
		    var amount = $scope.pagination.total_record > $scope.pagination.limit ? Math.round($scope.pagination.total_record / $scope.pagination.limit) : 0;

		    $scope.pagination.total = _.map(new Array(amount), function (value, key){
		    	return key + 1;
		    });
	    };

	    $scope.changeOffset = function (offset){
	    	$scope.pagination.offset = offset;
	    };

	    function loadData(callback, offset, limit){
	    	offset = offset || $scope.pagination.offset;
	    	limit = limit || 10;
	    	console.log('load data');
			CoResource.resources.Comment.list({
				'offset': (offset - 1) * limit || 0,
				'limit': limit || 10,
		    	'ignore-offset': 0,
		    	// 'directory': $routeParams.shop || null,
		    	'search': $scope.search || '',
		    	'sort': '-created_at',
		    	// 'scope': 'foods,origins,categories,features,menu,drinks,payment_methods,parkings',
		    }, function(s) {
		    	$scope.listing = s.result;
		    	$scope.pagination.total_record = s.options.total;
		    	$scope.preparePagination();
		    	setTimeout(function (){
		    		renderMagnific();
		    	}, 2000);

		    	if (callback){
		    		callback();
		    	}
		    });
	    }

	    // $scope.viewDetail = function (item){
	    // 	$location.path('coupons/' + item.directory._id + '/' + item._id);
	    // };

	    loadData();

	    $scope.onPageChanged = function (){
	    	$location.search('offset', $scope.pagination.offset);
	  //   	$rootScope.loading('show');
			// loadData(function (){
			// 	$rootScope.loading('hide');
			// }, $scope.pagination.offset, 10);
	    };

		$scope.sort = '';
	    // $scope.changeSort = function (){
	    // 	if ($scope.sort == ''){
	    // 		$scope.sort = 'desc';
	    // 	}
	    // 	else if ($scope.sort == 'desc'){
	    // 		$scope.sort = 'asc';
	    // 	}
	    // 	else{
	    // 		$scope.sort = '';
	    // 	}

	    // 	$rootScope.loading('show');
	    // 	loadData(function (){
		   //  	$rootScope.loading('hide');
	    // 	});

	    // };

	    $scope.$watch('search.query', function (v, old){	
			if (v == old){
				return;
			}    	
	    	// $rootScope.loading('show');

	    	// loadData(function (){
		    // 	$rootScope.loading('hide');
	    	// });
	    	$location.search('search', v);
	    });

	    var timer = null;
	    function startCalling(){
	    	if (timer){
	    		$timeout.cancel(timer);
	    	}
	    	timer = $timeout(function (){

		    	$rootScope.loading('show');

		    	loadData(function (){
			    	$rootScope.loading('hide');
		    	});
	    	}, 700);

	    }

	    /* EVENT WATCHERS */

		var watchers = {};
		watchers['search'] = $scope.$watch(function() {
			return $location.search().search;
		}, function(v, old) {

			if (v == old){
				return;
			}

			$scope.search.query = v;
			startCalling();
		});

		watchers['offset'] = $scope.$watch(function() {
			return $location.search().offset;
		}, function(v, old) {

			if (v == old){
				return;
			}

			$scope.pagination.offset = v;
			startCalling();
		});

        $scope.blockItems = function (item, ev){

  			if ($scope.selected.length < 1){
				return;
			}

			for(var key in $scope.selected){
				if ($scope.selected[key].status != 'active'){

					return alert('You have selected the invalid comment to block');
				}
			}

            var confirm = $mdDialog.confirm()
                .parent(angular.element(document.body))
                .title('Block Comments')
                .content('Are you sure to block selected comments ?')
                .ariaLabel('Block Comments')
                .ok('Yes')
                .cancel('No')
                .targetEvent(ev);
            $mdDialog.show(confirm).then(function() {
                $rootScope.loading('show');
                CoResource.resources.Comment.block({
                	items: _.map($scope.selected, function (v){
                		return v._id;
                	})
                }, function (s){
                	$rootScope.loading('hide');

					for(var key in $scope.selected){
						$scope.selected[key].status = 'blocked';
					}
					$scope.selected = [];
					loadData();
                	$mdToast.show(
                        $mdToast.simple()
                            .content('Comment blocked')
                            .position($scope.getToastPosition())
                            .hideDelay(3000)
                    );
                }, function (e){
                	$rootScope.loading('hide');
                	alert('Sorry, this comment cannot be blocked due to some reason, please contact administrator for more information');
                });

            }, function() {
            });
        };

        $scope.unblockItems = function (item, ev){

  			if ($scope.selected.length < 1){
				return;
			}

			for(var key in $scope.selected){
				if ($scope.selected[key].status != 'blocked'){

					return alert('You have selected the invalid comment to unblock');
				}
			}

            var confirm = $mdDialog.confirm()
                .parent(angular.element(document.body))
                .title('Unblock Comments')
                .content('Are you sure to unblock selected comments ?')
                .ariaLabel('Unblock Comments')
                .ok('Yes')
                .cancel('No')
                .targetEvent(ev);
            $mdDialog.show(confirm).then(function() {
                $rootScope.loading('show');
                CoResource.resources.Comment.unblock({
                	items: _.map($scope.selected, function (v){
                		return v._id;
                	})
                }, function (s){
                	$rootScope.loading('hide');

					for(var key in $scope.selected){
						$scope.selected[key].status = 'active';
					}
					$scope.selected = [];

					loadData();
                	$mdToast.show(
                        $mdToast.simple()
                            .content('Comment unblocked')
                            .position($scope.getToastPosition())
                            .hideDelay(3000)
                    );
                }, function (e){
                	$rootScope.loading('hide');
                	alert('Sorry, this comment cannot be unblocked due to some reason, please contact administrator for more information');
                });

            }, function() {
            });
        };

	    // Manific
	    function renderMagnific(){
	        $('.mini-gallery-list .gallery-item').magnificPopup({
	            type: 'image',
	            removalDelay: 300,
	            mainClass: 'mfp-with-zoom',
	            delegate: 'span.icon-search', // the selector for gallery item,
	            titleSrc: 'title',
	            tLoading: '',
	            gallery: {
	                enabled: true
	            },
	            callbacks: {
	                imageLoadComplete: function() {
	                    var self = this;
	                    setTimeout(function() {
	                        self.wrap.addClass('mfp-image-loaded');
	                    }, 16);
	                },
	                open: function() {
	                    // $('#header > nav').css('padding-right', getScrollBarWidth() + "px");
	                },
	                close: function() {
	                    this.wrap.removeClass('mfp-image-loaded');
	                    // $('#header > nav').css('padding-right', "0px");
	                },
	            }
	        });
	    }

		$scope.$on('$destroy', function (){
			for(var key in watchers){
				watchers[key]();
			}
			$location.search('offset', null);
			$location.search('search', null);
		});


	}]);
}());
