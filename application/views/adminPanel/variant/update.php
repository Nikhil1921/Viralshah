<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
  <div class="card card-success card-outline">
    <div class="card-header">
      <h5 class="card-title m-0"><?= ucwords($operation).' '.ucwords($title) ?></h5>
    </div>
    <?= form_open($url.'/update/'.$id) ?>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
              <?= form_label('Vehicle Make', 'make_id') ?>
              <?php $make[''] = 'Select Make'; foreach ($makes as $mk):
              $make[e_id($mk['id'])] = ucwords($mk['make']);
              endforeach ?>
              <?= form_dropdown('make_id', $make, set_value('make_id') ? set_value('make_id') : e_id($data['make_id']), [
              'class' => 'form-control',
              'id' => "make_id"
              ]) ?>
              <?= form_error('make_id') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Variant Name', 'variant') ?>
            <?= form_input([
            'name' => "variant",
            'class' => "form-control",
            'id' => "variant",
            'placeholder' => "Enter variant name",
            'value' => (!empty(set_value('variant'))) ? set_value('variant') : $data['variant']
            ]) ?>
            <?= form_error('variant') ?>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="row">
        <div class="col-md-6">
          <?= form_button([ 'content' => 'Save',
          'type'  => 'submit',
          'class' => 'btn btn-outline-primary col-md-4']) ?>
        </div>
        <div class="col-md-6">
          <?= anchor($url, 'Cancel', 'class="btn btn-outline-danger col-md-4"'); ?>
        </div>
      </div>
    </div>
    <?= form_close() ?>
  </div>
</div>