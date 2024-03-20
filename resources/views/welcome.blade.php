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
        <link href="/vendor/AdminLTE/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">
        <style type="text/css">
            body {
    background-image: url('/images/capitol.jpg'); /* Set background image */
    background-size: cover; /* Cover the entire background */
    background-position: center; /* Center the background image */
    background-repeat: no-repeat; /* Do not repeat the background image */
}
        </style>
    </head>
    <body>
    <center>
    <br><br>
    <h1 style="font-size:60px;text-align:center"><img src="/images/lempco_logo.png" width="100" height="100"/>ELECTION OF LEMPCO OFFICERS 2024</h1><br>

    <center>
    <div style="margin-left:50px;margin-right:50px">

        <div class="row">
            <div class="col-md-4">
                <center>
                <h1 style="font-size:35px;text-align:center"> BOARD OF DIRECTORS </h1>
                    <table style="background-color:white" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="font-size:25px;text-align:center">CANDIDATE</th>
                                <th style="font-size:25px;text-align:center">VOTES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($boardOfDirectors as $boardOfDirector)
                            <tr>                                
                                <td style="font-size:22px;text-align:center">{{ strtoupper($boardOfDirector->name)}}</td>
                                <td style="font-size:22px;text-align:center">
                                <span><b>{{$boardOfDirector->count_id}}</b> </span>
                                @if($loop->index == 0)
                                <i class="fas fa-star" style="color: orange;"></i>
                                @elseif($loop->index == 1)
                                <i class="fas fa-star" style="color: orange;"></i>
                                @elseif($loop->index == 2)
                                <i class="fas fa-star" style="color: orange;"></i>
                                @endif
                                
                           
                               
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </center>
            </div>
            <div class="col-md-4">
                <center>
                <h1 style="font-size:35px;text-align:center"> ELECTION COMMITTEE </h1>
                    <table style="background-color:white" class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="font-size:25px;text-align:center">CANDIDATE</th>
                            <th style="font-size:25px;text-align:center">VOTES</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($electionCommittees as $electionCommittee)
                            <tr>                                
                                <td style="font-size:20px;text-align:center">{{ strtoupper($electionCommittee->name)}}</td>
                                <td style="font-size:20px;text-align:center">
                                <span><b>{{$electionCommittee->count_id}}</b></span>
                                @if($loop->index == 0)
                                <i class="fas fa-star" style="color: orange;"></i>
                                @elseif($loop->index == 1)
                                <i class="fas fa-star" style="color: orange;"></i>
                                @elseif($loop->index == 2)
                                <i class="fas fa-star" style="color: orange;"></i>
                                @endif
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </center>
            </div>
            <div class="col-md-4 bottom">
                <center>
                <h1 style="font-size:40px;text-align:center"> AUDIT COMMITTEE </h1>
                    <table style="background-color:white" class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="font-size:25px;text-align:center">CANDIDATE</th>
                            <th style="font-size:25px;text-align:center">VOTES</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($auditCommittees as $auditCommittee)
                            <tr>                                
                                <td style="font-size:20px;text-align:center">{{ strtoupper($auditCommittee->name)}}</td>
                                <td style="font-size:20px;text-align:center">
                                <span><b>{{$auditCommittee->count_id}}</b></span>
                                @if($loop->index == 0)
                                <i class="fas fa-star" style="color: orange;"></i>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </center>
            </div>
        </div>
        <div class="row">
        <div class="col-md-12">
        <table>
            <tr>
                <td>Total of Votes</td>
            </tr>
        </table>
        </div>
        </div>
        </div>
        {{-- jQuery --}}
        <script src="/vendor/AdminLTE/plugins/jquery/jquery.min.js"></script>
        {{-- Bootstrap 4 --}}
        <script src="/vendor/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script>
            setInterval(() => {
                window.location.reload()
            }, 3000);
        </script>
    </body>
</html> 