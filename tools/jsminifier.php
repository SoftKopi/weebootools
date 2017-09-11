<?php
include("../header.php");
?>
			<div class="page-header">
				<h1>JS Minifier <small>Minify JS Size</small></h1>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
					<div class="list-group">
						<a href="/" class="list-group-item">Beranda</a>
						<a href="/base64" class="list-group-item">Base64</a>
						<a href="/adfly" class="list-group-item">Adf.ly API</a>
						<a href="/cssminifier" class="list-group-item">CSS Minifier</a>
						<a href="/jsminifier" class="list-group-item active">JS Minifier</a>
					</div>
				</div>
				<div class="col-lg-9 col-md-3 col-xs-12 col-sm-12">
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active">JS Minifier</li>
					</ol>
					<div class="form-group">
						<label for="js-input">Input JS:</label>
						<textarea type="text" class="form-control" id="js-input" style="max-width: 100%;" rows="7"></textarea>
					</div>
					<button type="button" class="btn btn-default" id="js-minify">Minify</button> <button type="button" class="btn btn-default" id="js-reset">Reset</button>
					<p></p>
					<div class="form-group">
						<textarea type="text" class="form-control" disabled="true" id="js-output" style="max-width: 100%;" rows="7"></textarea>
					</div>
				</div>
				<script type="text/javascript">
				$("#js-reset").on("click", function(){
					$("#js-input").val("").html("");
					$("#js-minify").attr("disabled", false);
					$("#js-output").val("").html("").attr("disabled", true);
				});
				$("#js-minify").on("click", function(){
					if($("#js-input").val().length > 0){
						$("#js-minify").attr("disabled", true);
						$.ajax({
							method: "POST",
							dataType: "JSON",
							url: "https://refresh-sf.herokuapp.com/javascript/",
							data: {
								code: $("#js-input").val(),
								type: "javascript",
								options: {
									sequences: true,
									properties: true,
									dead_code: true,
									drop_debugger: true,
									conditionals: true,
									comparisons: true,
									evaluate: true,
									booleans: true,
									loops: true,
									unused: true,
									hoist_funs: true,
									if_return: true,
									join_vars: true,
									cascade: true,
									warnings: true,
									negate_iife: true,
									unsafe: false,
									hoist_vars: false,
									pure_getters: false,
									drop_console: false,
									keep_fargs: false,
									toplevel: false,
									pure_funcs: ""
								}
							},
							crossDomain: true
						}).done(function(data){
							$("#js-output").val(data["code"]).attr("disabled", false);
						});
					}
				});
				</script>
<?php
include("../footer.php");
?>