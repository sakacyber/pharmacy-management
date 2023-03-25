{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-users"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('patient') }}"><i class="nav-icon la la-user"></i> Patients</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('service') }}"><i class="nav-icon la la-stethoscope"></i> Services</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('medicine') }}"><i class="nav-icon la la-medkit"></i> Medicines</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('appointment') }}"><i class="nav-icon la la-calendar"></i> Appointments</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('report') }}"><i class="nav-icon la la-file-text"></i> Reports</a></li>
