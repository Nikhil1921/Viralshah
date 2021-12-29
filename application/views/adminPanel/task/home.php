<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
  <div class="card card-success card-outline">
    <div class="card-header">
      <div class="row">
        <div class="col-sm-2">
          <h5 class="card-title m-0"><?= ucwords($title) ?> List</h5>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
              </div>
              <input type="text" class="date form-control float-right" id="reservation">
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <div class="input-group">
              <select id="emp" class="form-control ajax-reload">
                <option value="">Employee</option>
                <?php foreach ($emps as $emp): ?>
                  <option value="<?= $emp['id'] ?>"><?= $emp['name'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <div class="input-group">
              <select id="veh_sender" class="form-control ajax-reload">
                <option value="">Sender</option>
                <?php foreach ($veh_sends as $send): ?>
                  <option value="<?= $send['id'] ?>"><?= $send['name'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <div class="input-group">
              <select id="veh_emp" class="form-control ajax-reload">
                <option value="">Sender EMP</option>
                <?php foreach ($veh_emps as $s_emp): ?>
                  <option value="<?= $s_emp['id'] ?>"><?= $s_emp['name'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <?= anchor($url.'/add', 'Add', 'class="btn btn-block btn-outline-success btn-sm"'); ?>
        </div>
      </div>
      <ul class="nav nav-pills ml-auto p-2">
        <li class="nav-item"><a class="nav-link task_status active" href="#tab_1" data-toggle="tab">Pending</a></li>
        <li class="nav-item"><a class="nav-link task_status" href="#tab_2" data-toggle="tab">Completed</a></li>
      </ul>
      <input type="hidden" id="task_status" value="Pending" />
    </div>
    <div class="card-body table-responsive">
      <table class="table table-striped table-hover datatable">
        <thead>
          <tr>
            <th class="target">Sr. No.</th>
            <th>Vehicle No.</th>
            <th>App. No</th>
            <th>Sender</th>
            <th>City</th>
            <th>Employee</th>
            <th>Inspection Date</th>
            <th>Payment</th>
            <th>Payment Status</th>
            <th>Status</th>
            <th class="target">Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>
<input type="hidden" id="start" />
<input type="hidden" id="end" />