app.controller('OpenSourceCtrl', function ($rootScope, $scope) {

    //bar
    // var ctx = document.getElementById("myChart").getContext('2d');
    // var myChart = new Chart(ctx, {
    //     type: 'bar',
    //     data: {
    //         labels: ["1", "2", "3"],
    //         datasets: [{
    //             label: 'average',
    //             data: [0.89, 0.78, 0.73],
    //             backgroundColor: [
    //                 'rgba(255, 99, 132, 0.2)',
    //                 'rgba(54, 162, 235, 0.2)',
    //                 'rgba(255, 206, 86, 0.2)',
    //             ],
    //             borderColor: [
    //                 'rgba(255,99,132,1)',
    //                 'rgba(54, 162, 235, 1)',
    //                 'rgba(255, 206, 86, 1)',
    //             ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             yAxes: [{
    //                 ticks: {
    //                     max: 0.9,
    //                     min: 0.7,
    //                     stepSize: 0.02
    //                 }
    //             }]
    //         }
    //     }
    // });

    //charts
    window.onload = function () {

        var options = {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Result foreach fold"
            },
            width: 414,
            height: 300,
            axisX: {
            },
            axisY: {
                minimum: 0.74,
                maximum: 0.9,
                stepSize: 0.02
            },
            toolTip: {
                shared: true
            },
            legend: {
                cursor: "pointer",
                verticalAlign: "bottom",
                horizontalAlign: "left",
                dockInsidePlotArea: true,
                itemclick: toogleDataSeries
            },
            data: [{
                type: "line",
                showInLegend: true,
                name: "serie 1",
                markerType: "square",
                color: "#F08080",
                dataPoints: [
                    { x: 1, y: 0.85 },
                    { x: 2, y: 0.76 },
                    { x: 3, y: 0.88 },
                    { x: 4, y: 0.79 },
                    { x: 5, y: 0.82 },
                ]
            },
            {
                type: "line",
                showInLegend: true,
                name: "serie 2",
                markerType: "square",
                color: "#1b8ec5",
                dataPoints: [
                    { x: 1, y: 0.79 },
                    { x: 2, y: 0.89 },
                    { x: 3, y: 0.79 },
                    { x: 4, y: 0.82 },
                    { x: 5, y: 0.85 },
                ]
            }]
        };
        $("#chartContainer").CanvasJSChart(options);

        var optionsB = {
            title: {
                text: "Averange results"
            },
            width: 414,
            height: 300,
            data: [{
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [{
                        label: "1",
                        y: 10
                    },
                    {
                        label: "2",
                        y: 15
                    },
                    {
                        label: "3",
                        y: 25
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

        // $(".canvasjs - chart - canvas").resize();
        // $('body').trigger('resize');
    }

    //line
    // var ctxL = document.getElementById("lineChart").getContext('2d');
    // var myLineChart = new Chart(ctxL, {
    //     type: 'line',
    //     data: {
    //         labels: ["1","2","3","4","5"],
    //         datasets: [
    //             {
    //                 label: "First dataset",
    //                 fillColor: "rgba(220,220,220,0.2)",
    //                 strokeColor: "rgba(220,220,220,1)",
    //                 pointColor: "rgba(220,220,220,1)",
    //                 pointStrokeColor: "#fff",
    //                 pointHighlightFill: "#fff",
    //                 pointHighlightStroke: "rgba(220,220,220,1)",
    //                 data: [0.72,0.82,0.77,0.89,0.79]
    //             },
    //             {
    //                 label: "Second dataset",
    //                 fillColor: "rgba(151,187,205,0.2)",
    //                 strokeColor: "rgba(151,187,205,1)",
    //                 pointColor: "rgba(151,187,205,1)",
    //                 pointStrokeColor: "#fff",
    //                 pointHighlightFill: "#fff",
    //                 pointHighlightStroke: "rgba(151,187,205,1)",
    //                 data: [0.84,0.78,0.88,0.77,0.8]
    //             },
    //             {
    //                 label: "Third dataset",
    //                 fillColor: "rgba(151,187,205,0.2)",
    //                 strokeColor: "rgba(167,163,205,12)",
    //                 pointColor: "rgba(167,163,205,12)",
    //                 pointStrokeColor: "#fff",
    //                 pointHighlightFill: "#fff",
    //                 pointHighlightStroke: "rgba(167,163,205,12)",
    //                 data: [0.81, 0.76, 0.81, 0.79, 0.89]
    //             }
    //         ]
    //     },
    //     options: {
    //         responsive: true,
    //         scales: {
    //             yAxes: [{
    //                 ticks: {
    //                     max: 0.9,
    //                     min: 0.74,
    //                     stepSize: 0.02
    //                 }
    //             }]
    //         }
    //     }
    // });


    $scope.imageFiles = [];

    $scope.uploadFiles = function (files) {
        $scope.urlImageLogo = $scope.getUrlFileImage(files[0]);
        $scope.imageFiles = files;
    }

    $scope.ImageFilesUpload = function (id) {
        // console.log('upload now', id);

        // var session = genfunc.getSessionId();
        // var token = genfunc.getToken();
        // var request_id = genfunc.getRequestId();

        // function getRemote() {
        //     var remote = $('meta[name="se:remoteUrl"]');
        //     remote = remote ? remote.attr('content') : '';
        //     return atob(remote);
        // }
        // $scope.urlImageLogo = $scope.getUrlFileImage(files[0]);
        // console.log($scope.urlImageLogo);

        Upload.upload({
            url: namespace.domain + 'upload/images?partial_type=logo&reference_type=industries&reference_id=' + id + '&is_unique=true',
            method: 'POST',
            // data: {
            //     file: files,
            // },
            file: $scope.imageFiles[0],
            headers: {

                'X-GT-Session-ID': session,
                'X-GT-Request-ID': request,
                'Authorization': 'Bearer ' + token,

            }
        }).then(function (resp) {
            // console.log(resp);
            // console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);
        }, function (resp) {
            // console.log('Error status: ' + resp.status);
        }, function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            // console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
        });

    };
    // uploadFiles();

    $scope.getUrlFileImage = function (file) {
        if (!file) return;
        // console.log("this");
        return window.URL.createObjectURL(file);
    }

});