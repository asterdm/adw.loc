
<div class="container">
      <div class="row text-center">
          <div style="height: 80px" class="col-md-12"></div>
        <?php foreach ($reports as $report): ?>
        <iframe width="933" height="700" src="<?= $report->report_url ?>"  frameborder="0" allowfullscreen="true"></iframe>
        <?php endforeach  ?>
        
	</div>
    </div>