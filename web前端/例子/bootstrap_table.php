<?php

<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-table.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
<script src="bootstrap-table.js"></script>
<-- put your locale files after bootstrap-table.js -->
<script src="bootstrap-table-zh-CN.js"></script>


<table id="dataTable">
    <thead>
    <tr>
        <th data-field="fullname" data-sortable="true">名称</th>
        <th data-field="shortname" data-sortable="true">简称</th>
        <th data-field="address" data-sortable="true">地址</th>
        <th data-field="linkman" data-sortable="true">联系人</th>
        <th data-field="tel" data-sortable="true">联系电话</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody id="dataBody">
    </tbody>
</table>

$(document).ready(function(){
    initTable("dataTable");
});
//自定义ajax
function ajaxRequest(params){
    //访问服务器获取所需要的数据
    //比如使用$.ajax获得请求某个url获得数据
    $.ajax({
        type : 'post',
        url : '/list.do',
        data : parames.data,
        success  : function(e){
            if(e.code == 200){
                //表格加载数据
                parames.success({
                    total : total,//符合查询条件的数据总量
                    rows : [{}]//创建一个空行，此处要注意，如果去除，将不会显示任何行
                });
                //加载一个片段，形如<tr><td>..</td>...</tr><tr><td>..</td>...</tr>
                $.ajax({
                    type     : 'post',
                    url      : '/body.do',
                    data : parames.data,
                    dataType : 'html',
                    success  : function(e){
                        $("#dataBody").html(e);
                    }
                });
            }
        }
    });
}
//自定义参数
function postQueryParams(params) {
    params.cname = $("#customerName").val();
    return params;
}
//初始化
function initTable(tableId){
    $("#" + tableId).bootstrapTable({
        classes : "table table-bordered table-hover table-striped",//加载的样式
        ajax : "ajaxRequest",//自定义ajax
        search : false,//不开启搜索文本框
        sidePagination : "server",//使用服务器端分页
        pagination : "true",//开启分页
        queryParams : "postQueryParams",//自定义参数
        pageSize : 8,//每页大小
        pageList : [8, 16, 32, 64]//可以选择每页大小
    });
}
//查询时，先销毁，然后再初始化
$("#btnSearch").click(function(){
    $("#dataTable").bootstrapTable('destroy');
    initTable("dataTable");
});


