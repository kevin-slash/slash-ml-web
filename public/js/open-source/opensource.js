app.controller('OpenSourceCtrl', function ($rootScope, $scope) {


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