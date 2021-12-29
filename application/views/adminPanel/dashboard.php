<?php defined('BASEPATH') OR exit('No direct script access allowed') ?>
<div class="row">
	<div class="col-12 col-sm-6 col-md-3">
		<?= anchor(admin('employees'),
		'<div class="info-box">
			<span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Employees</span>
				<span class="info-box-number">'.$this->main->count('employees', ['is_deleted' => 0]).'</span>
			</div>
		</div>', 'class="text-dark"') ?>
	</div>
	<div class="col-12 col-sm-6 col-md-3">
		<?= anchor(admin('task'),
		'<div class="info-box mb-3">
			<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Tasks</span>
				<span class="info-box-number">'.$this->main->count('tasks', ['is_deleted' => 0]).'</span>
			</div>
		</div>', 'class="text-dark"') ?>
	</div>
	<div class="col-12 col-sm-6 col-md-3">
		<?= anchor(admin('vehicleSender'),
		'<div class="info-box mb-3">
			<span class="info-box-icon bg-success elevation-1"><i class="fa fa-users"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Vehicle sender</span>
				<span class="info-box-number">'.$this->main->count('vehicle_sender', ['is_deleted' => 0]).'</span>
			</div>
		</div>', 'class="text-dark"') ?>
	</div>
	<div class="col-12 col-sm-6 col-md-3">
		<?= anchor(admin('vehicleSenderEmployee'),
		'<div class="info-box mb-3">
			<span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Vehicle Sender Employee</span>
				<span class="info-box-number">'.$this->main->count('vehicle_sender_employee', ['is_deleted' => 0]).'</span>
			</div>
		</div>', 'class="text-dark"') ?>
	</div>
</div>