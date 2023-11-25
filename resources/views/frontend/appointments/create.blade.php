@include('components/header');
@include('components/navbar');
<div class="mb-5 container-fluid">
    <form action="{{route('create.appointment')}}" method="post">
        <div class="row">
            <div class="col-md-8">
                <label for="doctor">Select Doctor</label><br>
                <select id="doctor" class="form-select" name="doctor_id">
                    <option disabled selected>Choose ...</option>
                    @foreach($doctors as $doctor)
                    <option value="value="{{ $doctor->id }}"> {{ $doctor->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-8">
                <label for="datetimepicker">Select Date and Time:</label>
                <input type="text" id="datetimepicker"/>
            </div>

            <div class="col-md-8">
                <button class="btn" type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>
<script>
  $(document).ready(function(){
    document.write('This is jQuery');
    // Initialize the datepicker
    $('#datetimepicker').datetimepicker({
        format:'Y-m-d H:i',
    });
  });
</script>

<!-- <script>
$('#datetimepicker').datetimepicker({
    format:'Y-m-d H:i',
});
</script> -->
@include('components/footer');

