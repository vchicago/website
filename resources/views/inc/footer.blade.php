
	      <!-- Footer -->
      <footer class="page-footer font-small">
          <div class="copyright text-center py-3 text-white">
            <span><p><i>For entertainment purposes only. Do not use for real world purposes. Part of the <a href="http://vatsim.net" class="text-white">VATSIM</a> Network. Our Privacy Policy is located <a href="/privacypolicy" class="text-white">here</a>.</i></p></span>
			        @if(Carbon\Carbon::now()->month == 12)
			<br>
            <button class="btn btn-secondary btn-sm" onclick="snowStorm.stop();return false">Stop Snow</button>
			<br>
        @endif
            © {{ Carbon\Carbon::now()->year }} vZAU Ar-tek
            <br><br>
            <span id="dadjoke">Loading joke...</span>
        </p>
          </div>
      </footer>
      <!-- End of Footer -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
