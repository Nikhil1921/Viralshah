<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
    <div class="card card-success card-outline">
        <div class="card-header">
        <h5 class="card-title m-0"><?= ucwords($operation).' '.ucwords($title) ?></h5>
        </div>
        <?= form_open($action) ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Vehicle Sender', 'sender_id') ?>
                        <?php $sender[''] = 'Select Vehicle Sender'; foreach ($senders as $vs):
                        $sender[e_id($vs['id'])] = ucwords($vs['name']);
                        endforeach ?>
                        <?= form_dropdown('sender_id', $sender, set_value('sender_id') ? set_value('sender_id') : (isset($data) ? e_id($data['sender_id']) : ''), [
                        'class' => 'form-control',
                        'id' => "sender_id"
                        ]) ?>
                        <?= form_error('sender_id') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Name', 'name') ?>
                        <?= form_input([
                        'name' => "name",
                        'class' => "form-control",
                        'id' => "name",
                        'placeholder' => "Enter Name",
                        'value' => set_value('name') ? set_value('name') : (isset($data) ? $data['name'] : '')
                        ]) ?>
                        <?= form_error('name') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Employee code', 'emp_code') ?>
                        <?= form_input([
                        'name' => "emp_code",
                        'class' => "form-control",
                        'id' => "emp_code",
                        'placeholder' => "Enter employee code",
                        'value' => set_value('emp_code') ? set_value('emp_code') : (isset($data) ? $data['emp_code'] : '')
                        ]) ?>
                        <?= form_error('emp_code') ?>
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