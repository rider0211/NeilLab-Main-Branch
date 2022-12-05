<!--**********************************
  Footer start
***********************************-->
 <div class="footer">
      <div class="copyright">
          <!-- <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2021</p> -->
      </div>
  </div>
<!--**********************************
  Footer end
***********************************-->

<script>

  	
  function updateThemeModeConfig(mode){
		$.ajax({
			type: "post",
			url : '{!! url('/updateThemeMode'); !!}',
			data: {
				"_token": "{{ csrf_token() }}",
				"mode": mode,
			},
			success: function(data){
			},
		});
	}

</script>