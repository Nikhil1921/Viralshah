<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
  <div class="card card-success card-outline">
    <div class="card-header">
      <h5 class="card-title m-0"><?= ucwords($operation).' '.ucwords($title) ?></h5>
    </div>
    <?= form_open($url.'/update/'.$id) ?>
    <div class="card-body">
      <div class="row">
        <div class="col-md-12 alert alert-warning text-center">
          A : GENERAL INFORMATION
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Vehicle No', 'veh_no') ?>
            <?= form_input([
            'name' => "veh_no",
            'class' => "form-control",
            'id' => "veh_no",
            'placeholder' => "Enter Vehicle No",
            'value' => (!empty(set_value('veh_no'))) ? set_value('veh_no') : $data['veh_no']
            ]) ?>
            <?= form_error('veh_no') ?>
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
            'value' => (!empty(set_value('app_no'))) ? set_value('app_no') : $data['app_no']
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
            <?= form_dropdown('veh_sender', $sender, (!empty(set_value('veh_sender'))) ? set_value('veh_sender') : e_id($data['veh_sender']), [
            'class' => 'form-control dependent',
            'id' => "veh_sender",
            'data-dependent' => 'veh_sender_emp',
            'data-url' => base_url(admin('home/getEmps')),
            'data-value' => (!empty(set_value('veh_sender_emp'))) ? set_value('veh_sender_emp') : e_id($data['veh_sender_emp'])
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
            'value' => (!empty(set_value('applicant'))) ? set_value('applicant') : $data['applicant']
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
            'value' => (!empty(set_value('applicant_mobile'))) ? set_value('applicant_mobile') : $data['applicant_mobile']
            ]) ?>
            <?= form_error('applicant_mobile') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Reference No.') ?>
            <?= form_input([
            'class' => "form-control",
            'readonly' => "readonly",
            'value' => $data['ref_no']
            ]) ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('City', 'city_id') ?>
            <?php foreach ($cities as $c):
            $city[e_id($c['id'])] = ucwords($c['city']);
            endforeach ?>
            <?= form_dropdown('city_id', $city, (!empty(set_value('city_id'))) ? set_value('city_id') : e_id($data['city_id']), [
            'class' => 'form-control',
            'id' => "city_id"
            ]) ?>
            <?= form_error('city_id') ?>
          </div>
        </div>
        <?php if($data['pay_type'] == 'Pending'): ?>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Payment Type', 'pay_type') ?>
            <?php $pay_type = ['Pending' => 'Pending', 'Recieved' => 'Recieved'] ?>
            <?= form_dropdown('pay_type', $pay_type, (!empty(set_value('pay_type'))) ? set_value('pay_type') : $data['pay_type'], [
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
              'value' => (!empty(set_value('payment'))) ? set_value('payment') : $data['payment']
              ]) ?>
            <?= form_error('payment') ?>
          </div>
        </div>
        <?php endif ?>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Inspection Date', 'ins_date_sel') ?>
            <div class="input-group date" id="ins_date" data-target-input="nearest" >
              <?= form_input([
              'class' => "form-control datetimepicker-input",
              'id' => "ins_date_sel",
              'name' => "ins_date",
              'data-target' => "#ins_date",
              'data-toggle' => "datetimepicker",
              'placeholder' => "Select Inspection Date",
              'autocomplete' => "off",
              'value' => (!empty(set_value('ins_date'))) ? set_value('ins_date') : date('m/d/Y', strtotime($data['ins_date']))
              ]) ?>
              <div class="input-group-append" data-target="#ins_date" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
              </div>
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
            'value' => (!empty(set_value('loan'))) ? set_value('loan') : $data['loan']
            ]) ?>
            <?= form_error('loan') ?>
            <span class="exist-check text-success"></span>
          </div>
        </div>
        <div class="col-md-12 alert alert-warning text-center">
          B : VEHICLE PARTICULAR
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Make', 'make') ?>
            <?php foreach ($makes as $mk):
            $make[e_id($mk['id'])] = ucwords($mk['make']);
            endforeach ?>
            <?= form_dropdown('make', $make, (!empty(set_value('make'))) ? set_value('make') : e_id($data['make']), [
            'class' => 'form-control dependent',
            'id' => "make",
            'data-dependent' => 'variant',
            'data-url' => base_url(admin('home/getVariant')),
            'data-value' => (!empty(set_value('variant'))) ? set_value('variant') : e_id($data['variant'])
            ]) ?>
            <?= form_error('make') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Variant', 'variant') ?>
            <?= form_dropdown('variant', [], '', [
            'class' => 'form-control dependent',
            'id' => "variant",
            'data-dependent' => 'trim',
            'data-url' => base_url(admin('home/getTrims')),
            'data-value' => (!empty(set_value('trim'))) ? set_value('trim') : e_id($data['trim'])
            ]) ?>
            <?= form_error('variant') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('TRIM', 'trim') ?>
            <?= form_dropdown('trim', [], '', [
            'class' => 'form-control',
            'id' => "trim"
            ]) ?>
            <?= form_error('trim') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Body Type', 'body_type') ?>
            <?php foreach ($body_types as $bt):
            $body[e_id($bt['id'])] = ucwords($bt['body_type']);
            endforeach ?>
            <?= form_dropdown('body_type', $body, (!empty(set_value('body_type'))) ? set_value('body_type') : e_id($data['body_type']), [
            'class' => 'form-control',
            'id' => "body_type"
            ]) ?>
            <?= form_error('body_type') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Fuel', 'fuel') ?>
            <?php foreach ($fuels as $fu):
            $fuel[e_id($fu['id'])] = ucwords($fu['fuel']);
            endforeach ?>
            <?= form_dropdown('fuel', $fuel, (!empty(set_value('fuel'))) ? set_value('fuel') : e_id($data['fuel']), [
            'class' => 'form-control',
            'id' => "fuel"
            ]) ?>
            <?= form_error('fuel') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Vehicle Classs', 'veh_class') ?>
            <?php foreach ($vehicle_classes as $vc):
            $vehicle_class[e_id($vc['id'])] = ucwords($vc['class']);
            endforeach ?>
            <?= form_dropdown('veh_class', $vehicle_class, (!empty(set_value('veh_class'))) ? set_value('veh_class') : e_id($data['veh_class']), [
            'class' => 'form-control',
            'id' => "veh_class"
            ]) ?>
            <?= form_error('veh_class') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Old Regn. No.', 'old_veh_no') ?>
            <?= form_input([
            'name' => "old_veh_no",
            'class' => "form-control",
            'id' => "old_veh_no",
            'placeholder' => "Enter Old Regn. No.",
            'value' => (!empty(set_value('old_veh_no'))) ? "NA" : $data['old_veh_no']
            ]) ?>
            <?= form_error('old_veh_no') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Owner', 'owner') ?>
            <?= form_input([
            'name' => "owner",
            'class' => "form-control",
            'id' => "owner",
            'placeholder' => "Enter Owner",
            'value' => (!empty(set_value('owner'))) ? set_value('owner') : $data['owner']
            ]) ?>
            <?= form_error('owner') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Owner SR. No.', 'owner_sr') ?>
            <?= form_input([
            'name' => "owner_sr",
            'class' => "form-control",
            'id' => "owner_sr",
            'placeholder' => "Enter Owner SR. No.",
            'value' => (!empty(set_value('owner_sr'))) ? set_value('owner_sr') : $data['owner_sr']
            ]) ?>
            <?= form_error('owner_sr') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('GVW (KGS)', 'gvw') ?>
            <?= form_input([
            'name' => "gvw",
            'class' => "form-control",
            'id' => "gvw",
            'placeholder' => "Enter GVW (KGS)",
            'value' => (!empty(set_value('gvw'))) ? set_value('gvw') : $data['gvw']
            ]) ?>
            <?= form_error('gvw') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('HPA WITH', 'hpa') ?>
            <?= form_input([
            'name' => "hpa",
            'class' => "form-control",
            'id' => "hpa",
            'placeholder' => "Enter HPA WITH",
            'value' => (!empty(set_value('hpa'))) ? set_value('hpa') : $data['hpa']
            ]) ?>
            <?= form_error('hpa') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Registration Date', 'reg_date_sel') ?>
            <div class="input-group date" id="reg_date" data-target-input="nearest" >
              <?= form_input([
              'class' => "form-control datetimepicker-input",
              'id' => "reg_date_sel",
              'name' => "reg_date",
              'data-target' => "#reg_date",
              'data-toggle' => "datetimepicker",
              'placeholder' => "Select Registration Date",
              'autocomplete' => "off",
              'value' => (!empty(set_value('reg_date'))) ? set_value('reg_date') : date('m/d/Y', strtotime($data['reg_date']))
              ]) ?>
              <div class="input-group-append" data-target="#reg_date" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
              </div>
            </div>
            <?= form_error('reg_date') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Chassis No', 'chassis_no') ?>
            <?= form_input([
            'name' => "chassis_no",
            'class' => "form-control",
            'id' => "chassis_no",
            'placeholder' => "Enter Chassis No",
            'value' => (!empty(set_value('chassis_no'))) ? set_value('chassis_no') : $data['chassis_no']
            ]) ?>
            <?= form_error('chassis_no') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Engine No.', 'engine_no') ?>
            <?= form_input([
            'name' => "engine_no",
            'class' => "form-control",
            'id' => "engine_no",
            'placeholder' => "Enter Engine No.",
            'value' => (!empty(set_value('engine_no'))) ? set_value('engine_no') : $data['engine_no']
            ]) ?>
            <?= form_error('engine_no') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Manufacturing Year', 'man_year') ?>
            <?= form_input([
            'name' => "man_year",
            'class' => "form-control",
            'id' => "man_year",
            'maxlength' => 4,
            'placeholder' => "Enter Manufacturing Year",
            'value' => (!empty(set_value('man_year'))) ? set_value('man_year') : $data['man_year']
            ]) ?>
            <?= form_error('man_year') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Seating', 'seating') ?>
            <?= form_input([
            'name' => "seating",
            'class' => "form-control",
            'id' => "seating",
            'maxlength' => 2,
            'placeholder' => "Enter Seating",
            'value' => (!empty(set_value('seating'))) ? set_value('seating') : $data['seating']
            ]) ?>
            <?= form_error('seating') ?>
          </div>
        </div>
        <div class="col-md-12 alert alert-warning text-center">
          C : CONDITION OF ASSET <br>
          (A- Execellent, B-Good, C-Average, D-Poor)
        </div>
        <?php $condition = json_decode($data['condition']);
        $cond = ['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'NA' => 'NA'] ?>
        <div class="col-md-2">
          <?= form_label('Engine', 'engine') ?>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <?= form_dropdown('condition[engine]', $cond, $condition->engine, [
            'class' => 'form-control',
            'id' => "engine"
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('Chassis', 'chassis') ?>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <?= form_dropdown('condition[chassis]', $cond, $condition->chassis, [
            'class' => 'form-control',
            'id' => "chassis"
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('Body Cabin', 'body_cabin') ?>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <?= form_dropdown('condition[body_cabin]', $cond, $condition->body_cabin, [
            'class' => 'form-control',
            'id' => "body_cabin"
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('Transmission', 'transmission') ?>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <?= form_dropdown('condition[transmission]', $cond, $condition->transmission, [
            'class' => 'form-control',
            'id' => "transmission"
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('Load Body', 'load_body') ?>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <?= form_dropdown('condition[load_body]', $cond, $condition->load_body, [
            'class' => 'form-control',
            'id' => "load_body"
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('Steering / Suspension', 'steering') ?>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <?= form_dropdown('condition[steering]', $cond, $condition->steering, [
            'class' => 'form-control',
            'id' => "steering"
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('Tyres', 'tyres') ?>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <?= form_dropdown('condition[tyres]', $cond, $condition->tyres, [
            'class' => 'form-control',
            'id' => "tyres"
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('Electrical Parts', 'electrical_parts') ?>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <?= form_dropdown('condition[electrical_parts]', $cond, $condition->electrical_parts, [
            'class' => 'form-control',
            'id' => "electrical_parts"
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('Battery', 'battery') ?>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <?= form_dropdown('condition[battery]', $cond, $condition->battery, [
            'class' => 'form-control',
            'id' => "battery"
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('AC System', 'ac_system') ?>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <?= form_dropdown('condition[ac_system]', $cond, $condition->ac_system, [
            'class' => 'form-control',
            'id' => "ac_system"
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('Upholstery', 'upholstery') ?>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <?= form_dropdown('condition[upholstery]', $cond, $condition->upholstery, [
            'class' => 'form-control',
            'id' => "upholstery"
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('Hydraulic', 'hydraulic') ?>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <?= form_dropdown('condition[hydraulic]', $cond, $condition->hydraulic, [
            'class' => 'form-control',
            'id' => "hydraulic"
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('Other', 'other') ?>
        </div>
        <div class="col-md-10">
          <div class="form-group">
            <?= form_input([
            'name' => "condition[other]",
            'class' => "form-control",
            'id' => "other",
            'placeholder' => "Enter Other Condition (If Any)",
            'value' => $condition->other
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('OVERALL CONDITION RATING', 'overall') ?>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?= form_input([
            'name' => "condition[overall]",
            'class' => "form-control",
            'id' => "overall",
            'placeholder' => "Enter OVERALL CONDITION RATING",
            'value' => $condition->overall
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('ODO. READING (Km)', 'odo') ?>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?= form_input([
            'name' => "condition[odo]",
            'class' => "form-control",
            'id' => "odo",
            'placeholder' => "Enter ODO. READING (Km)",
            'value' => $condition->odo
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('VEHICLE COLOUR', 'color') ?>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?= form_input([
            'name' => "condition[color]",
            'class' => "form-control",
            'id' => "color",
            'placeholder' => "Enter VEHICLE COLOUR",
            'value' => $condition->color
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('CHASSIS NO. REPUNCHED', 'repunched') ?>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?= form_dropdown('repunched', ['YES' => 'YES', 'NO' => 'NO'], (!empty(set_value('repunched'))) ? set_value('repunched') : $data['repunched'], [
            'class' => 'form-control',
            'id' => "repunched"
            ]) ?>
            <?= form_error('repunched') ?>
          </div>
        </div>
        <div class="col-md-12 alert alert-warning text-center">
          E : APPROX VEHICLE PRICE
        </div>
        <div class="col-md-2">
          <?= form_label('Approx new vehicle price (as on today)', 'approx_today') ?>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?= form_input([
            'name' => "condition[approx_today]",
            'class' => "form-control",
            'id' => "approx_today",
            'placeholder' => "Enter Approx new vehicle price (as on today)",
            'value' => $condition->approx_today
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('Approx new vehicle price (at purchase time)', 'approx_purchase') ?>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?= form_input([
            'name' => "condition[approx_purchase]",
            'class' => "form-control",
            'id' => "approx_purchase",
            'placeholder' => "Enter Approx new vehicle price (at purchase time)",
            'value' => $condition->approx_purchase
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('Demand in market', 'demand') ?>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?= form_dropdown('condition[demand]', ['HIGH' => 'HIGH', 'AVERAGE' => 'AVERAGE', 'LOW' => 'LOW'], $condition->demand, [
            'class' => 'form-control',
            'id' => "demand"
            ]) ?>
          </div>
        </div>
        <div class="col-md-2">
          <?= form_label('Absolute model', 'absolute') ?>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?= form_dropdown('condition[absolute]', ['YES' => 'YES', 'NO' => 'NO'], $condition->absolute, [
            'class' => 'form-control',
            'id' => "absolute"
            ]) ?>
          </div>
        </div>
        <div class="col-md-12 alert alert-warning text-center">
          F : RTO DOCUMENTS, INSURANCE & TAX VALIDITY
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('RTO DOCUMENTS, INSURANCE & TAX VALIDITY', 'documents') ?>
            <?= form_dropdown('documents', ['VALID' => 'VALID', 'INVALID' => 'INVALID'], (!empty(set_value('documents'))) ? set_value('documents') : $data['documents'], [
            'class' => 'form-control',
            'id' => "documents"
            ]) ?>
            <?= form_error('documents') ?>
          </div>
        </div>
        <div class="col-md-12 alert alert-warning text-center">
          G : DECLARATION
        </div>
        <div class="col-md-12">
          <?= form_label('1) I had not verified the original docs. which is to be checked at your end.') ?>
        </div>
        <div class="col-md-12">
          <?= form_label('2) This report is valid for 30 days from the inspection date.') ?>
        </div>
        <div class="col-md-9">
          <?= form_label('3) this report is addressed and is to be used solely by the said party for the stated purpose only and I am not liable for any loss or liability sustained by any third party relying on this Valuation Report', 'emp_id') ?>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <?php foreach ($emps as $e):
            $emp[e_id($e['id'])] = ucwords($e['name']);
            endforeach ?>
            <?= form_dropdown('emp_id', $emp, (!empty(set_value('emp_id'))) ? set_value('emp_id') : e_id($data['emp_id']), [
            'class' => 'form-control',
            'id' => "emp_id"
            ]) ?>
            <?= form_error('emp_id') ?>
          </div>
        </div>
        <div class="col-md-12">
          <?= form_label('4) Encl : Photo of vehicle.') ?>
        </div>
        <div class="col-md-12 alert alert-warning text-center">
          H : MARKET VALUE
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Market Value', 'market_value') ?>
            <?= form_input([
            'name' => "market_value",
            'class' => "form-control",
            'id' => "market_value",
            'placeholder' => "Enter Market Value",
            'value' => (!empty(set_value('market_value'))) ? set_value('market_value') : $data['market_value']
            ]) ?>
            <?= form_error('market_value') ?>
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