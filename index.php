<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="css/materialize.min.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Search Engine</title>
	</head>
	<body>
		<div class="row">
			<div class="col s12 m12">
				<div class="card white darken-1">
					<div class="card-content black-text">
						<div class="row">
							<div class="col m2" >
								<span class="card-title orange-text">Search Engine</span>
							</div>
							<div class="input-field col s11 m9">
								<input placeholder="Type here" id="query" name = "q" type="text" class="validate">
								<label for="query">Enter your query</label>
							</div>
							<div class="col s1 m1">
								<a class="btn-floating waves-effect waves-light red shiftDown" id="search"><i class="material-icons">search</i></a>
							</div>
						</div>
						<div class="row">
							<div class="col s6 m1">
								<a class="btn-floating waves-effect waves-light red" href="#addModal"><i class="material-icons">add</i></a>
							</div>
							<div class="col s6 m1">
								<a class="waves-effect waves-light btn more">more</a>
							</div>
							<div class="input-field col s12 m5 hidden">
								<select id="searchCategory">
									<option value="none" disabled selected>Choose your option</option>
									<option value="text">Text file</option>
									<option value="image">Image File</option>
									<option value="pdf">PDF document</option>
									<option value="audio">Audio file</option>
									<option value="video">Video file</option>
									<option value="other">Other file</option>
								</select>
								<label>Select Category</label>
							</div>
							<div class="input-field col s12 m5 hidden">
								<select id="sortCategory">
									<option value="" disabled selected>Choose your option</option>
									<option value="dateModified">Date modified</option>
									<option value="fileName">Name</option>
									<option value="category">Category</option>
								</select>
								<label>Sort by</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="mainContent" class="row">
		</div>
		<div id="addModal" class="modal">
			<div class="modal-content">
				<h4>Add New Document</h4>
				<form action="" method="post" enctype="multipart/form-data">
					<div class="file-field input-field">
						<div class="btn">
							<span>File</span>
							<input type="file" id="uploadTarget">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a href="#!"  id="uploadFile" class=" modal-action modal-close waves-effect waves-green btn-flat">Upload</a>
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="js/index.js">
	</script>
</html>