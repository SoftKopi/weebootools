<?php
include("../header.php");
?>
			<div class="page-header">
				<h1>CSS Minifier <small>Minify CSS Size</small></h1>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
					<div class="list-group">
						<a href="/" class="list-group-item">Beranda</a>
						<a href="/base64" class="list-group-item">Base64</a>
						<a href="/adfly" class="list-group-item">Adf.ly API</a>
						<a href="/cssminifier" class="list-group-item active">CSS Minifier</a>
						<a href="/jsminifier" class="list-group-item">JS Minifier</a>
					</div>
				</div>
				<div class="col-lg-9 col-md-3 col-xs-12 col-sm-12">
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active">CSS Minifier</li>
					</ol>
					<div class="form-group">
						<label for="css-input">Input CSS:</label>
						<textarea type="text" class="form-control" id="css-input" style="max-width: 100%;" rows="7"></textarea>
					</div>
					<button type="button" class="btn btn-default" id="css-minify">Minify</button> <button type="button" class="btn btn-default" id="css-reset">Reset</button>
					<p></p>
					<div class="form-group">
						<textarea type="text" class="form-control" disabled="true" id="css-output" style="max-width: 100%;" rows="7"></textarea>
					</div>
				</div>
				<script src="/js/cssmin.min.js"></script>
				<script type="text/javascript">
				$("#css-reset").on("click", function(){
					$("#css-input").val("").html("");
					$("#css-minify").attr("disabled", false);
					$("#css-output").val("").html("").attr("disabled", true);
				});
				$("#css-minify").on("click", function(){
					if($("#css-input").val().length > 0){
						$("#css-output").val(YAHOO.compressor.cssmin($("#css-input").val())).attr("disabled", false);
					}
				});
				</script>
<?php
include("../footer.php");
?>