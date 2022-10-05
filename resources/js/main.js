// User will be prompt to enable gps and notifications, and if the current area is not serviceable
const permissions = new bootstrap.Modal('#permissions', {
    backdrop: 'static',
    keyboard: false
});

const unavailable = new bootstrap.Modal('#unavailable', {
    backdrop: 'static',
    keyboard: false
});

// Prompt the user the enable gps if disabled or unavailable
function getLocation() {
    const options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    };
    function success(pos) {
        const coords = pos.coords; 
        let long = coords.longitude;
        let lat = coords.latitude;
        serviceAvailability(long, lat);
    }
    function error(err) { }
    navigator.geolocation.getCurrentPosition(success, error, options);
}

function enableNotification() {
    Notification.requestPermission().then((permission) => {
        if (permission === "granted") {
            const notification = new Notification("Hi there!");
        }
    });
}

// Show custom modal to inform GPS is required
function handlePermission() {
    navigator.permissions.query({ name: 'geolocation' }).then((result) => {
        if (result.state === 'granted') {
            permissions.hide();
        } else if (result.state === 'prompt') {
            permissions.hide();
        } else if (result.state === 'denied') {
            permissions.show();
        }
        result.addEventListener('change', () => {
            handlePermission();
        });
    });
}

// Check if the current city is serviceable
function serviceAvailability(long, lat) {
    let currentCity;
    axios.get('https://api.mapbox.com/geocoding/v5/mapbox.places/'+long+','+lat+'.json?country=ph&types=place&limit=1&access_token=pk.eyJ1IjoiYWtvc2llcm8iLCJhIjoiY2t2MTh2NmYyN3YxZjJ3bWFscWdmc2gwYyJ9.qiHJJT5tHxVPZzKoAt8LAg')
        .then(({data}) => {
            currentCity = data.features[0].text;

            axios.get('/api/cities')
            .then(({data}) => {
                if (data.includes(currentCity) == false) {
                    let cityLabel = document.querySelectorAll('#city-label');
                    cityLabel.textContent = '('+currentCity+')';
                    unavailable.show();
                }
            });
        });
}

getLocation();
enableNotification();
handlePermission();

// Modal container for viewing basic pages
const page = new bootstrap.Modal('#pasakay');
page.show();
