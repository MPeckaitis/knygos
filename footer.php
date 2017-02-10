<footer><p id="copyright">&copy; Knygų fondas 2017</p></footer>
	  
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script>
		//pakeiciam validation defaultine zinute
		var form = document.forms[0], 
		submit = document.getElementById('submit'),
		input = document.getElementById('st-val');

		input.addEventListener('invalid', function(e) {
			if(!input.validity.valid) {
				e.target.setCustomValidity("Paiškos frazė turi būti sudaryta iš raidžių, skaičių ir tarpų!"); 
			} 
			// kad pranesimas ne liktu kaboti visada ji isjungiam
			input.addEventListener('input', function(e){
				e.target.setCustomValidity('');
			});
		}, false);
		
	</script>
  </body>
</html>