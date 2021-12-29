<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
  <div class="card card-danger card-outline">
    <div class="card-header">
      <h5 class="card-title m-0"><?= ucwords($operation).' '.ucwords($title) ?></h5>
    </div>
    <?php $images = json_decode($data['images']);
    foreach ($images as $k => $v): ?>
    <?= form_open_multipart($url.'/upload_image/'.$id, '', ['image_name' => $k]) ?>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label(strtoupper(str_replace('_', ' ', $k)), 'image') ?>
            <div class="input-group">
              <div class="custom-file">
                <?= form_input([
                'type' => "file",
                'name' => "image",
                'class' => "custom-file-input",
                'id' => "image",
                'accept' => '.png,.jpeg,.jpg,',
                'onchange' => 'this.form.submit()'
                ]) ?>
                <?= form_label('Select image', 'image', ['class' => 'custom-file-label']) ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <?= ($v) ? img(['src' => "assets/images/vehicles/".$v, 'height' => "60%", 'width' => "100%"]) : 'Upload Pending.' ?>
        </div>
      </div>
    </div>
    <?= form_close() ?>
    <?php endforeach ?>
    <div class="card-footer">
      <div class="row">
        <div class="col-md-6">
          <?= anchor($url, 'Go Back', 'class="btn btn-outline-danger col-md-4"'); ?>
        </div>
      </div>
    </div>
  </div>
</div>