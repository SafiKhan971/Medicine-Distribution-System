{{-- <!--* Modal init *-->
<div class="modal fade" id="update-doctor" tabindex="-1" role="dialog" aria-labelledby="new-event-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
        <div class="modal-content">
            <!-- Modal body -->
            <form class="new-event--form">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="doctor_id">
                    <div class="form-group">
                        <label class="form-control-label">Doctor Name</label>
                        <input type="text" class="form-control form-control-alternative new-event--title"
                            placeholder="Doctor Name" name="doctor_name">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Doctor Email</label>
                        <input type="text" class="form-control form-control-alternative new-event--title"
                            placeholder="Doctor Email" name="doctor_email">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary new-event--add">Update</button>
                    <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div> --}}
