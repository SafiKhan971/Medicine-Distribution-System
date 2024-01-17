<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Fit API Example</title>
    <!-- Include axios library -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>

    <!-- Your login button -->
    <button onclick="signIn()">Sign In with Google</button>

    <!-- Include Google Sign-In script -->
    <script src="https://apis.google.com/js/platform.js" async defer onload="onGoogleApiLoad()"></script>

    <script>
        function onGoogleApiLoad() {
            // Load the 'auth2' library and initialize it
            gapi.load('auth2', function() {
                gapi.auth2.init({
                    client_id: '1086426060806-2cogeee3s00e4jopq10l1e7jmo3dhs24.apps.googleusercontent.com',
                }).then(function() {
                    console.log('Google API loaded and initialized.');
                });
            });
        }

        function signIn() {
            gapi.auth2.getAuthInstance().signIn().then(
                function(googleUser) {
                    var accessToken = googleUser.getAuthResponse().id_token;
                    fetchFitData(accessToken);
                },
                function(error) {
                    console.error('Error signing in:', error);
                }
            );
        }

        function fetchFitData(accessToken) {
            // Make API requests using the access token.
            axios.get('https://www.googleapis.com/fitness/v1/users/me/dataSources', {
                    headers: {
                        'Authorization': 'Bearer ' + accessToken,
                    },
                })
                .then(response => {
                    // Handle the fetched fitness data.
                    console.log('Fitness Data:', response.data);
                })
                .catch(error => {
                    console.error('Error fetching fitness data:', error);
                });
        }
    </script>

</body>

</html>
