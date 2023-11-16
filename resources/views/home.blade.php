@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

    <div class="col-md-4">
       @include('user.sidebar')
    </div>


        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                    <a href="{{ route('write.review') }}" style="float:right;"><i class="fas fa-pencil-alt"></i> Write a review</a>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-3">
                            <a href="">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 style="font-size:20px;" class="card-title text-center">MY Total Order</h5>
                                        <h6 class="card-subtitle mb-2 text-muted text-center">15</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3">
                            <a href="">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 style="font-size:20px;" class="card-title text-center">MY Total Order</h5>
                                        <h6 class="card-subtitle mb-2 text-muted text-center">15</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3">
                            <a href="">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 style="font-size:20px;" class="card-title text-center">MY Total Order</h5>
                                        <h6 class="card-subtitle mb-2 text-muted text-center">15</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3">
                            <a href="">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 style="font-size:20px;" class="card-title text-center">MY Total Order</h5>
                                        <h6 class="card-subtitle mb-2 text-muted text-center">15</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div><br>

                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thorton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>The bard</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
