
<div class="bg-head">Dashboard</div>
<div class="bg-body">
  <h6>Reportes</h6>
  <div class="list">
    <div class="p">
      <strong>Nombre del sitio:</strong>
      <?= get_bloginfo( 'name' ) ?> <!-- (establecido en Configuración> General)-->
    </div>
  </div>
  <div class="list">
    <div class="p">
      <strong>Nombre del sitio:</strong>
      <?= get_bloginfo( 'name' ) ?> <!-- (establecido en Configuración> General)-->
    </div>
  </div>
  <div class="list">
    <div class="p">
      <strong>Url de instalación:</strong>
      <?= get_bloginfo( 'url' ) ?> <!-- (establecido en Configuración> General)-->
    </div>
  </div>
  <div class="list">
    <div class="p">
      <strong>Url de WordPress:</strong>
      <?= get_bloginfo( 'wpurl' ) ?> <!-- (establecido en Configuración> General)-->
    </div>
  </div>
  <div class="list">
    <div class="p">
      <strong>Version de Wordpress:</strong>
      <?= get_bloginfo( 'version' ) ?> <!-- (establecido en Configuración> General)-->
    </div>
  </div>
  <div class="list">
    <div class="p">
      <strong>Listado de temas instalados (Se debe resaltar en negrilla el tema activo): </strong>
      <ol>
        <?php foreach(wp_get_themes() as $key=>$value): ?>
          <li>
            <?php if ($key == $tema_actual[0]->option_value): ?>
              <strong><?= $value ?> <span class="badge">Activo</span></strong>
            <?php else: ?>
              <?= $value ?>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </div>
  <div class="list">
    <div class="p">
      <strong>Listado de plugins instalados (Se debe resaltar en color verde los activos, rojo los inactivos):</strong>
      <ol>
        <?php foreach(get_plugins() as $plugin=>$value): ?>
          <?php $class = in_array($plugin, unserialize($plugins[0]->option_value)) ? 'verde' : 'rojo'; ?>
          <li class=<?= $class ?> >
            <?= $value['Name']?>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </div>
  <div class="list">
    <div class="p">
      <strong>Número de páginas publicadas:</strong>
      <?= $all_page[0]->count_page ?>
    </div>
  </div>
  <div class="list">
    <div class="p">
      <strong>Número de blogs publicados:</strong>
      <?= $all_post[0]->count_post ?>
    </div>
  </div>
<!-- https://developer.wordpress.org/reference/functions/get_bloginfo/ -->
</div>