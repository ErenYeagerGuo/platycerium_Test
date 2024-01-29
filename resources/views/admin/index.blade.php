@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div id="carouselExampleControls" class="carousel slide pointer-event" data-bs-ride="carousel" style="text-align: center;">
                    <div class="carousel-inner">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--上方banner圖片-->

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="m-0 p-3" style="font-weight: bolder;"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-kanban" viewBox="0 0 16 16">
                                <path d="M13.5 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h11zm-11-1a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-11z"></path>
                                <path d="M6.5 3a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm-4 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm8 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3z"></path>
                            </svg> Dashboard
                        </h3>
                    </div>

                    <div class="card-body">
                        <h5 style="font-weight: bolder;">
                            您已進入管理員頁面，請點選左上角功能選單選擇功能!
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
