<?php include('template/header.php'); check_login(); ?>
<?php changeTitle('File Manager - GShare');
$get_file_used = filesize_formatted($WiClass->get_all_filesize($_user['email']));
?>
<div class="container" style="margin-top: 30px;">
      <div class="form-group">
      <div class="toolbar btn-group">
        <button class="btn btn-danger btn-sm" id="btn-del"><i class="fa fa-trash"></i></button>
        <button class="btn btn-default btn-sm" id="btn-edit-filename"><i class="fa fa-edit"></i></button>
        <button class="btn btn-dark btn-sm" id="btn-link"><i class="fa fa-link"></i></button>
      </div>
      <table id="myFile" data-toggle="table" 
        data-url="/myFilejson" data-pagination="true"
        data-select-item-name="file-item" data-click-to-select="true"
        data-page-size="20" data-id-field="id"
        data-unique-id="id" data-search="true"
        data-show-refresh="true" data-search-align="right"
        data-toolbar-align="left" data-toolbar=".toolbar" data-height="650">
        <thead>
          <tr>
            <th data-field="id" data-checkbox="true"></th>
            <th data-field="filename" data-sortable="true">File Name</th>
            <th data-field="filesize">File Size</th>
            <th data-field="filedls" data-sortable="true">Dls</th>
            <th data-field="created_date" data-sortable="true">Created Date</th>
          </tr>
        </thead>
      </table>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true"><div class="modal-dialog modal-lg" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="modalEditTitle">Edit Filename</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div><div class="modal-body"><form class="form-group" id="frm-edit-filename"></form></div><div class="modal-footer"> <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> <button type="button" onclick="$('#frm-edit-filename').submit();" class="btn btn-primary">Save changes</button></div></div></div></div>
<!-- Modal Links-->
<div class="modal fade" id="modalLink" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-lg" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Links</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div><div class="modal-body"><textarea rows="15" id="txtarea-links" class="form-control" style="font-size: 10pt;"></textarea></div></div></div></div>
<!-- Modal Links-->
<div class="modal fade" id="modalMoveFolder" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Move to Folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
              <form class="form-group" id="frm-select-folder"><select class="form-control" name="select-folder"></select></form>
            </div>
            <div class="modal-footer">
              <button type="button" onclick="$('#frm-select-folder').submit();" class="btn btn-primary">Move</button>
            </div>
        </div>
    </div>
</div>

<?php include('template/footer.php'); ?>