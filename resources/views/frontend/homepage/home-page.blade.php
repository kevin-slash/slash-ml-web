@extends('layouts.default')
@section('content')
	<div class="p-4 row" ng-controller="OpenSourceCtrl" ng-app="StarterApp" style="width: 100%;">
		<div class="col-lg-4">
			<input type="text" name="fbrowse" ng-model="urlImageLogo">
			<button ngf-select="uploadFiles($files)" ngf-accept="'application/x-zip-compressed'" class="margin-left" require>
				Browse
			</button>
			<div class="padding-top">
			
				<label>Parameter Settings:</label>
				<button type="button">Advance</button>
				
			</div>
			
			<div class="padding-top">
				<table style="width:20%;">
				<tr>
					<th>Naive Bayes</th>
					<th>Neural Network</th> 
					<th>Decision Tree</th>
				</tr>
				<tr style="height: 50px;">
					<td>default</td>
					<td>default</td>
					<td>default</td>
				</tr>
				</table>
			</div>
			
			<div class="padding-top">
				<label>Evaluation setting:</label>
			</div>
			<div style="padding-top: 10px;">
				<select id="dropdownList">
					<option selected="selected">Select</option>
					<option value="loo">loo</option>
					<option value="5-fools">5-fools</option>
					<option value="10-fools">10-fools</option>
				</select>
			</div>
			<div class="padding-top">
				<a href="" ng-click="dialog=true"><button ng-click="ImageFilesUpload()" id="button1">Execute</button></a>
				
			</div>
		</div>
		
		<div ng-show="dialog" class="col-lg-8" ng-cloak>
			<div class="execute">
				<label>Predicted result:</label>
				<div style="padding-top: 10px;">
					<div class="row">
						<div class="column">
							<table style="width:100%;height: 100%;">
								<tr>
								<th>On testing data</th>
								<th>Time</th>
								</tr>
								<tr>
								<td>Naive Bayes</td>
								<th><span ng-bind="myResult.on_testing_data.NB.accuracy"></span>%  <span ng-bind="myResult.on_testing_data.NB.time"></span>s</th>
								</tr>
								<tr>
								<td>Neural Network</td>
								<th><span ng-bind="myResult.on_testing_data.NN.accuracy"></span>%  <span ng-bind="myResult.on_testing_data.NN.time"></span>s</th>
								</tr>
								<tr>
								<td>Decision Tree</td>
								<th>...%  ...s</th>
								</tr>
							</table>
							<div class="mt-4">
								<div id="chartContainerBar"></div>
							</div>
							<!-- <div class="mt-4">
								<div id="chartContainer"></div>
							</div> -->
						</div>
						<div class="column">
							<table style="width:100%;height: 100%;">
								<tr>
								<th>On training data</th>
								<th>Time</th>
								</tr>
								<tr>
								<td>Naive Bayes</td>
								<th><span ng-bind="myResult.on_training_data.NB.accuracy"></span>%  <span ng-bind="myResult.on_training_data.NB.time"></span>s</th>
								</tr>
								<tr>
								<td>Neural Network</td>
								<th><span ng-bind="myResult.on_training_data.NN.accuracy"></span>%  <span ng-bind="myResult.on_training_data.NN.time"></span>s</th>
								</tr>
								<tr>
								<td>Decision Tree</td>
								<th>...%  ...s</th>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>
@stop
@section('scripts')
@stop