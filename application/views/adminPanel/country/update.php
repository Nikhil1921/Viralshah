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
            <?= form_label('Country Name', 'country_name') ?>
            <?= form_input([
            'name' => "country_name",
            'class' => "form-control",
            'id' => "country_name",
            'placeholder' => "Enter Country Name",
            'value' => (!empty(set_value('country_name'))) ? set_value('country_name') : $data['country_name']
            ]) ?>
            <?= form_error('country_name') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Country Type', 'country_type') ?>
            <?= form_dropdown('country_type', ['Visitor' => 'Visitor', 'Student' => 'Student', 'Permanent Residency' => 'Permanent Residency'], (!empty(set_value('country_type'))) ? set_value('country_type') : $data['country_type'], [
            'class' => 'form-control',
            'id' => "country_type"
            ]) ?>
            <?= form_error('country_type') ?>
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