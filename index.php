<?php include_once 'includes/templates/header.php'; ?>

  <section class="seccion contenedor">
    <h2>La mejor conferencia de diseño web en español</h2>
    <p>Phasellus aliquet porttitor turpis, tincidunt aliquet eros placerat sed. Integer non convallis ante. Aliquam mattis porttitor venenatis. Sed sit amet sem ac nulla congue sagittis. Suspendisse pharetra augue at diam facilisis, sit amet faucibus mauris laoreet. Ut iaculis ante vel lacus mattis egestas.</p>
  </section> <!--.section-->

  <section class="programa">
    <div class="contenedor-video">
        <video autoplay loop poster="img/bg-talleres.jpg">
            <source src="video/video.mp4" type="video/mp4">
            <source src="video/video.webm" type="video/webm">
            <source src="video/video.ogv" type="video/ogg">
        </video>
    </div> <!--contenedor video-->

    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">
          <h2>Programa del evento</h2>

          <?php 
        try {
            require_once('includes/funciones/bd_conexion.php');
            $sql = " SELECT * FROM `categoria_evento` ";
            $sql .= " ORDER BY `orden` "; 
            $resultado = $conn->query($sql);
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    ?>

          <nav class="menu-programa">
            <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)){ ?>
              <?php $categoria = $cat['cat_evento']; ?>
              <a href=#<?php echo strtolower($categoria) ?>><i class="fas <?php echo $cat['icono'] ?>"></i> <?php echo $categoria ?></a>
            <?php } ?>
          </nav>

          <?php 
            try {
              require_once('includes/funciones/bd_conexion.php');
              $sql = " SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono`, `nombre_invitado`, `apellido_invitado` ";
              $sql .= " FROM `eventos` ";
              $sql .= " INNER JOIN `categoria_evento` ";
              $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
              $sql .= " INNER JOIN `invitados` ";
              $sql .= " ON eventos.id_inv = invitados.invitado_id ";
              $sql .= " AND eventos.id_cat_evento = 1 ";
              $sql .= " ORDER BY `evento_id` LIMIT 2;"; 
              $sql .= " SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono`, `nombre_invitado`, `apellido_invitado` ";
              $sql .= " FROM `eventos` ";
              $sql .= " INNER JOIN `categoria_evento` ";
              $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
              $sql .= " INNER JOIN `invitados` ";
              $sql .= " ON eventos.id_inv = invitados.invitado_id ";
              $sql .= " AND eventos.id_cat_evento = 2 ";
              $sql .= " ORDER BY `evento_id` LIMIT 2;";
              $sql .= " SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono`, `nombre_invitado`, `apellido_invitado` ";
              $sql .= " FROM `eventos` ";
              $sql .= " INNER JOIN `categoria_evento` ";
              $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
              $sql .= " INNER JOIN `invitados` ";
              $sql .= " ON eventos.id_inv = invitados.invitado_id ";
              $sql .= " AND eventos.id_cat_evento = 3 ";
              $sql .= " ORDER BY `evento_id` LIMIT 2;"; 
            } catch(\Exception $e) {
              echo $e->getMessage();
            }
          ?>

          <?php !$conn->multi_query($sql); ?>

          <?php 
            do {
              $resultado = $conn->store_result();
              $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

              <?php $i = 0; ?>
              <?php foreach($row as $evento) { ?>
                <?php if($i % 2 == 0) { ?>
                  <div id="<?php echo strtolower($evento['cat_evento']);?>" class="info-curso ocultar clearfix">
                <?php } ?>

                  <div class="detalle-evento">
                    <h3><?php echo $evento['nombre_evento']; ?></h3>
                    <p><i class="fas fa-clock"></i><?php echo $evento['hora_evento'] ?></p>
                    <p><i class="fas fa-calendar-alt"></i> <?php echo $evento['fecha_evento'] ?></p>
                    <p><i class="fas fa-user"></i> <?php echo $evento['nombre_invitado'] . ' ' . $evento['apellido_invitado'] ?></p>
                  </div>

                <?php if($i % 2 == 1) { ?>
                    <a href="calendario.php" class="boton float-right">Ver Todos</a>
                  </div>
                <?php } ?>
              <?php $i++; ?>
              <?php }; ?>
              <?php $resultado->free(); ?>
            <?php  } while ($conn->more_results() && $conn->next_result());?>



        </div> <!--.programa-evento-->
      </div> <!--.contenedor-->
    </div><!--.contenido-programa-->
  </section> <!--.programa-->

  <?php include_once 'includes/templates/invitados.php'; ?>

  <div class="contador parallax">
    <div class="contenedor">
      <div class="resumen-evento">
        <div class="elemento-contador"><p class="numero"></p> Invitados</div>
        <div class="elemento-contador"><p class="numero"></p> Talleres</div>
        <div class="elemento-contador"><p class="numero"></p> Días</div>
        <div class="elemento-contador"><p class="numero"></p> Conferencias</div>
      </div>
    </div>
  </div>

  <section class="seccion precios">
    <h2>Precios</h2>
    <div class="contenedor">
      <div class="lista-precios">
        <div class="tabla-precio">
          <h3>Pase por día</h3>
          <p class="numero">$30</p>
          <ul>
            <li>Comida Gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <a href="#" class="boton hollow">Comprar</a>
        </div> <!--.tabla-precios-->
        <div class="tabla-precio">
          <h3>Todos los días</h3>
          <p class="numero">$50</p>
          <ul>
            <li>Comida Gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <a href="#" class="boton">Comprar</a>
        </div> <!--.tabla-precios-->
        <div class="tabla-precio">
          <h3>Pase por 2 días</h3>
          <p class="numero">$45</p>
          <ul>
            <li>Comida Gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <a href="#" class="boton hollow">Comprar</a>
        </div> <!--.tabla-precios-->
      </div><!--lista-precios-->
    </div><!--contenedor-->
  </section>

  <div id="mapa" class="mapa">
    <div>
    </div>
  </div>

  <section class="seccion">
    <h2>Testimoniales</h2>
    <div class="contenedor">
      <div class="testimoniales">
        <div class="testimonial">
          <blockquote>
            <p>Aenean sapien urna, volutpat et elementum a, commodo ac ipsum. Morbi tempor mi nec arcu rutrum, et rhoncus tortor rhoncus. Vivamus eu libero nec ipsum dignissim imperdiet. </p>
            <footer class="info-testimonial clearfix">
              <img src="img/testimonial.jpg" alt="foto testimonial">
              <cite>Howard Antetokounmpo <span>Diseñador en @wololo</span></cite>
            </footer>
          </blockquote>
        </div> <!--.testimonial-->
        <div class="testimonial">
          <blockquote>
            <p>Aenean sapien urna, volutpat et elementum a, commodo ac ipsum. Morbi tempor mi nec arcu rutrum, et rhoncus tortor rhoncus. Vivamus eu libero nec ipsum dignissim imperdiet. </p>
            <footer class="info-testimonial clearfix">
              <img src="img/testimonial.jpg" alt="foto testimonial">
              <cite>Howard Antetokounmpo <span>Diseñador en @wololo</span></cite>
            </footer>
          </blockquote>
        </div> <!--.testimonial-->
        <div class="testimonial">
          <blockquote>
            <p>Aenean sapien urna, volutpat et elementum a, commodo ac ipsum. Morbi tempor mi nec arcu rutrum, et rhoncus tortor rhoncus. Vivamus eu libero nec ipsum dignissim imperdiet. </p>
            <footer class="info-testimonial clearfix">
              <img src="img/testimonial.jpg" alt="foto testimonial">
              <cite>Howard Antetokounmpo <span>Diseñador en @wololo</span></cite>
            </footer>
          </blockquote>
        </div> <!--.testimonial-->
      </div><!--.testimoniales-->
  </div><!--contenedor-->
  </section>

  <div class="newsletter parallax">
    <div class="contenedor">
      <div class="contenido-newsletter">
        <p>registrate al newsletter</p>
        <h3>GdlWebCamp</h3>
        <a href="#" class="boton transparente">Registro</a>
      </div>
    </div>
  </div> <!--newsletter-->

  <section class="seccion">
    <h2>faltan</h2>
    <div class="cuenta-regresiva">
        <div class="elemento-contador"><p id="dias" class="numero"></p> Días</div>
        <div class="elemento-contador"><p id="horas" class="numero"></p> Horas</div>
        <div class="elemento-contador"><p id="minutos" class="numero"></p> Minutos</div>
        <div class="elemento-contador"><p id="segundos" class="numero"></p> Segundos</div>
    </div>
  </section>

<?php include_once 'includes/templates/footer.php'; ?>