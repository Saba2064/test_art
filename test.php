<?php
     require_once 'test.php';
    $result= mysqli_query($connect, "SELECT * FROM employees");



?>







<style>

tfoot input {
    width: 100%;
    padding: 3px;
    box-sizing: border-box;
}

</style>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
              <?php while($rows = mysqli_fetch_array($result)): ?>
            <tr>
              <td><?php echo $rows['id']; ?></td>
              <td><?php echo $rows['first_name']; ?></td>
              <td><?php echo $rows['last_name']; ?></td>
              <td><?php echo $rows['department']; ?></td>
              <td><?php echo $rows['email']; ?></td>
              <td><?php echo $rows['email']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>



    <script>

    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        } );

        // DataTable
        var table = $('#example').DataTable();

        // Apply the search
        table.columns().every( function () {
            var that = this;

            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    } );


    </script>
