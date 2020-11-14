<footer class="site-footer clearfix">
    <div class="contenedor">
      <div class="footer-info footer-contenido">
        <h3>Sobre <span>GdlWebCamp</span></h3>
        <p>Aenean sapien urna, volutpat et elementum a, commodo ac ipsum. Morbi tempor mi nec arcu rutrum, et rhoncus tortor rhoncus. Vivamus eu libero nec ipsum dignissim imperdiet.</p>
      </div> <!--footer info-->
      <div class="ultimos-tweets footer-contenido">
          <h3>Ultimos <span>tweets</span></h3>
          <ul>
            <li>Integer non convallis ante. Aliquam mattis porttitor venenatis. Sed sit amet sem ac nulla congue sagittis.</li>
            <li>Integer non convallis ante. Aliquam mattis porttitor venenatis. Sed sit amet sem ac nulla congue sagittis.</li>
            <li>Integer non convallis ante. Aliquam mattis porttitor venenatis. Sed sit amet sem ac nulla congue sagittis.</li>
          </ul>
      </div> <!--ultimos-tweets-->
      <div class="menu footer-contenido">
          <h3>Redes <span>sociales</span></h3>
          <nav class="redes-sociales">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-pinterest"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </nav>
      </div> <!--menu-->
    </div> <!--contenedor-->

    <p class="copyright">Todos los derechos reservados GDLWEBCAMP 2019</p>
  </footer>

  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.animateNumber.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.lettering.js"></script>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>

  <?php
    $archivo = basename($_SERVER['PHP_SELF']); // devuelve el nombre de la pagina actual
    $pagina = str_replace('.php', '', $archivo);
    if($pagina == 'invitados' || $pagina == 'index') {
      echo '<script src="js/jquery.colorbox-min.js"></script>';
    } else if($pagina == 'conferencia') {
      echo '<script src="js/lightbox.js"></script>';
    }
  ?>

  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>