<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoom Meeting Details</title>
</head>

<body>
    <div>
        <h1>Zoom Meeting Details</h1>
        <p>Meeting ID: {{ $zoomMeetingDetails['id'] }}</p>
        <p>Topic: {{ $zoomMeetingDetails['topic'] }}</p>
        <p>Start Time: {{ $zoomMeetingDetails['start_time'] }}</p>
        <p>Duration: {{ $zoomMeetingDetails['duration'] }}</p>
        <p>Join URL: </p><a href="{{ $zoomMeetingDetails['start_url'] }}"> {{ $zoomMeetingDetails['start_url'] }}</a>
        <p>Password: {{ $zoomMeetingDetails['password'] }}</p>
    </div>
</body>

</html>
