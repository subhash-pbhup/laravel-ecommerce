<!-- footer content -->
<footer>
    <div class="pull-right">
      Gentelella - Bootstrap Admin Template by <a href="{{url('/admin')}}">Colorlib</a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
</div>
</div>

<!-- compose -->
<div class="compose col-md-6 col-xs-12">
<div class="compose-header">
  New Message
  <button type="button" class="close compose-close">
    <span>×</span>
  </button>
</div>

<div class="compose-body">
  <div id="alerts"></div>

  <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
    <div class="btn-group">
      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
      <ul class="dropdown-menu">
      </ul>
    </div>

    <div class="btn-group">
      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a data-edit="fontSize 5">
            <p style="font-size:17px">Huge</p>
          </a>
        </li>
        <li>
          <a data-edit="fontSize 3">
            <p style="font-size:14px">Normal</p>
          </a>
        </li>
        <li>
          <a data-edit="fontSize 1">
            <p style="font-size:11px">Small</p>
          </a>
        </li>
      </ul>
    </div>

    <div class="btn-group">
      <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
      <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
      <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
      <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
    </div>

    <div class="btn-group">
      <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
      <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
      <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
      <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
    </div>

    <div class="btn-group">
      <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
      <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
      <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
      <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
    </div>

    <div class="btn-group">
      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
      <div class="dropdown-menu input-append">
        <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
        <button class="btn" type="button">Add</button>
      </div>
      <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
    </div>

    <div class="btn-group">
      <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
      <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
    </div>

    <div class="btn-group">
      <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
      <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
    </div>
  </div>

  <div id="editor" class="editor-wrapper"></div>
</div>

<div class="compose-footer">
  <button id="send" class="btn btn-sm btn-success" type="button">Send</button>
</div>
</div>
<!-- /compose -->

<!-- jQuery -->
<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
<!-- bootstrap-wysiwyg -->
<script src="{{asset('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{asset('vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>

<script src="{{asset('vendors/google-code-prettify/src/prettify.js')}}"></script>
<!-- Chart.js -->
<script src="{{asset('vendors/Chart.js/dist/Chart.min.js')}}"></script>

<!-- gauge.js -->
<script src="{{asset('vendors/gauge.js/dist/gauge.min.js')}}"></script>

<!-- bootstrap-progressbar -->
<script src="{{asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>

<!-- iCheck -->
<script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>

<!-- Skycons -->
<script src="{{asset('vendors/skycons/skycons.js')}}"></script>

<!-- Flot -->
<script src="{{asset('vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('vendors/Flot/jquery.flot.resize.js')}}"></script>

<!-- Flot plugins -->
<script src="{{asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{asset('vendors/DateJS/build/date.js')}}"></script>

<!-- JQVMap -->
<script src="{{asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
<script src="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{asset('build/js/custom.min.js')}}"></script>
 <!-- jQuery Tags Input -->
 <script src="{{asset('vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
 <!-- Switchery -->
 <script src="{{asset('vendors/switchery/dist/switchery.min.js')}}"></script>
 <!-- Select2 -->
 <script src="{{asset('vendors/select2/dist/js/select2.full.min.js')}}"></script>
 <!-- Parsley -->
 <script src="{{asset('vendors/parsleyjs/dist/parsley.min.js')}}"></script>
 <!-- Autosize -->
 <script src="{{asset('vendors/autosize/dist/autosize.min.js')}}"></script>
 <!-- jQuery autocomplete -->
 <script src="{{asset('vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>
 <!-- starrr -->
 <script src="{{asset('vendors/starrr/dist/starrr.js')}}"></script>

 <!-- Datatables -->
 <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
 <script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
 <script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
 <script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>

</body>
</html>