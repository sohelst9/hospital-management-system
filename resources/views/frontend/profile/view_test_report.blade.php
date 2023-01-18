@extends('layouts.frontend.app')
@section('frontend_content')
    <style>
        .btns {
            padding: 8px;
            background-color: black;
            color: white;
            border-radius: 10px;
            font-size: 11px;
        }

        .btns:hover {
            color: red;
        }

        .checkout {
            padding: 12px 60px 12px 60px;
            background-color: black;
            color: white;
            border-radius: 10px;
            font-size: 20px;
        }

        .checkout:hover {
            color: white;
        }
        .document_img
        {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height:100%;
        }
        .document_img:hover .download_btn
        {
           opacity: 1;
        }
        .download_btn
        {
            position: absolute;
            top: 50%;
            left: 50%;
            opacity: 0;
            transform: translate(-50%,-50%);
            background: #000;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 5rem;
            cursor: pointer;
            z-index: 1000;
        }
        .download_btn:hover
        {
            color: #21cdc0;
        }
    </style>
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class='col-md-12' id='main'>
                <div class='card-deck'>
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <table class="table table-borderd table-striped ">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Title</th>
                                                <th>Comment</th>
                                                <th>Document</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($test_reports as $testReport)
                                            <tr>
                                                <td>{{$testReport->title}}</td>
                                                <td>{{$testReport->comment}}</td>
                                                <td>
                                                    <div class="document_img">

                                                        <a href="{{asset('uploads/labtest_report/'.$testReport->report_file)}}" download>
                                                            <img width="140px" height="120px" src="{{asset('uploads/labtest_report/'.$testReport->report_file)}}" alt="">


                                                          </a>
                                                          <a class="download_btn" href="{{asset('uploads/labtest_report/'.$testReport->report_file)}}" download>Download</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
