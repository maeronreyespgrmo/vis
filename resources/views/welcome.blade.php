<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ config('app.name') }} | Election of Officers 2024</title>
        {{-- Tell the browser to be responsive to screen width --}}
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- Theme style --}}
        <link rel="stylesheet" href="/vendor/AdminLTE/dist/css/adminlte.min.css">
        <style type="text/css">
            table {
                border: 1px black;
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="col-md-12 top">
                <center>
                <h3> BOARD OF DIRECTORS </h3>
                    <table>
                        <thead>
                            <tr>
                                <th>CANDIDATE'S NAME</th>
                                <th>TOTAL NO. OF VOTES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($boardOfDirectors as $boardOfDirector)
                            <tr>                                
                                <td>{{$boardOfDirector->name}}</td>
                                <td><span>{{$boardOfDirector->count_id}}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 bottom">
                <center>
                <h3> ELECTION COMMITTEE </h3>
                    <table>
                        <thead>
                        <tr>
                            <th>CANDIDATE'S NAME</th>
                            <th>TOTAL NO. OF VOTES</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($electionCommittees as $electionCommittee)
                            <tr>                                
                                <td>{{$electionCommittee->name}}</td>
                                <td><span>{{$electionCommittee->count_id}}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </center>
            </div>
            <div class="col-md-6 bottom">
                <center>
                <h3> AUDIT COMMITTEE </h3>
                    <table>
                        <thead>
                        <tr>
                            <th>CANDIDATE'S NAME</th>
                            <th>TOTAL NO. OF VOTES</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($auditCommittees as $auditCommittee)
                            <tr>                                
                                <td>{{$auditCommittee->name}}</td>
                                <td><span>{{$auditCommittee->count_id}}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </center>
            </div>
        </div>

        {{-- jQuery --}}
        <script src="/vendor/AdminLTE/plugins/jquery/jquery.min.js"></script>
        {{-- Bootstrap 4 --}}
        <script src="/vendor/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html> 