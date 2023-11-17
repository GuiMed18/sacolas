	<!-- Bootstrap core JavaScript -->
	<script src="../../CPDPanel/vendor/jquery/jquery.min.js"></script>
			<script src=" ../../CPDPanel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

			<!-- Core plugin JavaScript-->
			<script src="../../CPDPanel/vendor/jquery-easing/jquery.easing.min.js"></script>

			<!-- Custom scripts for all pages-->
			<script src=" ../../CPDPanel/js/sb-admin-2.min.js"></script>
			<script>
				(function() {
					function checkTime(i) {
						return (i < 10) ? "0" + i : i;
					}

					function startTime() {
						var today = new Date(),
							dayName = new Array("Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"),
							monName = new Array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho","Julho","Agosto","Setembro", "Outubro","Novembro", "Dezembro"),
							h = checkTime(today.getHours()),
							m = checkTime(today.getMinutes()),
							s = checkTime(today.getSeconds());
						document.getElementById('time').innerHTML = dayName[today.getDay()] + ", " + today.getDate() + " de " +
							monName[today.getMonth()] + " às " + h + ":" + m + ":" + s;
						t = setTimeout(function() {
							startTime()
						}, 500);
					}
					startTime();
				})();

				</script>