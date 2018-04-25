@extends('layouts.default')
@section('content')
	<div class="p-4 row" ng-controller="OpenSourceCtrl" ng-app="StarterApp" style="width: 100%;">
		<div class="col-lg-4">
			<input type="text" name="fbrowse" >
			<button ngf-select="uploadFiles($files)" ngf-accept="'image/*'" class="margin-left" require>
				Browse
			</button>
			<div class="padding-top">
			
				<label>Parameter Settings:</label>
				<button type="button">Advance</button>

				<!-- Modal -->
				<!-- <div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
					
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Modal Header</h4>
							</div>
							<div class="modal-body">
								<p>Some text in the modal.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
						
					</div>
				</div> -->
				
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
				<select>
					<option selected="selected">Select</option>
					<option value="loo">Loo</option>
					<option value="5-fools">5-Fools</option>
					<option value="10-fools">10-Fools</option>
				</select>
			</div>
			<div class="padding-top">
				<button ng-click="dialog=true">Execute</button>
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
								<th>...%  ...s</th>
								</tr>
								<tr>
								<td>Neural Network</td>
								<th>...%  ...s</th>
								</tr>
								<tr>
								<td>Decision Tree</td>
								<th>...%  ...s</th>
								</tr>
							</table>
							<div class="mt-4">
								<!-- <canvas id="lineChart" style="height: 200px;"></canvas> -->
								<div id="chartContainer"></div>
							</div>
						</div>
						<div class="column">
							<table style="width:100%;height: 100%;">
								<tr>
								<th>On training data</th>
								<th>Time</th>
								</tr>
								<tr>
								<td>Naive Bayes</td>
								<th>...%  ...s</th>
								</tr>
								<tr>
								<td>Neural Network</td>
								<th>...%  ...s</th>
								</tr>
								<tr>
								<td>Decision Tree</td>
								<th>...%  ...s</th>
								</tr>
							</table>
							<div class="mt-4">
								<!-- <canvas id="myChart" style="max-width: 500px;"></canvas> -->
								<div id="chartContainerBar"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal -->
			<!-- <div class="modal fade" id="myModalExecute" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Execute</h4>
						</div>
						<div class="modal-body">
							<label>Predicted result:</label>
							<div style="padding-top: 10px;">
								<div class="row">
									<div class="column" style="background-color:#aaa;">
									<table style="width:100%;height: 100%;">
										<tr>
										<th>On testing data</th>
										<th>Time</th>
										</tr>
										<tr>
										<td>Naive Bayes</td>
										<th>...%  ...s</th>
										</tr>
										<tr>
										<td>Neural Network</td>
										<th>...%  ...s</th>
										</tr>
										<tr>
										<td>Decision Tree</td>
										<th>...%  ...s</th>
										</tr>
									</table>
									<div>
										<img src=""/>
									</div>
									</div>
									<div class="column" style="background-color:#bbb;">
									<table style="width:100%;height: 100%;">
										<tr>
										<th>On training data</th>
										<th>Time</th>
										</tr>
										<tr>
										<td>Naive Bayes</td>
										<th>...%  ...s</th>
										</tr>
										<tr>
										<td>Neural Network</td>
										<th>...%  ...s</th>
										</tr>
										<tr>
										<td>Decision Tree</td>
										<th>...%  ...s</th>
										</tr>
									</table>
									<div>
										<img src=""/>
									</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
					
				</div>
			</div> -->
		</div>
	
	</div>
@stop
@section('scripts')
@stop