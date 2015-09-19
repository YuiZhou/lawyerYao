<div class="search">
	<h3>关键词检索RESEARCH</h3>
	<form action="./search.php" method="get" onsubmit="return check(this)">
		<input type="text" placeholder="Search..." name="s" id="s" required>
		<input type="submit" value="确认搜索" />
	</form>
</div>

<script type="text/javascript">
	function check(form){
		if(trim(form.s.value)=='') {
	        form.s.value = "";
	        return false;
	    }
	    return true;
	}
</script>