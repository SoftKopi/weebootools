<?php
include("../header.php");
?>
			<div class="page-header">
				<h1>Base64 <small>Decode & Encode</small></h1>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
					<div class="list-group">
						<a href="/" class="list-group-item">Beranda</a>
						<a href="/base64" class="list-group-item active">Base64</a>
						<a href="/adfly" class="list-group-item">Adf.ly API</a>
						<a href="/cssminifier" class="list-group-item">CSS Minifier</a>
						<a href="/jsminifier" class="list-group-item">JS Minifier</a>
					</div>
				</div>
				<div class="col-lg-9 col-md-3 col-xs-12 col-sm-12">
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active">Base64</li>
					</ol>
					<div class="form-group">
						<textarea id="base64-input" class="form-control" rows="7" placeholder="Input..." style="max-width: 100%"></textarea>
					</div>
					<button type="button" class="btn btn-default" id="base64-decode">Decode</button> <button type="button" class="btn btn-default" id="base64-reset">Reset</button> <button type="button" class="btn btn-default" id="base64-encode">Encode</button>
					<p></p>
					<div class="form-group">
						<textarea id="base64-output" class="form-control" rows="7" placeholder="Output..." style="max-width: 100%" disabled="true"></textarea>
					</div>
				</div>
			</div>
			<script src="/js/jquery.base64.min.js"></script>
			<script type="text/javascript">
			// jQuery Base64 by Nick Galbreath <https://github.com/carlo/jquery-base64>
			var input  = $("#base64-input");
			var output = $("#base64-output");
			$("#base64-reset").on("click", function(){
				input.val("").html("");
				output.val("").html("").attr("disabled", true);
			});
			$("#base64-decode").on("click", function(){
				if(input.val().length > 0){
					var decode = $.base64.decode(input.val());
					output.val(decode).attr("disabled", false);
				}
			});
			$("#base64-encode").on("click", function(){
				if(input.val().length > 0){
					var encode = $.base64.encode(input.val());
					output.val(encode).attr("disabled", false);
				}
			});
			</script>
<?php
include("../footer.php");
?>