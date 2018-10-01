<style>

tfoot input {
    width: 100%;
    padding: 3px;
    box-sizing: border-box;
}

</style>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

        <?php   require_once 'test.php';




               //  select database มา



    $result = mysqli_query($conn,"SELECT * FROM datatables_demo");


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
            <?php

            while ($loop = mysqli_fetch_array($result))



            {

                ?>
            <tr>

                <td><?=$loop['id']?></td>
                <td><?=$loop['first_name']?></td>
                <td><?=$loop['last_name']?></td>
                <td><?=$loop['position']?></td>
                <td><?=$loop['email']?></td>
                <td><?=$loop['office']?></td>
            </tr>
          <?

        }
        ?>

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
