<div class="container">
   <h2>mmgr - movies</h2>
   <?php if ($added): ?>
      <div class="alert alert-success"><strong>Movie added!</strong> It may take a tiny bit to show up here.</div>
   <?php endif; ?>
   <form class="form-inline" role="form" method="POST" action="<?php echo site_url('movies/add') ?>">
      <span class="form-group">
         <input type="text" class="form-control input-md" id="movie-title" placeholder="Search for movie..." />
      </span>
      <input type="hidden" name="id" id="movie-id" />
      <button type="submit" class="btn btn-primary btn-md">Add</button>
   </form>
   <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <h3>Looking For</h3>
         <table class="table table-bordered table-striped">
            <tbody>
               <?php foreach ($watching['movies'] as $movie): ?>
               <tr>
                  <td>
                     <?php echo $movie['library']['info']['original_title']; ?>
                     (<?php echo $movie['library']['info']['year']; ?>)
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <h3>Have</h3>
         <table class="table table-bordered table-striped">
            <?php foreach ($have as $movie): ?>
               <tr>
                  <td>
                     <?php echo $movie; ?>
                  </td>
               </tr>
            <?php endforeach; ?>
         </table>
      </div>
   </div>
</div>
<script type="text/javascript">
   $('#movie-title').typeahead({
      name: 'movies',
      remote: '<?php echo site_url('movies/search'); ?>?q=%QUERY',
      valueKey: 'title'
   }).on('typeahead:selected', function (ev, el) {
      $('#movie-id').val(el.id);
   });
</script>