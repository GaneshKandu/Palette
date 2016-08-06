<h1 class="text-light">New Project<span class="mif-palette place-right"></span></h1>
<hr class="thin bg-grayLighter"/>
<table class="dataTable border bordered" data-role="datatable" data-auto-width="false"> 
<div class="input-control text full-size">
	<input type="text" id="project" />
</div>
<button class="button primary" id="createproject" ><span class="mif-plus"></span> Create...</button>
<hr class="thin bg-grayLighter"/>
</table>
<script>
	document.getElementById("project").addEventListener('keydown', function(e) {
		if(e.keyCode == 13){
			createproject();
		}
	});
</script>
