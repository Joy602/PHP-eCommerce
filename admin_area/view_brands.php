<h3 class="text-center text-success">All Brands</h3>


<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>Sl No</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $select_brand = "select * from `brands`";
            $result = mysqli_query($conn,$select_brand);
            $number=0;

            while($row = mysqli_fetch_assoc($result)){
                $brand_id = $row['brand_id'];
                $brand_title = $row['brand_title'];
                $number++;
            
        ?>
        <tr class="text-center">

            <td><?php echo $number;?></td>
            <td><?php echo $brand_title;?></td>


            <!-- edit brand icon -->
            <td><a href='index.php?edit_brands=<?php echo $brand_id?>' class='text-light'><i
                        class='fa-solid fa-pen-to-square'></i></a></td>

            <!-- delete brand icon -->
            <td><a href='index.php?delete_brands=<?php echo $brand_id?>' type="button" class=" text-light"><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>



<!-- Bootstrap Modal -->


<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <h5>Are you sure you want to delete this?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands"class='text-light text-decoration-none'>No</a></button>

            <button type="button" class="btn btn-primary"><a href=''  class=" text-light text-decoration-none">Yes</a></button>
            </div>
        </div>
    </div>
</div> -->