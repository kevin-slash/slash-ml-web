@extends('layouts.default')
@section('content')
<section ng-controller="OpenSourceCtrl" ng-app="StarterApp">
	<div class="p-5">

		<h1 class="text-center"><u>Khmer ML</u></h1>
			<div>
				<h4>Introduction</h4>
				To classify a single document, firstly the model is needed to be trained by uploading relevant training data in <i>Training</i>. 
				After training, we obtain the model, therefore, we can classify the document by clicking <i>Classification</i>. 
				Then insert texts into the textbox. For detailed explanation please check in <i>Description</i>.
				<br><br> 
			</div>
			<div class="menu">
					<ul class="menu__tabs mb-0">
							<li><a href="#item-1" class=" text-uppercase active">Training</a></li>
							<li><a href="#item-2" class="text-uppercase">Classification</a></li>
							<li><a href="#item-3" class="text-uppercase">Description</a></li>
					</ul>
					<section class="menu__wrapper">

							<article id="item-1" class="menu__item item-active">
								<div class="p-4 row m-0" style="width: 100%;">
									<div class="col-lg-7">
										<div class="input-group">
											<input class="form-controle w-100" placeholder="zip blob" type="text" name="fbrowse" ng-model="urlImageLogo" disabled> 
											<div class="input-group-append">
												<button class="btn btn-primary" type="button" ngf-select="uploadFiles($files)" ngf-accept="'application/x-zip-compressed'" class="margin-left" require>Browse</button>
											</div>
										</div>
										<div class="padding-top">
										
											<label>Parameter Settings:</label>
											<!-- <button class="btn btn-success" type="button">Advance</button> -->
											
										</div>

										<div class="padding-top box">
											
											<label for="text" class="pb-3">Processing:</label>

											<div class="form-group row">
												<label for="method" class="col-sm-4 col-form-label">Method:</label>
												<div class="col-sm-8">
													<select class="form-control" id="method">
														<option>doc_freq</option>
														<option>info_gain</option>
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label for="threshold" class="col-sm-4 col-form-label">Threshold:</label>
												<div class="col-sm-8">
													<input type="number" class="form-control" id="threshold" placeholder="threshold" ng-model="threshold">
												</div>
											</div>

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
														<td style="vertical-align: middle">
															default
														</td>
														<td>
															<div>
																<div class="form-group text-left pt-2">
																	<label for="hidden_layer_sizes" class="form-label">hidden layer sizes:</label>
																	<input type="text" class="form-control" id="hidden_layer_sizes" placeholder="hidden layer sizes" ng-model="hidden">
																</div>
																<div class="form-group text-left pt-2">
																	<label for="learning_rate" class="form-label">learning rate:</label>
																	<input type="number" class="form-control" id="learning_rate" placeholder="learning rate" ng-model="learning">
																</div>
																<div class="form-group text-left pt-2">
																	<label for="momentum" class="form-label" style="word-break: break-all;">momentum:</label>
																	<input type="number" class="form-control" id="momentum" placeholder="momentum" ng-model="momentum">
																</div>
																<div class="form-group text-left pt-2">
																	<label for="random_state" class="form-label">random state:</label>
																	<input type="number" class="form-control" id="random_state" placeholder="random state" ng-model="random">
																</div>
																<div class="form-group text-left pt-2">
																	<label for="max_iter" class="form-label">max iter:</label>
																	<input type="number" class="form-control" id="max_iter" placeholder="max iter" ng-model="iter">
																</div>
																<div class="form-group text-left pt-2">
																	<label class="form-label" for="activation" style="word-break: break-all;">activation:</label>
																	<select class="form-control" id="activation">
																		<option>tanh</option>
																		<option>sigmoid</option>
																		<!-- <option>ReLU</option> -->
																	</select>
																</div>
															</div>
														</td>
														<td>
															<div>
																<div class="form-group text-left pt-2">
																	<label class="form-label" for="criterion">criterion:</label>
																	<select class="form-control" id="criterion">
																		<option>gini</option>
																		<option>entropy</option>
																		<!-- <option>gain_ratio</option>
																		<option>mse</option> -->
																	</select>
																</div>
																<div class="form-group text-left pt-2">
																	<label for="max_depth" class="form-label">max depth:</label>
																	<input type="text" class="form-control" id="max_depth" placeholder="max depth" ng-model="depth">
																</div>
																<div class="form-group text-left pt-2">
																	<label for="min_criterion" class="form-label">min criterion:</label>
																	<input type="text" class="form-control" id="min_criterion" placeholder="min criterion" ng-model="minCriterion">
																</div>
															</div>
														</td>
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
										<div class="padding-top mb-4">
											<a href="" ng-click="ImageFilesUpload()">
												<button class="btn btn-primary" ng-click="dialog=true" id="button1" type="submit">Execute</button>
											</a>
										</div>
									</div>
									
									<div ng-show="dialog" class="col-lg-5 no-padd" style="overflow: hidden;" ng-cloak>
										<div class="my-svg column"><span class="svg-text"><b>Training classifiers and predicting ...</b></span></div>
										<div class="execute">
											<label>Predicted result:</label>
											
											<div class="row">
												<div class="mt-4 col-lg-12">
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
													<!-- <div class="mt-4">
														<div id="chartContainer"></div>
													</div> -->
												</div>
												<div class="mt-4 col-lg-12">
													<div id="chartContainerBar"></div>
												</div>
												<div class="mt-4 col-lg-12">
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
								<div style="padding-left: 15px; padding-right: 15px">
									<h5> Results</h5>
										The results are illustrated in two manners, e.g., predicted results on the testing and training data. 
										<ol>
											<li>	<b>Testing data:</b> These data are not involved in training process. 
														So the accuracy on these data can express the generalization of the methods toward new data.  
											</li>
											<li>	<b>Training data:</b> These data are used to train the model. 
														Predicting resulst on these data can show whether the models are overfitted or not. 
														The model that procuces high accuracy on training data, but performs poorly on testing is overfitted model.   
											</li>
										</ol>
									<h5>CPU Computational time</h5>
									Selecting the right machine learning method for specific problem is very important since it can save time and cost. 
									Normally, we should consider two factors including accuracy and computational time. 
								</div>
							</article>
							<!-- <pre><% datarows | json%></pre> -->
							<article id="item-2" class="menu__item">
								<div class="p-4">
									<form class="form-inline">
										<div class="form-group mx-sm-3 mb-2">
											<label for="inputText" class="sr-only">Please filled this field</label>
											<textarea rows="1" cols="50" class="form-control" id="inputText" placeholder="Please filled this field" style="resize: none" ng-model="textAreaInput"></textarea>
										</div>
										<button type="button" class="btn btn-primary mb-2" ng-click="addToTable()">Add</button>
									</form>
									<div class="table-wrapper-2">
										<table class="table mt-4" ng-cloak>
											<thead>
												<tr>
													<th scope="col">#</th>
													<th scope="col">Input Text</th>
													<th scope="col">Output Fields</th>
												</tr>
											</thead>
											<tbody>
												<tr ng-repeat="row in datarows">
													<th><% $index + 1 %></th>
													<td>
														<% row.input %>
													</td>
													<td>
														<% row.output %>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</article>

							<article id="item-3" class="menu__item">
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