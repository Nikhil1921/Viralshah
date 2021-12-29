<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
  <div class="card card-success card-outline">
    <div class="card-header">
      <h5 class="card-title m-0"><?= ucwords($operation).' '.ucwords($title) ?></h5>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Name') ?>
            <?= form_input([
            'class' => "form-control",
            'readonly' => "readonly",
            'value' => $data['name']
            ]) ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Mobile') ?>
            <?= form_input([
            'class' => "form-control",
            'readonly' => "readonly",
            'value' => $data['mobile']
            ]) ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Email') ?>
            <?= form_input([
              'class' => "form-control",
              'readonly' => "readonly",
              'value' => $data['email']
              ]) ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Employee code') ?>
            <?= form_input([
              'class' => "form-control",
              'readonly' => "readonly",
              'value' => $data['emp_code']
              ]) ?>
          </div>
        </div>
        <div class="col-md-12 table-responsive">
          <table class="table table-striped table-hover datatable">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Vehicle No</th>
                <th>Payment Status</th>
                <th>Payment</th>
                <th>Payment ID</th>
              </tr>
            </thead>
            <tbody>
              <?php if($tasks): ?>
              <?php foreach($tasks as $t => $task): ?>
                <tr>
                  <td><?= ++$t ?></td>
                  <td><?= $task['veh_no'] ?></td>
                  <td><?= $task['pay_type'] ?></td>
                  <td><?= $task['payment'] ?></td>
                  <td><?= $task['payment_id'] ? $task['payment_id'] : 'NA' ?></td>
                </tr>
              <?php endforeach ?>
              <?php else: ?>
                <tr>
                  <td colspan="5" class="text-center">No Tasks available.</td>
                </tr>
              <?php endif ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="row">
        <div class="col-md-6">
          <?= anchor($url, 'Go Back', 'class="btn btn-outline-danger col-md-4"'); ?>
        </div>
      </div>
    </div>
  </div>
</div>