@extends('layouts.default')
@section('content')
<section>
	<div class="p-5">

		<h1 class="text-center"><u>Slash ML</u></h1>
			
			<div class="menu">
					<ul class="menu__tabs mb-0">
							<li><a href="#item-1" class=" text-uppercase">Training</a></li>
							<li><a href="#item-2" class="text-uppercase">Channel</a></li>
							<li><a href="#item-3" class="text-uppercase active">Description</a></li>
					</ul>
					<section class="menu__wrapper">

							<article id="item-1" class="menu__item">
								<div class="p-4 row m-0" ng-controller="OpenSourceCtrl" ng-app="StarterApp" style="width: 100%;">
									<div class="col-lg-4">
										<div class="input-group">
											<input class="form-control text-truncate" placeholder="zip blob" type="text" name="fbrowse" ng-model="urlImageLogo" disabled> 
											<div class="input-group-append">
												<button class="btn btn-primary" type="button" ngf-select="uploadFiles($files)" ngf-accept="'application/x-zip-compressed'" class="margin-left" require>Browse</button>
											</div>
										</div>
										<div class="padding-top">
										
											<label>Parameter Settings:</label>
											<button class="btn btn-success" type="button">Advance</button>
											
										</div>
										
										<div class="padding-top">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th class="p-3">Naive Bayes</th>
														<th class="p-3">Neural Network</th> 
														<th class="p-3">Decision Tree</th>
													</tr>
												</thead>
												<tbody>
													<tr style="height: 50px;">
														<td>default</td>
														<td>default</td>
														<td>default</td>
													</tr>
												</tbody>
											</table>
										</div>
										
										<div class="padding-top">
											<label>Evaluation setting:</label>
										</div>
										<div style="padding-top: 10px;">
											<select id="dropdownList" class="p-2">
												<option selected="selected" disabled>Select</option>
												<option value="loo">loo</option>
												<option value="5-fools">5-folds</option>
												<option value="10-fools">10-folds</option>
											</select>
										</div>
										<div class="padding-top">
											<a href="" ng-click="ImageFilesUpload()">
												<button class="btn btn-primary" ng-click="dialog=true" id="button1" type="submit">Execute</button>
											</a>
										</div>
									</div>
									
									<div ng-show="dialog" class="col-lg-8 no-padd" style="overflow: hidden" ng-cloak>
										<div class="my-svg column"><span class="svg-text">Processing ...</span></div>
										<div class="execute">
											<label>Predicted result:</label>
											<div style="padding-top: 10px;">
												<div class="row">
													<div class="column">
														<table style="width:100%;height: 100%;" class="table table-bordered">
															<thead>
																<tr>
																	<th>On testing data</th>
																	<th>Accuracy</th>
																	<th>Computational time</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Naive Bayes</td>
																	<th>
																		<span ng-bind="myResult.on_testing_data.NB.accuracy"></span>%
																	</th>
																	<th> 
																		<span ng-bind="myResult.on_testing_data.NB.time"></span>s
																	</th>
																</tr>
																<tr>
																	<td>Neural Network</td>
																	<th>
																		<span ng-bind="myResult.on_testing_data.NN.accuracy"></span>%
																	</th>
																	<th>  
																		<span ng-bind="myResult.on_testing_data.NN.time"></span>s
																	</th>
																</tr>
																<tr>
																	<td>Decision Tree</td>
																	<th>
																		<span ng-bind="myResult.on_testing_data.DT.accuracy"></span>%
																	</th>
																	<th>
																		<span ng-bind="myResult.on_testing_data.DT.time"></span>s
																	</th>
																</tr>
															</tbody>
														</table>
														<div class="mt-4">
															<div id="chartContainerBar"></div>
														</div>
														<!-- <div class="mt-4">
															<div id="chartContainer"></div>
														</div> -->
													</div>
													<div class="column">
														<table style="width:100%;height: 100%;" class="table table-bordered">
															<thead>
																<tr>
																	<th>On training data</th>
																	<th>Accuracy</th>
																	<th>Computational time</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Naive Bayes</td>
																	<th>
																		<span ng-bind="myResult.on_training_data.NB.accuracy"></span>%
																	</th>
																	<th>
																		<span ng-bind="myResult.on_training_data.NB.time"></span>s
																	</th>
																</tr>
																<tr>
																	<td>Neural Network</td>
																	<th>
																		<span ng-bind="myResult.on_training_data.NN.accuracy"></span>%
																	</th>
																	<th>
																		<span ng-bind="myResult.on_training_data.NN.time"></span>s
																	</th>
																</tr>
																<tr>
																	<td>Decision Tree</td>
																	<th>
																		<span ng-bind="myResult.on_training_data.DT.accuracy"></span>%
																	</th>
																	<th>
																		<span ng-bind="myResult.on_training_data.DT.time"></span>s
																	</th>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								
								</div>
							</article>
							
							<article id="item-2" class="menu__item">
								<div class="p-4">
									<form class="form-inline">
										<div class="form-group mx-sm-3 mb-2">
											<label for="inputText" class="sr-only">Please filled this field</label>
											<textarea rows="1" cols="50" class="form-control" id="inputText" placeholder="Please filled this field" style="resize: none"></textarea>
										</div>
										<button type="submit" class="btn btn-primary mb-2">Add</button>
									</form>
									<table class="table mt-4">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Input Text</th>
												<th scope="col">Output Fields</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">1</th>
												<td>Mark</td>
												<td>Otto</td>
											</tr>
										</tbody>
									</table>
								</div>
							</article>

							<article id="item-3" class="menu__item item-active">
								<div class="p-4">
									<h5 class="mt-4">Text classification</h5>
									<text>&emsp;Automatic text classification into predefined categories has attracted increasing interests within these last decades due to the large volume of documents available in digital form. Because of the necessity of text classification, the research in this topic has emerged in both academic and commercial communities (e.g., information retrieval of search engines). The main goal of text classification is either to identify a given article or document to a predefined class or to identify a new class for existing documents. We are interested in the first group of text classification problem.</text>
									<h5 class="mt-4">Tuning parameters for the models</h5>
									<text>&emsp;First of all, in order to classify an article into one or more predefined categories, we need to train our model with some data (known as training data) that share many characteristics with the testing data. Specifically, when we wish to classify news articles into different categories such as politics, sports, entertainments, and economics, we need to have training data (e.g., articles as many as possible from those categories) to train the model.</text>
									<text>&emsp;Many machine learning methods including artificial neural network, decision tree, support vector machine and more that contain hyperparameters (parameters that are needed to be initialized during training) need to find the optimal values of those parameter. How to determine them is quite challenging. One common practice is to divide the existing data into training and testing data. Training data is utilized to train the model, then the testing data is used to predict based on the model that was already trained. Since we know the label of our testing data, we can compare the predicted results with those known labels. From this process, we can obtain the accuracy of the trained model. Whenever we adjust the parameter values, we may obtain different predicted accuracy. Therefore, the optimal parameter values are those that produce highest accuracy. Moreover, when we have enough training data, the optimal parameters of our division are approximately the same as those for the overall data. </text>
									<h5 class="mt-4">Data description</h5>
									<text>&emsp;To test the system, users are required to upload zip file containing at least two folders in which each folder corresponds to a category and in that folder there exists the articles belonging to that category. Hence, folder name is recommended to be the same as the label of the articles it contains. </text><br/>
									<text>&emsp;Currently we have two types of data for testing the system. One type is news articles containing 13 categories including artificial intelligence (AI), augmented reality and virtual reality (ARVR), blockchian, commercial, cybersecurity, fintech, insurance technology, information technology (IT), regulatory, robotics, smart city, transportation and wearable health devices. Another type of data is chatbot data containing 3 categories including greeting, goodbye and thanks.</text>
									<h5 class="mt-4">Data division</h5>
									<text>&emsp;Machine learning community normally adopts leave one out (LOO) or k-fold cross validation as validation technique to test the performance of their models. In LOO cross validation, one article from each class are left out to be testing data, while the remaining data are used as training data. We can repeat this process until all the records are used as testing data. On the other hand, for k-fold cross validation, all the data are divided into k subsets. One subset is used as testing data and the remaining subsets are used to train the model. The process is repeated k times until each subset is used as testing data once. Note that all the testing data are not involved in training process.</text>
								</div>
							</article>

					</section>
			</div>

	</div>
</section>
@stop
@section('scripts')
@stop