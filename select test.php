<?php 
	include 'header.php';
?>
		<main class="container">
			<h1>Selectize.js</h1>

			<div class="demo">
				<h2>Plugin: "remove_button"</h2>
				
				<form class="form" id="job_form">
					<div class="form-group row">
						<label for="input-tags">Tags:</label>
						<input type="text" id="thisis" name="thisis" class="input-tags form-control form-control-success form-control-danger" value="awesome,neat,asif" required>
					</div>

					<div class="form-group row">
						<input type="text" name="middle" class="input-tags form-control form-control-success form-control-danger" value="awesome,neat,asif" required>
					</div>

					<div class="form-group row">
						<select id="thatis" name="thatis" class="input-tags form-control" placeholder="Select a language..." multiple required>
							<option value="txt">Text</option>
							<option value="md">Markdown</option>
							<option value="html">HTML</option>
							<option value="php">PHP</option>
							<option value="python">Python</option>
							<option value="java">Java</option>
							<option value="js" selected>JavaScript</option>
							<option value="c#">Ruby</option>
							<option value="c#">VHDL</option>
							<option value="c#">Verilog</option>
							<option value="c#">C#</option>
							<option value="c++">C/C++</option>
						</select>
						
					</div>

				</form>	
				
			</div>
		</main>
<script>

		var REG=/^[a-z\d\-_\s]+$/i;
    	$('#thatis').selectize({
		plugins: ['remove_button','drag_drop'],
		maxItems:2,
		persist: false,
		create: true,
		createFilter:REG,
		render: {
			item: function(data, escape) {
				return '<div>' + escape(data.text) + '</div>';
			}
		}
	});

</script>
<!--/############################# END Form Validation ###########################-->
<?php 
	include 'footer.php';
?>		
