<a href="<?php echo site_url('user/create') ?>" target="ajax-modal" class="btn btn-primary btn-lg"><span class="fa fa-plus"></span>&nbsp; Tambah</a>&nbsp;&nbsp;
<br>
<br>
<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title">User</h1>
    </div>
   <div class="panel-body">
       <table id="jq-datatables-example" class="table table-striped table-hover">
           <thead>
           <tr>
               <th>Type</th>
               <th>Username</th>
               <th>Email</th>
               <th>Opsi</th>
           </tr>
           </thead>
           <tbody>

           </tbody>
       </table>
   </div>
</div>
<?php echo datatable("User",'user/fetch_data'); ?>