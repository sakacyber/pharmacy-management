@extends(backpack_view('blank'))

@section('content')

    <div class="col-sm-6">
        <div class="h1">Good morning <b>{{ backpack_user()->name }}</b>!</div>
        <div class="mt-0">Have a nice day {{ $users->count() }}</div>
    </div>
    <br>

    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card bg-primary text-white">
                <div class="card-body pb-0">

                    <div class="text-value">9.823</div>
                    <div>Members online</div>
                </div>
                <div class="h1 mx-3 mt-3 text-right">
                    <i class="la la-user" style="width: 50px; height: 50px;"></i>
                </div>
            </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
            <div class="card bg-success text-white">
                <div class="card-body pb-0">
                    <div class="text-value">9.823</div>
                    <div>Members online</div>
                </div>
                <div class="h1 mx-3 mt-3 text-right">
                    <i class="la la-user" style="width: 50px; height: 50px;"></i>
                </div>
            </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
            <div class="card bg-warning text-white">
                <div class="card-body pb-0">
                    <div class="text-value">9.823</div>
                    <div>Members online</div>
                </div>
                <div class="h1 mx-3 mt-3 text-right">
                    <i class="la la-user" style="width: 50px; height: 50px;"></i>
                </div>
            </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
            <div class="card bg-dark text-white">
                <div class="card-body pb-0">
                    <div class="text-value">9.823</div>
                    <div>Members online</div>
                </div>
                <div class="h1 mx-3 mt-3 text-right">
                    <i class="la la-user" style="width: 50px; height: 50px;"></i>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>

    <!--table-->
    <div class="row">
        <div class="col-sm-6">
            <div class="h3 mx-3">Patient</div>
            <div class="card">

                <div class="card-body p-0">
                    <table class="table-responsive-sm table-striped table">
                        <thead class="thead">
                            <tr>
                                <th style="width: 20%">Name</th>
                                <th style="width: 10%">Gender</th>
                                <th style="width: 10%">Age</th>
                                <th style="width: 50%">Description</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td style="width: 20%">
                                        <div>{{ $user->name }}</div>
                                        <div class="small text-muted">Enter: {{ $user->enter_date }}</div>
                                    </td>
                                    <td class="text-center" style="width: 10%"><span
                                            class="badge badge-success">{{ $user->gender }}</span></td>
                                    <td style="width: 10%">{{ $user->age }}</td>
                                    <td style="width: 50%">
                                        <div class="table-text">{{ $user->description }}</div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- div -->
        <div class="col-sm-6">
            <div class="h3 mx-3">Appointment</div>
            <div class="card">
                <div class="card-body p-0">
                    <table class="table-responsive-sm table-striped table">
                        <thead class="thead">
                            <tr>
                                <th style="width: 20%">Date</th>
                                <th >Doctor</th>
                                <th >Patient</th>
                                <th >Status</th>
                                <th >Description</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td style="width: 20%">{{ $appointment->date }}</td>
                                    <td >{{ $appointment->doctor }}</td>
                                    <td >{{ $appointment->patient }}</td>
                                    <td class="text-center"><span
                                            class="badge badge-success">{{ $appointment->status }}</span></td>
                                    <td >
                                        <div class="table-text">{{ $appointment->description }}</div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <table class="table-bordered table">
            <thead>
                <tr>
                    <th class="w-20">Name</th>
                    <th class="w-60">Email</th>
                    <th class="w-20">Phone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="w-20">John Doe</td>
                    <td class="w-60">johndoe@example.com</td>
                    <td class="w-20">555-1234</td>
                </tr>
                <tr>
                    <td class="w-20">Jane Smith</td>
                    <td class="w-60">janesmith@example.com</td>
                    <td class="w-20">555-5678</td>
                </tr>
                <!-- more table rows... -->
            </tbody>
        </table>
    </div>
@endsection
