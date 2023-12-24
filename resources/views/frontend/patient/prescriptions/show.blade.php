<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Prescription</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <div class="container mt-5">
    <div class="d-flex">
      <img src="{{asset('img/dhc_logo.png')}}" style="width: 178px; height:50px" alt="">
      <div style="margin-left:18rem;">
      <h2 > Prescription </h2>
    </div>
    <div class="row mt-4 text-center">
    <ul>
      @foreach($prescriptions as $prescription)
      <li> Doctor: {{$prescription->doctor->name}} </li>
      <li> Medicine: {{$prescription->medicine_name}} </li>
      <li> Dosage: {{$prescription->dosage }} - {{$prescription->unit}} </li>
      <li> Duration: {{$prescription->Duration }}</li>
      <!-- <li> Doctor: {{$prescription->doctor->name}} </li> -->
      @endforeach

    </ul>
    </div>
  </div>

  <!-- Bootstrap JS and Popper.js (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
