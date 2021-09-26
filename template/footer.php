<div class="footer">
<a href="/page/terms-conditions">Terms and Conditions</a> <a href="/page/copyright">Copyright</a> <a href="/page/privacy-policy">Privacy Policy</a> <a href="/page/about">About us</a> <a href="#">Contact us</a><br />
Copyright © 2017 <?= BASE_DOMAIN; ?>
  </div>
  <div id="snackbar"></div>
<script>
var toad = null;
function toast(msg = false) {
    if ( ! msg) return;
	clearTimeout(toad);
    var x = document.getElementById("snackbar");
    x.innerHTML = msg;
    x.className = "show";
    toad = setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
</footer>
<script type='text/javascript'>
<!-- 
document.write(unescape('%3C%73%63%72%69%70%74%3E%0A%20%24%28%64%6F%63%75%6D%65%6E%74%29%2E%72%65%61%64%79%28%66%75%6E%63%74%69%6F%6E%28%29%20%7B%0A%20%20%24%28%27%23%65%78%61%6D%70%6C%65%27%29%2E%44%61%74%61%54%61%62%6C%65%28%20%7B%0A%20%20%20%20%64%6F%6D%3A%20%27%42%66%72%74%69%70%27%2C%0A%20%20%20%20%62%75%74%74%6F%6E%73%3A%20%5B%0A%20%20%20%20%27%63%6F%6C%76%69%73%27%0A%20%20%20%20%5D%0A%20%20%7D%29%3B%0A%7D%29%3B%0A%3C%2F%73%63%72%69%70%74%3E%0A%3C%73%63%72%69%70%74%20%74%79%70%65%3D%22%74%65%78%74%2F%6A%61%76%61%73%63%72%69%70%74%22%3E%0A%20%20%66%75%6E%63%74%69%6F%6E%20%63%6F%70%79%54%6F%43%6C%69%70%62%6F%61%72%64%28%65%6C%65%6D%65%6E%74%29%20%7B%0A%20%20%20%65%6C%65%6D%65%6E%74%2E%73%65%6C%65%63%74%28%29%3B%0A%20%20%20%69%66%28%64%6F%63%75%6D%65%6E%74%2E%65%78%65%63%43%6F%6D%6D%61%6E%64%28%27%63%6F%70%79%27%29%29%20%7B%0A%20%20%20%20%61%6C%65%72%74%28%22%43%6F%70%69%65%64%20%74%6F%20%43%6C%69%70%62%6F%61%72%64%20%2D%20%53%75%63%63%65%73%73%21%21%22%29%3B%0A%20%20%20%7D%0A%20%20%7D%0A%20%3C%2F%73%63%72%69%70%74%3E'));
// -->
</script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

  <script type="text/javascript">

    $(document).ready(function(){

        $('#edit_modal').on('show.bs.modal', function (e) {

            var idx = $(e.relatedTarget).data('id');

            //menggunakan fungsi ajax untuk pengambilan data

            $.ajax({

                type : 'post',

                url : 'detail.php',

                data :  'idx='+ idx,

                success : function(data){

                $('.hasil-data').html(data);//menampilkan data ke dalam modal

                }

            });

         });

    });

  </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type='text/javascript'>

$(document).ready(function() {

$('img#closed').click(function(){

$('#btm_banner').hide(90);

});

});

</script>

</script><script type="text/javascript">

if (window.jstiming) window.jstiming.load.tick('headEnd');

</script>
<?php echo ($popads['footer']) ; ?>
<script src="https://acefile.co/assets/js/lib.js?v=1"></script>
<script type="text/javascript" src="/assets/js/app.min.js?v2"></script>
</body>
</html>