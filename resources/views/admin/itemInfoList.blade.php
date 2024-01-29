@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <!--搜尋、新增管理人按鈕 start-->
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <form class="row g-3" method="post" action="">
                    @csrf
                    <div class="col-auto">
                        <label for="inputPassword2" class="visually-hidden">搜尋</label>
                        <input name="keyword" type="search" class="form-control" id="inputPassword2" placeholder="搜尋">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success">搜尋</button>
                        <button data-bs-toggle="modal"
                                data-bs-target="#addLoopsModal" class="btn btn-warning" type="button">新增鹿角蕨
                        </button>
                    </div>
                </form>
            </div>
            <!--搜尋、新增管理人按鈕 end-->
        </div>
    </div>
    <div>
        <form method="post" action="{{route('admin.item-info.upload-image')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="addLoopsModal" tabindex="-1"
                 aria-labelledby="addLoopsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: rgb(255, 248, 157);">
                            <h1 class="modal-title fs-5" id="">新增</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover" id="inputTable">
                                <tbody style="white-space: nowrap;" id="inputTableTr">
                                <tr>
                                    <th scope="row">鹿角蕨名稱</th>
                                    <td><input name="name[]" type="text" class="form-control"
                                               placeholder="例如:鹿角蕨87號" required></td>
                                    <td>
                                        <label for="po_image" class="block text-sm leading-5 font-medium text-gray-700">
                                            表單上傳
                                            <input id="image-input" type="file" name="po_image[]" accept=".jpg, .png" >
                                        </label>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <button id="appendAddLoopInput" type="button" class="btn btn-info" onclick="">+
                            </button>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">確認
                                </button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 table-responsive">
            <table class="table table-striped table-hover table-light table-bordered border-secondary ts mt-2">
                <!--大標題 start-->
                <thead class="table-success" style="vertical-align: middle;font-size: 14pt;">
                <tr>
                    <th scope="col" colspan="6">鹿角蕨管理</th>
                </tr>
                </thead>
                <!--大標題 end-->

                <thead class="table-dark" style="vertical-align: middle;">
                <tr>
                    <th scope="col">項目</th>
                    <th scope="col">鹿角蕨名稱</th>
                    <th scope="col">圖片網址</th>
                    <th scope="col">選項</th>

                </tr>
                </thead>
                <tbody style="letter-spacing: 1px;white-space: nowrap;">
                @foreach($items as $item)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$item->name}}</td>
                        <td><a href="{{asset('storage/uploads/images/'.$item->image_url)}}">{{asset('storage/uploads/images/'.$item->image_url)}}</a></td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="deleteLoopConfirmDialogModal" aria-hidden="true"
         aria-labelledby="deleteUserConfirmDialogModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">訊息</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <label id="deleteLoopLabel">你確定要刪除該Loop資料嗎?</label>
                        <span style="color: red"><br>請注意，該Loop刪除後，所有附屬節點也會一併刪除</span>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                        <a href="" id="deleteUrl" class="btn btn-primary">確認</a>
                    </div>
            </div>
        </div>
    </div>




    <div id="editUser" class="container">
        <form method="post" action="">
            @csrf
            <div class="modal fade" id="editUserModal" aria-hidden="true" aria-labelledby="editUserModalLabel"
                 tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editLoopText">編輯</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label hidden for="editLoopId"></label>
                                <input hidden name="id" type="text" class="form-control" id="editLoopId">
                            </div>
                            <div class="form-group">
                                <label for="newLoopName">新名稱</label>
                                <input name="name" type="text" class="form-control" id="newLoopName">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                            <button type="button" class="btn btn-primary" data-bs-target="#confirmDialogModal"
                                    data-bs-toggle="modal" data-bs-dismiss="modal">確認
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="confirmDialogModal" aria-hidden="true" aria-labelledby="confirmDialogModalLabel"
                 tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDialogModalLabel">訊息</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            你確定要修改該Loop名稱嗎?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">確認</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        {{$items->links() }}
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $("#appendAddLoopInput").click(function(e) {
                $("#inputTable").append($("#inputTableTr").clone());
            });
        });
    </script>

@endsection
