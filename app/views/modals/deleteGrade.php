<div id="deleteGrade<?php echo $this->grade["ID"]; ?>Modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-warning text-light">
                <h4 class="modal-title ">Confirm Grade Deletion</h4>
                <button type="button" class="close text-light" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <p class="px-5 pb-2">Are you sure you want to delete Grade <?php echo $this->grade["Level"]; ?>?<br/>
                    All grade configuration including OU mappings,
                    and any other grade specific data will be erased.
                    Please ensure you have a recent backup of the application configuration.
                </p>
                <a class="btn btn-danger" aria-label="Delete" href="/grades/delete/<?php echo $this->grade["ID"]; ?>">
                    Delete
                </a>
            </div>

        </div>

    </div>
</div>