<footer class="">
    <div class="container-fluid fixed-bottom">
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; </p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                        href="https://saugi.me">Fervian</a></p>
            </div>
        </div>
</footer>
</div>
</div>
</div>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/pages/horizontal-layout.js"></script>
<!-- <script src="style.js"></script> -->

<!-- Need: Apexcharts -->
<script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/js/pages/simple-datatables.js"></script>
<script src="assets/js/pages/dashboard.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>


<script type="text/javascript"> 
    $(document).ready(function () {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
    
</script>
<!-- <script type="text/javascript">
const currentLocation = location.href;
const menuItem = document.querySelectorAll('a');
const menuLenght = menuItem.length;
for(let i = 0; i< menuLenght; i++;){
    if(menuItem[i].href === currentLocation){
        menuItem[i].className = "active"
    }
}
</script>  -->

</body>

</html>