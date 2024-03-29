class Activity {

    constructor() {
        this.getActivities();
        //this.getUsers();
        setInterval(() => this.getActivities(), 5000);
    }

    async getActivities() {
        try {
            let response = await fetch('?c=activity&a=activity');
            let data = await response.json();

            // let responseUser;
            // let dataUser;
            // try {
            //     responseUser = await fetch('?c=activity&a=users');
            //     dataUser = await response.json();
            // } catch (e) {
            //     console.log("ajaja");
            // }

            // let names = this.getUsers(data);

            var activities = document.getElementById('activity');
            var html = "";
            var index = 1;
            data.forEach((activity) => {
                // var name;
                // var lastName;
                // dataUser.forEach((user) => {
                //     if (user.id_user == activity.id_user) {
                //         name = user.name;
                //         lastName = user.lastname;
                //     }
                // });
                var title = activity.title_activity == null ? 'Activity' : activity.title_activity;
                var seconds = (new Date(activity.time_end) - new Date(activity.time_start)) / 1000;
                var speed = Math.floor(activity.distance / (seconds / 3600) * 10) / 10;
                var hours = Math.floor(seconds / 3600);
                seconds -= hours * 3600;
                var minutes = Math.floor(seconds / 60);
                seconds -= minutes * 60;
                html += '<div class="col-md-6 col-lg-4">' +
                    '<div class="card mb-4 box-shadow">' +
                    '<div id="map' + index + '" class="map"></div>' +
                    '<div class="card-body">' +
                    '<div class="card-text">' + activity.user.name + ' ' + activity.user.lastname + '</div>' +
                    '<p class="text-muted">' + activity.time_start + '</p>' +
                    '<p class="card-text">' + title + '</p>' +
                    '<div class="stats">' +
                    '<div><p>Distance<br />' + activity.distance + ' km</p></div>' +
                    '<div><p>Speed<br />' + speed + ' km/h</p></div>' +
                    '<div><p>Time<br />' + hours + ':' + minutes + ':' + seconds + '</p></div>' +
                    '</div>' +
                    '<div class="justify-content-between align-items-center">' +
                    '<div class="btn-group-feed">' +
                    '<button type="button" class="btn btn-sm btn-outline-secondary">Like</button>' +
                    '<button type="button" class="btn btn-sm btn-outline-secondary">Comment</button>' +
                    '</div></div></div></div></div>';
                html += '<span id="' + index + '" class="' + activity.gpx_file + '"></span>';
                index++;
                // var pom = document.createElement('p');
                // pom.id = index;
                // pom.className = activity.gpx_file;
                // activities.append(pom);
                //this.initMap(index);

            });
            activities.innerHTML = html;
        } catch (e) {
            console.error('Error: ' + e.message);
        }


    }

    async getUsers(dataActivity) {
        // try {
        //     let response = await fetch('?c=activity&a=users');
        //     let data = await response.json();
        //     // this.names = [];
        //     let index = 0;
        //     //var user = document.getElementById('user');
        //     dataActivity.forEach((activity) => {
        //         data.forEach((user) => {
        //             if (activity.id_user == user.id_user) {
        //                 this.names[index++] = user.name;
        //             }
        //             // var element = document.getElementById(user.id_user);
        //             // element.innerText = user.name + " " + user.lastname;
        //
        //         });
        //     });
        //     // return names;
        // } catch (e) {
        //     console.log("Error: " + e.message);
        // }
    }

    // initMap(index) {
    //     let text = "map" + index.toString();
    //     let map = new google.maps.Map(document.getElementById(text), {disableDefaultUI: true});
    //     let src = 'https://drive.google.com/u/0/uc?id=1aP4Q2imMXMSRI76oRvhUq4UgWSRTb1Ua&export=download';
    //     const ctaLayer = new google.maps.KmlLayer(src, {
    //         map: map,
    //     });
    // }


}

// new Activity();

document.addEventListener('DOMContentLoaded', () => {
    var activity = new Activity();
});
//

// function initMap(src) {
//     for (i = 1; i <= 6; i++) {
//         let text = "map" + i.toString();
//         map = new google.maps.Map(document.getElementById(text), {disableDefaultUI: true});
//         //let pom = document.getElementById(i);
//         //src = pom.className;
//
//         src = 'https://drive.google.com/u/0/uc?id=1aP4Q2imMXMSRI76oRvhUq4UgWSRTb1Ua&export=download';
//         const ctaLayer = new google.maps.KmlLayer(src, {
//             map: map,
//         });
//     }
// }