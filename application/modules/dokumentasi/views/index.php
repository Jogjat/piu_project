<div class="row">
    <div class="col-md-offset-10 col-md-2 ">
       <a href="<?php echo base_url('dokumentasi/create') ?>" id="btnAdd" target="ajax-modal" class="btn btn-info"><span class="fa fa-plus"></span>&nbsp; ADD FOLDER</a>
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
               <!-- <th>No.</th> -->
               <th>Folder Name</th>
               <th>Create Date</th>
               <th style="text-align: center">Action</th>
           </tr>
           </thead>
       </table>
   </div>
</div>
<?php echo datatable("Dokumentasi",'dokumentasi/fetch_data'); ?>

