@extends('admin.layout')

@section('content')
    <div class="page-content sidebar-page right-sidebar-page clearfix">
        <!-- .page-content-wrapper -->
        <div class="page-content-wrapper">
            <div class="page-content-inner">
                <!-- Start .page-content-inner -->
                <div id="page-header" class="clearfix">
                    <div class="page-header">
                        <h2>{{ $type_title }}</h2>
                        <span class="txt"></span>
                    </div>

                </div>
                <!-- Start .row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="panel panel-default">
                            <!-- Start .panel -->
                            <div class="panel-body">
                                <table id="basic-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        @if ($type_id == 3)
                                        <th>淘口令</th>
                                        @endif

                                        @if ($type_id == 4)
                                        <th>描述</th>
                                        @endif
                                        <th>图片</th>
                                        <th>创建时间</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($rows as $row)
                                    <tr>
                                        <td>{{ $row->title }}</td>
                                        @if ($type_id == 3 || $type_id == 4)
                                        <td>{{ $row->description }}</td>
                                        @endif
                                        <td><a href="{{ asset($row->image) }}"><img src="{{ asset($row->image) }}" style="max-width:200px;max-height:200px;" /></a></td>
                                        <td>{{ $row->created_at }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <div class="dataTables_paginate paging_bootstrap" id="basic-datatables_paginate">
                                            {!! $rows->links() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .panel -->
                    </div>
                </div>
                <!-- End .row -->
            </div>
            <!-- End .page-content-inner -->
        </div>
        <!-- / page-content-wrapper -->
    </div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('.delete').click(function(){
        var url = $(this).attr('href');
        var obj = $(this).parents('td').parent('tr');
        if( confirm('该操作无法返回,是否继续?')){
            $.ajax(url, {
                dataType: 'json',
                success: function(json){
                    if(json.ret == 0){
                        obj.remove();
                    }
                },
                error: function(){
                    alert('请求失败~');
                }
            });
        }
        return false;
    })
    $('.update').click(function(){
        var url = $(this).attr('href');
        var obj = $(this);
        $.ajax(url, {
            dataType: 'json',
            success: function(json){
                if(json.ret == 0){
                    location.reload();
                }
            },
            error: function(){
                alert('请求失败~');
            }
        });
        return false;
    })
});
</script>
@endsection
