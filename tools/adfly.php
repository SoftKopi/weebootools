<?php
include("../header.php");
?>
			<div class="page-header">
				<h1>Adf.ly API <small>URL Generator</small></h1>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
					<div class="list-group">
						<a href="/" class="list-group-item">Beranda</a>
						<a href="/base64" class="list-group-item">Base64</a>
						<a href="/adfly" class="list-group-item active">Adf.ly API</a>
						<a href="/cssminifier" class="list-group-item">CSS Minifier</a>
						<a href="/jsminifier" class="list-group-item">JS Minifier</a>
					</div>
				</div>
				<div class="col-lg-9 col-md-3 col-xs-12 col-sm-12">
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active">Adf.ly API</li>
					</ol>
					<div class="form-group">
						<label for="adfly-api-key">Your API Key: <span style="color: red;">*blank for default</span></label>
						<input type="text" class="form-control" id="adfly-api-key" placeholder="Enter your API Key..."/>
					</div>
					<div class="form-group">
						<label for="adfly-user-id">User ID: <span style="color: red;">*blank for default</span></label>
						<input type="text" class="form-control" id="adfly-user-id" placeholder="Enter your User ID..."/>
					</div>
					<div class="form-group">
						<label for="adfly-type">Advert Type:</label>
						<select class="form-control" id="adfly-type">
							<option value="banner">banner</option>
							<option value="int" selected>int</option>
						</select>
					</div>
					<div class="form-group">
						<label for="adfly-domain">Domain:</label>
						<select class="form-control" id="adfly-domain">
							<option value="adf.ly" selected>adf.ly</option>
							<option value="ay.gy">ay.gy</option>
							<option value="j.gs">j.gs</option>
							<option value="q.gs">q.gs</option>
						</select>
					</div>
					<div class="form-group">
						<label for="adfly-url">URL: <span style="color: red;">*url/line</span></label>
						<textarea type="text" class="form-control" id="adfly-url" placeholder="http://" style="max-width: 100%;" rows="7"></textarea>
					</div>
					<button type="button" class="btn btn-default" id="adfly-generator">Generate</button> <button type="button" class="btn btn-default" id="adfly-reset">Reset</button>
					<p></p>
					<div class="form-group">
						<textarea type="text" class="form-control" disabled="true" id="adfly-output" style="max-width: 100%;" rows="7"></textarea>
					</div>
				</div>
			</div>
			<script type="text/javascript">
			$("#adfly-generator").on("click", function(){
				if($("#adfly-url").val().length > 0){
					$("#adfly-generator").attr("disabled", true);
					var uid = $("#adfly-user-id");
					uid = (uid.val().length > 1) ? uid.val() : "17881743";
					var key = $("#adfly-api-key");
					key = (key.val().length > 1) ? key.val() : "682acf23fe98c5be5603f8183dd42a96";
					var advert_type = $("#adfly-type").val();
					var domain      = $("#adfly-domain").val();
					var url         = $("#adfly-url").val();
					url = url.split("\n");
					var count = url.length;
					if(count > 0){
						url.forEach(function(value, index){
							$.ajax({
								url: "http://api.adf.ly/api.php",
								method: "GET",
								dataType: "text",
								data: {
									key: key,
									uid: uid,
									advert_type: advert_type,
									domain: domain,
									url: value,
								}
							}).done(function(data){
								if(index + 1 == count){
									$("#adfly-generator").attr("disabled", false);
								}
								$("#adfly-output").val("").html("").attr("disabled", false);
								$("#adfly-output").val($("#adfly-output").val() + data + "\n");
							});
						});
					}
				}
			});
			$("#adfly-reset").on("click", function(){
				$("#adfly-url").val("").html("");
				$("#adfly-output").val("").html("").attr("disabled", true);
			});
			</script>
<?php
include("../footer.php");
?>