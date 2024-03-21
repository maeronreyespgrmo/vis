<!DOCTYPE html>
<html>
<script type="text/javascript">

</script>
<style type="text/css">

body {
font-family: "Nunito", Serif;
font-size: 12pt;
}

p {
margin: 0px;
}

.logo {
height: 120px;
width: 120px;
}

th {
text-align: left;
}

.header-text {
color: #002060;
}

@page {
    size: Legal;
    margin: 10cm 2cm;
}
.container {
width: 8.5in;
height: 13in;
border: none !important;
padding: none !important;
}

.indent {
margin-left: 150px;
}

.c-8 {
width: 12.5%;
}

.c-4 {
width: 25%;
}


.container1 {
width: 8.5in;
height: 13in;
border: solid 2px #eee;
padding: 25px;
}

.justify {
text-align: justify !important;
}

br {
display: block;

}

.center-div{
display: block;
padding: 20px;
margin: 0 auto;
}

@media print {
/* br {
display: none;

} */

.page-break {
page-break-after: always;
}

.container {
width: 8.5in;
height: 13in;
border: none !important;
padding: none !important;
}

.indent {
margin-left: 150px;
}

footer {
position: fixed;
bottom: 0;
left: 0px;
right: 0px;
}
}
.enlarged-table {
        width: 100%; /* Adjust the width as needed */
    }

</style>

<body>
<div class="container center-div">
<header>
<center>
 <img src="./images/header_lemco.png" width="850" height="210">
</center>
</header>

<div style="margin-left:50px;margin-right:50px">

        <div class="row">
            <div class="col-md-12">

                <br>
                <br>
                <br>

                <h3> BOARD OF DIRECTORS (3) </h3>
                    <table style=" border-collapse: collapse;" class="table table-bordered enlarged-table" border=1>
                        <thead>
                            <tr>
                                <th style="text-align:center">Candidate</th>
                                <th style="text-align:center">Votes</th>
                                <th style="text-align:center">Rank</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($boardOfDirectors as $boardOfDirector)
                            <tr>                                
                                <td style="text-align:center">{{ $boardOfDirector->name }}</td>
                                <td style="text-align:center">
                                <span><b>{{$boardOfDirector->count_id}}</b> </span>
                                @if($loop->index == 0)
                                <i class="fas fa-medal" style="color: red;"></i>
                                @elseif($loop->index == 1)
                                <i class="fas fa-medal" style="color: blue;"></i>
                                @elseif($loop->index == 2)
                                <i class="fas fa-medal" style="color: green;"></i>
                                @endif
                                <td style="text-align:center"><b>{{ $loop->index+1 }}</b></td>  
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
          
            </div>
            <br>
            <div class="col-md-12">
                <h3> ELECTION COMMITTEE (3) </h3>
                    <table style=" border-collapse: collapse;" class="table table-bordered enlarged-table " border=1>
                        <thead>
                        <tr>
                            <th style="text-align:center">Candidate</th>
                            <th style="text-align:center">Votes</th>
                            <th style="text-align:center">Rank</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($electionCommittees as $electionCommittee)
                            <tr>                                
                                <td style="text-align:center">{{ $electionCommittee->name }}</td>
                                <td style="text-align:center">
                                <span><b>{{$electionCommittee->count_id}}</b></span>
                                @if($loop->index == 0)
                                <i class="fas fa-medal" style="color: red;"></i>
                                @elseif($loop->index == 1)
                                <i class="fas fa-medal" style="color: blue;"></i>
                                @elseif($loop->index == 2)
                                <i class="fas fa-medal" style="color: green;"></i>
                                @endif
                            </td>
                            <td style="text-align:center"><b>{{ $loop->index+1 }}</b></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
               
            </div>
            <br>
            <div class="col-md-4 bottom">
       
                <h3> AUDIT COMMITTEE (3) </h3>
                    <table style=" border-collapse: collapse;" class="table table-bordered enlarged-table" border=1>
                        <thead>
                        <tr>
                            <th style="text-align:center">Candidate</th>
                            <th style="text-align:center">Votes</th>
                            <th style="text-align:center">Rank</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($auditCommittees as $auditCommittee)
                            <tr>                                
                                <td style="text-align:center">{{ $auditCommittee->name }}</td>
                                <td style="text-align:center">
                                <span><b>{{$auditCommittee->count_id}}</b></span>
                                @if($loop->index == 0)
                                <i class="fas fa-medal" style="color: red;"></i>
                                @endif
                                </td>
                                <td style="text-align:center"><b>{{ $loop->index+1 }}</b></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>
            
            <br>
            <br>
            <br>
            <br>
            CERTIFIED CORRECT BY:
            <br>
            <br>
            <br>
            <br>
            <br>

            <table style="width: 100%;margin-left:10%">
                <tr>
                    <td style="width: 50%">
                    <hr style="width:70%;margin-left:-65px;background-color:black;"></hr>
                        <p><b>JUAN P. ABIO</b></p>
                        <p><b>ELECOM, Member</b></p>
                    </td>
       
                    <td>
                    <hr style="width:80%;margin-left:-45px;background-color:black;"></hr>
                        <p><b>AMORSOLO E. CARIÑO</b></p>
                        <p><b>ELECOM, Vice-chairperson</b></p>
                    </td>
                </tr>
              
            </table>

            <br>
            <br>
            <br>
            
            <table style="width: 100%;margin-left:30%">
                <tr>
                    <td>
                    
                    <p> <b>    
                <hr style="width:50%;margin-left:-65px;background-color:black;"></hr> RONALD R. MINALABAG</b></p>
                        <p><b>ELECOM, Chairperson</b></p>
                    </td>
                </tr>
              
            </table>

            <br>
            <br>
            <br>
            
            <table style="width: 100%;margin-left:25%">
                <tr>
                    <td>
                    <p> <b>**Note this report is system generated**</b></p>
                    </td>
                </tr>
              
            </table>
            </div>

</div>
       
</div>
</html>