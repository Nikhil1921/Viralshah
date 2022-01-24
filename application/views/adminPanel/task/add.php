<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
  <div class="card card-success card-outline">
    <div class="card-header">
      <h5 class="card-title m-0"><?= ucwords($operation).' '.ucwords($title) ?></h5>
    </div>
    <?= form_open($url.'/add') ?>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Vehicle No', 'veh_no') ?>
            <?= form_input([
            'name' => "veh_no",
            'class' => "form-control",
            'id' => "veh_no",
            'placeholder' => "Enter Vehicle No",
            'onkeyup' => "existCheck(this.value)",
            'value' => set_value('veh_no')
            ]) ?>
            <?= form_error('veh_no') ?>
            <span class="exist-check text-success"></span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Application No.', 'app_no') ?>
            <?= form_input([
            'name' => "app_no",
            'class' => "form-control",
            'id' => "app_no",
            'placeholder' => "Enter Application No.",
            'value' => set_value('app_no')
            ]) ?>
            <?= form_error('app_no') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Vehicle Sender', 'veh_sender') ?>
            <?php $sender[''] = 'Select Vehicle Sender'; foreach ($senders as $vs):
            $sender[e_id($vs['id'])] = ucwords($vs['name']);
            endforeach ?>
            <?= form_dropdown('veh_sender', $sender, set_value('veh_sender'), [
            'class' => 'form-control dependent',
            'id' => "veh_sender",
            'data-dependent' => 'veh_sender_emp',
            'data-url' => base_url(admin('home/getEmps')),
            'data-value' => set_value('veh_sender_emp')
            ]) ?>
            <?= form_error('veh_sender') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Vehicle Sender Employee', 'veh_sender_emp') ?>
            <?= form_dropdown('veh_sender_emp', [], '', [
            'class' => 'form-control',
            'id' => "veh_sender_emp"
            ]) ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Applicant/Hirer', 'applicant') ?>
            <?= form_input([
            'name' => "applicant",
            'class' => "form-control",
            'id' => "applicant",
            'placeholder' => "Enter Applicant/Hirer",
            'value' => set_value('applicant')
            ]) ?>
            <?= form_error('applicant') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Applicant Mobile', 'applicant_mobile') ?>
            <?= form_input([
            'name' => "applicant_mobile",
            'class' => "form-control",
            'id' => "applicant_mobile",
            'placeholder' => "Enter Applicant Mobile",
            'maxlength' => 10,
            'value' => set_value('applicant_mobile')
            ]) ?>
            <?= form_error('applicant_mobile') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Employee', 'emp_id') ?>
            <?php foreach ($emps as $e):
            $emp[e_id($e['id'])] = ucwords($e['name']);
            endforeach ?>
            <?= form_dropdown('emp_id', $emp, set_value('emp_id'), [
            'class' => 'form-control',
            'id' => "emp_id"
            ]) ?>
            <?= form_error('emp_id') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('City', 'city_id') ?>
            <?php foreach ($cities as $c):
            $city[e_id($c['id'])] = ucwords($c['city']);
            endforeach ?>
            <?= form_dropdown('city_id', $city, set_value('city_id'), [
            'class' => 'form-control',
            'id' => "city_id"
            ]) ?>
            <?= form_error('city_id') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Payment Type', 'pay_type') ?>
            <?php $pay_type = ['Pending' => 'Pending', 'Recieved' => 'Recieved'] ?>
            <?= form_dropdown('pay_type', $pay_type, set_value('pay_type'), [
            'class' => 'form-control',
            'id' => "pay_type"
            ]) ?>
            <?= form_error('pay_type') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Payment', 'payment') ?>
            <?= form_input([
              'type' => "number",
              'class' => "form-control",
              'id' => "payment",
              'name' => "payment",
              'placeholder' => "Enter Payment",
              'autocomplete' => "off",
              'value' => set_value('payment')
              ]) ?>
            <?= form_error('payment') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Inspection Date', 'ins_date_sel') ?>
            <div class="" id="ins_date" data-target-input="nearest" >
              <?= form_input([
              'class' => "form-control",
              'id' => "ins_date_sel",
              'name' => "ins_date",
              'type' => 'date',
              'autocomplete' => "off",
              'value' => set_value('ins_date')
              ]) ?>
            </div>
            <?= form_error('ins_date') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Loan No', 'loan') ?>
            <?= form_input([
            'name' => "loan",
            'class' => "form-control",
            'id' => "loan",
            'placeholder' => "Enter Loan No",
            'value' => set_value('loan')
            ]) ?>
            <?= form_error('loan') ?>
            <span class="exist-check text-success"></span>
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