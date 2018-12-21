<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url('dokumentasi/create') ?>" id="btnAdd" target="ajax-modal"
           class="btn btn-info btn-lg"><span class="fa fa-plus"></span>&nbsp; TAMBAH FOLDER</a>
        <br><br>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title">Dokumentasi</h1>
    </div>
    <div class="panel-body">
        <table id="jq-datatables-example" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Folder Name</th>
                <th>Create Date</th>
                <th style="text-align: center">Action</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<?php echo datatable("Dokumentasi", 'dokumentasi/fetch_data'); ?>