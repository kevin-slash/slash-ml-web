(function (){
	app
		.service('CoResource', function ($timeout, $http, $window, $resource, $rootScope){
			var port = location.port || (location.protocol === 'http' ? 80 : 443);
			var $remoteUrl = namespace.domain + "v1.1/admin/";
			// if ($rootScope.remoteUrl){
			// 	$remoteUrl = $rootScope.remoteUrl + 'api/admin/';
			// }
			function initializeRequest(){
				var session = $('meta[name="api:session"]');
				session = session ? session.attr('content') : '';
				var token = $('meta[name="api:bearer"]');
				token = token ? token.attr('content') : '';
				var request = $('meta[name="api:request"]');
				request = request ? request.attr('content') : '';

				$http.defaults.headers.common['X-HH-Connect-ID']= session;
				$http.defaults.headers.common['X-HH-Request-ID']= request;
				$http.defaults.headers.common['Authorization']= 'Bearer ' + token;

			}

			console.log(base + 'directories/:directoryId');

			initializeRequest();

			function guid() {
			  	function s4() {
			    	return Math.floor((1 + Math.random()) * 0x10000)
			      	.toString(16)
			      	.substring(1);
			  	}
			  	return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
			    s4() + '-' + s4() + s4() + s4();
			}

			var base = $remoteUrl;

			var resources = {
				Item: $resource(base + 'dimensions/:itemId',
				 	{
				 		itemId:'@id',
      					cache : false
				 	}, {
				  		'update': { method:'PUT' },
				  		'list': {
				  			method: 'GET',
      						cache : false
				  		}
				 	}),
				ItemLocale: $resource(base + 'dimensions/:itemId/locale', null, {}),
				Media: $resource(base + 'media/:mediaId', { mediaId: '@id' }, {
					'list': {
			  			method: 'GET',
      					cache : false
			  		},
			  		'update': { method:'PUT' },
			  		'saveLink': {
			  			method: 'POST',
			  			url: base + 'media/link'
			  		},
			  		'setBestVideo': {
			  			method: 'POST',
			  			url: base + 'media/:mediaId/best-video',
					    mediaId: '@id'
			  		},
			  		'unsetBestVideo': {
			  			method: 'DELETE',
			  			url: base + 'media/:mediaId/best-video',
					    mediaId: '@id'
			  		}
				}),
				Location: $resource(base + 'locations/:locationId', {
					locationId: '@id',
      				cache : false
				}, {
					// 		'update': { method:'PUT' },
			  		'provinces': {
						url: base + 'locations/provinces',
			  			method: 'GET',
      					cache : false
			  		},
					'districts': {
						url: base + 'locations/districts',
			  			method: 'GET',
      					cache : false
			  		},
					'communes': {
						url: base + 'locations/communes',
			  			method: 'GET',
      					cache : false
			  		},
				}),
				Article: $resource(base + 'articles/:articleId', {
					articleId: '@id',
      				cache : false
				}, {
			  		'update': { method:'PUT' },
			  		'list': {
			  			method: 'GET',
      					cache : false
			  		},
			  		'publish': {
			  			method: 'POST',
			  			url: base + 'articles/:articleId/publish',
					    articleId: '@id'
			  		},
			  		'schedule': {
			  			method: 'POST',
			  			url: base + 'articles/:articleId/schedule',
					    articleId: '@id'
			  		},
			  		'putDraft': {
			  			method: 'POST',
			  			url: base + 'articles/:articleId/drop-to-draft',
					    articleId: '@id'
			  		}
				}),
				Comment: $resource(base + 'comments/:commentId', {
					commentId: '@id',
      				cache : false
				}, {
			  		// 'update': { method:'PUT' },
			  		'list': {
			  			method: 'GET',
      					cache : false
			  		},
			  		'block': {
			  			method: 'POST',
			  			url: base + 'comments/block',
			  		},
			  		'unblock': {
			  			method: 'POST',
			  			url: base + 'comments/unblock',
			  		}
				}),
				Directory: $resource(base + 'directories/:directoryId', {
					directoryId: '@id',
      				cache : false
				}, {
			  		'update': { method:'PUT' },
					'setCover': {
						method: 'PUT',
						directoryId: '@id',
						url: base + 'directories/:directoryId/cover'
					},
					'setRecommended': {
						method: 'PUT',
						directoryId: '@id',
						url: base + 'directories/:directoryId/recommendations'
					},
					'setRecommendedOff': {
						method: 'PUT',
						recId: '@id',
						url: base + 'recommendations/:recId/off'
					},
			  		'list': {
			  			method: 'GET',
      					cache : false
			  		},
			  		'categories': {
			  			url: base + 'directories/categories',
			  			method: 'GET',
      					cache : true
			  		},
			  		'loadDimensionDetail': {
			  			url: base + 'directories/:directoryId/dimensions',
			  			method: 'GET',
						directoryId: '@id',
      					cache : false
			  		},
			  		'updateDimensionDetail': {
			  			url: base + 'directories/:directoryId/dimensions',
			  			method: 'POST',
						directoryId: '@id',
      					cache : false
			  		},


				}),
				Coupon: $resource(base + 'coupons/:couponId', {
					couponId: '@id',
      				cache : false
				}, {
			  		'update': { 
			  			url: base + 'coupons/:couponId',
			  			method: 'PUT',
						couponId: '@id',
      					cache : false
			  		},
			  		'updateData': { 
			  			url: base + 'coupons/:couponId/update',
			  			method: 'POST',
						couponId: '@id',
      					cache : false
			  		},
			  		'list': {
			  			method: 'GET',
      					cache : true
			  		},
			  		'publish': {
			  			url: base + 'coupons/:couponId/publish',
			  			method: 'POST',
						couponId: '@id',
      					cache : false
			  		},
			  		'unpublish': {
			  			url: base + 'coupons/:couponId/unpublish',
			  			method: 'POST',
						couponId: '@id',
      					cache : false
			  		},
				}),
				Advertisement: $resource(base + 'marketing-verses/:advertisementId', {
					advertisementId: '@id',
      				cache : false
				}, {
			  		'update': { 
			  			url: base + 'marketing-verses/:advertisementId',
			  			method: 'PUT',
						advertisementId: '@id',
      					cache : false
			  		},
			  		'updateData': { 
			  			url: base + 'marketing-verses/:advertisementId/update',
			  			method: 'POST',
						advertisementId: '@id',
      					cache : false
			  		},
			  		'list': {
			  			method: 'GET',
      					cache : true
			  		},
			  		'publish': {
			  			url: base + 'marketing-verses/:advertisementId/publish',
			  			method: 'POST',
						advertisementId: '@id',
      					cache : false
			  		},
			  		'unpublish': {
			  			url: base + 'marketing-verses/:advertisementId/unpublish',
			  			method: 'POST',
						advertisementId: '@id',
      					cache : false
			  		},
				}),
				Slider: $resource(base + 'sliders/:sliderId', {
					sliderId: '@id',
      				cache : false
				}, {
			  		'update': { 
			  			url: base + 'sliders/:sliderId',
			  			method: 'PUT',
						sliderId: '@id',
      					cache : false
			  		},
			  		'list': {
			  			method: 'GET',
      					cache : true
			  		},
				}),
				Report: $resource(base + 'bi/:biId', {
					biId: '@id',
      				cache : false
				}, {
			  		'list': {
			  			method: 'GET',
      					cache : true
			  		},
			  		'listCustomer': {
			  			method: 'GET',
      					cache : true,
			  			url: base + 'bi/customers',
			  		},
				}),
				ArticleLocale: $resource(base + 'articles/:articleId/locale/:language', {
					articleId: '@id',
					language: 'language',
      				cache : false
				}, {
					'get': {
						method: 'GET',
      					cache : false
					}
				}),
				Collection: $resource(base + 'collections/:collectionId', {
					collectionId: '@id',
      				cache : true
				}, {
			  		'update': { method:'PUT' },
			  		'list': {
			  			method: 'GET',
      					cache : true
			  		}
				}),
				Message: $resource(base + 'messages/:messageId', {
					messageId: '@id',
					cache: false
				}, {
					'read': {
						method: 'POST',
					    messageId: '@id',
			  			url: base + 'messages/:messageId/read',
					},
					'seen': {
						method: 'POST',
					    messageId: '@id',
			  			url: base + 'messages/:messageId/seen',
					},
			  		'list': {
			  			method: 'GET',
      					cache : false
			  		}
				}),
				Product: $resource(base + 'products/:productId', {
					productId: '@id',
      				cache : false
				}, {
			  		'update': { method:'PUT' },
			  		'list': {
			  			method: 'GET',
      					cache : false
			  		}
				}),
				/*
				Item: $resource(base + 'items/:itemId',
				 	{
				 		itemId:'@id',
      					cache : false
				 	}, {
				  		'update': { method:'PUT' },
				  		'list': {
				  			method: 'GET',
      						cache : false
				  		}
				 	}),
				ItemLocale: $resource(base + 'items/:itemId/locale', null, {}),
				Media: $resource(base + 'media/:mediaId', { mediaId: '@id' }, {
					'list': {
			  			method: 'GET',
      					cache : false
			  		},
			  		'update': { method:'PUT' },
			  		'saveLink': {
			  			method: 'POST',
			  			url: base + 'media/link'
			  		},
			  		'setBestVideo': {
			  			method: 'POST',
			  			url: base + 'media/:mediaId/best-video',
					    mediaId: '@id'
			  		},
			  		'unsetBestVideo': {
			  			method: 'DELETE',
			  			url: base + 'media/:mediaId/best-video',
					    mediaId: '@id'
			  		}
				}),
				Article: $resource(base + 'articles/:articleId', {
					articleId: '@id',
      				cache : false
				}, {
			  		'update': { method:'PUT' },
			  		'list': {
			  			method: 'GET',
      					cache : false
			  		},
			  		'publish': {
			  			method: 'POST',
			  			url: base + 'articles/:articleId/publish',
					    articleId: '@id'
			  		},
			  		'schedule': {
			  			method: 'POST',
			  			url: base + 'articles/:articleId/schedule',
					    articleId: '@id'
			  		},
			  		'putDraft': {
			  			method: 'POST',
			  			url: base + 'articles/:articleId/drop-to-draft',
					    articleId: '@id'
			  		}
				}),
				Directory: $resource(base + 'directories/:directoryId', {
					directoryId: '@id',
      				cache : false
				}, {
			  		'update': { method:'PUT' },
			  		'list': {
			  			method: 'GET',
      					cache : true
			  		},
			  		'categories': {
			  			url: base + 'directories/categories',
			  			method: 'GET',
      					cache : true
			  		}
				}),
				ArticleLocale: $resource(base + 'articles/:articleId/locale/:language', {
					articleId: '@id',
					language: 'language',
      				cache : false
				}, {
					'get': {
						method: 'GET',
      					cache : false
					}
				}),
				Collection: $resource(base + 'collections/:collectionId', {
					collectionId: '@id',
      				cache : true
				}, {
			  		'update': { method:'PUT' },
			  		'list': {
			  			method: 'GET',
      					cache : true
			  		}
				}),
				Message: $resource(base + 'messages/:messageId', {
					messageId: '@id',
					cache: false
				}, {
					'read': {
						method: 'POST',
					    messageId: '@id',
			  			url: base + 'messages/:messageId/read',
					},
					'seen': {
						method: 'POST',
					    messageId: '@id',
			  			url: base + 'messages/:messageId/seen',
					},
			  		'list': {
			  			method: 'GET',
      					cache : false
			  		}
				}),
				Product: $resource(base + 'products/:productId', {
					productId: '@id',
      				cache : false
				}, {
			  		'update': { method:'PUT' },
			  		'list': {
			  			method: 'GET',
      					cache : false
			  		}
				}),*/
			};

			//

			var caches = {};
			caches['Item'] = resources.Item.list(function (){
				caches['Item'] = caches['Item'].result;
			});

			return {
				resources: resources,
				caches: function (cacheName){
					return caches[cacheName];
				},
				textifyError: function (object){
					if (!object){
						return '';
					}
					if (object.error === 'general'){
						return object.result;
					}
					else if (object.error === 'validation-error'){
						return _.map(object.result, function (v){
							return v
						}).join (' ,');
					}
					else{
						return object.result;
					}
				}
			};
		});
}());
