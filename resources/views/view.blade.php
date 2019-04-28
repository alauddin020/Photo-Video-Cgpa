{{--@extends('layouts.app')--}}

{{--@section('section')--}}
<?php
    function fail()
        {
            echo '<b style="color: red">Fail</b>';
        }
    function cgpCalculation($cse1,$cse2,$math1,$eng1)
    {
        $cse101 =0;
        $cse102 =0;
        $math   =0;
        $eng    =0;
        $total  =0;
        if ($cse1>=40 && $cse2>=40 && $math1>=40 && $eng1>=40)
            {
                if ($cse1>79)
                {
                    $cse101 = 4*3;
                }
                if ($cse2>79)
                {
                    $cse102 = 4*3;
                }
                if ($math1>79)
                {
                    $math = 4*3;
                }
                if ($eng1>79)
                {
                    $eng = 4*3;
                }
                if ($cse1>74 && $cse1<80)
                {
                    $cse101 = 3.75*3;
                }
                if ($cse2>74 && $cse2<80)
                {
                    $cse102 = 3.75*3;
                }
                if ($math1>74 && $math1<80)
                {
                    $math = 3.75*3;
                }
                if ($eng1>74 && $eng1<80)
                {
                    $eng = 3.75*3;
                }
                if ($cse1>69 && $cse1<75)
                {
                    $cse101 = 3.5*3;
                }
                if ($cse2>69 && $cse2<75)
                {
                    $cse102 = 3.5*3;
                }
                if ($math1>69 && $math1<75)
                {
                    $math = 3.5*3;
                }
                if ($eng1>69 && $eng1<75)
                {
                    $eng = 3.5*3;
                }
                //3.25 Calculation
                if ($cse1>64 && $cse1<70)
                {
                    $cse101 = 3.25*3;
                }
                if ($cse2>64 && $cse2<70)
                {
                    $cse102 = 3.25*3;
                }
                if ($math1>64 && $math1<70)
                {
                    $math = 3.25*3;
                }
                if ($eng1>64 && $eng1<70)
                {
                    $eng = 3.25*3;
                }
                //3.0 Calculation
                if ($cse1>59 && $cse1<65)
                {
                    $cse101 = 3.0*3;
                }
                if ($cse2>59 && $cse2<65)
                {
                    $cse102 = 3.0*3;
                }
                if ($math1>59 && $math1<65)
                {
                    $math = 3.0*3;
                }
                if ($eng1>59 && $eng1<65)
                {
                    $eng = 3.0*3;
                }
                //2.75 Calculation
                if ($cse1>54 && $cse1<60)
                {
                    $cse101 = 2.75*3;
                }
                if ($cse2>54 && $cse2<60)
                {
                    $cse102 = 2.75*3;
                }
                if ($math1>54 && $math1<60)
                {
                    $math = 2.75*3;
                }
                if ($eng1>54 && $eng1<60)
                {
                    $eng = 2.75*3;
                }
                //2.5 Calculation
                if ($cse1>49 && $cse1<55)
                {
                    $cse101 = 2.5*3;
                }
                if ($cse2>49 && $cse2<55)
                {
                    $cse102 = 2.5*3;
                }
                if ($math1>49 && $math1<55)
                {
                    $math = 2.5*3;
                }
                if ($eng1>49 && $eng1<55)
                {
                    $eng = 2.5*3;
                }
                //2.25 Calculation
                if ($cse1>44 && $cse1<50)
                {
                    $cse101 = 2.25*3;
                }
                if ($cse2>44 && $cse2<50)
                {
                    $cse102 = 2.25*3;
                }
                if ($math1>44 && $math1<50)
                {
                    $math = 2.25*3;
                }
                if ($eng1>44 && $eng1<50)
                {
                    $eng = 2.25*3;
                }
                //2.0 Calculation
                if ($cse1>39 && $cse1<45)
                {
                    $cse101 = 2.0*3;
                }
                if ($cse2>39 && $cse2<45)
                {
                    $cse102 = 2.0*3;
                }
                if ($math1>39 && $math1<45)
                {
                    $math = 2.0*3;
                }
                if ($eng1>39 && $eng1<45)
                {
                    $eng = 2.0*3;
                }
                $total= ($cse101+$cse102+$math+$eng)/12;
                //return $total;
                return round($total,2);
            }
        else
            {
                return Fail();
            }
//        return ($cse101.'+'.$cse102.'+'.$math.'+'.$eng);
    }
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="{{route('newData')}}" class="list-group-item list-group-item-action">Add New Data</a>
                    <a href="{{route('result')}}" class="list-group-item list-group-item-action">Result</a>
                    <a href="{{route('home')}}" class="list-group-item list-group-item-action disabled">Dashboard</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Students Result Sheet</div>

                    <div class="card-body">
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>St. Name</th>
                                    <th>CSE-101</th>
                                    <th>CSE-102</th>
                                    <th>Math</th>
                                    <th>Eng</th>
                                    <th>CGPA</th>
                                    <th>%</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($result as $new)
                                    <tr>
                                        <td>{{$new->user->name}}</td>
                                        <td>{{$new->CSE101}}</td>
                                        <td>{{$new->CSE102}}</td>
                                        <td>{{$new->Math}}</td>
                                        <td>{{$new->ENG}}</td>
                                        <td>{{cgpCalculation($new->CSE101,$new->CSE102,$new->Math,$new->ENG)}}</td>
                                        <td>{{($new->CSE101+$new->CSE102+$new->Math+$new->ENG)/4}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--@endsection()--}}
