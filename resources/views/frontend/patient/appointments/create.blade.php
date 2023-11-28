@include('components/header');
@include('components/navbar');
<div class="mb-5 container-fluid">
    <form action="{{route('profile.create.appointment')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <label for="doctor">Select Doctor</label><br>
                <select id="doctor" class="form-select" name="doctor_id">
                    <option disabled selected>Choose ...</option>
                    @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}"> {{ $doctor->name }} </option>
                    @endforeach
                </select>
            </div>
            <!-- <div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<div class="nice-select form-control wide" name="doctor_id"  tabindex="0"><span class="current">Doctor</span>
											<ul class="list">
												<li data-value="1" class="option selected ">Select Doctor</li>
                                                @foreach($doctors as $doctor)
												<li data-value="{{ $doctor->id }}" class="option">{{ $doctor->name }}</li>
                                                @endforeach
											</ul>
										</div>
									</div>
								</div> -->

            <div class="mb-3 col-md-8">
                <label for="datetimepicker">Select Date and Time:</label>
                <input type="datetime-local" class="form-control" name="app_date_time">
            </div>
            <div class="col-md-8">
                <button class="btn" type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>
@include('components/footer');

