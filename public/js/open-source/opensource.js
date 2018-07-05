app.controller('OpenSourceCtrl', function ($rootScope, $scope, Upload, $http) {

    $(function () {
        var $menu_tabs = $('.menu__tabs li a');
        $menu_tabs.on('click', function (e) {
            e.preventDefault();
            $menu_tabs.removeClass('active');
            $(this).addClass('active');

            $('.menu__item').fadeOut(300);
            $(this.hash).delay(300).fadeIn();
        });

    });

    $scope.datarows = [];

    $scope.imageFiles = [];
    $scope.urlImageLogo = '';

    $scope.uploadFiles = function (files) {
        $scope.urlImageLogo = $scope.getUrlFileImage(files[0]);
        // console.log($scope.imageFiles);
        $scope.imageFiles = files;
    }

    $scope.threshold = 25;
    $scope.depth = 30;
    $scope.minCriterion = 0.05;
    $scope.hidden = "20,56";
    $scope.learning = 0.012;
    $scope.momentum = 0.5;
    $scope.random = 0;
    $scope.iter = 200;

    $scope.ImageFilesUpload = function () {

        $("button[type=submit]").attr("disabled", "disabled");

        var hidden = $scope.hidden;
        var activation = $('#activation').find(":selected").text();
        var criterion = $('#criterion').find(":selected").text();
        var method = $('#method').find(":selected").text();
        // console.log(activation);

        Upload.upload({
            url: namespace.domain + 'getresults',
            method: 'POST',
            data: {
                datasource: $scope.imageFiles[0],
                params: {
                    "algo": ["NB", "NN"],
                    "eval_setting": "loo",
                    "PR": {
                        method: method,
                        threshold: $scope.threshold
                    },
                    "NN": {
                        hidden_layer_sizes: hidden,
                        learning_rate : $scope.learning,
                        momentum: $scope.momentum,
                        random_state: $scope.random,
                        max_iter: $scope.iter,
                        activation: activation,
                    },
                    "DT": {
                        criterion : criterion,
                        max_depth: $scope.depth, 
                        min_criterion: $scope.minCriterion,
                    }
                    // "eval_setting": $("#dropdownList option:selected").val(),
                }
            },
            headers: {

                // 'X-GT-Session-ID': session,
                // 'X-GT-Request-ID': request,
                // 'Authorization': 'Bearer ' + token,
                "Content-Type": "application/json",
                // "mimetype": "application/json",

            }
        }).then(function (resp) {
            console.log(resp.data);
            $scope.myResult = resp.data;

            $( ".my-svg" ).addClass( "d-none" );

            // var options = {
            //     animationEnabled: true,
            //     theme: "light2",
            //     title: {
            //         text: "Result foreach fold"
            //     },
            //     width: 414,
            //     height: 300,
            //     axisX: {
            //     },
            //     axisY: {
            //         minimum: 0.74,
            //         maximum: 0.9,
            //         stepSize: 0.02
            //     },
            //     toolTip: {
            //         shared: true
            //     },
            //     legend: {
            //         cursor: "pointer",
            //         verticalAlign: "bottom",
            //         horizontalAlign: "left",
            //         dockInsidePlotArea: true,
            //         itemclick: toogleDataSeries
            //     },
            //     data: [{
            //         type: "line",
            //         showInLegend: true,
            //         name: "serie 1",
            //         markerType: "square",
            //         color: "#F08080",
            //         dataPoints: [
            //             { x: 1, y: 0.85 },
            //             { x: 2, y: 0.76 },
            //             { x: 3, y: 0.88 },
            //             { x: 4, y: 0.79 },
            //             { x: 5, y: 0.82 },
            //         ]
            //     },
            //     {
            //         type: "line",
            //         showInLegend: true,
            //         name: "serie 2",
            //         markerType: "square",
            //         color: "#1b8ec5",
            //         dataPoints: [
            //             { x: 1, y: 0.79 },
            //             { x: 2, y: 0.89 },
            //             { x: 3, y: 0.79 },
            //             { x: 4, y: 0.82 },
            //             { x: 5, y: 0.85 },
            //         ]
            //     }]
            // };
            // $("#chartContainer").CanvasJSChart(options);

            var optionsB = {
                title: {
                    text: "Averange results on testing data"
                },
                width: 420,
                height: 300,
                data: [{
                    // Change type to "doughnut", "line", "splineArea", etc.
                    type: "column",
                    dataPoints: [{
                        label: "NB",
                        y: $scope.myResult.figure_on_testing_data.NB
                    },
                    {
                        label: "NN",
                        y: $scope.myResult.figure_on_testing_data.NN
                    },
                    {
                        label: "DT",
                        y: $scope.myResult.figure_on_testing_data.DT
                    },
                    ]
                }]
            };

            $("#chartContainerBar").CanvasJSChart(optionsB);

            function toogleDataSeries(e) {
                if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                e.chart.render();
            }

            // console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);
        }, function (resp) {
            console.log('Error status: ' + resp.status);
        }, function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            console.log('progress: ' + progressPercentage + '% ');
        });

    };
    // uploadFiles();

    $scope.addToTable = function () {
        var url = namespace.domain + 'classify';
        var inputText = $scope.textAreaInput;
        $scope.formData = {'params':`{"input_text":"${inputText}"}`};
        $http({
            url: url,
            method: "POST",
            data: $.param($scope.formData),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).then(function(resp) {
            console.log(resp)
            $scope.datarows.push({ 
                input:inputText,
                output:"DT : "+resp.data.DT.toString() + ";" +" NN : "+resp.data.NN.toString()  + ";" +" NB : "+resp.data.NB.toString() + ";"
            });
        });
    }

    $scope.getUrlFileImage = function (file) {
        if (!file) return;
        // console.log("this");
        return window.URL.createObjectURL(file);
    }

});